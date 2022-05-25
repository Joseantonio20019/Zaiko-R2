<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Device;
use App\Models\Family;
use App\Models\Mark;
use App\Models\ModelDevice;
use App\Models\NetworkDevice;
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

class NetworkDeviceController extends Controller
{


    public function index()
    {


        return Inertia::render('Devices/NetworkDevices/Index', [

            'networkdevices' => NetworkDevice::with('device')->join('devices', 'devices.id', '=', 'network_devices.device_id')


                ->when(RequestFacade::input('search'), function ($query, $search) {

                    $query->where('inventory_number', 'like', '%' . $search . '%')
                        ->orWhere('manageable', 'like', '%' . $search . '%')
                        ->orWhere('POE', 'like', '%' . $search . '%')
                        ->orWhere('family', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%');
                })
                ->paginate(10)
                ->withQueryString(),


            'filters' => RequestFacade::only(['search']),


        ]);
    }

    public function show($id)
    {

        return Inertia::render('Devices/NetworkDevices/Show', [

            'networkdevice' => NetworkDevice::with('device')
                ->where('device_id', $id)
                ->first(),

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
                ->join('register_ubications', 'register_ubications.register_id', '=', 'registers.id')
                ->join('ubications', 'ubications.id', '=', 'register_ubications.ubications_id')
                ->join('sites', 'sites.id', '=', 'ubications.site_id')
                ->join('devices', 'devices.id', '=', 'registers.device_id')
                ->join('register_departments', 'register_departments.register_id', '=', 'registers.id')
                ->join('departments', 'departments.id', '=', 'register_departments.departments_id')
                ->select('registers.user', 'registers.comment', 'registers.id as registerid', 'ubications.name as ubicationname', 'sites.name as sitename', 'departments.name as departmentname', 'registers.created_at', 'devices.inventory_number', 'devices.id as deviceid')
                ->where('device_id', $id)->orderBy('registers.id', 'desc')
                ->get(),

        ]);
    }

    public function create()
    {

        return Inertia::render('Devices/NetworkDevices/Create', [

            'statuses' => Status::all(),
            'families' => Family::all(),
            'models' => ModelDevice::all(),
            'marks' => Mark::all(),
            'ubications' => Ubication::all(),
            'departments' => Department::all(),

        ]);
    }


    public function store()
    {

        $data = RequestFacade::validate([

            'inventory_number' => ['required', 'unique:devices'],
            'comment' => ['nullable'],
            'model' => ['required'],
            'family' => ['required'],
            'status' => ['required'],
            'mark' => ['required'],
            'manageable' => ['required'],
            'ethernet_ports_number' => ['required'],
            'speed' => ['required'],
            'fiber_ports_number' => ['required'],
            'poe' => ['required'],
            'user' => ['required'],
            'register_comment' => ['nullable'],
            'ubication' => ['required'],
            'department' => ['required'],
            'modification_date' => ['nullable'],

        ]);

        $ubication = Ubication::where('id', $data['ubication'])->first();
        $site =  Site::where('id', $data['ubication'])->first();
        $department = Department::where('id', $data['department'])->first();


        $device = Device::create([


            'inventory_number' => $data['inventory_number'],
            'comment' => $data['comment'],
            'model' => $data['model'],
            'family' => $data['family'],
            'status' => $data['status'],
            'mark' => $data['mark'],
            'site' => $site->name,
            'ubication' => $ubication->name,
            'department' => $department->name,

        ]);

        $register = Register::create([

            'user' => $data['user'],
            'comment' => $data['register_comment'],
            'device_id' => $device->id
        ]);


        NetworkDevice::create([

            'device_id' => $device->id,
            'manageable' => $data['manageable'],
            'ethernet_ports_number' => $data['ethernet_ports_number'],
            'fiber_ports_number' => $data['fiber_ports_number'],
            'Speed' => $data['speed'],
            'POE' => $data['poe'],

        ]);

        if ($data['modification_date'] == '') {


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

        return redirect('/network-devices')->with('message', 'Network Device created successfully');
    }

    public function edit($id)
    {

        return Inertia::render('Devices/NetworkDevices/Edit', [

            'networkdevice' => NetworkDevice::where('device_id', $id)->first(),
            'device' => Device::find($id),
            'marks' => Mark::all(),
            'families' => Family::all(),
            'models' => ModelDevice::all(),
            'statuses' => Status::all(),

        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([

            'inventory_number' => ['required'],
            'comment' => ['nullable'],
            'model' => ['required'],
            'family' => ['required'],
            'status' => ['required'],
            'mark' => ['required'],
            'manageable' => ['required'],
            'ethernet_ports_number' => ['required'],
            'speed' => ['required'],
            'fiber_ports_number' => ['required'],
            'poe' => ['required'],


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

        $networkdevice = NetworkDevice::where('device_id', $id);

        $networkdevice->update([

            'manageable' => $request->manageable,
            'ethernet_ports_number' => $request->ethernet_ports_number,
            'Speed' => $request->speed,
            'fiber_ports_number' => $request->fiber_ports_number,
            'POE' => $request->poe,

        ]);

        return redirect('/network-devices')->with('message', 'Network Device updated successfully');
    }

    public function destroy($id)
    {

        Device::find($id)->delete();

        return redirect('/network-devices')->with('message', 'Network Device deleted successfully');
    }
}
