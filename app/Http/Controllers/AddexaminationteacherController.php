<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class AddexaminationteacherController extends Controller
{
    public function commitee(){
        return view('admin.examination committee');
    }
    public function saveexaminationcommitee(Request $request)
    {
        $data=array();
        $data['examinationcommittee_sl']=$request->examinationcommittee_sl;
        $data['examinationcommittee_name']=$request->examinationcommittee_name;
        $data['examinationcommittee_designation']=$request->examinationcommittee_designation;
        $data['examinationcommittee_address']=$request->examinationcommittee_address;
        $data['examinationcommittee_remark']=$request->examinationcommittee_remark;
        DB::table('examinationcommittees')->insert($data);
        Session::put('exception','Examination Committee added Successful!');
        return Redirect::to('/addexaminationcommitee');

    }
}
