<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Courses;
use App\Models\Questionpaperinternal;
use App\Models\Examcommitteebilling;
use DB;
use Session;
session_start();

class questionpaperinternalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $data=Questionpaperinternal::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
        $techs=Teacher::orderBy('id','asc')->get();
        $couse=Courses::orderBy('id','asc')->get();
        $exams=Examcommitteebilling::where('id',$id)->get();
        return view('admin.questionpaperinternal.indexq',['data'=>$data,'techs'=>$techs,'couse'=>$couse,'exams'=>$exams,'id' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
            'designation'=>'required',
            'department'=>'required',
            'address'=>'required',
        ]
    );
        $data=new Questionpaperinternal();
        $data->designation=$request->designation;
        $data->department=$request->department;
        $data->address=$request->address;
        $data->tech_id =$request->tech;
        $data->cous_id =$request->cous;
        $data->exam_id =$request->exam;
        $data->save();
        return response()->json([
            'statu'=>'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate(
            [
            'up_designation'=>'required',
            'up_department'=>'required',
            'up_address'=>'required',
        ]
    );

        Questionpaperinternal::where('id',$request->up_id,)->update([
        'designation'=>$request->up_designation,
        'department'=>$request->up_department,
        'address'=>$request->up_address,
        'tech_id' =>$request->up_tech,
        'cous_id' =>$request->up_cous,

        ]);

        return response()->json([
            'statu'=>'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Questionpaperinternal::find($request->questionpaperinternal_id)->delete();
        return response()->json([
            'statu'=>'success',
        ]);
    }
}
