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
     
             'inventory_number' => ['required'],
             'comment' => ['required'],
             'model' => ['required'],
             'family' => ['required'],
             'status' => ['required'],
             'mark' => ['required'],
             'inches' => ['required'],
             'hdmi' => ['required'],
             'vga' => ['required'],
             'dvi' => ['required'],
             'displayport' => ['required'],
             
             
            ]);

            dd($data);


            $device = Device::create([


                'inventory_number' => $data['inventory_number'],
                'comment' => $data['comment'],
                'model' => $data['model'],
                'type' => $data['family'],
                'status' => $data['status'],
                'mark_id' => $data['mark'],


            ]);


            Monitor::create([

             'devices_id' => $device->id,
             'inches' => $data['inches'],
             'HDMI' => $data['hdmi'],
             'VGA' => $data['vga'],
             'DVI' => $data['dvi'],
             'DisplayPort' => $data['displayport'],
             
            ]);
     
              return redirect('/monitors')->with('message','Monitor created successfully');
     
     
     
         }


         public function edit($devices_id){

                
            return Inertia::render('Devices/Monitors/Edit',[
        
                'monitor' => Monitor::find($devices_id)
        
            ]);
        }

        public function update(Request $request,$id){

            $request->validate([
                'name' => ['required']
    
            ]);

        }


        public function destroy($id){
            
            Monitor::findOrFail($id)->delete();

            return redirect('/monitors')->with('message','Monitor deleted successfully');

        }


}
