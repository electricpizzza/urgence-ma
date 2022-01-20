<?php

use App\Http\Controllers\DoctorController;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/doctors', [DoctorController::class, "index"]);
Route::get('/doctors/{usernamme}', [DoctorController::class, "singleDoctor"]);
Route::view('/about', 'pages.about')->name("about");
Route::view('/services', 'pages.services')->name("services");
Route::view('/spécialites', 'pages.spécialites', ["specialities" => Speciality::all()])->name("specialites");

Route::view('/test', 'test')->name("test");

// Route::middleware(['auth', 'doctor'])->group(function () {

// });