<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginWithGoogleController;
use App\Http\Controllers\AddexaminationteacherController;
use App\Http\Controllers\AllexaminationteacherController;
use App\Http\Controllers\QuestionpapersetterinternalController;
use App\Http\Controllers\ModerationCommitteeController;
use App\Http\Controllers\departmentController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\degreeController;
use App\Http\Controllers\staffController;
use App\Http\Controllers\coursesController;
use App\Http\Controllers\remarkController;
use App\Http\Controllers\examcommitteebillingController;
use App\Http\Controllers\externalteacherController;
use App\Http\Controllers\committeeController;
use App\Http\Controllers\questionpaperinternalController;
use App\Http\Controllers\questionpapersetterexternalController;
use App\Http\Controllers\examininganswerscriptController;
use App\Models\Teacher;

//use App\Models\department;
//use App\Models\teacher;

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
    $data=Teacher::orderBy('id','asc')->get();
    return view('welcome',['data'=>$data]);

//return redirect('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/googleLogin', [App\Http\Controllers\LoginWithGoogleController::class, 'googleLogin'])->name('google-Login');
Route::get('/auth/google/callback', [App\Http\Controllers\LoginWithGoogleController::class, 'googleHandle']);
//Examination Committee
Route::get('/addexaminationcommitee', [App\Http\Controllers\AddexaminationteacherController::class, 'commitee']);
Route::post('/save-examinationcommitee', [App\Http\Controllers\AddexaminationteacherController::class, 'saveexaminationcommitee']);

Route::get('/Allexaminationteacher', [App\Http\Controllers\AllexaminationteacherController::class, 'allexaminationteacher']);

//Moderation Committee
Route::get('/addmoderationcommitee', [App\Http\Controllers\ModerationCommitteeController::class, 'moderationcommitee']);
Route::post('/save-moderationcommitee', [App\Http\Controllers\ModerationCommitteeController::class, 'savemoderationcommitee']);
//Questionpapersetterinternal
Route::get('/addquestionpapersetterinternal', [App\Http\Controllers\QuestionpapersetterinternalController::class, 'questionpapersetterinternal']);
Route::post('/save-questionpapersetterinternal', [App\Http\Controllers\QuestionpapersetterinternalController::class, 'savequestionpapersetterinternal']);

//Department
Route::get('/alldepartment', [App\Http\Controllers\departmentController::class, 'index']);
Route::get('department/create', [App\Http\Controllers\departmentController::class, 'create']);
Route::post('department/strore', [App\Http\Controllers\departmentController::class, 'store']);
Route::get('department/{id}/show', [App\Http\Controllers\departmentController::class,'show']);
Route::get('department/{id}/delete', [App\Http\Controllers\departmentController::class,'destroy']);
Route::get('department/{id}/edit', [App\Http\Controllers\departmentController::class,'edit']);
Route::put('update_department/{id}', [App\Http\Controllers\departmentController::class,'update']);

//Internal Teacher
Route::get('/addteacher', [App\Http\Controllers\teacherController::class, 'index']);
Route::get('teacher/create', [App\Http\Controllers\teacherController::class, 'create']);
Route::get('teacher/{id}/show', [App\Http\Controllers\teacherController::class,'show']);
Route::post('teacher/strore', [App\Http\Controllers\teacherController::class, 'store']);
Route::get('teacher/{id}/delete', [App\Http\Controllers\teacherController::class,'destroy']);
Route::get('teacher/{id}/edit', [App\Http\Controllers\teacherController::class,'edit']);
Route::put('update_teacher/{id}', [App\Http\Controllers\teacherController::class,'update']);

//External Teacher
Route::get('/addexternalteacher', [App\Http\Controllers\externalteacherController::class, 'index']);
Route::get('externalteacher/create', [App\Http\Controllers\externalteacherController::class, 'create']);
Route::get('externalteacher/{id}/show', [App\Http\Controllers\externalteacherController::class,'show']);
Route::post('externalteacher/strore', [App\Http\Controllers\externalteacherController::class, 'store'])->name('add.teacher');
Route::post('/externalteacher', [App\Http\Controllers\externalteacherController::class,'destroy'])->name('delete.teacher');
Route::get('/edit-teacher', [App\Http\Controllers\externalteacherController::class,'edit'])->name('editexternalteacher');
Route::post('/update-externalteacher', [App\Http\Controllers\externalteacherController::class,'update'])->name('update.teacher');

//Committee
Route::get('committee/{id}/show', [App\Http\Controllers\committeeController::class, 'index']);
Route::post('committee/strore', [App\Http\Controllers\committeeController::class, 'store'])->name('add.committee');
Route::post('/update-committee', [App\Http\Controllers\committeeController::class,'update'])->name('update.committee');
Route::post('/committee', [App\Http\Controllers\committeeController::class,'destroy'])->name('delete.committee');
Route::get('/search-committee', [App\Http\Controllers\committeeController::class,'searchcommittee'])->name('search.committee');
//Question Paper Internal
Route::get('questionpaperinternal/{id}/show', [App\Http\Controllers\questionpaperinternalController::class, 'index']);
Route::post('questionpaperinternal/strore', [App\Http\Controllers\questionpaperinternalController::class, 'store'])->name('add.questionpaperinternal');
Route::post('/update-questionpaperinternal', [App\Http\Controllers\questionpaperinternalController::class,'update'])->name('update.questionpaperinternal');
Route::post('/questionpaperinternal', [App\Http\Controllers\questionpaperinternalController::class,'destroy'])->name('delete.questionpaperinternal');

