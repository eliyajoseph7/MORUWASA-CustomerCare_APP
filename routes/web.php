<?php

use Illuminate\Support\Facades\Route;
use App\Technician;

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'UserController@users');
Route::get('/register-user', 'UserController@register');
Route::get('/viewUser/{id}', 'UserController@view');
Route::post('/addUser', 'UserController@add');
Route::post('/updateUser/{id}', 'UserController@update');
Route::get('/deleteUser/{id}', 'UserController@delete');

// technician
Route::get('/view_tech', 'TechnicianController@view');
Route::post('/register_tech', 'TechnicianController@register');
Route::get('/updateTechnician/{id}', function($id){
    $technician = Technician::find($id);
    return view('technicians/updateTechnician', ['technician'=>$technician]);
});
Route::post('/update_tech/{id}', 'TechnicianController@update');
Route::get('/deleteTechnician/{id}', 'TechnicianController@delete');

// complaints
Route::get('/add_complaint','ComplaintController@view');
Route::post('/save_complaint','ComplaintController@add');
Route::get('/complaints','ComplaintController@index');
Route::post('/assignTechnician/{id}', 'ComplaintController@assignTask');
Route::get('/complaint_status', 'ComplaintController@complaintStatus');