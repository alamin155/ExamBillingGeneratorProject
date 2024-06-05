<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Courses;
use App\Models\Questionpaperinternal;
use App\Models\Examcommitteebilling;
use App\Models\thirdexaminationscript;
use DB;
use Session;
session_start();
class thirdexaminationscriptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $data=thirdexaminationscript::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
       /**
        * fix the table name to teachers
        */
        $techs=Teacher::where('teacher_type','1')->orderBy('id','asc')->get();
        $couse=Courses::orderBy('id','asc')->get();
        $exams=Examcommitteebilling::where('id',$id)->get();
        return view('admin.thirdexaminationscript.index',['data'=>$data,'techs'=>$techs,'couse'=>$couse,'exams'=>$exams,'id' => $id]);
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
            'noscript'=>'required',
            'tech' => 'required|unique:thirdexaminationscripts,tech_id,NULL,id,exam_id,' . $request->exam,
            'cous' => 'required',
            'exam' => 'required',
            
        ]);
        $data=new thirdexaminationscript();
        $data->noscript=$request->noscript;
        $data->tech_id =$request->tech;
        $data->cous_id=$request->cous;
        $data->exam_id=$request->exam;
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
        thirdexaminationscript::where('id',$request->up_id,)->update([
        'tech_id' =>$request->up_tech,
        'cous_id' =>$request->up_cous,
        'noscript' =>$request->up_noscript,

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
        thirdexaminationscript::find($request->thirdexaminationscript_id)->delete();
        return response()->json([
            'statu'=>'success',
        ]);
    }
}
