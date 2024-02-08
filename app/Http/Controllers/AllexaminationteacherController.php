<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\examinationcommittee;
use App\Models\moderationcommittee;
use App\Models\questionpapersetterinternal;
use App\Models\Examcommitteebilling;
//use Illuminate\Support\Facades\App;
use DB;
//use Barryvdh\DomPDF\Facades\pdf;
use PDF;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class AllexaminationteacherController extends Controller
{
    public function allexaminationteacher()
    {
        $examinationcommittees = examinationcommittee::all(); // Retrieve users data
        $moderationcommittees = moderationcommittee::all(); // Retrieve posts data
        $questionpapersetterinternals=questionpapersetterinternal::all();

        return view('admin.allexaminationteacher', [
            'examinationcommittees' => $examinationcommittees,
            'moderationcommittees' => $moderationcommittees,
            'questionpapersetterinternals'=>$questionpapersetterinternals
        ]);
       // $table2Data = moderationcommittee_tbl::all();

        //return view('admin.allexaminationteacher', [
            //'table1Data' => $table1Data,
            //'table2Data' => $table2Data,
      //  ]);
        
    	//$allexaminationteacher_info=DB::table('examinationcommittee_tbl')->get();
        //$manage_examinationteacher=view('admin.Allexaminationteacher')->with('all_examinationteacher_info',$allexaminationteacher_info);
        //return view('layouts.app')->with('allexaminationteacher',$manage_examinationteacher);
       // //$allmoderationcommittee_info=DB::table('moderationcommittee_tbl')->get();
       // $manage_moderationcommittee=view('admin.Allexaminationteacher')->with('all_moderationcommittee_info',$allmoderationcommittee_info);
        //return view('layouts.app')->with('allmoderationcommittee',$manage_moderationcommittee);
    
    }
    public function generatePdf(){
        //$pdf=PDF::loadView('admin.allexaminationteacher');
       // return $pdf->download();

        $examinationcommittees = examinationcommittee::all(); // Retrieve users data
        $moderationcommittees = moderationcommittee::all(); // Retrieve posts data
        $questionpapersetterinternals=questionpapersetterinternal::all();
        $examcommitteebilling=Examcommitteebilling::all();
       $pdf=PDF::loadView('pdf.sheet', [
           'examinationcommittees' => $examinationcommittees,
            'moderationcommittees' => $moderationcommittees,
            'questionpapersetterinternals'=>$questionpapersetterinternals,
            'examcommitteebilling'=>$examcommitteebilling
       ]);
       return $pdf->stream();

    
    }
        


}
