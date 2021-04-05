<?php

use App\Http\Controllers\CoordinatorController;
use App\Http\Middleware\EnsureIsCoordinator;
use App\Http\Middleware\EnsureIsCr;
use App\Http\Middleware\EnsureIsStudent;
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


Route::middleware([EnsureIsCoordinator::class])->group(function () {

    Route::get('/coordinatorhome',function(){
        return view('coordinatorhome');
    });

    Route::get('AppointCr',[CoordinatorController::class,'AppointCr'])->name('AppointCr');

    Route::get('getCrData',[CoordinatorController::class,'getCrData'])->name('getCrData');

    Route::get('UpdateCr/{id}',[CoordinatorController::class,'UpdateCr'])->name('UpdateCr');

    Route::get('RemoveCr/{id}',[CoordinatorController::class,'RemoveCr'])->name('RemoveCr');

    Route::get('coordinatorhome',[CoordinatorController::class,'statistic'])->name('statistic');

    Route::get('editDetails/{id}',[CoordinatorController::class,'editDetails'])->name('EditUser');

    Route::post('editDetails',[CoordinatorController::class,'UpdateDetails'])->name('UpdateUser');

    Route::get('PostNotificationView',[CoordinatorController::class,'PostNotificationView'])->name('post_notification_view');

    Route::post('PostNotification',[CoordinatorController::class,'PostNotification'])->name('post_notification');

    Route::get('ClassResechedule',[CoordinatorController::class,'ViewClassReschedule'])->name('View_ClassReschedule');

    Route::post('ClassResechedule',[CoordinatorController::class,'ClassReschedule'])->name('ClassReschedule');

    Route::get('ViewSechedule',[CoordinatorController::class,'ViewSechedule'])->name('View_schedule');

    Route::get('DeleteSchedule/{id}',[CoordinatorController::class,'DeleteSchedule'])->name('Delete_Schedule');

    });




    Route::middleware([EnsureIsStudent::class])->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });


    Route::middleware([EnsureIsCr::class])->group(function () {
        Route::get('/crhome',function(){
            return view('crhome');
        });

    });



Route::get('/', function () {
    return view('front');
});



Route::get('/coordinatorlogin',function(){
    return view('auth.cologin');
})->name('coordinatelogin');


Route::view('crconsole', 'front');
Route::view('student_login', 'student_login');
Route::view('student_register', 'student_register')->name('student.register');
//Route::view('cr_login', 'cr_login');
// Route::view('coordinatorlogin', 'cologin');
Route::view('coordinator_registration','auth.coregister');

Auth::routes();


Route::view('test', 'test');

