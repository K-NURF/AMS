<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\gradesController;
use App\Http\Controllers\LecturerController;
use App\http\Controllers\StaffController;
use App\Http\Controllers\TimetableController;


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
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/apply', function () {
        return view('guests.apply');
    });

    Route::post('/apply', [StudentController::class, 'apply']);

    Route::get('/staffApply', function () {
        return view('guests.staffApply');
    });

    Route::post('/staffApplication', [AdminController::class, 'store_staffApplications']);

    Route::get('/acceptance', function () {
        return view('guests.emailform');
    });
    Route::post('/check_acceptance', [AdminController::class, 'checkAcceptance']);

    Route::post('/complete_reg/{student}', [AdminController::class, 'complete_registration']);
});





Route::get('/admin', [AdminController::class, 'admin'])->middleware(['auth', 'verified'])->name('admin');

Route::middleware('auth')->group(function () {

    Route::get('/students', [StudentController::class, 'displayAnnouncements'])->name('students');
    
    Route::get('/lecturer', [LecturerController::class, 'displayAnnouncements'])->name('lecturer');

    Route::get('/staff', [StaffController::class, 'displayAnnouncements'])->name('staff');
    Route::get('/lec_attendance', function () {
        return view('lecturers.mark_attendance');
    });
    Route::post('process_session', [LecturerController::class, 'process_session']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/applicants', [AdminController::class, 'applicants']);
    Route::get('/all_students', [AdminController::class, 'all_students']);

    Route::get('/availableunits', [StudentController::class, 'displayAllunits']);
    Route::get('/registeredunits', [StudentController::class, 'displayRegUnits']);
    Route::get('/grades', [StudentController::class, 'displayGrades']);
    Route::get('/progress', [StudentController::class, 'displayProgress']);
    Route::get('/gradepost', [StudentController::class, 'postgrades']);

    Route::get('/create_class', [AdminController::class, 'create_class']);
    Route::post('/create_class', [AdminController::class, 'store_class']);
    Route::post('/create_classroom', [AdminController::class, 'store_classroom']);
    Route::get('/staffapplicants', [AdminController::class, 'staffapplicants']);
    Route::get('/admin_announce', [AnnouncementsController::class, 'announce']);

    Route::post('/post_student_grades', [LecturerController::class, 'store_grades']);
    
    Route::post('/processannounce', [AnnouncementsController::class, 'store_announcement']);
    Route::get('/view_announcements', [AnnouncementsController::class, 'displayAnnouncements']);
    Route::delete('/announcement/{announcement_id}', [AnnouncementsController::class, 'deleteAnnouncement']);
    Route::get('/lec_announcements', [LecturerController::class, 'displayAnnouncements']);
    Route::get('/student_announcement', [StudentController::class, 'displayAnnouncements']);
    Route::get('/staff_announcements', [StaffController::class, 'displayAnnouncements']);
    Route::get('/Allstaff', [AdminController::class, 'staff']);
Route::get('/process_attendance',[LecturerController::class, 'mark_attendance']);
Route::get('/mark_students',[LecturerController::class, 'mark_students']);
Route::get('/mark_absent/{attendance_id}',[LecturerController::class, 'mark_absent']);
Route::get('/mark_present/{attendance_id}',[LecturerController::class, 'mark_present']);
Route::get('/update_absent/{attendance_id}',[LecturerController::class, 'update_absent']);
Route::get('/update_present/{attendance_id}',[LecturerController::class, 'update_present']);
Route::get('/my_classes',[LecturerController::class, 'displayClasses']);
Route::post('/create_session/{class_id}',[LecturerController::class, 'create_session']);
Route::get('/edit_attendance/{session_id}',[LecturerController::class, 'edit_attendance']);
Route::post('/process_session',[LecturerController::class, 'process_session']);
Route::get('/past_classes',[LecturerController::class, 'past_classes']);

Route::post('/post_grades/{class_id}',[LecturerController::class,'postgrades']);




    Route::get('/dept_announcements', [StaffController::class, 'displayDeptAnnouncements']);
    Route::get('/staffAnnounce', [AnnouncementsController::class, 'staffAnnounce']);
    Route::get('/allstaff', [AnnouncementsController::class, 'staffAnnounce']);
    Route::post('/processstaffannounce', [AnnouncementsController::class, 'store_staffannouncement']);
    Route::get('/process_attendance', [LecturerController::class, 'mark_attendance']);
    Route::get('/my_classes', [LecturerController::class, 'displayClasses']);
    Route::post('/create_session/{class_id}', [LecturerController::class, 'create_session']);
    Route::post('/processcoursework', [LecturerController::class, 'processcoursework']);
    Route::get('/addcoursework/{classes_id}', [LecturerController::class, 'create_coursework']);
    Route::get('/reg_grad', function () {
        return view('student.gradReg');
    });

    Route::post('/process_regGrad', [StudentController::class, 'regGrad']);
    Route::get('/appliedGrad', [AdminController::class, 'appliedGrad']);


    Route::get('/allunits', [AdminController::class, 'showunits']);
    //decline applicant application
    Route::delete('/applicants/{applicant}', [AdminController::class, 'decline']);
    //accept applicant application
    Route::put('/applicants/{applicant}', [AdminController::class, 'accept']);
    //register for unit
    Route::post('/register_unit/{class_id}', [StudentController::class, 'register_unit']);

    Route::get('/timetable', [TimetableController::class, 'show_timetable']);

    Route::delete('/appliedGrad/{graduationapplicant}', [AdminController::class, 'declineGrad']);

    Route::put('/appliedGrad/{graduationapplicant}', [AdminController::class, 'acceptGrad']);

    Route::get('/graduate', [StudentController::class, 'graduants']);


});



require __DIR__ . '/auth.php';
