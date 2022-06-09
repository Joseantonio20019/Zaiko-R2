<?php

//Controllers 
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
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\NetworkDeviceController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\PdaController;
use App\Http\Controllers\HomeController;

//Models
use App\Models\Computer;
use App\Models\Device;
use App\Models\Monitor;
use App\Models\NetworkDevice;
use App\Models\Pda;
use App\Models\Phone;
use App\Models\Printer;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Auth Routes 

Route::get('login',[LoginController::class, 'create'])->name('login');
Route::post('login',[LoginController::class, 'authenticate']);
Route::post('logout',[LoginController::class, 'destroy'])->middleware('auth');


//Middleware to make more secure the app 

//Route::middleware('auth')->group(function () { 


Route::get('/',[HomeController::class, 'index']);    


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


Route::get('/register/create/{id}', [RegisterController::class, 'create']);

Route::post('/register/create/{id}',[RegisterController::class,'store']);

Route::delete('/register/delete/{id}',[RegisterController::class,'destroy']);

//Department Routes

Route::get('/departments', [DepartmentController::class, 'index']);

Route::get('/departments/create', [DepartmentController::class, 'create']);

Route::post('/departments/create',[DepartmentController::class,'store']);

Route::get('/departments/edit/{id}',[DepartmentController::class,'edit']);

Route::put('/departments/edit/{id}',[DepartmentController::class,'update']);

Route::delete('/departments/delete/{id}',[DepartmentController::class,'destroy']);

//Devices Routes

Route::get('/devices', [DeviceController::class, 'index']);

Route::get('/others', [DeviceController::class, 'otherIndex']);

Route::get('/others/create', [DeviceController::class, 'create']);

Route::post('/others/create',[DeviceController::class,'store']);

Route::get('/others/edit/{id}',[DeviceController::class,'edit']);

Route::put('/others/edit/{id}',[DeviceController::class,'update']);

Route::delete('/others/delete/{id}',[DeviceController::class,'destroy']);

Route::get('/others/show/{id}',[DeviceController::class,'show']);

Route::get('/devices/excel', [DeviceController::class, 'export']);

Route::get('devices/othersExcels', [DeviceController::class, 'otherExport']);

//Computers Routes

Route::get('/computers', [ComputerController::class, 'index']);

Route::get('/computers/create', [ComputerController::class, 'create']);

Route::post('/computers/create',[ComputerController::class,'store']);

Route::get('/computers/edit/{id}',[ComputerController::class,'edit']);

Route::put('/computers/edit/{id}',[ComputerController::class,'update']);

Route::delete('/computers/delete/{id}',[ComputerController::class,'destroy']);

Route::get('/computers/show/{id}',[ComputerController::class,'show'])->name('computers.show');

Route::get('/computers/excel', [ComputerController::class, 'export']);


//Monitors Routes

Route::get('/monitors', [MonitorController::class, 'index']);

Route::get('/monitors/create', [MonitorController::class, 'create']);

Route::post('/monitors/create',[MonitorController::class,'store']);

Route::get('/monitors/edit/{id}',[MonitorController::class,'edit']);

Route::put('/monitors/edit/{id}',[MonitorController::class,'update']);

Route::delete('/monitors/delete/{id}',[MonitorController::class,'destroy']);

Route::get('/monitors/show/{id}',[MonitorController::class,'show'])->name('monitors.show');

Route::get('/monitors/excel', [MonitorController::class, 'export']);

//Printers Routes

Route::get('/printers', [PrinterController::class, 'index']);

Route::get('/printers/create', [PrinterController::class, 'create']);

Route::post('/printers/create',[PrinterController::class,'store']);

Route::get('/printers/edit/{id}',[PrinterController::class,'edit']);

Route::put('/printers/edit/{id}',[PrinterController::class,'update']);

Route::delete('/printers/delete/{id}',[PrinterController::class,'destroy']);

Route::get('/printers/show/{id}',[PrinterController::class,'show'])->name('printers.show');

Route::get('/printers/excel', [PrinterController::class, 'export']);

//Network Devices Routes

Route::get('/network-devices', [NetworkDeviceController::class, 'index']);

Route::get('/network-devices/create', [NetworkDeviceController::class, 'create']);

Route::post('/network-devices/create',[NetworkDeviceController::class,'store']);

Route::get('/network-devices/edit/{id}',[NetworkDeviceController::class,'edit']);

Route::put('/network-devices/edit/{id}',[NetworkDeviceController::class,'update']);

Route::delete('/network-devices/delete/{id}',[NetworkDeviceController::class,'destroy']);

Route::get('/network-devices/show/{id}',[NetworkDeviceController::class,'show'])->name('networkdevices.show');

Route::get('/network-devices/excel', [NetworkDeviceController::class, 'export']);

//Phones Routes

Route::get('/phones', [PhoneController::class, 'index']);

Route::get('/phones/create', [PhoneController::class, 'create']);

Route::post('/phones/create',[PhoneController::class,'store']);

Route::get('/phones/edit/{id}',[PhoneController::class,'edit']);

Route::put('/phones/edit/{id}',[PhoneController::class,'update']);

Route::delete('/phones/delete/{id}',[PhoneController::class,'destroy']);

Route::get('/phones/show/{id}',[PhoneController::class,'show'])->name('phones.show');

Route::get('/phones/excel', [PhoneController::class, 'export']);

//PDAS Routes

Route::get('/pdas', [PdaController::class, 'index']);

Route::get('/pdas/create', [PdaController::class, 'create']);

Route::post('/pdas/create',[PdaController::class,'store']);

Route::get('/pdas/edit/{id}',[PdaController::class,'edit']);

Route::put('/pdas/edit/{id}',[PdaController::class,'update']);

Route::delete('/pdas/delete/{id}',[PdaController::class,'destroy']);

Route::get('/pdas/show/{id}',[PdaController::class,'show'])->name('pdas.show');

Route::get('/pdas/excel', [PdaController::class, 'export']);

//});  
