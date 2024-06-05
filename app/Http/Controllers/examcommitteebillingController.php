<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
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
use App\Models\Prepared;
use Barryvdh\DomPDF\Facade;
use Auth;
use DB;
use PDF;
use TCPDF;
use Illuminate\Support\Facades\View;
//use Barryvdh\DomPDF\Facades\pdf;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class examcommitteebillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function getMyBling() {
    $data = ExamCommitteeBilling::orderBy('id', 'asc')
        ->where('created_by', Auth::user()->id)
        ->pluck('id'); // Use pluck() to get only the 'id' column

    $data2 = Committee::select('committees.exam_id')
        ->join('teachers', 'committees.tech_id', '=', 'teachers.id')
        ->where('teachers.email', Auth::user()->email)
        ->pluck('committees.exam_id'); // Use pluck() to get only the 'exam_id' column

    return array_merge($data->toArray(), $data2->toArray()); // Merge both arrays
}

public function index()
{
    $ids = $this->getMyBling(); // Retrieve IDs from the method
    //Session::put('ids', $ids); // Store the IDs in the session variable without quotes around 'ids'

    $data = ExamCommitteeBilling::whereIn('id', $ids)->orderBy('id', 'asc')->get();

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
    
        $data=Examcommitteebilling::find($id);
        return view ('admin.examcommitteebilling.show',compact('data'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    // Check if the provided id is valid
    if (!is_numeric($id) || !in_array($id, $this->getmybling())) {
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
        if(!in_array($id, $this->getmybling())) {
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
        if(!in_array($id, $this->getmybling())) {
            return;
        }
        Examcommitteebilling::where('id',$id)->delete();
        return redirect('/allexamcommitteebilling')->with('msg','Exam Committee Billing Remove Successfuly!');
    }
    public function documentPdf(string $id,int $pageNumber = 1)
    {
        if(!in_array($id, $this->getmybling())) {
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
          'prepareds' => $prepared,

       ]);
        View::share('pageNumber', 1);


    $dpdf->setPaper('A4', 'portrait');
    

    
       return $dpdf->stream();

    }

    public function generatehtml(string $id)
    {
        if(!in_array($id, $this->getmybling())) {
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
        $prepareds=Prepared::where('exam_id',$id)->orderBy('id','asc')->paginate(10);
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
          'prepareds' => $prepareds,]);
    }
}