//Question Paper Setter External
Route::get('questionpapersetterexternal/{id}/show', [App\Http\Controllers\questionpapersetterexternalController::class, 'index']);
Route::post('questionpapersetterexternal/strore', [App\Http\Controllers\questionpapersetterexternalController::class, 'store'])->name('add.questionpapersetterexternal');
Route::post('/update-questionpapersetterexternal', [App\Http\Controllers\questionpapersetterexternalController::class,'update'])->name('update.questionpapersetterexternal');
Route::post('/questionpapersetterexternal', [App\Http\Controllers\questionpapersetterexternalController::class,'destroy'])->name('delete.questionpapersetterexternal');
//Examining Answer Scripts
Route::get('examininganswerscript/{id}/show', [App\Http\Controllers\examininganswerscriptController::class, 'index']);
Route::post('examininganswerscript/strore', [App\Http\Controllers\examininganswerscriptController::class, 'store'])->name('add.examininganswerscript');
Route::post('/update-examininganswerscript', [App\Http\Controllers\examininganswerscriptController::class,'update'])->name('update.examininganswerscript');
Route::post('/examininganswerscript', [App\Http\Controllers\examininganswerscriptController::class,'destroy'])->name('delete.examininganswerscript');
//Degree
Route::get('/alldegree', [App\Http\Controllers\degreeController::class, 'index']);
Route::get('degree/create', [App\Http\Controllers\degreeController::class, 'create']);
Route::post('degree/strore', [App\Http\Controllers\degreeController::class, 'store']);
Route::get('degree/{id}/show', [App\Http\Controllers\degreeController::class,'show']);
Route::get('degree/{id}/delete', [App\Http\Controllers\degreeController::class,'destroy']);
Route::get('degree/{id}/edit', [App\Http\Controllers\degreeController::class,'edit']);
Route::put('update_degree/{id}', [App\Http\Controllers\degreeController::class,'update']);

//Staff
Route::get('/allstaff', [App\Http\Controllers\staffController::class, 'index']);
Route::get('staff/create', [App\Http\Controllers\staffController::class, 'create']);
Route::get('staff/{id}/show', [App\Http\Controllers\staffController::class,'show']);
Route::post('staff/strore', [App\Http\Controllers\staffController::class, 'store']);
Route::get('staff/{id}/delete', [App\Http\Controllers\staffController::class,'destroy']);
Route::get('staff/{id}/edit', [App\Http\Controllers\staffController::class,'edit']);
Route::put('update_staff/{id}', [App\Http\Controllers\staffController::class,'update']);

//Courses
Route::get('/allcourses', [App\Http\Controllers\coursesController::class, 'index']);
Route::get('courses/create', [App\Http\Controllers\coursesController::class, 'create']);
Route::get('courses/{id}/show', [App\Http\Controllers\coursesController::class,'show']);
Route::post('courses/strore', [App\Http\Controllers\coursesController::class, 'store']);
Route::get('courses/{id}/delete', [App\Http\Controllers\coursesController::class,'destroy']);
Route::get('courses/{id}/edit', [App\Http\Controllers\coursesController::class,'edit']);
Route::put('update_courses/{id}', [App\Http\Controllers\coursesController::class,'update']);

//Remark
Route::get('/allremark', [App\Http\Controllers\remarkController::class, 'index']);
Route::get('remark/create', [App\Http\Controllers\remarkController::class, 'create']);
Route::get('remark/{id}/show', [App\Http\Controllers\remarkController::class,'show']);
Route::post('remark/strore', [App\Http\Controllers\remarkController::class, 'store']);
Route::get('remark/{id}/delete', [App\Http\Controllers\remarkController::class,'destroy']);
Route::get('remark/{id}/edit', [App\Http\Controllers\remarkController::class,'edit']);
Route::put('update_remark/{id}', [App\Http\Controllers\remarkController::class,'update']);

//Exam Committee Billing
Route::get('/allexamcommitteebilling', [App\Http\Controllers\examcommitteebillingController::class, 'index']);
Route::get('examcommitteebilling/create', [App\Http\Controllers\examcommitteebillingController::class, 'create']);
Route::get('examcommitteebilling/{id}/show', [App\Http\Controllers\examcommitteebillingController::class,'show']);
Route::post('examcommitteebilling/strore', [App\Http\Controllers\examcommitteebillingController::class, 'store']);
Route::get('examcommitteebilling/{id}/delete', [App\Http\Controllers\examcommitteebillingController::class,'destroy']);
Route::get('examcommitteebilling/{id}/edit', [App\Http\Controllers\examcommitteebillingController::class,'edit']);
Route::put('update_examcommitteebilling/{id}', [App\Http\Controllers\examcommitteebillingController::class,'update']);


Route::get('/download', [App\Http\Controllers\AllexaminationteacherController::class, 'generatePdf']);
