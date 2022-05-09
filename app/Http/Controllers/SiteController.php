<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as RequestFacade;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    


    public function index(){


       return Inertia::render('Sites/Index', [

            'sites' => Site::query()
            ->when(RequestFacade::input('search'), function ($query,$search){
    
                $query->where('name','like','%'.$search.'%')
                ->orWhere('alias','like','%'.$search.'%');
    
            })
            ->paginate(10)
            ->withQueryString(),
    
    
            'filters' => RequestFacade::only(['search'])
    
    
        ]);
 
    }

    public function create(){

        return Inertia::render('Sites/Create');

    }

    public function store(){

       $data = RequestFacade::validate([

        'name' => ['required','min:3'],
        'alias' => ['required','min:2'],
        
       ]);

       Site::create([

        'name' => $data['name'],
        'alias' => $data['alias'],
        
       ]);

         return redirect('/sites')->with('message','Site created successfully');



    }


    public function edit($id){



        return Inertia::render('Sites/Edit',[

            'site' => Site::findOrFail($id)

        ]);

    }

    public function update(Request $request,$id){


        $request->validate([
            'name' => ['required','min:3'],
            'alias' => ['required','min:2'],

        ]);

        $site = Site::findOrFail($id);

        $site->update([
            'name' => $request->name,
            'alias' => $request->alias,
        ]);


        return redirect('/sites')->with('message','Site updated successfully');
    }

    public function destroy($id){

        Site::findOrFail($id)->delete();

        return redirect('/sites')->with('message','Site deleted successfully');

    }
}
