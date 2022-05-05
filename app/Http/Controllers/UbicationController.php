<?php

namespace App\Http\Controllers;

use App\Models\Ubication;
use App\Models\Site;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as RequestFacade;
use Illuminate\Http\Request;

class UbicationController extends Controller
{
    


    public function index(){


        return Inertia::render('Ubications/Index', [

            
             'ubications' => Ubication::with('site')
            ->when(RequestFacade::input('search'), function ($query,$search){
    
                $query->where('name','like','%'.$search.'%');
    
            })
            ->paginate(10)
            ->withQueryString()
            , 

            //'ubications' => Ubication::with('site')->paginate(10),

            'filters' => RequestFacade::only(['search']),

    
        ]);   

        



    
    }

    public function create(){

         return Inertia::render('Ubications/Create',[

            'sites' => Site::all()

        ]); 
 


    }

    public function store(){

       $data = RequestFacade::validate([

        'name' => ['required','min:3'],
        'select' => ['required'],
        
       ]);

       Ubication::create([

        'name' => $data['name'],
        'site_id' => $data['select'],
        
       ]);

         return redirect('/ubications')->with('message','Ubication created successfully');



    }


    public function edit($id){



        return Inertia::render('Ubications/Edit',[

            'ubication' => Ubication::findOrFail($id)

        ]);

    }

    public function update(Request $request,$id){


        $request->validate([
            'name' => ['required','min:3'],
            'select' => ['required'],

        ]);

        $ubication = Ubication::findOrFail($id);

        $ubication->update([
            'name' => $request->name,
            'site_id' => $request->select
        ]);


        return redirect('/ubications')->with('message','Ubication updated successfully');
    }

    public function destroy($id){

        Ubication::findOrFail($id)->delete();

        return back()->with('message','Ubication deleted successfully');

    }
}
