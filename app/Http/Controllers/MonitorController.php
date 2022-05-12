<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Family;
use App\Models\Mark;
use App\Models\ModelDevice;
use App\Models\Monitor;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use Inertia\Inertia;

class MonitorController extends Controller
{
    

        public function index(){


            return Inertia::render('Devices/Monitors/Index',[

                'monitors' => Monitor::with('device')
                ->when(RequestFacade::input('search'), function ($query,$search){
        
                    $query->where('inventory_number','like','%'.$search.'%');
        
                })
                ->paginate(10)
                ->withQueryString(),
        
        
                'filters' => RequestFacade::only(['search']),


            ]);


        }

        public function show($id){

            return Inertia::render('Devices/Monitors/Show',[
    
                'monitor' => Monitor::with('device')->find($id),
    
            ]);
        }


        public function create(){

            return Inertia::render('Devices/Monitors/Create',[

                'statuses' => Status::all(),

                'families' => Family::all(),

                'models' => ModelDevice::all(),
                 
                'marks' => Mark::all(),



            ]);
    
        }


        public function store(){

            $data = RequestFacade::validate([
     
             'inventory_number' => ['required','unique:devices'],
             'comment' => ['nullable'],
             'model' => ['required'],
             'family' => ['required'],
             'status' => ['required'],
             'mark' => ['required'],
             'inches' => ['required'],
             'hdmi' => ['nullable'],
             'vga' => ['nullable'],
             'dvi' => ['nullable'],
             'displayport' => ['nullable'],
             
             
            ]);

            $device = Device::create([

                'inventory_number' => $data['inventory_number'],
                'comment' => $data['comment'],
                'model' => $data['model'],
                'family' => $data['family'],
                'status' => $data['status'],
                'mark' => $data['mark'],


            ]);


            Monitor::create([

             'device_id' => $device->id,
             'inches' => $data['inches'],
             'HDMI' => $data['hdmi'],
             'VGA' => $data['vga'],
             'DVI' => $data['dvi'],
             'DisplayPort' => $data['displayport'],
             
            ]);
     
              return redirect('/monitors')->with('message','Monitor created successfully');
     
     
     
         }


         public function edit($id){

                
            return Inertia::render('Devices/Monitors/Edit',[
        
                'monitor' => Monitor::find($id),
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
                'inches' => ['required'],
                'hdmi' => ['nullable'],
                'vga' => ['nullable'],
                'dvi' => ['nullable'],
                'displayport' => ['nullable'],
                
                
               ]);




               $device = Device::findorFail($id);

               $device->update([

                'inventory_number' => $request->inventory_number,
                'comment' => $request->comment,
                'model' => $request->model,
                'family' => $request->family,
                'status' => $request->status,
                'mark' => $request->mark,
               ]);

                $monitor = Monitor::findorFail($id);

                $monitor->update([
                    'inches' => $request->inches,
                    'HDMI' => $request->hdmi,
                    'VGA' => $request->vga,
                    'DVI' => $request->dvi,
                    'DisplayPort' => $request->displayport,

                ]);

                return redirect('/monitors')->with('message','Monitor updated successfully');

        }


        public function destroy($id){
            
            Monitor::findOrFail($id)->delete();

            return redirect('/monitors')->with('message','Monitor deleted successfully');

        }


}
