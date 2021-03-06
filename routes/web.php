<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ChartController;

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
    //return view('welcome');
    return view('auth.login');
});

// Empleados
Route::resource('empleado', 'EmpleadoController')->middleware('auth');

Auth::routes(); //todas las rutas disponibles
/*
Auth::routes(['register'=>false, 'reset'=>false]); //definir rutas que se van a ocultar
*/

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});

// Charts
Route::get('/highchart', [ChartController::class, 'index']);
Route::get('/barchart', [ChartController::class, 'barChart']);