<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as RequestFacade;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    

    public function index()
    {
        return Inertia::render('Devices/Index',[

            'devices' => Device::query()
            ->when(RequestFacade::input('search'), function ($query,$search){
    
                $query->where('inventory_number','like','%'.$search.'%')->orWhere('comment','like','%'.$search.'%')->orWhere('status','like','%'.$search.'%');
    
            })
            ->paginate(10)
            ->withQueryString(),
    
    
            'filters' => RequestFacade::only(['search'])


        ]);
    }


}
