<?php

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
Route::get('/admin/dashboard/status/{id}/view/',"AdminController@viewstatus")->name('view_status');
Route::get('/admin/dashboard/graph/',"AdminController@graph")->name('graph');
Route::get('/admin/dashboard/',"AdminController@home");
Route::get('/admin/dashboard/overview',"AdminController@overview");
Route::get('/admin/dashboard/super/add_new/',"AdminController@addsuper");
Route::get('/admin/dashboard/super/all_super/',"AdminController@allsuper");
Route::get('/admin/dashboard/super/update/{id}',"AdminController@updatesuper")->name('update_superuser');
Route::get('/admin/dashboard/contact/add/',"AdminController@addpatient");
Route::get('/admin/dashboard/contact/all/',"AdminController@allpatient")->name('all_patient');
Route::get('/admin/dashboard/contact/{id}/update/',"AdminController@updatepatient")->name('update_patient');
Route::get('/admin/dashboard/status/list/',"AdminController@allstatus")->name('all_status');
Route::get('/admin/dashboard/reports',"AdminController@Reports");
Route::get('change/password/',"SuperuserController@reset");
Route::get('/',function (){
    return redirect('login');
});
Route::post('/admin/dashboard/contact/add_new','PatientController@add');
Route::patch('/admin/dashboard/contact/{id}/update/',"PatientController@updatepatient")->name('update_patient');
Route::post('/admin/dashboard/contact/add','PatientController@add')->name('add_patient');
Route::post('/admin/dashboard/super/add_new','SuperuserController@add');
Route::patch('/admin/dashboard/super/update/{id}','SuperuserController@update')->name('update_superuser');
Route::delete('/admin/dashboard/super/delete','SuperuserController@delete')->name('delete_superuser');
Route::delete('/admin/dashboard/contact/delete','PatientController@delete')->name('delete_patient');
Route::get('/admin/dashboard/updates/{id}', 'StatusController@map')->name('map');
Route::get('/api/all',"ApiController@all");
Route::get('/api/{odk_id}/login',"ApiController@full");
Route::get('/api/{odk_id}',"ApiController@fetch");
Route::get('/api/status/{odk_id}',"ApiController@store_status");
Route::get('/api/location/{odk_id}',"ApiController@store_location");
Route::get('/api/add_members/{odk_id_parent}/{odk_id_child}',"ApiController@add_members");


Auth::routes();
