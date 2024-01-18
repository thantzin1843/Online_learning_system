<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\MessageController;
use App\Models\Assignment;
use Symfony\Component\Mime\MessageConverter;

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


   Route::middleware('login_auth')->group(function(){
    Route::get('/', function (){
        return view('auth.login');
    })->name('loginPage');
   });


Route::middleware([ 'auth', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [AuthController::class,'dashboard'])->name('dashboard');
    Route::middleware(['admin_auth'])->group(function(){
        Route::prefix('admin')->group(function(){
            Route::get('/home',[AdminController::class,'home'])->name('admin#home');
            Route::get('/add/student',[AdminController::class,'addStudent'])->name('admin#add_student');
            Route::get('/student/list',[AdminController::class,'studentList'])->name('admin#student_list');
            Route::post('/add_student',[AdminController::class,'add_student'])->name('add#student');
            Route::get('/delete/student/{id}',[AdminController::class,'deleteStudent'])->name('delete#student');
            Route::get('/student/editPage/{id}',[AdminController::class,'editPage'])->name('student#editPage');
            Route::post('/student/update',[AdminController::class,'updateStudent'])->name('update#student');
            Route::post('/change/role',[AdminController::class,'changeRole'])->name('change#role');
            // grade and subject
            Route::get('/add/grade',[GradeController::class,'addGradePage'])->name('add#grade');
            Route::get('/delete/grade/{id}',[GradeController::class,'deleteGrade'])->name('delete#grade');
            Route::get('/deleteSubject/{subject_id}/{grade_id}/{subj_name}',[GradeController::class,'deleteSubject'])->name('delete#subject');
            Route::get('/add/subject',[GradeController::class,'addSubjectPage'])->name('add#subject');
            Route::post('/grade/add',[GradeController::class,'addGrade'])->name('grade#add');
            Route::post('/add/subjectToDb',[GradeController::class,'addSubject'])->name('add#subjectToDB');
            Route::get('/grade/detail/{id}',[GradeController::class,'gradeDetail'])->name('grade#detail');
            // teacher
            Route::get('/teacher/addPage',[AdminController::class,'teacher_addPage'])->name('addPage#teacher');
            Route::post('teacher/addTeacher',[AdminController::class,'add_teacher'])->name('add#teacher');
            Route::get('/second/teacher/add/{id}',[AdminController::class,'secondTeacherAddPage'])->name('second#teacherAdd');
            Route::get('/teacher/listPage',[AdminController::class,'teacherListPage'])->name('teacher#listPage');
            Route::get('/teacher/detail/{id}',[AdminController::class,'teacherDetail'])->name('teacher#detail');
            Route::post('/teacher/update',[AdminController::class,'teacher_update'])->name('update#teacher');

            // profiel
            Route::get('/profile',[AdminController::class,'profilePage'])->name('profile');
            Route::get('/change/password',[AdminController::class,'changePasswordPage'])->name('change#password#admin');
            Route::post('/update/profile',[AdminController::class,'updateProfile'])->name('update#profile#admin');
            Route::post('/change/password',[StudentController::class,'changePassword'])->name('change#passwordInDB#admin');

            // Send Message
            Route::get('/send/message',[AdminController::class,'sendMessagePage'])->name('send#message');
            Route::post('/save/message',[MessageController::class,'saveMessage'])->name('save#message');
            Route::get('/list/messages',[MessageController::class,'listMessage'])->name('list#message');
            Route::get('/read/message/{id}',[MessageController::class,'readMessage'])->name('adminmessage#detail');
            Route::get('/delete/message/{id}',[MessageController::class,'deleteMessage'])->name('delete#message');

        });

    });

    // Teacher Section
    Route::middleware(['teacher_auth'])->group(function(){
        Route::prefix('teacher')->group(function(){
            Route::get('/home',[TeacherController::class,'home'])->name('teacher#home');
            Route::get('/add/lecturePage',[LectureController::class,'addLecturePage'])->name('teacher#addLecturePage');
            Route::post('/post/lecture',[LectureController::class,'postLecture'])->name('post#lecture');
            Route::get('/lecture/delete/{id}',[LectureController::class,'deleteLecture'])->name('lecture#delete');
            Route::get('/lecture/view/{id}',[LectureController::class,'viewLecture'])->name('lecture#view');
            Route::get('/download/assignment/{file}',[AssignmentController::class,'downloadAssign'])->name('teacher#download#assignment');
            Route::get('/check/student/assignment/{id}/{name}',[AssignmentController::class,'checkAssignment'])->name('check#assignment');
            Route::get('/view/student/assignment/{file}',[AssignmentController::class,'viewStudentAssignment'])->name('view#student#assignment');
            Route::post('/add/mark',[AssignmentController::class,'addMark'])->name('add#mark');
            // message
            Route::get('/teacher/inbox',[MessageController::class,'inbox'])->name('teacher#inbox');
            Route::get('/teacher/groupChat',[MessageController::class,'groupChat'])->name('teacher#groupchat');
            Route::get('/message/detail/{id}',[MessageController::class,'messageDetail'])->name('message#detail');
            Route::post('/add/view/Message',[MessageController::class,'addViewMessage'])->name('add#messageView');
            // assignment page
            Route::get('/add/assignmentPage',[AssignmentController::class,'addAssignmentPage'])->name('add#assignmentPage');
            Route::post('/add/assignment',[AssignmentController::class,'addAssignment'])->name('add#assignment');
            Route::get('/lecture/list',[LectureController::class,'lectureListPage'])->name('teacher#lecture#list');
            Route::get('/assignment/list',[AssignmentController::class,'assignmentListPage'])->name('teacher#assignment#list');
            Route::get('/assignment/delete/{id}',[AssignmentController::class,'deleteAssign'])->name('delete#assignment');
            Route::get('/assignment/view/{id}',[AssignmentController::class,'viewAssign'])->name('assignment#view');
            Route::get('/teacher/profile',[TeacherController::class,'profilePage'])->name('teacher#profile');
            Route::post('/update/profile',[AdminController::class,'updateProfile'])->name('update#profile#teacher');
            Route::get('/change/password',[TeacherController::class,'changePassPage'])->name('change#passwordPage');
            Route::post('/change/password',[StudentController::class,'changePassword'])->name('change#passwordInDB#teacher');

        });

        // ajax
        Route::prefix('ajax')->group(function(){
            Route::get('/lecture/preview',[AjaxController::class,'lecturePrev'])->name('lecture#preview');
        });
    });

    // student section
    Route::middleware(['student_auth'])->group(function(){
        Route::prefix('student')->group(function(){
            Route::get('/home',[StudentController::class,'home'])->name('student#home');
            Route::get('/lecturePage/{id}',[StudentController::class,'lecturePage'])->name('student#lecturePage');
            Route::get('/show/lecture/{subName}/{id}',[StudentController::class,'showLecture'])->name('show#lectures');
            Route::get('/lecture/detail/{id}',[StudentController::class,'lectureDetail'])->name('lecture#detail');
            Route::get('/back',[StudentController::class,'back'])->name('back');
            Route::get('/download/video/{video}',[StudentController::class,'downloadVideo'])->name('download#video');
            Route::get('/download/image/{image}',[StudentController::class,'downloadImage'])->name('download#image');
            Route::get('/download/document/{document}',[StudentController::class,'downloadDocument'])->name('download#document');
            Route::get('/back/{teacher_id}',[StudentController::class,'back'])->name('back');

            // home
            Route::get('/student/profile',[StudentController::class,'profilePage'])->name('student#profile');
            Route::post('/update/profile',[AdminController::class,'updateProfile'])->name('update#profile');
            Route::get('/change/passwordPage',[StudentController::class,'changePasswordPage'])->name('change#password');
            Route::post('/change/password',[StudentController::class,'changePassword'])->name('change#passwordInDB');

            // assignment
            Route::get('/show/assignment/{grade_id}',[AssignmentController::class,'show'])->name('assignment#page');
            Route::get('/assignment/detailPage/{id}',[AssignmentController::class,'assignDetailPage'])->name('assignment#detailPage');
            Route::get('/download/assignment/{file}',[AssignmentController::class,'downloadAssign'])->name('download#assignment');
            Route::post('/upload/assignment',[AssignmentController::class,'uploadAssignment'])->name('upload#assignment');

            Route::get('/student/inbox',[MessageController::class,'student_inbox'])->name('student#inbox');
            Route::get('/student/groupChat',[MessageController::class,'student_groupChat'])->name('student#groupchat');
            Route::get('/student/message/detail/{id}',[MessageController::class,'student_messageDetail'])->name('student#message#detail');
            // Route::post('/make/as/view',[MessageController::class,'makeAsView'])->name('make#asView');
            Route::post('/add/view/Message',[MessageController::class,'addViewMessage'])->name('student#add#messageView');
            Route::post('/post/comment',[StudentController::class,'postComment'])->name('post#comment');
        });
    });
});
