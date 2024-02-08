<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Degree;
use App\Models\Examcommitteebilling;
use DB;

class examcommitteebillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Examcommitteebilling::orderBy('id','asc')->get();
    
        return view('admin.examcommitteebilling.index',['data'=>$data]);
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
        $data->exam_year=$request->exam_year;
        $data->addmission_year=$request->addmission_year;
        $data->academic_year=$request->academic_year;
        $data->exam_start_date=$request->exam_start_date;
        $data->exam_end_date=$request->exam_end_date;
        $data->staff_status=$request->staff_status;
        $data->dept_id =$request->depart;
        $data->deg_id=$request->depart1;
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
        $departs=Department::orderBy('id','desc')->get();
        $degres=Degree::orderBy('id','desc')->get();
         $data=Examcommitteebilling::find($id);
        return view('admin.examcommitteebilling.edit',['departs'=>$departs,'degres'=>$degres,'data'=>$data]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
    
        $data->update();
        return redirect('examcommitteebilling/'.$id.'/edit')->with('msg','Exam Committee Billing updated Successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Examcommitteebilling::where('id',$id)->delete();
        return redirect('/allexamcommitteebilling')->with('msg','Exam Committee Billing Remove Successfuly!');
    }
}
