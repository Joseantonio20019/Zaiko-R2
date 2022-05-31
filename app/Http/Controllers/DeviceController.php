<?php

namespace App\Http\Controllers;

use App\Exports\DevicesExport;
use App\Imports\DevicesImport;
use App\Models\Device;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as RequestFacade;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DeviceController extends Controller
{
    

    public function index()
    {
        return Inertia::render('Devices/Index',[

            'devices' => Device::query()
            ->when(RequestFacade::input('search'), function ($query,$search){
    
                $query->where('inventory_number','like','%'.$search.'%')
                ->orWhere('site','like','%'.$search.'%')
                ->orWhere('ubication','like','%'.$search.'%')
                ->orWhere('department','like','%'.$search.'%')
                ->orWhere('comment','like','%'.$search.'%')
                ->orWhere('user','like','%'.$search.'%')
                ->orWhere('status','like','%'.$search.'%');
    
            })
            ->paginate(10)
            ->withQueryString(),
    
    
            'filters' => RequestFacade::only(['search']),
            
        ]);
    }


   public function export()
   {
        return Excel::download(new DevicesExport,'devices.xlsx');

   }


}
