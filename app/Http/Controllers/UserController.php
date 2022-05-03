<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;


class UserController extends Controller
{
    
    public function index(){

        return Inertia::render('Users/Index',[

            'users' => User::query()
            ->when(Request::input('search'), function ($query,$search){
    
                $query->where('name','like','%'.$search.'%')->orWhere('email','like','%'.$search.'%');
    
            })
            ->paginate(10)
            ->withQueryString(),
    
    
            'filters' => Request::only(['search'])
    
    
        ]);
    }

    public function create(){

        return Inertia::render('Users/Create');

    }

    public function store(){

        $data = Request::validate([
            'name' => ['required','min:3'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:8'],
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return redirect('/users');

    }


}
