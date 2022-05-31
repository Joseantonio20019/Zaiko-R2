<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Request as RequestFacade;
use Illuminate\Http\Request;
use Inertia\Inertia;


class UserController extends Controller
{
    
    public function index(){

        return Inertia::render('Users/Index',[

            'users' => User::query()
            ->when(RequestFacade::input('search'), function ($query,$search){
    
                $query->where('name','like','%'.$search.'%')
                ->orWhere('email','like','%'.$search.'%');
    
            })
            ->paginate(10)
            ->withQueryString(),
    
    
            'filters' => RequestFacade::only(['search'])
    
    
        ]);
    }

    public function create(){

        return Inertia::render('Users/Create');

    }

    public function store(){

        $data = RequestFacade::validate([
            'name' => ['required','min:3'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:8'],
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return redirect('users')->with('message','User created successfully');

    }

    public function edit($id){

        
         return Inertia::render('Users/Edit',[
             
            'user' => User::findOrFail($id)
        
        ])->with('message','User updated successfully'); 

    }

   public function update(Request $request,$id){

   
        $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email'],
        ]);

        $user = User::findOrFail($id);

    
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);


        return redirect('/users')->with('message','User updated successfully');




    }

    public function destroy($id){


         User::findOrFail($id)->delete();

        return redirect('/users')->with('message','User deleted successfully');
    }

}
