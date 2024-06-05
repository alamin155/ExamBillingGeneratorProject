<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginWithGoogleController;
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
use App\Http\Controllers\LaboratoryexamlabattendantlabtechnicianController;
use App\Http\Controllers\classtestController;
use App\Http\Controllers\thirdexaminationscriptController;
use App\Http\Controllers\Moderationcontroller;
use App\Http\Controllers\ExaminationdutystuffController;
use App\Http\Controllers\ExaminationdutyteacherController;
use App\Http\Controllers\laboratoryexamteacherController;
use App\Http\Controllers\QuestiontypingpublishingController;
use App\Http\Controllers\TabulationController;
use App\Http\Controllers\ScrutinizeController;
use App\Http\Controllers\VerificationofresultController;
use App\Http\Controllers\preparedController;
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

//Moderation 
Route::get('moderation/{id}/show', [App\Http\Controllers\Moderationcontroller::class, 'index']);
Route::post('moderation/strore', [App\Http\Controllers\Moderationcontroller::class, 'store'])->name('add.moderation');
Route::post('/update-moderation', [App\Http\Controllers\Moderationcontroller::class,'update'])->name('update.moderation');
Route::post('/moderation', [App\Http\Controllers\Moderationcontroller::class,'destroy'])->name('delete.moderation');
Route::get('/search-moderation', [App\Http\Controllers\Moderationcontroller::class,'searchmoderation'])->name('search.moderation');


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

//Third Examination Scripts
Route::get('thirdexaminationscript/{id}/show', [App\Http\Controllers\thirdexaminationscriptController::class, 'index']);
Route::post('thirdexaminationscript/strore', [App\Http\Controllers\thirdexaminationscriptController::class, 'store'])->name('add.thirdexaminationscript');
Route::post('/update-thirdexaminationscript', [App\Http\Controllers\thirdexaminationscriptController::class,'update'])->name('update.thirdexaminationscript');
Route::post('/thirdexaminationscript', [App\Http\Controllers\thirdexaminationscriptController::class,'destroy'])->name('delete.thirdexaminationscript');

//Class Test
Route::get('classtest/{id}/show', [App\Http\Controllers\classtestController::class, 'index']);
Route::post('classtest/strore', [App\Http\Controllers\classtestController::class, 'store'])->name('add.classtest');
Route::post('/update-classtest', [App\Http\Controllers\classtestController::class,'update'])->name('update.classtest');
Route::post('/classtest', [App\Http\Controllers\classtestController::class,'destroy'])->name('delete.classtest');

//Laboratory Exam Teacher
Route::get('laboratoryexamteacher/{id}/show', [App\Http\Controllers\laboratoryexamteacherController::class, 'index']);
Route::post('laboratoryexamteacher/strore', [App\Http\Controllers\laboratoryexamteacherController::class, 'store'])->name('add.laboratoryexamteacher');
Route::post('/update-laboratoryexamteacher', [App\Http\Controllers\laboratoryexamteacherController::class,'update'])->name('update.laboratoryexamteacher');
Route::post('/laboratoryexamteacher', [App\Http\Controllers\laboratoryexamteacherController::class,'destroy'])->name('delete.laboratoryexamteacher');

//Laboratory Exam Lab Attendant Lab Technician
Route::get('laboratoryexamlabattendantlabtechnician/{id}/show', [App\Http\Controllers\LaboratoryexamlabattendantlabtechnicianController::class, 'index']);
Route::post('laboratoryexamlabattendantlabtechnician/strore', [App\Http\Controllers\LaboratoryexamlabattendantlabtechnicianController::class, 'store'])->name('add.laboratoryexamlabattendantlabtechnician');
Route::post('/update-laboratoryexamlabattendantlabtechnician', [App\Http\Controllers\LaboratoryexamlabattendantlabtechnicianController::class,'update'])->name('update.laboratoryexamlabattendantlabtechnician');
Route::post('/laboratoryexamlabattendantlabtechnician', [App\Http\Controllers\LaboratoryexamlabattendantlabtechnicianController::class,'destroy'])->name('delete.laboratoryexamlabattendantlabtechnician');

