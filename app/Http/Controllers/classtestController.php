<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Courses;
use App\Models\Questionpaperinternal;
use App\Models\Examcommitteebilling;
use App\Models\classtest;
use DB;
use Session;
session_start();

class classtestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $ids = Session::get('bids', []);

    // Check if the provided ID is in the allowed list
    if (!in_array($id, $ids)) {
        return redirect('home')->withErrors('Invalid ID or ID not found in the allowed list.');
    }
        $data=classtest::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
        $techs=Teacher::where('teacher_type','1')->orderBy('id','asc')->get();
        $couse=Courses::orderBy('id','asc')->get();
        $exams=Examcommitteebilling::where('id',$id)->get();
        return view('admin.classtest.index',['data'=>$data,'techs'=>$techs,'couse'=>$couse,'exams'=>$exams,'id' => $id]);
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
            'classtest'=>'required',
            'student'=>'required',
           // 'tech' => 'required|unique:classtests,tech_id,NULL,id,exam_id,' . $request->exam,
        'cous' => 'required',
        'exam' => 'required',
        ]

    );
        $data=new classtest();
        $data->classtest=$request->classtest;
        $data->student=$request->student;
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
        classtest::where('id',$request->up_id,)->update([
        'tech_id' =>$request->up_tech,
        'cous_id' =>$request->up_cous,
        'classtest' =>$request->up_classtest,
        'student' =>$request->up_student,

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
        classtest::find($request->classtest_id)->delete();
        return response()->json([
            'statu'=>'success',
        ]);
    }
}
