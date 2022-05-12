<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Family;
use App\Models\Mark;
use App\Models\ModelDevice;
use App\Models\Phone;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use Inertia\Inertia;

class PhoneController extends Controller
{

    public function index(){
        return Inertia::render('Devices/Phones/Index',[

            'phones' => Phone::with('device')
                ->when(RequestFacade::input('search'), function ($query,$search){
        
                    $query->where('inventory_number','like','%'.$search.'%');
        
                })
                ->paginate(10)
                ->withQueryString(),
        
        
                'filters' => RequestFacade::only(['search']),


            ]);

    }

    public function create(){

        return Inertia::render('Devices/Phones/Create',[

            'statuses' => Status::all(),

            'families' => Family::all(),

            'models' => ModelDevice::all(),
             
            'marks' => Mark::all(),



        ]);

    }

    public function store (){

        $data = RequestFacade::validate([
            'inventory_number' => 'required|unique:devices',
            'comment' => 'nullable',
            'model' => 'required',
            'family' => 'required',
            'status' => 'required',
            'mark' => 'required',
            'extension' => 'required',
            'serial_number' => 'required',
            'imei' => 'required',
        ]);


        $device = Device::create([
            'inventory_number' => $data['inventory_number'],
            'comment' => $data['comment'],
            'model' => $data['model'],
            'family' => $data['family'],
            'status' => $data['status'],
            'mark' => $data['mark'],
            

        ]);

        Phone::create([
            'device_id' => $device->id,
            'extension' => $data['extension'],
            'serial_number' => $data['serial_number'],
            'imei' => $data['imei'],

        ]);

        return redirect('/phones')->with('success','Phone created successfully');


    }

    public function edit($id){

        return Inertia::render('Devices/Phones/Edit',[
            
            'phone' => Phone::find($id),
            'device' => Device::find($id),
            'marks' => Mark::all(),
            'statuses' => Status::all(),
            'families' => Family::all(),
            'models' => ModelDevice::all()

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
            'extension' => ['required'],
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

        $phone = Phone::find($id);

        $phone->update([
            'extension' => $request->extension,
            'serial_number' => $request->serial_number,
            'imei' => $request->imei,
        ]);


        return redirect('/phones')->with('success','Phone updated successfully');


    }

    public function destroy($id){

        Phone::find($id)->delete();

        return redirect('/phones')->with('success','Phone deleted successfully');

    }




}