<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Device;
use App\Models\Register;
use App\Models\RegisterDepartment;
use App\Models\RegisterUbication;
use App\Models\Site;
use App\Models\Ubication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use Inertia\Inertia;

class RegisterController extends Controller
{
    

    public function sites(){

        $sites=Site::all();

        return $sites;

   }

   public function ubications($site){

    $ubications = Ubication::where('site_id',$site)->get();

    return $ubications;
    
}


    public function create(Request $request){

        return Inertia::render('Registers/Create',[

            'id' => $request->id,
            'departments' => Department::all(),
        ]);

    }
    
    public function store($id){

        $data = RequestFacade::validate([

            'user' => 'required',
            'comment' => 'nullable',
            'modification_date' => 'nullable',
            'department' => 'required',
            'ubication' => 'required',



        ]);


        if($data['modification_date'] == ''){

            $date = Carbon::now()->format('Y-m-d');
            $data['modification_date'] = $date;

        }

     
             Register::create([

            'user' => $data['user'],
            'comment' => $data['comment'],
            'device_id'=>$id

        ])->where('device_id',$id);

        
        $lastregister=Register::where('device_id','=',$id)->orderBy('id','desc')->first();

        
        $lastregister->update([

            'user' => $data['user'],
            'comment' => $data['comment'],
        
        ]);

        
        RegisterUbication::create([
       
                'register_id' => $lastregister->id,
                'modification_date' => $data['modification_date'],
                'ubications_id' => $data['ubication'],
        ])->where('register_id',$lastregister->id);


        RegisterDepartment::create([
 
            'register_id' => $lastregister->id,
            'modification_date' => $data['modification_date'],
            'departments_id' => $data['department'],

        ])->where('register_id',$lastregister->id);

        $ubication = Ubication::where('id',$data['ubication'])->first();
        $site = Site::where('id',$data['ubication'])->first();
        $department = Department::where('id',$data['department'])->first();


        $device = Device::where('id',$id)->first();

        $device->update([

            'site' => $site->name,
            'ubication'=>$ubication->name,
            'department' => $department->name,

        ]);

        return back()->with('message','Register created successfully');
    }

    public function edit($id){

        return Inertia::render('Registers/Edit',[


            'register' => Register::where('device_id',$id)->first(),

        ]);

    }

    public function destroy($id){

        $register = Register::where('device_id',$id)->first();

        $register->delete();

        return back()->with('message','Register deleted successfully');

    }

}
