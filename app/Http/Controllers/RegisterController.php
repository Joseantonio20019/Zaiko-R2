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


    public function sites()
    {

        $sites = Site::all();

        return $sites;
    }

    public function ubications($site)
    {

        $ubications = Ubication::where('site_id', $site)->get();

        return $ubications;
    }


    public function create(Request $request)
    {

        return Inertia::render('Registers/Create', [

            'id' => $request->id,
            'departments' => Department::all(),
        ]);
    }

    public function store($id)
    {

        $data = RequestFacade::validate([

            'user' => 'required',
            'comment' => 'nullable',
            'modification_date' => 'nullable',
            'department' => 'required',
            'ubication' => 'required',



        ]);


        if ($data['modification_date'] == '') {

            $date = Carbon::now()->format('Y-m-d');
            $data['modification_date'] = $date;
        }


        Register::create([

            'user' => $data['user'],
            'comment' => $data['comment'],
            'device_id' => $id,
            'user' => $data['user'],
            'comment' => $data['comment'],

        ])->where('device_id', $id);


        $lastregister = Register::where('device_id', '=', $id)->orderBy('id', 'desc')->first();


        RegisterUbication::create([

            'register_id' => $lastregister->id,
            'modification_date' => $data['modification_date'],
            'ubications_id' => $data['ubication'],
        ])->where('register_id', $lastregister->id);


        RegisterDepartment::create([

            'register_id' => $lastregister->id,
            'modification_date' => $data['modification_date'],
            'departments_id' => $data['department'],

        ])->where('register_id', $lastregister->id);

        $ubication = Ubication::where('id', $data['ubication'])->first();
        $site = Site::where('id', $data['ubication'])->first();
        $department = Department::where('id', $data['department'])->first();


        $device = Device::where('id', $id)->first();

        $device->update([

            'site' => $site->name,
            'ubication' => $ubication->name,
            'department' => $department->name,
            'user' => $data['user'],

        ]);
        
        $dv = Device::find($id);

		if ($dv->monitors()->count() >= 1){
			return redirect()->route('monitors.show',[$id])->with('message', 'Register created successfully');
		}
		if ($dv->printers()->count() >= 1){
			return redirect()->route('printers.show',[$id])->with('message', 'Register created successfully');
		}
		if ($dv->networkDevices()->count() >= 1){
			return redirect()->route('networkdevices.show',[$id])->with('message', 'Register created successfully');
		}
		if ($dv->phones()->count() >= 1){
			return redirect()->route('phones.show',[$id])->with('message', 'Register created successfully');
		}
		if ($dv->computers()->count() >= 1){
			return redirect()->route('computers.show',[$id])->with('message', 'Register created successfully');
		}
		if ($dv->pdas()->count() >= 1){
			return redirect()->route('pdas.show',[$id])->with('message', 'Register created successfully');
		}
        
        //return redirect()->back()->with('message', 'Register created successfully');
    }

    public function destroy($id)
    {

        $register = Register::where('device_id', $id)->first();

        $register->delete();

        return redirect()->back()->with('message', 'Register deleted successfully');
    }
}
