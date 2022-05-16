<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Family;
use App\Models\Mark;
use App\Models\ModelDevice;
use App\Models\Pda;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use Inertia\Inertia;

class PdaController extends Controller
{

    public function index(){
        return Inertia::render('Devices/PDA/Index',[

            'pdas' => Pda::with('device')->join('devices', 'devices.id', '=', 'pdas.device_id')
                ->when(RequestFacade::input('search'), function ($query,$search){
        
                    $query->where('inventory_number','like','%'.$search.'%')
                    ->orWhere('serial_number','like','%'.$search.'%')
                    ->orWhere('MAC','like','%'.$search.'%')
                    ->orWhere('mark','like','%'.$search.'%')
                    ->orWhere('status','like','%'.$search.'%');
        
                })
                ->paginate(10)
                ->withQueryString(),
        
        
                'filters' => RequestFacade::only(['search']),


            ]);

    }

    public function show($id){

        return Inertia::render('Devices/PDA/Show',[

            'pda' => Pda::with('device')->where('device_id',$id)->first(),

        ]);
    }

    public function create(){

        return Inertia::render('Devices/PDA/Create',[

            'statuses' => Status::all(),

            'families' => Family::all(),

            'models' => ModelDevice::all(),
             
            'marks' => Mark::all(),



        ]);

    }

   

    public function store (){

        $data = RequestFacade::validate([
            'inventory_number' => ['required','unique:devices'],
            'comment' => ['nullable'],
            'model' => ['required'],
            'family' => ['required'],
            'status' => ['required'],
            'mark' => ['required'],
            'mac' => ['required'],
            'serial_number' => ['required'],
            'imei' => ['required'],
        ]);


        $device = Device::create([
            'inventory_number' => $data['inventory_number'],
            'comment' => $data['comment'],
            'model' => $data['model'],
            'family' => $data['family'],
            'status' => $data['status'],
            'mark' => $data['mark'],
            

        ]);

            Pda::create([
            'device_id' => $device->id,
            'MAC' => $data['mac'],
            'serial_number' => $data['serial_number'],
            'imei' => $data['imei'],

        ]);

        return redirect('/pdas')->with('success','Pda created successfully');


    }

    public function edit($id){

        return Inertia::render('Devices/PDA/Edit',[

            'pda' => Pda::where('device_id',$id)->first(),
            'device' => Device::find($id),
            'marks' => Mark::all(),
            'statuses' => Status::all(),
            'families' => Family::all(),
            'models' => ModelDevice::all(),

        ]);

    }

    public function update(Request $request,$id){

        $request->validate([

            'inventory_number' => ['required'],
            'comment' => ['nullable'],
            'model' => ['required'],
            'family' => ['required'],
            'status' => ['required'],
            'mark' => ['required'],
            'mac' => ['required'],
            'serial_number' => ['required'],
            'imei' => ['required'],
        ]);

        $device = Device::find($id);

        $device->update([

            'inventory_number' => $request->inventory_number,
            'comment' => $request->comment,
            'model' => $request->model,
            'family' => $request->family,
            'status' => $request->status,
            'mark' => $request->mark,
            

        ]);

        $pda=pda::where('device_id',$id);

        $pda->update([
            
            'MAC' => $request->mac,
            'serial_number' => $request->serial_number,
            'imei' => $request->imei,
        ]);

    

        return redirect('/pdas')->with('success','Pda updated successfully');


    }

    public function destroy($id){

        Device::find($id)->delete();

        return redirect('/pdas')->with('success','Pda deleted successfully');

    }




}