//Examination Duty Stuff
Route::get('examinationdutystuff/{id}/show', [App\Http\Controllers\ExaminationdutystuffController::class, 'index']);
Route::post('examinationdutystuff/strore', [App\Http\Controllers\ExaminationdutystuffController::class, 'store'])->name('add.examinationdutystuff');
Route::post('/update-examinationdutystuff', [App\Http\Controllers\ExaminationdutystuffController::class,'update'])->name('update.examinationdutystuff');
Route::post('/examinationdutystuff', [App\Http\Controllers\ExaminationdutystuffController::class,'destroy'])->name('delete.examinationdutystuff');


//questiontypingpublishingController
Route::get('questiontypingpublishing/{id}/show', [App\Http\Controllers\QuestiontypingpublishingController::class, 'index']);
Route::post('questiontypingpublishing/strore', [App\Http\Controllers\QuestiontypingpublishingController::class, 'store'])->name('add.questiontypingpublishing');
Route::post('/update-questiontypingpublishing', [App\Http\Controllers\QuestiontypingpublishingController::class,'update'])->name('update.questiontypingpublishing');
Route::post('/questiontypingpublishing', [App\Http\Controllers\QuestiontypingpublishingController::class,'destroy'])->name('delete.questiontypingpublishing');


//Examination Duty Teacher
Route::get('examinationdutyteacher/{id}/show', [App\Http\Controllers\ExaminationdutyteacherController::class, 'index']);
Route::post('examinationdutyteacher/strore', [App\Http\Controllers\ExaminationdutyteacherController::class, 'store'])->name('add.examinationdutyteacher');
Route::post('/update-examinationdutyteacher', [App\Http\Controllers\ExaminationdutyteacherController::class,'update'])->name('update.examinationdutyteacher');
Route::post('/examinationdutyteacher', [App\Http\Controllers\ExaminationdutyteacherController::class,'destroy'])->name('delete.examinationdutyteacher');

//Tabulation
Route::get('tabulation/{id}/show', [App\Http\Controllers\TabulationController::class, 'index']);
Route::post('tabulation/strore', [App\Http\Controllers\TabulationController::class, 'store'])->name('add.tabulation');
Route::post('/update-tabulation', [App\Http\Controllers\TabulationController::class,'update'])->name('update.tabulation');
Route::post('/tabulation', [App\Http\Controllers\TabulationController::class,'destroy'])->name('delete.tabulation');


//Scrutinize
Route::get('scrutinize/{id}/show', [App\Http\Controllers\ScrutinizeController::class, 'index']);
Route::post('scrutinize/strore', [App\Http\Controllers\ScrutinizeController::class, 'store'])->name('add.scrutinize');
Route::post('/update-scrutinize', [App\Http\Controllers\ScrutinizeController::class,'update'])->name('update.scrutinize');
Route::post('/scrutinize', [App\Http\Controllers\ScrutinizeController::class,'destroy'])->name('delete.scrutinize');

//preparedController
Route::get('prepared/{id}/show', [App\Http\Controllers\preparedController::class, 'index']);
Route::post('prepared/strore', [App\Http\Controllers\preparedController::class, 'store'])->name('add.prepared');
Route::post('/prepared', [App\Http\Controllers\preparedController::class,'destroy'])->name('delete.prepared');



//Verificationofresult
Route::get('verificationofresult/{id}/show', [App\Http\Controllers\VerificationofresultController::class, 'index']);
Route::post('verificationofresult/strore', [App\Http\Controllers\VerificationofresultController::class, 'store'])->name('add.verificationofresult');
Route::post('/update-verificationofresult', [App\Http\Controllers\VerificationofresultController::class,'update'])->name('update.verificationofresult');
Route::post('/verificationofresult', [App\Http\Controllers\VerificationofresultController::class,'destroy'])->name('delete.verificationofresult');


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
Route::get('download/{id}/show', [App\Http\Controllers\examcommitteebillingController::class, 'generatehtml']);

Route::get('document/{id}/show', [App\Http\Controllers\examcommitteebillingController::class, 'documentPdf']);

// Total Count Route
Route::get('/home', [App\Http\Controllers\teacherController::class, 'teacherlist']);



