<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\NewUserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CommunicateController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\ExaminationsController;
use App\Http\Controllers\ClassTimetableController;
use App\Http\Controllers\FeesCollectionController;
use App\Http\Controllers\AssignClassLecturerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [AuthController::class,'login'])->name('register');
Route::get('apply',function(){
    return view('auth.apply');
})->name('apply');
Route::post('/login',[AuthController::class,'AuthLogin']);
Route::get('/logout',[AuthController::class,'logout']);
Route::get('/forget-password',[AuthController::class,'forgetpassword']);
Route::post('/forget-password',[AuthController::class,'postForgetPassword']);
Route::get('/reset/{token}',[AuthController::class,'reset']);
Route::post('/reset/{token}',[AuthController::class,'Postreset']);
Route::get('courses',[CourseController::class,'course'])->name('courses');





Route::group([ 'middleware' =>'admin'], function() {

    //admin urls
    Route::get('/admin/dashboard',[DashboardController::class,'dashboard']);
    Route::get('/admin/admin/list',[AdminController::class,'List']);
    Route::get('/admin/admin/add',[AdminController::class,'add']);
    Route::post('/admin/admin/add',[AdminController::class,'insert']);
    Route::get('/admin/admin/edit/{id}',[AdminController::class,'edit']);
    Route::post('/admin/admin/edit/{id}',[AdminController::class,'update']);
    Route::get('/admin/admin/delete/{id}',[AdminController::class,'delete']);




     //lecturers urls
    Route::get('/admin/lecturer/list',[LecturerController::class,'List']);
    Route::get('/admin/lecturer/add',[LecturerController::class,'add']);
    Route::post('/admin/lecturer/add',[LecturerController::class,'insert']);
    Route::get('/admin/lecturer/edit/{id}',[LecturerController::class,'edit']);
    Route::post('/admin/lecturer/edit/{id}',[LecturerController::class,'update']);
    Route::get('/admin/lecturer/delete/{id}',[LecturerController::class,'delete']);

     //student urls
    Route::get('/admin/student/list',[StudentController::class,'List']);
    Route::get('/admin/student/add',[StudentController::class,'add']);
    Route::post('/admin/student/add',[StudentController::class,'insert']);
    Route::get('/admin/student/edit/{id}',[StudentController::class,'edit']);
    Route::post('/admin/student/edit/{id}',[StudentController::class,'update']);
    Route::get('/admin/student/delete/{id}',[StudentController::class,'delete']);


    // class urls
    Route::get('/admin/class/list',[ClassController::class,'List']);
    Route::get('/admin/class/add',[ClassController::class,'add']);
    Route::post('/admin/class/add',[ClassController::class,'insert']);
    Route::get('/admin/class/edit/{id}',[ClassController::class,'edit']);
    Route::post('/admin/class/edit/{id}',[ClassController::class,'update']);
    Route::get('/admin/class/delete/{id}',[ClassController::class,'delete']);


    // subject urls
    Route::get('/admin/subject/list',[SubjectController::class,'List']);
    Route::get('/admin/subject/add',[SubjectController::class,'add']);
    Route::post('/admin/subject/add',[SubjectController::class,'insert']);
    Route::get('/admin/subject/edit/{id}',[SubjectController::class,'edit']);
    Route::post('/admin/subject/edit/{id}',[SubjectController::class,'update']);
    Route::get('/admin/subject/delete/{id}',[SubjectController::class,'delete']);

    //assign subject urls
    Route::get('/admin/assign_subject/list',[ClassSubjectController::class,'List']);
    Route::get('/admin/assign_subject/add',[ClassSubjectController::class,'add']);
    Route::post('/admin/assign_subject/add',[ClassSubjectController::class,'insert']);
    Route::get('/admin/assign_subject/edit/{id}',[ClassSubjectController::class,'edit']);
    Route::post('/admin/assign_subject/edit/{id}',[ClassSubjectController::class,'update']);
    Route::get('/admin/assign_subject/delete/{id}',[ClassSubjectController::class,'delete']);
    Route::get('/admin/assign_subject/edit_single/{id}',[ClassSubjectController::class,'edit_single']);
    Route::post('/admin/assign_subject/edit_single/{id}',[ClassSubjectController::class,'update_single']);


    //class timetable
    Route::get('/admin/class_timetable/list',[ClassTimetableController::class,'list']);
    Route::post('/admin/class_timetable/get_subject',[ClassTimetableController::class,'get_subject']);
    Route::post('/admin/class_timetable/add',[ClassTimetableController::class,'insert_update']);
    //admin my account


    Route::get('/admin/account',[UserController::class,'MyAccount']);
    Route::post('/admin/account',[UserController::class,'updateMyAccountAdmin']);
    Route::get('/admin/setting',[UserController::class,'Setting']);
    Route::post('/admin/setting',[UserController::class,'UpdateSetting']);

    //changing of password Url
    Route::get('/admin/change_password',[UserController::class,'change_password']);
    Route::post('/admin/change_password',[UserController::class,'update_change_password']);

    //assign Class Lecturer
    Route::get('/admin/assign_class_lecturer/list',[AssignClassLecturerController::class,'List']);
    Route::get('/admin/assign_class_lecturer/add',[AssignClassLecturerController::class,'add']);
    Route::post('/admin/assign_class_lecturer/add',[AssignClassLecturerController::class,'insert']);
    Route::get('/admin/assign_class_lecturer/edit/{id}',[AssignClassLecturerController::class,'edit']);
    Route::post('/admin/assign_class_lecturer/edit/{id}',[AssignClassLecturerController::class,'update']);
    Route::get('/admin/assign_class_lecturer/edit_single/{id}',[AssignClassLecturerController::class,'edit_single']);
    Route::post('/admin/assign_class_lecturer/edit_single/{id}',[AssignClassLecturerController::class,'update_single']);
    Route::get('/admin/assign_class_lecturer/delete/{id}',[AssignClassLecturerController::class,'delete']);


     //Examination urls
    Route::get('admin/examinations/exam/list',[ExaminationsController::class,'exam_list']);
    Route::get('admin/examinations/exam/add',[ExaminationsController::class,'exam_add']);
    Route::post('admin/examinations/exam/add',[ExaminationsController::class,'exam_insert']);
    Route::get('admin/examinations/exam/edit/{id}',[ExaminationsController::class,'exam_edit']);
    Route::post('admin/examinations/exam/edit/{id}',[ExaminationsController::class,'exam_update']);
    Route::get('admin/examinations/exam/delete/{id}',[ExaminationsController::class,'exam_delete']);


    Route::get('admin/examinations/exam_schedule',[ExaminationsController::class,'exam_schedule']);
    Route::post('admin/examinations/exam_schedule_insert',[ExaminationsController::class,'exam_schedule_insert']);
    Route::get('admin/examinations/marks_register',[ExaminationsController::class,'marks_register']);
    Route::post('admin/examinations/submit_marks_register',[ExaminationsController::class,'submit_marks_register']);



    Route::get('admin/communicate/notice_board',[CommunicateController::class,'NoticeBoard']);
    Route::get('admin/communicate/notice_board/add',[CommunicateController::class,'AddNoticeBoard']);
    Route::post('admin/communicate/notice_board/add',[CommunicateController::class,'InsertNoticeBoard']);

    Route::get('admin/communicate/notice_board/edit/{id}',[CommunicateController::class,'EditNoticeBoard']);
    Route::post('admin/communicate/notice_board/edit/{id}',[CommunicateController::class,'UpdateNoticeBoard']);
    Route::get('admin/communicate/notice_board/delete/{id}',[CommunicateController::class,'DeleteNoticeBoard']);



    Route::get('admin/communicate/send_email',[CommunicateController::class,'SendEmail']);
    Route::post('admin/communicate/send_email',[CommunicateController::class,'sendEmailUser']);
    Route::get('admin/communicate/search_user',[CommunicateController::class,'searchUser']);




    Route::get('admin/fees_collection/collect_fees',[FeesCollectionController::class,'collect_fees']);
    Route::get('admin/fees_collection/collect_fees/add_fees/{student_id}',[FeesCollectionController::class,'collect_fees_add']);
    Route::post('admin/fees_collection/collect_fees/add_fees/{student_id}',[FeesCollectionController::class,'collect_fees_insert']);

    Route::get('admin/fees_collection/collect_fees_report',[FeesCollectionController::class,'collect_fees_report']);


    Route::prefix('admin')->group(function () {
        Route::get('users', [NewUserController::class, 'index'])->name('users.index');
        Route::get('users/create', [NewUserController::class, 'create'])->name('users.create');
        Route::post('users', [NewUserController::class, 'store'])->name('users.store');
        Route::get('users/{id}', [NewUserController::class, 'show'])->name('users.show');
        Route::get('users/{id}/edit', [NewUserController::class, 'edit'])->name('users.edit');
        Route::put('users/{id}', [NewUserController::class, 'update'])->name('users.update');
        Route::delete('users/{id}', [NewUserController::class, 'destroy'])->name('users.destroy');
        Route::post('users/{id}/toggle-admission', [NewUserController::class, 'toggleAdmission'])->name('users.toggleAdmission');
    });




});


