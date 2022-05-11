<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as RequestFacade;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    


    public function index(){


       return Inertia::render('Departments/Index', [

            'departments' => Department::query()
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

        return Inertia::render('Departments/Create');

    }

    public function store(){

       $data = RequestFacade::validate([

        'name' => ['required'],
        'alias' => ['required'],
        
       ]);

       Department::create([

        'name' => $data['name'],
        'alias' => $data['alias'],
        
       ]);

         return redirect('/departments')->with('message','Department created successfully');



    }


    public function edit($id){



        return Inertia::render('Departments/Edit',[

            'department' => Department::findOrFail($id)

        ]);

    }

    public function update(Request $request,$id){


        $request->validate([
            'name' => ['required'],
            'alias' => ['required'],

        ]);

        $department = Department::findOrFail($id);

        $department->update([
            'name' => $request->name,
            'alias' => $request->alias,
        ]);


        return redirect('/departments')->with('message','Department updated successfully');
    }

    public function destroy($id){

        Department::findOrFail($id)->delete();

        return redirect('/departments')->with('message','Department deleted successfully');

    }
}
