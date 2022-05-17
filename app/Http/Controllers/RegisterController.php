<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\RegisterDepartment;
use App\Models\RegisterUbication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use Inertia\Inertia;

class RegisterController extends Controller
{
    

    public function create(Request $request){


        return Inertia::render('Registers/Create',[

            'id' => $request->id

        ]);

    }

    public function store($id){

        $data = RequestFacade::validate([

            'user' => 'required',
            'comment' => 'nullable',
            'modification_date' => 'nullable'

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

        
        $lastregister=Register::where('registers.device_id','=',$id)->first();

        $registerubication= RegisterUbication::where('register_id',$lastregister->id);

        $registerubication->update([

            'modification_date' => $data['modification_date'],
        ]);

        $registerdepartment = RegisterDepartment::where('register_id',$lastregister->id);

        $registerdepartment->update([

            'modification_date' => $data['modification_date'],
        ]);

        

        return back();
    }


    public function edit($id){

        return Inertia::render('Registers/Edit',[


            'register' => Register::where('device_id',$id)->first(),

        ]);

    }

}
