<?php

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

Auth::routes();

Route::get('/', function(){
  return view('home');
})->name('home');

Route::get('/clinics/search', 'App\Http\Controllers\SearchController@clinic')->name('search.clinics');
Route::get('/equipments/search', 'App\Http\Controllers\SearchController@equipment')->name('search.equipments');

Route::get('/clinics', 'App\Http\Controllers\ClinicController@index')->name('clinics.index');
Route::get('/clinic/{clinic}', 'App\Http\Controllers\ClinicController@show')->name('clinics.show');
Route::post('/clinics', 'App\Http\Controllers\ClinicController@store')->name('clinics.store');
Route::patch('/clinic/edit/{clinic}', 'App\Http\Controllers\ClinicController@update')->name('clinic.update');
Route::delete('/clinic/edit/{clinic}', 'App\Http\Controllers\ClinicController@destroy')->name('clinic.delete');

Route::get('/equipments', 'App\Http\Controllers\EquipmentController@index')->name('equipments.index');
Route::get('/equipments/create', 'App\Http\Controllers\EquipmentController@create')->name('equipment.create');
Route::post('/equipments/create', 'App\Http\Controllers\EquipmentController@store')->name('equipment.store');
Route::get('/equipment/{equipment}', 'App\Http\Controllers\EquipmentController@show')->name('equipments.show');
Route::get('/equipments/edit/{equipment}', 'App\Http\Controllers\EquipmentController@edit')->name('equipments.edit');
Route::put('/equipment/edit/{equipment}', 'App\Http\Controllers\EquipmentController@update')->name('equipment.update');
Route::delete('/equipment/delete/{equipment}', 'App\Http\Controllers\EquipmentController@destroy')->name('equipment.delete');

Route::post('/seed', function(){

  \Illuminate\Support\Facades\Storage::delete('clinics.index');
  \Illuminate\Support\Facades\Storage::delete('equipment.index');
  \Artisan::call('migrate:fresh --seed');

  return redirect()->route('home');
})->name('seed')->middleware('auth');
