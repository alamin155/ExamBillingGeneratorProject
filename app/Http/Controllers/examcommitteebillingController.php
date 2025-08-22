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
    
    // start exam bill serial 1 //
// Initialize PDF array


$committee_members = Committee::where('exam_id', $exam_id)->get();

$chairman = null;
$members = [];

// Loop through to separate chairman and members
foreach ($committee_members as $member) {
    if ($member->remk_id == 1) {
        $chairman = $member; // remk_id 1 is chairman
    } else {
        $members[] = $member; // others are members
    }
}




        


    // -----------------------------
    // 3. Initialize PDF
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
    // 4. Dynamic info (X, Y, lineHeight, fontSize)
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
        ["1 - Chairman", 165, 75, 15, 10],
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
