<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Family;
use App\Models\Mark;
use App\Models\ModelDevice;
use App\Models\NetworkDevice;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use Inertia\Inertia;

class NetworkDeviceController extends Controller
{
    

        public function index(){


            return Inertia::render('Devices/NetworkDevices/Index',[

                'networkdevices' => NetworkDevice::with('device')
                ->when(RequestFacade::input('search'), function ($query,$search){
        
                    $query->where('inventory_number','like','%'.$search.'%');
        
                })
                ->paginate(10)
                ->withQueryString(),
        
        
                'filters' => RequestFacade::only(['search']),


            ]);


        }


        public function create(){

            return Inertia::render('Devices/NetworkDevices/Create',[

                'statuses' => Status::all(),

                'families' => Family::all(),

                'models' => ModelDevice::all(),
                 
                'marks' => Mark::all(),



            ]);
    
        }


        public function store(){

            $data = RequestFacade::validate([
     
             'inventory_number' => ['required'],
             'comment' => ['nullable'],
             'model' => ['required'],
             'family' => ['required'],
             'status' => ['required'],
             'mark' => ['required'],
             'manageable' => ['required'],
             'ethernet_ports_number' => ['required'],
             'speed'=> ['required'],
             'fiber_ports_number' => ['required'],
             'poe' => ['required'],
             
            ]);
            

            $device = Device::create([

                'inventory_number' => $data['inventory_number'],
                'comment' => $data['comment'],
                'model' => $data['model'],
                'family' => $data['family'],
                'status' => $data['status'],
                'mark_id' => $data['mark'],


            ]);


            NetworkDevice::create([

             'id' => $device->id,
             'manageable' => $data['manageable'],
             'ethernet_ports_number' => $data['ethernet_ports_number'],
             'fiber_ports_number' => $data['fiber_ports_number'],
             'Speed' => $data['speed'],
             'POE' => $data['poe'],
             
            ]);
     
              return redirect('/network-devices')->with('message','Network Device created successfully');
     
     
     
         }


         public function edit($id){

                
            return Inertia::render('Devices/NetworkDevices/Edit',[
        
                'networkdevice' => NetworkDevice::find($id),
                'device' => Device::find($id),
                'marks' => Mark::all(),
                'families' => Family::all(),
                'models' => ModelDevice::all(),
                'statuses' => Status::all(),
        
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
                'manageable' => ['required'],
                'ethernet_ports_number' => ['required'],
                'speed'=> ['required'],
                'fiber_ports_number' => ['required'],
                'poe' => ['required'],
                
                
               ]);




               $device = Device::findorFail($id);

               $device->update([

                'inventory_number' => $request->inventory_number,
                'comment' => $request->comment,
                'model' => $request->model,
                'family' => $request->family,
                'status' => $request->status,
                'mark_id' => $request->mark,

               ]);

                $monitor = NetworkDevice::findorFail($id);

                $monitor->update([
                    
                    'manageable' => $request->manageable,
                    'ethernet_ports_number' => $request->ethernet_ports_number,
                    'Speed' => $request->speed,
                    'fiber_ports_number' => $request->fiber_ports_number,
                    'POE' => $request->poe,

                ]);

                return redirect('/network-devices')->with('message','Network Device updated successfully');

        }


        public function destroy($id){
            
            NetworkDevice::findOrFail($id)->delete();

            return redirect('/network-devices')->with('message','Network Device deleted successfully');

        }


}
