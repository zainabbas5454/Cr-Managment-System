<?php

use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\CrController;
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


Route::middleware([EnsureIsCoordinator::class , 'auth'])->group(function () {

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

    Route::get('Course',[CoordinatorController::class,'ViewCourse'])->name('View_Course');

    Route::post('PostCourse',[CoordinatorController::class,'PostCourse'])->name('PostCourse');

    Route::get('Courses',[CoordinatorController::class,'ShowCourse'])->name('Show_Course');

    Route::get('CloseRegistration',[CoordinatorController::class, 'CloseRegistration'])->name('Close_Registration');

    Route::get('OpenRegistration',[CoordinatorController::class, 'OpenRegistration'])->name('Open_Registration');

    Route::get('DeleteCourse/{id}',[CoordinatorController::class,'DeleteCourse'])->name('Delete_Course');
    });




    Route::middleware([EnsureIsStudent::class])->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    });


    Route::middleware([EnsureIsCr::class , 'auth'])->group(function () {
        Route::get('/crhome',function(){
            return view('crhome');
        });

        Route::get('ViewCourseRegistration',[CrController::class,'ViewCourseRegistration'])->name('ViewCourseRegistration');

        Route::get('CourseRegistration',[CrController::class,'CourseRegistration'])->name('Course_Registration');

        Route::get('Registration/{id}',[CrController::class,'ViewRegistration'])->name('ViewRegistration');

        Route::post('PostRegistration',[CrController::class,'PostRegistration'])->name('PostRegistration');

        Route::get('crhome',[CrController::class,'RegisteredCourses'])->name('RegisteredCourses');

        Route::get('RegisterDelete/{id}',[CrController::class,'RegisterDelete'])->name('RegisterDelete');

        Route::get('ViewCourseContent/{id}',[CrController::class,'viewCourseContent'])->name('viewCourseContent');

        Route::post('PostCourseContent',[CrController::class,'PostCourseContent'])->name('PostCourseContent');

        Route::get('viewPostNotification/{id}',[CrController::class,'viewPostNotification'])->name('viewPostNotification');

        Route::post('CRPostNotification',[CrController::class,'PostNotification'])->name('PostNotification');

        Route::get('ViewMarksList/{id}',[CrController::class,'ViewMarksList'])->name('ViewMarksList');

        Route::post('PostList',[CrController::class,'PostList'])->name('PostList');

        Route::get('ViewNotification',[CrController::class,'ViewNotificationFromCoordinator'])->name('notifications');

        Route::get('DownloadImage/{image}',[CrController::class,'DownloadImage'])->name('DownloadImage');

        Route::get('ClassNotification',[CrController::class,'ViewClassNotification'])->name('ViewClassNotification');

        Route::post('PostClassNotification',[CrController::class,'PostClassNotification'])->name('PostClassNotification');

        Route::get('MarkAsRead/{id}',[CrController::class,'MarkAsRead'])->name('MarkAsRead');
    });

Route::get('test',[CrController::class,'test']);

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


