<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use setasign\Fpdi\Tcpdf\Fpdi;
//use Stichoza\GoogleTranslate\GoogleTranslate;

use App\Models\Department;
use App\Models\ExamRemunerationHeads;
use App\Models\Degree;
use App\Models\Examcommitteebilling;
use App\Models\Committee;
use App\Models\ModerationModel;
use App\Models\Questionpaperinternal;
use App\Models\Questionpapersetterexternal;
use App\Models\Examininganswerscript;
use App\Models\thirdexaminationscript;
use App\Models\classtest;
use App\Models\Laboratoryexamteacher;
use App\Models\Laboratoryexamlabattendantlabtechnician;
use App\Models\Questiontypingpublishing;
use App\Models\Examinationdutyteacher;
use App\Models\Examinationdutystuff;
use App\Models\Tabulation;
use App\Models\Scrutinize;
use App\Models\Verificantionofresult;
use App\Models\Oralexamination;
use App\Models\Supervisiongraduate;
use App\Models\Supervisionpostgraduate;
use App\Models\Supervisionmphilphd;
use App\Models\Thesisevaluation;
use App\Models\Presentation;
use App\Models\Rateofremunerationforexaminationwork;
use App\Models\Courses;
use App\Models\Teacher;
use App\Models\Staff;
use Barryvdh\DomPDF\Facade;
use Auth;
use DB;
use PDF;
use TCPDF;
use TCPDF_FONTS; 
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class examcommitteebillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function getMyBling()
    {
        // Get IDs from ExamCommitteeBilling based on the user ID
        $data = ExamCommitteeBilling::orderBy('id', 'asc')
            ->where('created_by', Auth::user()->id)
            ->pluck('id'); // Use pluck() to get only the 'id' column

        // Get exam IDs from Committee based on the user's email
        $data2 = Committee::select('committees.exam_id')
            ->join('teachers', 'committees.tech_id', '=', 'teachers.id')
            ->where('teachers.email', Auth::user()->email)
            ->pluck('committees.exam_id'); // Use pluck() to get only the 'exam_id' column

        // Merge both arrays and set the session variable
        Session::put('bids', array_merge($data->toArray(), $data2->toArray()));
    }

    public function index()
    {
        // Call the method to retrieve and store IDs in the session
        $this->getMyBling();

        // Retrieve the IDs from the session
        $ids = Session::get('bids', []);

        // Fetch data from ExamCommitteeBilling where the ID is in the array of IDs
        $data = ExamCommitteeBilling::whereIn('id', $ids)
            ->orderBy('id', 'asc')
            ->get();

        // Return the view with the fetched data
        return view('admin.examcommitteebilling.index', ['data' => $data]);
    
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=Department::orderBy('id','desc')->get();
        $data1=Degree::orderBy('id','desc')->get();
        return view('admin.examcommitteebilling.create',['departments'=>$data,'degrees'=>$data1]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'semester'=>'required',
            'year'=>'required',
            'exam_year'=>'required',
            'addmission_year'=>'required',
            'academic_year'=>'required',
            'exam_start_date'=>'required',
            'exam_end_date'=>'required',
            'staff_status'=>'required',
            
        ]);
       
        $data=new Examcommitteebilling();
        $data->semester=$request->semester;
        $data->year=$request->year;
        $data->versityname=$request->versityname;
        $data->exam_year=$request->exam_year;
        $data->addmission_year=$request->addmission_year;
        $data->academic_year=$request->academic_year;
        $data->exam_start_date=$request->exam_start_date;
        $data->exam_end_date=$request->exam_end_date;
        $data->staff_status=$request->staff_status;
        $data->dept_id =$request->depart;
        $data->deg_id=$request->depart1;
        $data->created_by=Auth::user()->id;
        $data->save();
        
        return redirect('examcommitteebilling/create')->with('msg','Exam Committee Billing created Successfuly!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    // Retrieve the IDs from the session
    $ids = Session::get('bids', []);

    // Check if the provided ID is in the allowed list
    if (!in_array($id, $ids)) {
        return redirect('home')->withErrors('Invalid ID or ID not found in the allowed list.');
    }

    // Retrieve the specific record (if needed for further operations)
    $data = ExamCommitteeBilling::find($id);

    // Return the view with the specific data (if needed)
    return view('admin.examcommitteebilling.show', ['data' => $data]);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    // Check if the provided id is valid
    $ids = Session::get('bids', []);
    if (!is_numeric($id) || !in_array($id,$ids, $this->getmybling())) {
        return redirect()->back()->withErrors('Invalid ID or ID not found in the allowed list.');
    }

    // Retrieve the required data
    $departs = Department::orderBy('id', 'desc')->get();
    $degres = Degree::orderBy('id', 'desc')->get();
    $data = Examcommitteebilling::find($id);

    // Check if the data exists
    if (!$data) {
        return redirect()->back()->withErrors('Exam Committee Billing data not found.');
    }

    // Return the view with the required data
    return view('admin.examcommitteebilling.edit', [
        'departs' => $departs,
        'degres' => $degres,
        'data' => $data,
    ]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ids = Session::get('bids', []);
        if(!in_array($id,$ids, $this->getmybling())) {
            return;
        }
        $request->validate([
            'semester'=>'required',
            'year'=>'required',
            'exam_year'=>'required',
            'addmission_year'=>'required',
            'academic_year'=>'required',
            'exam_start_date'=>'required',
            'exam_end_date'=>'required',
            'staff_status'=>'required',
            
        ]);
        $data=Examcommitteebilling::find($id);
        $data->semester=$request->semester;
        $data->year=$request->year;
        $data->exam_year=$request->exam_year;
        $data->addmission_year=$request->addmission_year;
        $data->academic_year=$request->academic_year;
        $data->exam_start_date=$request->exam_start_date;
        $data->exam_end_date=$request->exam_end_date;
        $data->staff_status=$request->staff_status;
        $data->dept_id =$request->depart;
        $data->deg_id=$request->degre;
        $data->versityname=$request->versityname;
    
        $data->update();
        return redirect('examcommitteebilling/'.$id.'/edit')->with('msg','Exam Committee Billing updated Successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $ids = Session::get('bids', []);
    if (!in_array($id, $ids)) {
        return redirect()->back()->with('error', 'Invalid ID');
    }
    Examcommitteebilling::where('id', $id)->delete();

    return redirect('/allexamcommitteebilling')->with('msg', 'Exam Committee Billing removed successfully!');
}

    public function documentPdf(string $id,int $pageNumber = 1)
    {
        $ids = Session::get('bids', []);
        if(!in_array($id,$ids, $this->getmybling())) {
            return;
        }

         $exambillings=Examcommitteebilling::where('id',$id)->orderBy('deg_id','asc')->paginate(10);
         $committees=Committee::where('exam_id',$id)->orderBy('remk_id','asc')->paginate(10);
         $moderations=ModerationModel::where('exam_id',$id)->orderBy('remk_id','asc')->paginate(10);
         $questionpaperinternals=Questionpaperinternal::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
         $questionpapersetterexternals=Questionpapersetterexternal::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
         $examininganswerscripts=Examininganswerscript::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
         $thirdexaminationscripts=thirdexaminationscript::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
         $classtests=classtest::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
         $laboratoryexamteachers=Laboratoryexamteacher::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
         $laboratoryexamlabattendantlabtechnicians=Laboratoryexamlabattendantlabtechnician::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
         $questiontypingpublishings=Questiontypingpublishing::where('exam_id',$id)->orderBy('tech_id','asc')->paginate(10);
         $examinationdutyteachers=Examinationdutyteacher::where('exam_id',$id)->orderBy('tech_id','asc')->paginate(10);
         $examinationdutystuffs=Examinationdutystuff::where('exam_id',$id)->orderBy('staf_id','asc')->paginate(10);
         $tabulations=Tabulation::where('exam_id',$id)->orderBy('tech_id','asc')->paginate(10);
        $scrutinizes=Scrutinize::where('exam_id',$id)->orderBy('tech_id','asc')->paginate(10);
        $verificationofresults=Verificantionofresult::where('exam_id',$id)->orderBy('tech_id','asc')->paginate(10);
        $oralexaminations=Oralexamination::where('exam_id',$id)->orderBy('tech_id','asc')->paginate(10);
         $supervisiongraduates=Supervisiongraduate::where('exam_id',$id)->orderBy('tech_id','asc')->paginate(10);
         $supervisionpostgraduates=Supervisionpostgraduate::where('exam_id',$id)->orderBy('tech_id','asc')->paginate(10);
         $supervisionmphilphds=Supervisionmphilphd::where('exam_id',$id)->orderBy('tech_id','asc')->paginate(10);
         $thesisevaluations=Thesisevaluation::where('exam_id',$id)->orderBy('tech_id','asc')->paginate(10);
         $presentations=Presentation::where('exam_id',$id)->orderBy('tech_id','asc')->paginate(10);

        $prepared=Committee::where([['exam_id','=',$id],['remk_id','=',1]])->orderBy('id','asc')->paginate(10);
       
       $dpdf=PDF::loadView('admin.examcommitteebilling.document', [
          'exambillings'=>$exambillings,
          'committees'=>$committees,
          'moderations'=>$moderations,
          'questionpaperinternals'=>$questionpaperinternals,
          'questionpapersetterexternals'=>$questionpapersetterexternals,
          'examininganswerscripts' =>$examininganswerscripts,
          'thirdexaminationscripts' =>$thirdexaminationscripts,
          'classtests' =>$classtests,
          'laboratoryexamteachers' =>$laboratoryexamteachers,
          'laboratoryexamlabattendantlabtechnicians' =>$laboratoryexamlabattendantlabtechnicians,
          'questiontypingpublishings' => $questiontypingpublishings,
          'examinationdutyteachers' => $examinationdutyteachers,
          'examinationdutystuffs' => $examinationdutystuffs,
          'tabulations' => $tabulations,
          'scrutinizes' => $scrutinizes,
          'verificationofresults' => $verificationofresults,
          'oralexaminations' => $oralexaminations,
          'supervisiongraduates' => $supervisiongraduates,
          'supervisionpostgraduates' => $supervisionpostgraduates,
          'supervisionmphilphds' => $supervisionmphilphds,
          'thesisevaluations' => $thesisevaluations,
          'presentations' => $presentations,
          'prepareds' => $prepared,

       ]);
        View::share('pageNumber', 1);


    $dpdf->setPaper('A4', 'portrait');
    

    
       return $dpdf->stream();

    }
    

    public function document(string $id)
{
    $ids = Session::get('bids', []);

    // Validate the ID against session data
    if (!in_array($id, $ids)) {
        return response()->json(['error' => 'Unauthorized access'], 403);
    }

    // Fetch data from different models
    $dataSources = [
        'exambillings' => Examcommitteebilling::where('id', $id)->orderBy('deg_id', 'asc')->get(),
        'committees' => Committee::where('exam_id', $id)->orderBy('remk_id', 'asc')->get(),
        'moderations' => ModerationModel::where('exam_id', $id)->orderBy('remk_id', 'asc')->get(),
        'questionpaperinternals' => Questionpaperinternal::where('exam_id', $id)->orderBy('cous_id', 'asc')->get(),
        'questionpapersetterexternals' => Questionpapersetterexternal::where('exam_id', $id)->orderBy('cous_id', 'asc')->get(),
        'examininganswerscripts' => Examininganswerscript::where('exam_id', $id)->orderBy('cous_id', 'asc')->get(),
        'thirdexaminationscripts' => Thirdexaminationscript::where('exam_id', $id)->orderBy('cous_id', 'asc')->get(),
        'classtests' => Classtest::where('exam_id', $id)->orderBy('cous_id', 'asc')->get(),
        'laboratoryexamteachers' => Laboratoryexamteacher::where('exam_id', $id)->orderBy('cous_id', 'asc')->get(),
        'laboratoryexamlabattendantlabtechnicians' => Laboratoryexamlabattendantlabtechnician::where('exam_id', $id)->orderBy('cous_id', 'asc')->get(),
        'questiontypingpublishings' => Questiontypingpublishing::where('exam_id', $id)->orderBy('tech_id', 'asc')->get(),
        'examinationdutyteachers' => Examinationdutyteacher::where('exam_id', $id)->orderBy('tech_id', 'asc')->get(),
        'examinationdutystuffs' => Examinationdutystuff::where('exam_id', $id)->orderBy('staf_id', 'asc')->get(),
        'tabulations' => Tabulation::where('exam_id', $id)->orderBy('tech_id', 'asc')->get(),
        'scrutinizes' => Scrutinize::where('exam_id', $id)->orderBy('tech_id', 'asc')->get(),
        'verificationofresults' => Verificantionofresult::where('exam_id', $id)->orderBy('tech_id', 'asc')->get(),
       'prepareds' => Committee::where([['exam_id','=',$id],['remk_id','=',1]])->orderBy('id','asc')->get(),
    ];
    return response()->view('admin.examcommitteebilling.docfile', $dataSources, 200)
                    
                     ->header('Content-Type', 'text/html')
                     ->header('Content-Disposition', 'attachment; filename="mydoc.doc"');
}








public function generatehtml(string $id)
{
    $ids = Session::get('bids', []);
        if(!in_array($id,$ids, $this->getmybling())) {
            return;
        }
        $exambillings=Examcommitteebilling::where('id',$id)->orderBy('deg_id','asc')->paginate(10);
         $committees=Committee::where('exam_id',$id)->orderBy('remk_id','asc')->paginate(10);
         $moderations=ModerationModel::where('exam_id',$id)->orderBy('remk_id','asc')->paginate(10);
         $questionpaperinternals=Questionpaperinternal::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
         $questionpapersetterexternals=Questionpapersetterexternal::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
         $examininganswerscripts=Examininganswerscript::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
         $thirdexaminationscripts=thirdexaminationscript::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
         $classtests=classtest::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
         $laboratoryexamteachers=Laboratoryexamteacher::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
         $laboratoryexamlabattendantlabtechnicians=Laboratoryexamlabattendantlabtechnician::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
         $questiontypingpublishings=Questiontypingpublishing::where('exam_id',$id)->orderBy('tech_id','asc')->paginate(10);
         $examinationdutyteachers=Examinationdutyteacher::where('exam_id',$id)->orderBy('tech_id','asc')->paginate(10);
         $examinationdutystuffs=Examinationdutystuff::where('exam_id',$id)->orderBy('staf_id','asc')->paginate(10);
         $tabulations=Tabulation::where('exam_id',$id)->orderBy('tech_id','asc')->paginate(10);
        $scrutinizes=Scrutinize::where('exam_id',$id)->orderBy('tech_id','asc')->paginate(10);
        $verificationofresults=Verificantionofresult::where('exam_id',$id)->orderBy('tech_id','asc')->paginate(10);
        $prepared=Committee::where([['exam_id','=',$id],['remk_id','=',1]])->orderBy('id','asc')->paginate(10);
        return view('admin.examcommitteebilling.generatehtml',['exambillings'=>$exambillings,'committees'=>$committees,'moderations'=>$moderations,
          'questionpaperinternals'=>$questionpaperinternals,
          'questionpapersetterexternals'=>$questionpapersetterexternals,
          'examininganswerscripts' =>$examininganswerscripts,
          'thirdexaminationscripts' =>$thirdexaminationscripts,
          'classtests' =>$classtests,
          'laboratoryexamteachers' =>$laboratoryexamteachers,
          'laboratoryexamlabattendantlabtechnicians' =>$laboratoryexamlabattendantlabtechnicians,
          'questiontypingpublishings' => $questiontypingpublishings,
          'examinationdutyteachers' => $examinationdutyteachers,
          'examinationdutystuffs' => $examinationdutystuffs,
          'tabulations' => $tabulations,
          'scrutinizes' => $scrutinizes,
          'verificationofresults' => $verificationofresults,
         'prepareds' => $prepared,
      ]);
    
}
public function examinationwork(string $id)
{
    // Check session IDs
    $ids = Session::get('bids', []);
    if (!in_array($id, $ids)) {
        abort(403, 'Unauthorized access');
    }
     $models = [
    Committee::class => ['exam_id', 'tech_id', []],
    ModerationModel::class => ['exam_id', 'tech_id', []],
    Questionpaperinternal::class => ['exam_id', 'tech_id', []],
    Questionpapersetterexternal::class => ['exam_id', 'tech_id', []],
    Thirdexaminationscript::class => ['exam_id', 'tech_id', []],
    Classtest::class => ['exam_id', 'tech_id', []],
    Laboratoryexamteacher::class => ['exam_id', 'tech_id', []],
    Questiontypingpublishing::class => ['exam_id', 'tech_id', []],
    Examinationdutyteacher::class => ['exam_id', 'tech_id', []],
    Tabulation::class => ['exam_id', 'tech_id', []],
    Scrutinize::class => ['exam_id', 'tech_id', []],
    Verificantionofresult::class => ['exam_id', 'tech_id', []],

    Supervisiongraduate::class => ['exam_id', 'id', ['tech_id' => 1]],
    Supervisionpostgraduate::class => ['exam_id', 'id', ['tech_id' => 1]],
    Supervisionmphilphd::class => ['exam_id', 'id', ['tech_id' => 1]],
    Thesisevaluation::class => ['exam_id', 'id', ['tech_id' => 1]],
    Oralexamination::class => ['exam_id', 'id', ['tech_id' => 1]],
    Presentation::class => ['exam_id', 'id', ['tech_id' => 1]],
];

$allTeachers = collect();

foreach ($models as $model => [$filterColumn, $orderBy, $extraWhere]) {
    $query = $model::where($filterColumn, $id)->orderBy($orderBy, 'asc');

    foreach ($extraWhere as $col => $val) {
        $query->where($col, $val);
    }

    $allTeachers = $allTeachers->merge($query->get());
}

// একই tech_id শুধু একবার নেবে
$uniqueTeachers = $allTeachers->unique('tech_id')->values();
$staffModels = [
    Laboratoryexamlabattendantlabtechnician::class => ['exam_id', 'staf_id', []],
    Examinationdutystuff::class => ['exam_id', 'staf_id', []],
];

$allStaff = collect();

foreach ($staffModels as $model => [$filterColumn, $orderBy, $extraWhere]) {
    $query = $model::where($filterColumn, $id)->orderBy($orderBy, 'asc');
    foreach ($extraWhere as $col => $val) {
        $query->where($col, $val);
    }
    $allStaff = $allStaff->merge($query->get());
}

// staff_id অনুযায়ী unique
$uniqueStaff = $allStaff->unique('staf_id')->values();

return view('admin.examcommitteebilling.examinationworkpdf', [
    'uniqueTeachers' => $uniqueTeachers,
    'uniqueStaff' => $uniqueStaff
]); 

}
public function individualTeacherBill($exam_id, $tech_id)
{
    // -----------------------------
    // 1. Session-safe validation
    // -----------------------------
    $authorizedIds = array_map('intval', Session::get('bids', []));
    $tech_id = (int)$tech_id;
    if (!in_array($tech_id, $authorizedIds)) {
        $authorizedIds[] = $tech_id;
        Session::put('bids', array_unique($authorizedIds));
    }

    // -----------------------------
    // 2. Fetch teacher & exam
    // -----------------------------
    $teacher = Teacher::find($tech_id);
    if (!$teacher) abort(404, 'Teacher not found');

    $exam = ExamCommitteeBilling::find($exam_id);
    if (!$exam) abort(404, 'Exam not found');

    // -----------------------------
    // 3. Fetch committee members & determine chairman
    // -----------------------------
$committee_member = Committee::where('exam_id', $exam_id)->where('tech_id', $tech_id)->first();

$amount_1 = 0;
//var_dump($committee_member); 

if ($committee_member != null) {
    //var_dump($committee_member);  
    if ($committee_member->remk_id == 1) {
        $amount_1 = ExamRemunerationHeads::where(
                        'secret_key', 
                        $exam->deg_id == 1 ? 1 : 49
                    )->value('amount');

        //var_dump($amount_1);    
    }
}

/*
$moderation_member = ModerationModel::where('exam_id', $exam_id)->get();

$amount_2 = 0;
//var_dump($committee_member); 

if ($moderation_member != null) {
    //var_dump($committee_member);  
    if ($moderation_member) {
        $amount_2 = ExamRemunerationHeads::where(
                        'secret_key', 
                        $exam->deg_id == 1 ? 8 : 9
                    )->value('amount');

        //var_dump($amount_1);    
    }
}
*/
$internal_members = Questionpaperinternal::where('exam_id', $exam_id)
    ->where('tech_id', $tech_id) // Only one teacher
    ->with('teacher')
    ->get();

$totalInternalCourses = 0;
$amount_2 = 0;
$combinedCourses = []; // course title + course code
foreach ($internal_members as $member) {
    if ($member->course) {
        $totalInternalCourses++; 

        $title = $member->course->course_title;
        $code  = $member->course->course_code;

        $combinedCourses[] = $title . ' ' . $code;

        $secretKey = ($exam->deg_id == 1) ? 6 : 7;
        $perAmount = ExamRemunerationHeads::where('secret_key', $secretKey)->value('amount');

        $amount_2 += intval($perAmount); // floating point remove to integer 
    }
}


// -----------------------------
// External courses
// -----------------------------
$internal_members = Questionpaperinternal::where('exam_id', $exam_id)
    ->where('tech_id', $tech_id) // Only one teacher
    ->with('teacher')
    ->get();
$external_members = Questionpapersetterexternal::where('exam_id', $exam_id)
    ->where('tech_id', $tech_id) // Only one teacher
    ->with('teacher')
    ->get();
    //$all_members = $internal_members->merge($external_members);
    $all_members = $internal_members->merge($external_members)
    ->unique('cous_id')
    ->values();
$totalExternalCourses = 0;
$amount_3 = 0;
$combinedCoursesinternalexternal = [];
$secretAmountFor9 = ExamRemunerationHeads::where('secret_key', 9)->value('amount');

foreach ($all_members as $member) {
    if ($member->course) {
        $totalExternalCourses++; // external course count
        $title1 = $member->course->course_title;
        $code1  = $member->course->course_code;

        $combinedCoursesinternalexternal[] = $title1 . ' ' . $code1;
        $secretKey = [8, 9]; 
        $perAmount9 = ExamRemunerationHeads::whereIn('secret_key', $secretKey) ->value('amount');
         $secretAmountFor9 = ExamRemunerationHeads::where('secret_key', 9) ->value('amount'); 
         $amount_3 = min($all_members->count() * $perAmount9, $secretAmountFor9);
    }
}

// Thirdexaminationscript collection
$third_examination = Thirdexaminationscript::where('exam_id', $exam_id)
    ->where('tech_id', $tech_id) // শুধুমাত্র এই teacher
    ->with('teacher')
    ->get();
$amount_4=0;
// secret key 12 এর max amount
$secretAmountFor12 = ExamRemunerationHeads::where('secret_key', 12)->value('amount');
foreach ($third_examination as $member) {
    if ($member->teacher) {
        $Noscript = $member->noscript;

        $secretKey = ($exam->deg_id == 1) ? 10 : (($exam->deg_id == 3) ? 11 : 12);
        $perAmount12 = ExamRemunerationHeads::where('secret_key', $secretKey)->value('amount');

        $amount_4 = min($Noscript * $perAmount12, $secretAmountFor12);
    }
}

//classtest Collection
$classtests = Classtest::where('exam_id', $exam_id)
    ->where('tech_id', $tech_id)
    ->with(['teacher','course'])
    ->get()
    ->groupBy('cous_id');

$amount_5 = 0;
$lines = [];
$calcStrings = [];
$courseTitles = [];

if (!empty($classtests)) { 
    foreach ($classtests as $courseId => $tests) {
        $course = $tests->first()->course;
        $student = $tests->first()->student;
        $classtestValue = min(3, $tests->sum('classtest')); // max 3

        $secretKey17 = ($exam->deg_id == 1) ? 16 : 17;
        $perAmount17 = ExamRemunerationHeads::where('secret_key', $secretKey17)->value('amount');

        $amountCourse = $student * $perAmount17 * $classtestValue;

        $courseTitles[] = $course->course_code . " " . $course->course_title;
        $calcStrings[] = "{$student} * " . intval($perAmount17) . " * {$classtestValue}";

        $amount_5 += $amountCourse;
    }
}
//var_dump($amount_5);
// Display results



// Classtest collection

// Examinationdutyteacher collection

//All taecher pabe
/*
$examinationdutyteacher = Examinationdutyteacher::where('exam_id', $exam_id)
    ->with('teacher')
    ->get(); 
*/
// One teacher pabe  
$examinationdutyteacher = Examinationdutyteacher::where('exam_id', $exam_id) 
    ->where('tech_id', $tech_id) // শুধুমাত্র এই teacher
    ->with('teacher')
    ->get();  

$amount_chief = 0;
$amount_invigilator = 0;
$hours1 = 0;
$hours2 = 0;
$amount_6=0;
foreach ($examinationdutyteacher as $member) {
    if ($member->teacher) {

        if ($member->invigilation == 1) {
            // Chief Invigilator
            $secretKey = 44;
            $hours1 += $member->hours; // += যোগ হচ্ছে
            $perAmount44 = ExamRemunerationHeads::where('secret_key', $secretKey)->sum('amount');
            $amount_chief += $member->hours * $perAmount44;
        } elseif ($member->invigilation == 2) {
            // Invigilator
            $secretKey = 45;
            $hours2 += $member->hours; // += যোগ হচ্ছে
            $perAmount45 = ExamRemunerationHeads::where('secret_key', $secretKey)->sum('amount');
            $amount_invigilator += $member->hours * $perAmount45;
        }
    }
}

$amount_6 = $amount_chief + $amount_invigilator;
//var_dump($amount_6);
//Collection of Tabulation
// One teacher pabe  
$tabulation = Tabulation::where('exam_id', $exam_id)
    ->where('tech_id', $tech_id)
    ->with(['teacher', 'examcommitteebilling'])
    ->get();

$amount_tabulation3 = 0;
$amount_tabulation5 = 0;
$numberofstudent3 = 0;
$numberofstudent5 = 0;

foreach ($tabulation as $member) {
    if ($member->teacher && $member->examcommitteebilling) {
        $year = $member->examcommitteebilling->year;
        $msc = $member->examcommitteebilling->deg_id;

        // First check MSC or year 4-5
        if ($msc == 3 || in_array($year, [4, 5])) {
            $secretKey = 43;
            $perAmount43 = ExamRemunerationHeads::where('secret_key', $secretKey)->value('amount');
            $amount_tabulation5 += $member->numberofstudent * $perAmount43;
            $numberofstudent5 += $member->numberofstudent;

        } elseif (in_array($year, [1, 2, 3])) {
            // Then check year 1-3
            $secretKey = 42;
            $perAmount42 = ExamRemunerationHeads::where('secret_key', $secretKey)->value('amount');
            $amount_tabulation3 += $member->numberofstudent * $perAmount42;
            $numberofstudent3 += $member->numberofstudent;
        }
    }
}

$amount_7 = $amount_tabulation3 + $amount_tabulation5;


// Scrutinize collection
$scrutinize = Scrutinize::where('exam_id', $exam_id)
    ->where('tech_id', $tech_id) // শুধুমাত্র এই teacher
    ->with('teacher')
    ->get();
$amount_8=0;
$numberofstudent4=0;
foreach ($scrutinize as $member) {
    if ($member->teacher) {
        $classtest = $member->classtest;
        $numberofstudent4 = $member->numberofstudent;
        $secretKey41 =[41];
        $perAmount41 = ExamRemunerationHeads::where('secret_key', $secretKey41)->value('amount');

        $amount_8 = ($numberofstudent4 * $perAmount41); 
        //var_dump($amount_8);     
    }
}


//Collection of Presentation 
// One teacher pabe  
$presentation = Presentation::where('exam_id', $exam_id)
    ->where('tech_id', $tech_id)
    ->with(['teacher', 'examcommitteebilling'])
    ->get();

$amount_presentationbsc = 0;
$amount_presentationmsc = 0;
$amount_presentationphd = 0;
$amount_presentationmphil = 0;
$numberofstudentbsc = 0;
$numberofstudentmsc = 0;
$numberofstudentphd = 0;
$numberofstudentmphil = 0;
$amount_9=0;
foreach ($presentation as $member) {
    if ($member->teacher && $member->examcommitteebilling) {
        $presentationdeg = $member->examcommitteebilling->deg_id;

        // First check MSC or year 4-5
        if ($presentationdeg == 1) {
            //bsc
            $secretKey = 29;
            $perAmount29 = ExamRemunerationHeads::where('secret_key', $secretKey)->value('amount');
            $amount_presentationbsc += $member->numberofstudent * $perAmount29 ;
            $numberofstudentbsc += $member->numberofstudent;


        } 
        elseif ($presentationdeg==3)
         {
            //msc
            $secretKey = 32;
            $perAmount32 = ExamRemunerationHeads::where('secret_key', $secretKey)->value('amount');
            $amount_presentationmsc += $member->numberofstudent * $perAmount32;
            $numberofstudentmsc += $member->numberofstudent;
        }
        elseif ($presentationdeg==4)
         {
            //Phd
            $secretKey = 38;
            $perAmount38 = ExamRemunerationHeads::where('secret_key', $secretKey)->value('amount');
            $amount_presentationphd += $member->numberofstudent * $perAmount38;
            $numberofstudentphd += $member->numberofstudent;
        }
        elseif ($presentationdeg==5)
         {
            //Mphil
            $secretKey = 35;
            $perAmount35 = ExamRemunerationHeads::where('secret_key', $secretKey)->value('amount');
            $amount_presentationmphil += $member->numberofstudent * $perAmount35;
            $numberofstudentmphil += $member->numberofstudent;
        }
    }
}

$amount_9 = $amount_presentationbsc + $amount_presentationmsc+$amount_presentationphd+$amount_presentationmphil;
//var_dump($amount_9);

// Question Typing and Publishing
$questiontypingpublishing = Questiontypingpublishing::where('exam_id', $exam_id)
    ->where('tech_id', $tech_id)
    ->with(['teacher'])
    ->get();

$amount_10 = 0;
$lines = [];
$numberofquestion=0;
if (!empty($questiontypingpublishing)) { 
    foreach ($questiontypingpublishing as $member) {
        $numberofquestion = $member->first()->numberofquestion;
        $secretKey50 = ($exam->deg_id == 1) ? 50 : 50;
        $perAmount50 = ExamRemunerationHeads::where('secret_key', $secretKey50)->value('amount');
        $amountquestion = $numberofquestion * $perAmount50;

        $amount_10 += $amountquestion;
        //var_dump($amount_10);
    }
}
//collection Answer Scripts
$exam = ExamCommitteeBilling::find($exam_id);
if (!$exam) {
    dd("Exam not found with ID: $exam_id");
}

$internal_members = Questionpaperinternal::where('exam_id', $exam_id)
    ->where('tech_id', $tech_id)
    ->get()
    ->keyBy('cous_id');

$external_members = Questionpapersetterexternal::where('exam_id', $exam_id)
    ->where('tech_id', $tech_id)
    ->get()
    ->keyBy('cous_id');

$examiningAnswerScripts = Examininganswerscript::where('exam_id', $exam_id)
    ->with('course')
    ->get();

$teacherAmounts = [];
$courseLines   = [];

foreach ($examiningAnswerScripts as $script) {
    $noScripts = (int) $script->noscript;

    $secretKey = match ($exam->deg_id) {
        1 => 10,
        3 => 11,
        default => 12,
    };

    $perAmount = (int) (ExamRemunerationHeads::where('secret_key', $secretKey)->value('amount') ?? 0);
    $amountCourse = $noScripts * $perAmount;

    // --- Internal Teacher Condition ---
    if (!empty($script->internal_id) && isset($internal_members[$script->cous_id])) {
        if ($script->course) {
            $courseLines[] = [
                'course'      => $script->course->course_title . " " . $script->course->course_code,
                'noscript'    => $noScripts,
                'per_amount'  => $perAmount,
                'total'       => $amountCourse,
                
            ];
        }
        $teacherAmounts["internal_{$script->internal_id}"] =
            ($teacherAmounts["internal_{$script->internal_id}"] ?? 0) + $amountCourse;
    }

    // --- External Teacher Condition ---
    if (!empty($script->external_id) && isset($external_members[$script->cous_id])) {
        if ($script->course) {
            $courseLines[] = [
                'course' => $script->course->course_title . " " . $script->course->course_code,
                'noscript'    => $noScripts,
                'per_amount'  => $perAmount,
                'total'       => $amountCourse,
                
            ];
        }
        $teacherAmounts["external_{$script->external_id}"] =
            ($teacherAmounts["external_{$script->external_id}"] ?? 0) + $amountCourse;
    }
}


// Total per teacher
$amount_11 = (int) array_sum($teacherAmounts);

// Laboratory Exam Teachers
$laboratoryexamteacher = Laboratoryexamteacher::where('exam_id', $exam_id)
    ->where('tech_id', $tech_id)
    ->with(['teacher','course'])
    ->get()
    ->groupBy('cous_id');

$amount_12 = 0;
$lines = [];
$calcStringslaboratoryexamteacher = [];
$courseTitleslaboratoryexamteacher = [];

if ($laboratoryexamteacher->isNotEmpty()) {

    // Secret key amounts বের করি
    $amount20 = ExamRemunerationHeads::where('secret_key', 20)->value('amount');
    $amount21 = ExamRemunerationHeads::where('secret_key', 21)->value('amount');

    foreach ($laboratoryexamteacher as $courseId => $tests) {
        $course     = $tests->first()->course;
        $numberOfDay = $tests->first()->numberofday;

        // Base হিসাব (20 এর জন্য)
        $calculated = $numberOfDay * $amount20;

        // 21 এর জন্য সর্বোচ্চ limit apply
        $finalAmount = min($calculated, $amount21);

        // Push for display
        $courseTitleslaboratoryexamteacher[] = $course->course_code . " " . $course->course_title;
        $calcStringslaboratoryexamteacher[] = "{$numberOfDay} * {$amount20} = {$calculated} (max {$amount21}) → {$finalAmount}";

        // Total
        $amount_12 += $finalAmount;
    }
}
var_dump($amount_12);





// $teacherAmounts now contains only valid amounts for the teacher




$total_salary_chairman = 0;
$total_salary_member   = 0;

// Arrays to keep track of unique teacher IDs
$chairman_ids = [];
$member_ids = [];

$tables = [
    'committees',
    'questionpaperinternals',
    'questionpapersetterexternals',
    'classtests',
    'thirdexaminationscripts',
    'examinationdutyteachers',
    'tabulations',
    'scrutinizes',
    'presentations',
    'questiontypingpublishings',
   // 'examininganswerscripts',
];

foreach ($tables as $table) {
    $records = DB::table($table)
                ->where('exam_id', $exam_id)
                ->where('tech_id', $tech_id)

                ->get();

    foreach ($records as $record) {
        $teacher_id = $record->teacher_id ?? 0; // ensure teacher_id exists
        $remk_id   = $record->remk_id ?? 0;

        // Amounts (ensure they exist)
        $a1 = $amount_1 ?? 0;
        $a2 = $amount_2 ?? 0;
        $a3 = $amount_3 ?? 0;
        $a4 = $amount_4 ?? 0;
        $a5 = $amount_5 ?? 0;
        $a6 = $amount_6 ?? 0;
        $a7 = $amount_7 ?? 0;
        $a8 = $amount_8 ?? 0;
        $a9 = $amount_9 ?? 0;
        $a10 = $amount_10 ?? 0;
        $a11 = $amount_11 ?? 0;
        if ($remk_id == 1) {
            // Chairman: count only once
            if (!in_array($teacher_id, $chairman_ids)) {
                $total_salary_chairman += $a1 + $a2 + $a3 + $a4 + $a5 + $a6 + $a7 + $a8 + $a9 + $a10 + $a11;
                $chairman_ids[] = $teacher_id;
            }
        } else {
            // Member: only if not already a chairman
            if (!in_array($teacher_id, $member_ids) && !in_array($teacher_id, $chairman_ids)) {
                $total_salary_member += $a2 + $a3 + $a4 + $a5 + $a6 + $a7 + $a8 + $a9 + $a10 + $a11;
                $member_ids[] = $teacher_id;
            }
        }
    }
}

//echo "Total Chairman Salary: " . number_format($total_salary_chairman, 2) . "\n";
//echo "Total Member Salary: " . number_format($total_salary_member, 2) . "\n";


// Output
//echo "Total Chairman Salary: " . number_format($total_salary_chairman, 2) . "\n";
//echo "Total Member Salary: " . number_format($total_salary_member, 2) . "\n";



//$amount_3 = min($amount_3, $secretAmountFor9); 
//echo "$amount_3";

    // 4. Initialize PDF
    // -----------------------------
    $pdf = new Fpdi();
    $pdf->AddPage();

    $templatePath = base_path('app/templates/coe_bill-pages.pdf'); 
    $tplId = $pdf->setSourceFile($templatePath);
    $pdf->useTemplate($pdf->importPage(1), 0, 0, 210);

    $fontname = TCPDF_FONTS::addTTFfont(
        base_path('app/fonts/SolaimanLipi.ttf'),
        'TrueTypeUnicode', '', 32
    );

    // -----------------------------
    // 5. Dynamic info (X, Y, lineHeight, fontSize)
    // -----------------------------
    $lines = [
    // [text, X, Y, lineHeight, fontSize]
    ["{$teacher->teacher_name}", 20, 40, 10, 10],
    ["{$teacher->teacher_designation}", 20, 47, 8, 10],
    ["{$teacher->department->department_name}", 21, 52, 12, 10],
    ["{$teacher->teacher_address}", 21, 59, 10, 10],
    ["{$teacher->department->department_name}", 125, 39, 12, 10],
    [
        (2011 + ((int)$exam->addmission_year)) . '-' . (2012 + ((int)$exam->addmission_year)),
        118, 45, 12, 10
    ],
    [
        "{$exam->Year} " . (
            $exam->year == 1 ? '1st' :
            ($exam->year == 2 ? '2nd' :
            ($exam->year == 3 ? '3rd' :
            ($exam->year == 4 ? '4th' :
            ($exam->year == 5 ? '5th' : ''))))
        ),
        117, 50, 15, 10
    ],
    [
        ($exam->semester == 1 ? '1st' :
        ($exam->semester == 2 ? '2nd' :
        ($exam->semester == 3 ? '3rd' :
        ($exam->semester == 4 ? '4th' :
        ($exam->semester == 5 ? '5th' : ''))))),
        155, 50, 15, 10
    ],
    ["{$exam->exam_start_date}", 132, 58, 15, 10],
    ["{$exam->exam_end_date}", 165, 58, 15, 10],

    [$amount_1 == 0 ? ' ' : intval($amount_1), 160, 80, 15, 8],
    [$amount_1 == 0 ? ' ' : intval($amount_1), 180, 80, 15, 8],

    [
    $totalInternalCourses == 0 ? ' ' : "{$totalInternalCourses} * " . intval($perAmount),
    160, 89, 10, 8
],
    [
    empty($combinedCourses) ? ' ' : implode(', ', $combinedCourses),
    85, 90, 10,5
],
    [$amount_2 == 0 ? ' ' : number_format($amount_2), 180, 87, 15, 8],

    [
        $totalExternalCourses == 0 ? ' ' : "{$totalExternalCourses} *" .intval($perAmount9),
        160, 95, 10, 8
    ],
    [
    empty($combinedCoursesinternalexternal) ? ' ' : implode(', ', $combinedCoursesinternalexternal),
    85, 95, 10,5
],
    [$amount_3 == 0 ? ' ' : number_format($amount_3), 180, 93, 15, 8],
    

    [
    $total_salary_chairman == 0 ? ' ' : number_format($total_salary_chairman), 
    180, 196, 15, 10
],
[
    $total_salary_member == 0 ? ' ' : number_format($total_salary_member), 
    180, 196, 15, 10
],
[ $numberofquestion == 0 ? ' ' : "{$numberofquestion}",
        107, 100, 10, 8
    ],
[   
    $numberofquestion == 0 ? ' ' : "{$numberofquestion} *" .intval($perAmount50),
        160, 100, 10, 8],
[$amount_10 == 0 ? ' ' : number_format($amount_10), 180, 98, 15, 8],



];

// -----------------------------
// Noscript conditional block
// -----------------------------
if (!empty($Noscript) && $Noscript != 0) {
    $lines[] = [
        intval($Noscript),
        108, 112, 10, 8
    ];
    $lines[] = [
        "{$Noscript} * " . intval($perAmount12),
        160, 112, 10, 8
    ];
    $lines[] = [
        $amount_4 == 0 ? ' ' : number_format($amount_4, 0, '', ''),
        180, 110, 15, 8
    ];
}

 $lines[] = [
        implode('  ', $courseTitles) . "   " . implode('  ', array_column($classtests->map(fn($t) => ['student' => $t->first()->student])->toArray(), 'student')),
        87, 118, 10, 5
    ];

    // Line 2: Calculation
    $lines[] = [
        implode(' + ', $calcStrings),
        146, 118, 10, 5
    ];

    // Line 3: Total amount
    $lines[] = [
    $amount_5 > 0 ? number_format($amount_5, 0, '', '') : ' ',
    180, 116, 15, 8
];


$lineFormula = '';
if (!empty($hours1)) {
    $lineFormula .= "{$hours1} * " . intval($perAmount44);
}
if (!empty($hours2)) {
    if (!empty($lineFormula)) {
        $lineFormula .= " + ";
    }
    $lineFormula .= "{$hours2} * " . intval($perAmount45);
}

$lines[] = [
    $lineFormula ?: ' ',
    159, 165, 10, 5
];

$lines[] = [
    $amount_6 == 0 ? ' ' : number_format($amount_6, 0, '', ''),
    180, 162, 15, 8
];



$lineFormula1 = '';
if (!empty($numberofstudent3)) {
    $lineFormula1 .= "{$numberofstudent3} ";
}
if (!empty($numberofstudent5)) {
    if (!empty($lineFormula1)) {
        $lineFormula1 .= " + ";
    }
    $lineFormula1 .= "{$numberofstudent5}";
}

$lines[] = [
    $lineFormula1 ?: ' ',
    120, 177, 10, 5
];

$lineFormula4 = '';
if (!empty($numberofstudent3)) {
    $lineFormula4 .= "{$numberofstudent3} * " . intval($perAmount42);
}
if (!empty($numberofstudent5)) {
    if (!empty($lineFormula4)) {
        $lineFormula2 .= " + ";
    }
    $lineFormula4 .= "{$numberofstudent5} * " . intval($perAmount43);
}

$lines[] = [
    $lineFormula4 ?: ' ',
    166, 177, 10, 5
];


$lines[] = [
    $amount_7 == 0 ? ' ' : number_format($amount_7, 0, '', ''),
    180, 174, 15, 8
];



$lineFormula2 = '';
if (!empty($numberofstudent4)) {
    $lineFormula2 .= "{$numberofstudent4} * " . intval($perAmount41);
}

$lines[] = [
    $lineFormula2 ?: ' ',
    165, 170, 10, 5
];
$lines[] = [
        $numberofstudent4 == 0 ? ' ' : number_format($numberofstudent4, 0, '', ''),
        120, 170, 10, 5
    ];

$lines[] = [
    $amount_8 == 0 ? ' ' : number_format($amount_8, 0, '', ''),
    180, 168, 15, 8
];


$lineFormula3 = '';

if (!empty($numberofstudentbsc)) {
    $lineFormula3 .= intval($numberofstudentbsc) . " * " . intval($perAmount29);
}

if (!empty($numberofstudentmsc)) {
    if (!empty($lineFormula3)) {
        $lineFormula3 .= " + ";
    }
    $lineFormula3 .= intval($numberofstudentmsc) . " * " . intval($perAmount32);
}

if (!empty($numberofstudentphd)) {
    if (!empty($lineFormula3)) {
        $lineFormula3 .= " + ";
    }
    $lineFormula3 .= intval($numberofstudentphd) . " * " . intval($perAmount38);
}

if (!empty($numberofstudentmphil)) {
    if (!empty($lineFormula3)) {
        $lineFormula3 .= " + ";
    }
    $lineFormula3 .= intval($numberofstudentmphil) . " * " . intval($perAmount35);
}

$lines[] = [
    $lineFormula3 ?: ' ',
    159, 159, 10, 8
];


$lines[] = [
    $amount_9 == 0 ? ' ' : number_format($amount_9, ),
    180, 157, 15, 8
];


// Line 3: Final Total
//$lines = [];

$courseTexts = [];
$calcTexts   = [];
foreach ($courseLines as $row) {
    $courseTexts[] = $row['course']; //course code/title
    $calcTexts[]   = "{$row['noscript']} * {$row['per_amount']}"; 
}

$lines[] = [
    " " . implode(' ', $courseTexts) . " ",
    87, 107, 10, 5
];

// Line 2: হিসাব গুলো একসাথে
$lines[] = [
    implode(' + ', $calcTexts),
    162, 107, 10, 5
];

// মোট যোগফল
$lines[] = [
    ($amount_11 > 0 ? number_format($amount_11, 0, '', '') : '0'),
    180, 104, 15, 8
];


// Generate PDF
// -----------------------------
foreach ($lines as $line) {
    [$text, $x, $y, $height, $fontSize] = $line;
    $pdf->SetFont($fontname, '', $fontSize);
    $pdf->SetXY($x, $y);
    $pdf->Cell(0, $height, $text, 0, 1, 'L');
}

return $pdf->Output("teacher_bill_{$tech_id}_{$exam_id}_" . time() . ".pdf", 'I');

}
public function indiviualStaffBill($exam_id, $staf_id)
{
    // -----------------------------
    // 1. Session-safe validation
    // -----------------------------
    $authorizedIds = array_map('intval', Session::get('bids', []));
    $staf_id = (int)$staf_id;
    if (!in_array($staf_id, $authorizedIds)) {
        $authorizedIds[] = $staf_id;
        Session::put('bids', array_unique($authorizedIds));
    }

    // -----------------------------
    // 2. Fetch staff & exam
    // -----------------------------
    $staf = Staff::find($staf_id);
    if (!$staf) abort(404, 'Staff not found');

    $exam = ExamCommitteeBilling::find($exam_id);
    if (!$exam) abort(404, 'Exam not found');

    // -----------------------------
    // 3. Initialize PDF
    // -----------------------------
    $pdf = new Fpdi();
    $pdf->AddPage();

    $templatePath = base_path('app/templates/coe_bill-pages-staff.pdf');
    $tplId = $pdf->setSourceFile($templatePath);
    $pdf->useTemplate($pdf->importPage(1), 0, 0, 210);

    $fontname = TCPDF_FONTS::addTTFfont(
        base_path('app/fonts/SolaimanLipi.ttf'), 
        'TrueTypeUnicode', '', 32
    );

    // -----------------------------
    // 4. Dynamic info (different X, Y, line height, font size)
    // -----------------------------
    $lines = [
        // [text, X, Y, lineHeight, fontSize]
        ["{$staf->staff_name}", 20, 40, 10, 10],
        ["{$staf->staff_designation}", 20, 47, 8, 10],
        ["{$staf->department->department_name}",21, 52, 12, 10],
        ["{$staf->staff_address}",21, 59, 10, 10],
        ["{$staf->department->department_name}",123, 38, 15, 10],
        
    [
    (2011 + ((int)$exam->addmission_year)) . '-' . (2012 + ((int)$exam->addmission_year)),
    118,
    45,
    12,
    10
],
[
    "{$exam->Year} " . (
        $exam->year == 1 ? '1st' :
        ($exam->year == 2 ? '2nd' :
        ($exam->year == 3 ? '3rd' :
        ($exam->year == 4 ? '4th' :
        ($exam->year == 5 ? '5th' : ''))))
    ),
    117,
    50,
    15,
    10
],
[
    ($exam->semester == 1 ? '1st' :
    ($exam->semester == 2 ? '2nd' :
    ($exam->semester == 3 ? '3rd' :
    ($exam->semester == 4 ? '4th' :
    ($exam->semester == 5 ? '5th' : ''))))),
    155,
    50,
    15,
    10
],
["{$exam->exam_start_date}",129, 57, 15, 10],
["{$exam->exam_end_date}",163, 57, 15, 10],
    ];

    foreach ($lines as $line) {
        [$text, $x, $y, $height, $fontSize] = $line;
        $pdf->SetFont($fontname, '', $fontSize);
        $pdf->SetXY($x, $y);
        $pdf->Cell(0, $height, $text, 0, 1, 'L');
    }

    // -----------------------------
    // 5. Output PDF
    // -----------------------------
    return $pdf->Output("staff_bill_{$staf_id}_{$exam_id}_" . time() . ".pdf", 'I');
}
}
