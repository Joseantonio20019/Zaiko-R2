<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Device;
use App\Models\Monitor;
use App\Models\NetworkDevice;
use App\Models\Pda;
use App\Models\Phone;
use App\Models\Printer;
use App\Models\Register;
use App\Models\User;
use Inertia\Inertia;

class HomeController extends Controller
{

    public function index()
    {

        
        return Inertia::render('Home', [

            'devices' => Device::count(),
            'users' =>  User::count(),
            'phones' => Phone::count(),
            'computers' => Computer::count(),
            'monitors' => Monitor::count(),
            'printers' => Printer::count(),
            'pdas' => Pda::count(),
            'networkdevices' => NetworkDevice::count(),
            'registers'=> Device::join('registers','devices.id','=','registers.device_id')->orderBy('devices.id','desc')->get()->take(10),
        ]);
    }
}
