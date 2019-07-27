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

Route::get('/', function () {
    return view('login');
});
route::resource('patient','PatientController')->middleware('role:doc');
route::resource('employe','EmployeController')->middleware('role:admin');
route::resource('permission','PermissionController')->middleware('role:admin');
route::resource('role','RoleController')->middleware('role:admin');
route::resource('user','UserController')->middleware('role:admin');
route::resource('wilaya','WilayaController')->middleware('auth');
route::get('/getdairas/{id}','PatientController@get_dairas')->middleware('auth');
route::get('/getcommunes/{id}','PatientController@get_communes')->middleware('auth');
route::get('/listecanceraux','PatientController@liste_canceraux')->middleware('auth');
route::post('/affecterpermissions', 'RoleController@affecter_permissions')->middleware('role:admin');
route::get('/detacherpermission/{id_role}/{id_permission}','RoleController@detacher_permission')->middleware('role:admin');
route::post('/affecterrole','UserController@affecter_role')->middleware('role:admin');
route::get('/detacherrole/{id_user}/{id_role}', 'UserController@detache_role')->middleware('role:admin');
route::get('/nbmasculin','PatientController@get_patient_masculin')->middleware('role:doc');
route::get('/cancerfrequant','PatientController@get_cancer_frequant')->middleware('role:doc');
route::get('/getwilayas','WilayaController@get_wilayas')->middleware('auth');
route::get('/getpatients','PatientController@liste_canceraux')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
