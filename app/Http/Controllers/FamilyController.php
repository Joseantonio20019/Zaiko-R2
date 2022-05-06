<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as RequestFacade;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    


    public function index(){


        return Inertia::render('Family/Index', [

            'families' => Family::query()
            ->when(RequestFacade::input('search'), function ($query,$search){
    
                $query->where('name','like','%'.$search.'%')->orWhere('device','like','%'.$search.'%');
    
            })
            ->paginate(10)
            ->withQueryString(),
    
    
            'filters' => RequestFacade::only(['search'])
    
    
        ]); 

 
    }

    public function create(){

        return Inertia::render('Family/Create');

    }

    public function store(){

       $data = RequestFacade::validate([

        'name' => ['required','min:3'],
        'device' => ['required']
        
       ]);

       Family::create([

        'name' => $data['name'],
        'device' => $data['device']
        
       ]);

         return redirect('/family')->with('message','Family created successfully');



    }


    public function edit($id){



        return Inertia::render('Family/Edit',[

            'family' => Family::findOrFail($id)

        ]);

    }

    public function update(Request $request,$id){


        $request->validate([
            'name' => ['required'],
            'device' => ['required']

        ]);
        $family = Family::findOrFail($id);

        $family->update([
            'name' => $request->name,
            'device' => $request->device,
        ]);


        return redirect('/family')->with('message','Family updated successfully');
    }

    public function destroy($id){

        Family::findOrFail($id)->delete();

        return redirect('/family')->with('message','Family deleted successfully');

    }
}
