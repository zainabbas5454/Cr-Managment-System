<?php

use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\CrController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\EnsureIsCoordinator;
use App\Http\Middleware\EnsureIsCr;
use App\Http\Middleware\EnsureIsStudent;
use App\Http\Middleware\CourseContent;
use App\Models\Course;
use Database\Seeders\CoordinatorSeeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

    Route::get('ViewMsgCr',[CoordinatorController::class,'ViewMsgCr'])->name('ViewMsgCr');

    Route::get('ReplyFromCoordinator/{reg_no}',[CoordinatorController::class,'ViewReplyFromCoordinator'])->name('ReplyFromCoordinator');

    Route::post('ReplyToCr',[CoordinatorController::class,'ReplyToCr'])->name('ReplyToCr');

    Route::get('DeleteMsgCr/{id}',[CoordinatorController::class,'DeleteMsgCr'])->name('DeleteMsgCr');
    });




    Route::middleware([EnsureIsStudent::class , 'auth'])->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('student_home');

        Route::get('Course_Registration',[StudentController::class,'Student_Course_Registration'])->name('Student_Course_Registration');

        Route::get('Confirm_Registration/{id}',[StudentController::class,'Confim_Registration'])->name('Confirm_Registration');

        Route::post('Student_Post_Registration',[StudentController::class,'Student_Post_Registration'])->name('Student_Post_Registration');

        Route::get('/home',[StudentController::class,'Student_Registered_Courses']);

        Route::get('DeleteRegistarion/{id}',[StudentController::class,'Student_Delete_Registration'])->name('Student_Delete_Registration');

        Route::get('ViewContent/{id}',[StudentController::class,'View_Content'])->name('View_Content');

        Route::get('DownloadSlides/{slides}',[StudentController::class,'Download_Slides'])->name('DownloadSlides');

        Route::get('DownloadNotes/{notes}',[StudentController::class,'Download_Notes'])->name('DownloadNotes');

        Route::get('DownloadBooks/{books}',[StudentController::class,'Download_Books'])->name('DownloadBooks');

        Route::get('DownloadImages/{images}',[StudentController::class,'Download_Images'])->name('DownloadImages');

        Route::get('View_Notification/{id}',[StudentController::class,'View_Notification'])->name('View_Notification');

        Route::get('Download_File/{file}',[StudentController::class,'Download_File'])->name('Download_file');

        Route::get('Mark_As_Read/{id}',[StudentController::class,'Mark_As_Read'])->name('Mark_As_Read');

        Route::get('View_Marks/{id}',[StudentController::class,'ViewMarks'])->name('ViewMarks');

        Route::get('DownloadList/{list}',[StudentController::class,'Download_List'])->name('Download_List');

        Route::get('ViewCRNotification',[StudentController::class,'View_Cr_Notification'])->name('View_Cr_Notification');

        Route::get('SendMessage',[StudentController::class,'Send_Message_to_Cr'])->name('Send_Message_to_Cr');

        Route::post('SendMessage',[StudentController::class,'PostMessage'])->name('PostMessage');

        Route::get('GetReplyFromCr',[StudentController::class,'getReplyFromCr'])->name('getReplyFromCr');

        Route::get('DeleteMsgFromCR/{id}',[StudentController::class,'DeleteMsgFromCR'])->name('DeleteMsgFromCR');



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

        Route::get('ViewCourseContent/{id}',[CrController::class,'viewCourseContent'])->name('viewCourseContent')->middleware('CourseContent');

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

        Route::get('CrToCoordinator',[CrController::class,'ViewCrToCoordinator'])->name('ViewCrToCoordinator');

        Route::post('PostToCoordinator',[CrController::class,'PostToCoordinator'])->name('PostToCoordinator');

        Route::get('ViewCoordinatorToCr',[CrController::class,'ViewCoordinatorToCr'])->name('ViewCoordinatorToCr');

        Route::get('DeleteMsgFromCoordinator/{id}',[CrController::class,'DeleteMsgFromCoordinator'])->name('DeleteMsgFromCoordinator');

        Route::get('MessageFROMStudent',[CrController::class,'getStudentMessage'])->name('getStudentMessage');

        Route::get('ReplyToStudent/{regno}',[CrController::class,'ReplyToStudent'])->name('ReplyToStudent');

        Route::post('PostReplyToStudent',[CrController::class,'PostReplyToStudent'])->name('PostReplyToStudent');

        Route::get('deleteStudentMessage/{id}',[CrController::class,'deleteStudentMessage'])->name('deleteStudentMessage');

        Route::get('getClassSchedule',[CrController::class,'getClassSchedule'])->name('getClassSchedule');

        Route::get('BookRoom/{id}',[CrController::class,'BookRoom'])->name('BookRoom');


    });

   // Route::get('resenrEmail/{user}',[StudentController::class,'resend_Verification'])->name('resendEmail');

Route::post('registerstudent',[StudentController::class,'register'])->name('registerstudent');
//Event::listen(, listener, priority);
Route::get('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('resendEmail');

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

Auth::routes(['verify' => true]);
//Auth::routes();


