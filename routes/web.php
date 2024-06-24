<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DocteurController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SpecialiteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/loginform',[AuthController::class,'loginform'])->name('loginform');
Route::post('/loginform',[AuthController::class,'login'])->name('loginstore');
Route::get('/patientcreate',[PatientController::class,'create'])->name('patientcreate');
Route::post('/patientcreate',[PatientController::class,'store'])->name('patientcreatestore');

// admin controller 
Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
Route::get('/admin/formcreatespecialite',[SpecialiteController::class,'create'])->name('formcreatespecialite');
Route::post('/admin/formcreatespecialite',[SpecialiteController::class,'store'])->name('specialitestore');
Route::get('/admin/indexspecialite',[SpecialiteController::class,'index'])->name('indexspecialite');
Route::get('/admin/editerspecialite/{id}',[SpecialiteController::class,'edit'])->name('editerspecialite');
Route::put('/admin/editerspecialite/{id}',[SpecialiteController::class,'update'])->name('updatespecialite');
Route::get('/admin/{id}',[SpecialiteController::class,'destroy'])->name('deletespecialite');

//doctor
Route::get('/docteur/docteur_create',[DocteurController::class,'create'])->name('docteur_create');
Route::post('/docteur/docteur_create',[DocteurController::class,'store'])->name('docteur_store');
Route::get('/docteur/docteur_index',[DocteurController::class,'index'])->name('docteur_index');
Route::get('/docteur/docteur_edit/{id}',[DocteurController::class,'edit'])->name('docteur_edit');
Route::put('/docteur/docteur_edit/{id}',[DocteurController::class,'update'])->name('docteur_update');
Route::get('/docteur/docteur_delete/{id}',[DocteurController::class,'destroy'])->name('docteur_delete');





