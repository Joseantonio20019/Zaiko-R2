<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Family;
use App\Models\Mark;
use App\Models\ModelDevice;
use App\Models\Printer;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use Inertia\Inertia;

class PrinterController extends Controller
{
    

        public function index(){


            return Inertia::render('Devices/Printers/Index',[

                'printers' => Printer::with('device')
                ->when(RequestFacade::input('search'), function ($query,$search){
        
                    $query->where('inventory_number','like','%'.$search.'%');
        
                })
                ->paginate(10)
                ->withQueryString(),
        
        
                'filters' => RequestFacade::only(['search']),


            ]);


        }


        public function create(){

            return Inertia::render('Devices/Printers/Create',[

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
             'ink' => ['required'],
             'usb' => ['nullable'],
             'com' => ['nullable'],
             'wifi' => ['nullable'],
             'ethernet' => ['nullable'],
             
            ]);

            $device = Device::create([

                'inventory_number' => $data['inventory_number'],
                'comment' => $data['comment'],
                'model' => $data['model'],
                'family' => $data['family'],
                'status' => $data['status'],
                'mark' => $data['mark'],


            ]);


            Printer::create([

             'id' => $device->id,
             'ink' => $data['ink'],
             'USB' => $data['usb'],
             'COM' => $data['com'],
             'WIFI' => $data['wifi'],
             'Ethernet' => $data['ethernet'],
             
            ]);
     
              return redirect('/printers')->with('message','Printer created successfully');
     
     
     
         }


         public function edit($id){

                
            return Inertia::render('Devices/Printers/Edit',[
        
                'printer' => Printer::find($id),
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
                'ink' => ['required'],
                'usb' => ['nullable'],
                'com' => ['nullable'],
                'wifi' => ['nullable'],
                'ethernet' => ['nullable'],
                
                
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

                $printer = Printer::findorFail($id);

                $printer->update([

                    'ink' => $request->ink,
                    'USB' => $request->usb,
                    'COM' => $request->com,
                    'WIFI' => $request->wifi,
                    'Ethernet' => $request->ethernet,

                ]);

                return redirect('/printers')->with('message','Printer updated successfully');

        }


        public function destroy($id){
            
            Printer::findOrFail($id)->delete();

            return redirect('/printers')->with('message','Printer deleted successfully');

        }


}