Route::group([ 'middleware' =>'lecturer'], function() {

    Route::get('/lecturer/dashboard',[DashboardController::class,'dashboard']);

    //changing of password Url
    Route::get('/lecturer/change_password',[UserController::class,'change_password']);
    Route::post('/lecturer/change_password',[UserController::class,'update_change_password']);

    //lecturers account

    Route::get('/lecturer/account',[UserController::class,'MyAccount']);
    Route::post('/lecturer/account',[UserController::class,'updateMyAccount']);



    //my student route
    Route::get('/lecturer/my_student',[StudentController::class,'MyStudent']);


    //lectures subject and student
    Route::get('/lecturer/my_class_subject',[AssignClassLecturerController::class,'MyClassSubject']);

    //class timetable
    Route::get('/lecturer/my_class_subject/class_timetable/{class_id}/{subject_id}',[ClassTimetableController::class,'MyTimetableLecturer']);


    Route::get('lecturer/my_exam_timetable',[ExaminationsController::class,'MyExamTimetableLecturer']);

    Route::get('lecturer/my_calendar',[CalendarController::class,'MyCalendarLecturer']);
    Route::get('lecturer/my_notice_board',[CommunicateController::class,'MyNoticeBoardLecturer']);


});



Route::group([ 'middleware' =>'student'], function() {

    Route::get('/student/dashboard',[DashboardController::class,'dashboard']);

    //changing of password Url
    Route::get('/student/change_password',[UserController::class,'change_password']);
    Route::post('/student/change_password',[UserController::class,'update_change_password']);


    //my subject
    Route::get('/student/my_subject',[SubjectController::class,'MySubject']);
    Route::get('/student/my_timetable',[ClassTimetableController::class,'MyTimetable']);


    Route::get('student/my_exam_timetable',[ExaminationsController::class,'MyExamTimetable']);
    Route::get('student/my_exam_result',[ExaminationsController::class,'MyExamResult']);

    Route::get('student/my_attendance',[AttendanceController::class,'MyAttendanceStudent']);

    Route::get('/student/account',[UserController::class,'MyAccount']);
    Route::post('/student/account',[UserController::class,'updateMyAccountStudent']);

    Route::get('/student/my_calendar',[CalendarController::class,'MyCalendar']);

    Route::get('/student/my_notice_board',[CommunicateController::class,'MyNoticeBoardStudent']);


    Route::get('student/fees_collection',[FeesCollectionController::class,'CollectFeesStudent']);

    Route::post('student/fees_collection',[FeesCollectionController::class,'CollectFeesStudentPayment']);



    ///paypal url
    Route::get('student/paypal/payment-error',[FeesCollectionController::class,'PaymentError']);
    Route::get('student/paypal/payment-success',[FeesCollectionController::class,'PaymentSuccess']);

    // stripe url
    Route::get('student/stripe/payment-error',[FeesCollectionController::class,'PaymentError']);
    Route::get('student/stripe/payment-success',[FeesCollectionController::class,'PaymentSuccessStripe']);
});

