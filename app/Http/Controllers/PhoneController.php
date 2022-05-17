<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Device;
use App\Models\Family;
use App\Models\Mark;
use App\Models\ModelDevice;
use App\Models\Phone;
use App\Models\Register;
use App\Models\RegisterDepartment;
use App\Models\RegisterUbication;
use App\Models\Status;
use App\Models\Ubication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use Inertia\Inertia;

class PhoneController extends Controller
{

    public function index(){
        return Inertia::render('Devices/Phones/Index',[


            

            'phones' => Phone::with('device')->join('devices', 'devices.id', '=', 'phones.device_id')

                ->when(RequestFacade::input('search'), function ($query,$search){
        
                    $query->where('inventory_number','like','%'.$search.'%')
                    ->orWhere('serial_number','like','%'.$search.'%')
                    ->orWhere('extension','like','%'.$search.'%')
                    ->orWhere('mark','like','%'.$search.'%')
                    ->orWhere('status','like','%'.$search.'%');
        
                })
                ->paginate(10)
                ->withQueryString(),
        
        
            'filters' => RequestFacade::only(['search']),


            ]);

    }

    public function show($id){

        //dd(Register::where('device_id',$id)->select('registers.*')->get());

        return Inertia::render('Devices/Phones/Show',[

            'phone' => Phone::with('device')->where('device_id',$id)->first(),
            'register' =>RegisterUbication::query()->join('registers','registers.id','=','register_ubications.register_id')->join('devices','registers.device_id','=','devices.id')->first(),
            'registers' => Register::where('device_id',$id)->get(),

        ]);
    }

    

    public function create(){

        return Inertia::render('Devices/Phones/Create',[

            'statuses' => Status::all(),

            'families' => Family::all(),

            'models' => ModelDevice::all(),
             
            'marks' => Mark::all(),

            'ubications' => Ubication::all(),

            'departments' => Department::all(),



        ]);

    }

    public function store (){

        $data = RequestFacade::validate([

            'inventory_number' => 'required|unique:devices',
            'comment' => ['nullable'],
            'model' => ['required'],
            'family' => ['required'],
            'status' => ['required'],
            'mark' => ['required'],
            'extension' => ['required'],
            'serial_number' => ['required'],
            'imei' => ['required'],
            'user' => ['required'],
            'register_comment' => ['nullable'],
            'ubication' => ['required'],
            'department' => ['required'],
            'modification_date' => ['nullable'],
        ]);


        $device = Device::create([


            'inventory_number' => $data['inventory_number'],
            'comment' => $data['comment'],
            'model' => $data['model'],
            'family' => $data['family'],
            'status' => $data['status'],
            'mark' => $data['mark'],
            

        ]);

        $register = Register::create([

            'user' => $data['user'],
            'comment' => $data['register_comment'],
            'device_id' => $device->id
        ]);

        Phone::create([
            'device_id' => $device->id,
            'extension' => $data['extension'],
            'serial_number' => $data['serial_number'],
            'imei' => $data['imei'],

        ]);


            if($data['modification_date'] == ''){


                $date = Carbon::now()->format('Y-m-d');
                $data['modification_date'] = $date;

            }

            
         RegisterUbication::create([

            'ubications_id' => $data['ubication'],
            'register_id' => $register->id,
            'modification_date' => $data['modification_date']

        ]); 

        RegisterDepartment::create([

            'departments_id' => $data['department'],
            'register_id' => $register->id,
            'modification_date' => $data['modification_date']

        ]);

        return redirect('/phones')->with('success','Phone created successfully');


    }

    public function edit($id){

        return Inertia::render('Devices/Phones/Edit',[
            
            'phone' => Phone::where('device_id',$id)->first(),
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

            $phone=Phone::where('device_id',$id);

            $phone->update([
            'extension' => $request->extension,
            'serial_number' => $request->serial_number,
            'imei' => $request->imei,
        ]);


        return redirect('/phones')->with('success','Phone updated successfully');


    }

    public function destroy($id){

        Device::find($id)->delete();

        return redirect('/phones')->with('success','Phone deleted successfully');

    }


}