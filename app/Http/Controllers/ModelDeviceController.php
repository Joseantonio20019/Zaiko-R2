<?php

namespace App\Http\Controllers;

use App\Models\ModelDevice;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as RequestFacade;
use Illuminate\Http\Request;

class ModelDeviceController extends Controller
{
    


    public function index(){


       return Inertia::render('Models/Index', [

            'model' => ModelDevice::query()
            ->when(RequestFacade::input('search'), function ($query,$search){
    
                $query->where('name','like','%'.$search.'%');
    
            })
            ->paginate(10)
            ->withQueryString(),
    
    
            'filters' => RequestFacade::only(['search'])
    
    
        ]);
 
    }

    public function create(){

        return Inertia::render('Models/Create');

    }

    public function store(){

       $data = RequestFacade::validate([

        'name' => ['required','min:3'],
        
       ]);

       ModelDevice::create([

        'name' => $data['name'],
        
       ]);

         return redirect('/model')->with('message','Model created successfully');



    }


    public function edit($id){



        return Inertia::render('Models/Edit',[

            'model' => ModelDevice::findOrFail($id)

        ]);

    }

    public function update(Request $request,$id){


        $request->validate([
            'name' => ['required','min:3'],

        ]);

        $model = ModelDevice::findOrFail($id);

        $model->update([
            'name' => $request->name,
        ]);


        return redirect('/model')->with('message','Model updated successfully');
    }

    public function destroy($id){

        ModelDevice::findOrFail($id)->delete();

        return redirect('/model')->with('message','Model deleted successfully');

    }
}
