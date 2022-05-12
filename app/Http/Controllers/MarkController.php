<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as RequestFacade;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    


    public function index(){


       return Inertia::render('Marks/Index', [

            'marks' => Mark::query()
            ->when(RequestFacade::input('search'), function ($query,$search){
    
                $query->where('name','like','%'.$search.'%');
    
            })
            ->paginate(10)
            ->withQueryString(),
    
    
            'filters' => RequestFacade::only(['search'])
    
    
        ]);
 
    }

    public function create(){

        return Inertia::render('Marks/Create');

    }

    public function store(){

       $data = RequestFacade::validate([

        'name' => ['required','min:2'],
        
       ]);

       Mark::create([

        'name' => $data['name'],
        
       ]);

         return redirect('/marks')->with('message','Mark created successfully');



    }


    public function edit($id){



        return Inertia::render('Marks/Edit',[

            'mark' => Mark::findOrFail($id)

        ]);

    }

    public function update(Request $request,$id){


        $request->validate([
            'name' => ['required']

        ]);

        $mark = Mark::findOrFail($id);

        $mark->update([
            'name' => $request->name,
        ]);


        return redirect('/marks')->with('message','Mark updated successfully');
    }

    public function destroy($id){

        Mark::findOrFail($id)->delete();

        return redirect('/marks')->with('message','Mark deleted successfully');

    }
}
