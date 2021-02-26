<?php

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
    return view('front');
});
Route::get('/studenthome',function(){
    return view('student_home');
});
Route::get('/coordinatorhome',function(){
    return view('coordinatorhome');
});
Route::get('/coordinatorlogin',function(){
    return view('auth.cologin');
})->name('coordinatelogin');
Route::get('/crhome',function(){
    return view('crhome');
});
Route::view('crconsole', 'front');
Route::view('student_login', 'student_login');
Route::view('student_register', 'student_register')->name('student.register');
//Route::view('cr_login', 'cr_login');
// Route::view('coordinatorlogin', 'cologin');
Route::view('coordinator_registration','auth.coregister');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
