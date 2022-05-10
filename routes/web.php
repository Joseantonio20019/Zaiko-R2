<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UbicationController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ModelDeviceController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PCSController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\PrinterController;



use Illuminate\Support\Facades\Route;
use Inertia\Inertia;




Route::get('login',[LoginController::class, 'create'])->name('login');
Route::post('login',[LoginController::class, 'authenticate']);
Route::post('logout',[LoginController::class, 'destroy'])->middleware('auth');



/* Route::middleware('auth')->group(function () { */


Route::get('/', function () {

    return Inertia::render('Home');
    
    
});    


//Users Routes

Route::get('/users',[UserController::class,'index']);

Route::get('/users/create',[UserController::class,'create']);

Route::post('/users/create',[UserController::class,'store']);

Route::get('users/edit/{id}',[UserController::class,'edit']);

Route::put('users/edit/{id}',[UserController::class,'update']);

Route::delete('/users/delete/{id}',[UserController::class,'destroy']);


//Sites Routes

Route::get('/sites', [SiteController::class, 'index']);

Route::get('/sites/create', [SiteController::class, 'create']);

Route::post('/sites/create',[SiteController::class,'store']);

Route::get('sites/edit/{id}',[SiteController::class,'edit']);

Route::put('sites/edit/{id}',[SiteController::class,'update']);

Route::delete('/sites/delete/{id}',[SiteController::class,'destroy']);


//Ubications Routes


Route::get('/ubications', [UbicationController::class, 'index']);

Route::get('/ubications/create', [UbicationController::class, 'create']);

Route::post('/ubications/create',[UbicationController::class,'store']);

Route::get('/ubications/edit/{id}',[UbicationController::class,'edit']);

Route::put('/ubications/edit/{id}',[UbicationController::class,'update']);

Route::delete('/ubications/delete/{id}',[UbicationController::class,'destroy']);

//Marks Routes


Route::get('/marks', [MarkController::class, 'index']);

Route::get('/marks/create', [MarkController::class, 'create']);

Route::post('/marks/create',[MarkController::class,'store']);

Route::get('/marks/edit/{id}',[MarkController::class,'edit']);

Route::put('/marks/edit/{id}',[MarkController::class,'update']);

Route::delete('/marks/delete/{id}',[MarkController::class,'destroy']);


//Status Routes


Route::get('/status', [StatusController::class, 'index']);

Route::get('/status/create', [StatusController::class, 'create']);

Route::post('/status/create',[StatusController::class,'store']);

Route::get('/status/edit/{id}',[StatusController::class,'edit']);

Route::put('/status/edit/{id}',[StatusController::class,'update']);

Route::delete('/status/delete/{id}',[StatusController::class,'destroy']);


//Family Routes

Route::get('/family', [FamilyController::class, 'index']);

Route::get('/family/create', [FamilyController::class, 'create']);

Route::post('/family/create',[FamilyController::class,'store']);

Route::get('/family/edit/{id}',[FamilyController::class,'edit']);

Route::put('/family/edit/{id}',[FamilyController::class,'update']);

Route::delete('/family/delete/{id}',[FamilyController::class,'destroy']);


//Model Routes

Route::get('/model', [ModelDeviceController::class, 'index']);

Route::get('/model/create', [ModelDeviceController::class, 'create']);

Route::post('/model/create',[ModelDeviceController::class,'store']);

Route::get('/model/edit/{id}',[ModelDeviceController::class,'edit']);

Route::put('/model/edit/{id}',[ModelDeviceController::class,'update']);

Route::delete('/model/delete/{id}',[ModelDeviceController::class,'destroy']);


//Register Routes

Route::get('/register', [RegisterController::class, 'index']);

Route::get('/register/create', [RegisterController::class, 'create']);

Route::post('/register/create',[RegisterController::class,'store']);

Route::get('/register/edit/{id}',[RegisterController::class,'edit']);

Route::put('/register/edit/{id}',[RegisterController::class,'update']);

Route::delete('/register/delete/{id}',[RegisterController::class,'destroy']);


//Devices Routes

Route::get('/devices', [DeviceController::class, 'index']);

Route::get('/devices/create', [DeviceController::class, 'create']);

Route::post('/devices/create',[DeviceController::class,'store']);

Route::get('/devices/edit/{id}',[DeviceController::class,'edit']);

Route::put('/devices/edit/{id}',[DeviceController::class,'update']);

Route::delete('/devices/delete/{id}',[DeviceController::class,'destroy']);


//Department Routes

Route::get('/departments', [DepartmentController::class, 'index']);

Route::get('/departments/create', [DepartmentController::class, 'create']);

Route::post('/departments/create',[DepartmentController::class,'store']);

Route::get('/departments/edit/{id}',[DepartmentController::class,'edit']);

Route::put('/departments/edit/{id}',[DepartmentController::class,'update']);

Route::delete('/departments/delete/{id}',[DepartmentController::class,'destroy']);


//PCS Routes

Route::get('/pcs', [PCSController::class, 'index']);

Route::get('/pcs/create', [PCSController::class, 'create']);

Route::post('/pcs/create',[PCSController::class,'store']);

Route::get('/pcs/edit/{id}',[PCSController::class,'edit']);

Route::put('/pcs/edit/{id}',[PCSController::class,'update']);

Route::delete('/pcs/delete/{id}',[PCSController::class,'destroy']);


//Monitors Routes

Route::get('/monitors', [MonitorController::class, 'index']);

Route::get('/monitors/create', [MonitorController::class, 'create']);

Route::post('/monitors/create',[MonitorController::class,'store']);

Route::get('/monitors/edit/{id}',[MonitorController::class,'edit']);

Route::put('/monitors/edit/{id}',[MonitorController::class,'update']);

Route::delete('/monitors/delete/{id}',[MonitorController::class,'destroy']);

Route::get('/monitors/show/{id}',[MonitorController::class,'show']);

//Printers Routes

Route::get('/printers', [PrinterController::class, 'index']);

Route::get('/printers/create', [PrinterController::class, 'create']);

Route::post('/printers/create',[PrinterController::class,'store']);

Route::get('/printers/edit/{id}',[PrinterController::class,'edit']);

Route::put('/printers/edit/{id}',[PrinterController::class,'update']);

Route::delete('/printers/delete/{id}',[PrinterController::class,'destroy']);

Route::get('/printers/show/{id}',[PrinterController::class,'show']);






/*  });  */