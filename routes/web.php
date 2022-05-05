<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UbicationController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;




Route::get('login',[LoginController::class, 'create'])->name('login');
Route::post('login',[LoginController::class, 'authenticate']);
Route::post('logout',[LoginController::class, 'destroy'])->middleware('auth');



Route::middleware('auth')->group(function () {


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


 }); 