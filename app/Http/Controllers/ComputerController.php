<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Device;
use App\Models\Family;
use App\Models\HardDrive;
use App\Models\Mark;
use App\Models\ModelDevice;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use Inertia\Inertia;

class ComputerController extends Controller
{
    

    public function index()
    {
        return Inertia::render('Devices/Computers/Index',[

            'computers' => Computer::with('device')
            ->when(RequestFacade::input('search'), function ($query,$search){
    
                $query->where('cpu','like','%'.$search.'%')->orWhere('cpu_model','like','%'.$search.'%')->orWhere('ram','like','%'.$search.'%');
    
            })
            ->paginate(10)
            ->withQueryString(),
    
    
            'filters' => RequestFacade::only(['search'])
    
    
        ]); 

    }


    public function create()
    {
        return Inertia::render('Devices/Computers/Create',[

            'statuses' => Status::all(),

            'families' => Family::all(),

            'models' => ModelDevice::all(),
             
            'marks' => Mark::all(),

        ]);

    }


    public function store (){


        $data = RequestFacade::validate([
     
            'inventory_number' => ['required'],
            'comment' => ['nullable'],
            'model' => ['required'],
            'family' => ['required'],
            'status' => ['required'],
            'mark' => ['required'],
            'cpu' => ['required'],
            'cpu_model' => ['required'],
            'ram_type' => ['required'],
            'ram_size' => ['required'],
            'os' => ['required'],
            'size' => ['required'],
            'type' => ['required'],
            'size1'=> ['nullable'],
            'type1'=> ['nullable'],

        ]);

        $device = Device::create([

            'inventory_number' => $data['inventory_number'],
            'comment' => $data['comment'],
            'model' => $data['model'],
            'family' => $data['family'],
            'status' => $data['status'],
            'mark_id' => $data['mark'],


        ]);

       $computer = Computer::create([

            'id' => $device->id,
            'cpu' => $data['cpu'],
            'cpu_model' => $data['cpu_model'],
            'ram_type' => $data['ram_type'],
            'ram_size' => $data['ram_size'],
            'os' => $data['os'],
        ]);

        $hard1= HardDrive::create([

            'size' => $data['size'],
            'type' => $data['type'],
            'pc_id' => $computer->id,

        ]);

        if($data['size1'] != null && $data['type1'] != null){

            $hard2= HardDrive::create([

                'size' => $data['size1'],
                'type' => $data['type1'],
                'pc_id' => $computer->id,

            ]);

        }


        return redirect('/computers')->with('message','Computer created successfully');

  }

  public function edit($id){


       return Inertia::render('Devices/Computers/Edit',[

                'computer' => Computer::find($id),
                'device' => Device::find($id),
                'marks' => Mark::all(),
                'families' => Family::all(),
                'models' => ModelDevice::all(),
                'statuses' => Status::all(),
                'harddrive1' => HardDrive::where('pc_id',$id)->get()->first(),
                'harddrive2' => HardDrive::where('pc_id',$id)->get()->last(),


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
            'cpu' => ['required'],
            'cpu_model' => ['required'],
            'ram_type' => ['required'],
            'ram_size' => ['required'],
            'os' => ['required'],
            'size' => ['required'],
            'type' => ['required'],
            'size1'=> ['nullable'],
            'type1'=> ['nullable'],
            
        ]);

        $device = Device::find($id);

        $device->update([

            'inventory_number' => $request->inventory_number,
            'comment' => $request->comment,
            'model' => $request->model,
            'family' => $request->family,
            'status' => $request->status,
            'mark_id' => $request->mark,

        ]);

        $harddrives = HardDrive::where('pc_id',$id)->get();
        $harddrive1= $harddrives->first();
        $harddrive2= $harddrives->last();

        $harddrive1->update([
            'size' => $request->size,
            'type' => $request->type,

        ]);

        $harddrive2->update([
            'size' => $request->size1,
            'type' => $request->type1,
        ]);

        return redirect('/computers')->with('message','Computer updated successfully');

  }


  public function destroy($id)
  {
        Computer::find($id)->delete();

        return redirect('/computers')->with('message','Computer deleted successfully');


  }
}
