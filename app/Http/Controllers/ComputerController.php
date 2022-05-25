<?php

namespace App\Http\Controllers;

use App\Exports\ComputerExport;
use App\Models\Department;
use App\Models\Device;
use App\Models\Family;
use App\Models\Mark;
use App\Models\ModelDevice;
use App\Models\Computer;
use App\Models\HardDrive;
use App\Models\Register;
use App\Models\RegisterDepartment;
use App\Models\RegisterUbication;
use App\Models\Site;
use App\Models\Status;
use App\Models\Ubication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class ComputerController extends Controller
{
    

    public function index()
    {
        return Inertia::render('Devices/Computers/Index',[

            'computers' => Computer::with('device.register')
            ->join('devices', 'devices.id', '=', 'computers.device_id')
             ->when(RequestFacade::input('search'), function ($query,$search){
    
                $query->where('cpu','like','%'.$search.'%')
                ->orWhere('ram_type','like','%'.$search.'%')
                ->orWhere('ram_size','like','%'.$search.'%')
                ->orWhere('os','like','%'.$search.'%')
                ->orWhere('inventory_number','like','%'.$search.'%')
                ->orWhere('mark','like','%'.$search.'%')
                ->orWhere('model','like','%'.$search.'%')
                ->orWhere('status','like','%'.$search.'%');
    
            })
            ->paginate(10)
            ->withQueryString(),
    
    
            'filters' => RequestFacade::only(['search'])
    
    
        ]); 

    }

    public function show($id){

        return Inertia::render('Devices/Computers/Show',[

            'computer' => Computer::with('device')
            ->where('device_id',$id)
            ->first(),

            'harddrive1' => HardDrive::where('pc_id',$id)
            ->get()
            ->first(),
            
            'harddrive2' => HardDrive::where('pc_id',$id)
            ->get()
            ->last(),

            'registerdevice' => Register::query()
            ->join('register_ubications','register_ubications.register_id','=','registers.id')
            ->join('ubications','ubications.id','=','register_ubications.ubications_id')
            ->join('sites','sites.id','=','ubications.site_id')
            ->join('devices','devices.id','=','registers.device_id')
            ->join('register_departments','register_departments.register_id','=','registers.id')
            ->join('departments','departments.id','=','register_departments.departments_id')
            ->select('registers.user','registers.comment','registers.id as registerid',
                     'ubications.name as ubicationname','sites.name as sitename',
                     'sites.alias as sitealias','departments.alias as departmentalias','departments.name as departmentname',
                     'devices.inventory_number','devices.id as deviceid','register_ubications.modification_date')
            ->where('device_id',$id)->orderBy('registers.id','desc')
            ->first(), 


            'registers' => Register::query()
            ->join('register_ubications','register_ubications.register_id','=','registers.id')
            ->join('ubications','ubications.id','=','register_ubications.ubications_id')
            ->join('sites','sites.id','=','ubications.site_id')
            ->join('devices','devices.id','=','registers.device_id')
            ->join('register_departments','register_departments.register_id','=','registers.id')
            ->join('departments','departments.id','=','register_departments.departments_id')
            ->select('registers.user','registers.comment','registers.id as registerid','ubications.name as ubicationname','sites.name as sitename','departments.name as departmentname','registers.created_at','devices.inventory_number','devices.id as deviceid')
            ->where('device_id',$id)->orderBy('registers.id','desc')
            ->get(), 

        ]);
    }

    public function export(){

        return Excel::download(new ComputerExport, 'computers.xlsx');

    }



    public function create()
    {
        return Inertia::render('Devices/Computers/Create',[

            'statuses' => Status::all(),
            'families' => Family::all(),
            'models' => ModelDevice::all(),
            'marks' => Mark::all(),
            'departments' => Department::all(),

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
            'cpu' => ['required'],
            'cpu_model' => ['required'],
            'ram_type' => ['required'],
            'ram_size' => ['required'],
            'os' => ['required'],
            'size' => ['required'],
            'type' => ['required'],
            'size1'=> ['nullable'],
            'type1'=> ['nullable'],
            'user' => ['required'],
            'register_comment' => ['nullable'],
            'ubication' => ['required'],
            'department' => ['required'],
            'modification_date' => ['nullable'],

        ]);

        $ubication = Ubication::where('id',$data['ubication'])->first();
        $site =  Site::where('id',$data['ubication'])->first();
        $department = Department::where('id',$data['department'])->first();

        $device = Device::create([

            'inventory_number' => $data['inventory_number'],
            'comment' => $data['comment'],
            'model' => $data['model'],
            'family' => $data['family'],
            'status' => $data['status'],
            'mark' => $data['mark'],
            'site' =>$site->name,
            'ubication'=>$ubication->name,
            'department' => $department->name,


        ]);

        $register = Register::create([

            'user' => $data['user'],
            'comment' => $data['register_comment'],
            'device_id' => $device->id
        ]);

       $computer = Computer::create([

            'device_id' => $device->id,
            'cpu' => $data['cpu'],
            'cpu_model' => $data['cpu_model'],
            'ram_type' => $data['ram_type'],
            'ram_size' => $data['ram_size'],
            'os' => $data['os'],
        ]);

         HardDrive::create([

            'size' => $data['size'],
            'type' => $data['type'],
            'pc_id' => $computer->device_id,

        ]);

        if($data['size1'] != null && $data['type1'] != null){

             HardDrive::create([

                'size' => $data['size1'],
                'type' => $data['type1'],
                'pc_id' => $computer->device_id,

            ]);

        }

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


        return redirect('/computers')->with('message','Computer created successfully');

  }

  public function edit($id){


       return Inertia::render('Devices/Computers/Edit',[



                'computer' => Computer::with('device')->where('device_id',$id)->get()->first(),
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
            'mark' => $request->mark,

        ]);

        $computer = Computer::where('device_id',$id);

        $computer->update([
            'cpu' => $request->cpu,
            'cpu_model' => $request->cpu_model,
            'ram_type' => $request->ram_type,
            'ram_size' => $request->ram_size,
            'os' => $request->os,
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
       
        Device::find($id)->delete();

        return redirect('/computers')->with('message','Computer deleted successfully');


  }
}
