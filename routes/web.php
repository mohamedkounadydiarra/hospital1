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

Route::get('/login',[AuthController::class,'login'])->name('login_form');
Route::post('/login',[AuthController::class,'login_store'])->name('login_store');
Route::get('/register',[AuthController::class,'create'])->name('register');
Route::post('/register',[AuthController::class,'store'])->name('register_store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

 // admin controller 
Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
// action sur specialite
Route::get('/admin/specialite_create',[SpecialiteController::class,'create'])->name('specialite_create');
Route::post('/admin/specialite_create',[SpecialiteController::class,'store'])->name('specialite_store');
Route::get('/admin/specialite_index',[SpecialiteController::class,'index'])->name('specialite_index');
Route::get('/admin/specialite_edit/{id}',[SpecialiteController::class,'edit'])->name('specialite_edit');
Route::put('/admin/specialite_edit/{id}',[SpecialiteController::class,'update'])->name('specialite_update');
Route::get('/admin/specialite_delete/{id}',[SpecialiteController::class,'destroy'])->name('specialite_delete');
// action sur docteur
Route::get('/admin/docteur_create',[DocteurController::class,'create'])->name('docteur_create');
Route::post('/admin/docteur_create',[DocteurController::class,'store'])->name('docteur_store');
Route::get('/docteur/docteur_index',[DocteurController::class,'index'])->name('docteur_index');
Route::get('/docteur/docteur_edit/{id}',[DocteurController::class,'edit'])->name('docteur_edit');
Route::put('/docteur/docteur_edit/{id}',[DocteurController::class,'update'])->name('docteur_update');
Route::get('/docteur/docteur_delete/{id}',[DocteurController::class,'destroy'])->name('docteur_delete');

// controller docteur
// Route::get('/docteur/docteur_connexion',[DocteurController::class,'login'])->name('docteur_connexion');
// Route::post('/docteur/docteur_connexion',[DocteurController::class,'loginstore'])->name('login_store');
// Route::get('/docteur/interface_docteur',[DocteurController::class,'interface_docteur'])->name('interface_docteur');





