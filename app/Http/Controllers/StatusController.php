<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as RequestFacade;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    


    public function index(){


       return Inertia::render('Status/Index', [

            'status' => Status::query()
            ->when(RequestFacade::input('search'), function ($query,$search){
    
                $query->where('name','like','%'.$search.'%');
    
            })
            ->paginate(10)
            ->withQueryString(),
    
    
            'filters' => RequestFacade::only(['search'])
    
    
        ]);
 
    }

    public function create(){

        return Inertia::render('Status/Create');

    }

    public function store(){

       $data = RequestFacade::validate([

        'name' => ['required','min:3'],
        
       ]);

       Status::create([

        'name' => $data['name'],
        
       ]);

         return redirect('/status')->with('message','Status created successfully');



    }


    public function edit($id){



        return Inertia::render('Status/Edit',[

            'status' => Status::findOrFail($id)

        ]);

    }

    public function update(Request $request,$id){


        $request->validate([
            'name' => ['required','min:3'],

        ]);

        $Status = Status::findOrFail($id);

        $Status->update([
            'name' => $request->name,
        ]);


        return redirect('/status')->with('message','Status updated successfully');
    }

    public function destroy($id){

        Status::findOrFail($id)->delete();

        return redirect('/status')->with('message','Status deleted successfully');

    }
}
