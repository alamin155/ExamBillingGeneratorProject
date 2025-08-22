<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laboratoryexamteacher;
use App\Models\Teacher;
use App\Models\Courses;
use App\Models\Questionpaperinternal;
use App\Models\Examcommitteebilling;
use App\Models\thirdexaminationscript;
use DB;
use Session;
session_start();

class laboratoryexamteacherController extends Controller
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
        $couse=Courses::orderBy('id','asc')->get();
        $data=Laboratoryexamteacher::where('exam_id',$id)->orderBy('cous_id','asc')
        ->get();

        $techs=Teacher::orderBy('id','asc')->get();
        $exams=Examcommitteebilling::where('id',$id)->get();
        return view('admin.laboratoryexamteacher.index',['data'=>$data,'techs'=>$techs,'couse'=>$couse,'exams'=>$exams,'id' => $id]);
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
        $request->validate([
        //'tech' => 'required|unique:laboratoryexamteachers,tech_id,NULL,id,exam_id,' . $request->exam,
        //'cous' => 'required',
        //'exam' => 'required',
        'numberofday' => 'required',
        'student' => 'required',
       ]);
        $numberOfDay = $request->input('numberofday');
        $techIds = $request->input('tech');
        $cousId = $request->input('cous');
        $Student = $request->input('student');
        $examId = $request->input('exam');

        // Loop through each selected staff ID and save the data
        foreach ($techIds as $techId) {
            $data = new Laboratoryexamteacher();
            $data->numberofday = $numberOfDay;
            $data->student=$Student;
            $data->tech_id = $techId;
            $data->cous_id = $cousId;
            $data->exam_id = $examId;
            $data->save();
        }

        return response()->json([
            'status' => 'success',
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
        Laboratoryexamteacher::where('id',$request->up_id,)->update([
        'tech_id' =>$request->up_tech,
        'cous_id' =>$request->up_cous,
        'numberofday' =>$request->up_numberofday,
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
        Laboratoryexamteacher::find($request->laboratoryexamteacher_id)->delete();
        return response()->json([
            'statu'=>'success',
        ]);
    }
}
