<?php

namespace App\Http\Controllers;

use App\Models\PC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use Inertia\Inertia;

class PCSController extends Controller
{
    

    public function index()
    {
        return Inertia::render('PCS/Index',[

            'pcs' => PC::query()
            ->when(RequestFacade::input('search'), function ($query,$search){
    
                $query->where('cpu','like','%'.$search.'%')->orWhere('cpu_model','like','%'.$search.'%')->orWhere('ram','like','%'.$search.'%');
    
            })
            ->paginate(10)
            ->withQueryString(),
    
    
            'filters' => RequestFacade::only(['search'])
    
    
        ]); 

    }


}
