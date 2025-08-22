<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Examcommitteebilling;
use App\Models\Examinationdutyteacher;
use DB;
use Session;
session_start();
class ExaminationdutyteacherController extends Controller
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
        $data=Examinationdutyteacher::where('exam_id',$id)->orderBy('tech_id','asc')->paginate(10);
        $techs=Teacher::orderBy('id','asc')->get();
        $exams=Examcommitteebilling::where('id',$id)->get();
        return view('admin.examinationdutyteacher.index',['data'=>$data,'techs'=>$techs,'exams'=>$exams,'id' => $id]);
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
            'numberofexam'=>'required',
            'examdutycarriedout'=>'required',
            'invigilation'=>'required',
            'hours'=>'required',
            'tech' => 'required|unique:examinationdutyteachers,tech_id,NULL,id,exam_id,' . $request->exam,
            'exam' => 'required',
            
        ]);
        $data=new Examinationdutyteacher();
        $data->numberofexam=$request->numberofexam;
        $data->tech_id =$request->tech;
        $data->examdutycarriedout=$request->examdutycarriedout;
        $data->invigilation=$request->invigilation;
        $data->hours=$request->hours;
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
        Examinationdutyteacher::where('id',$request->up_id,)->update([
        'tech_id' =>$request->up_tech,
        'examdutycarriedout' =>$request->up_examdutycarriedout,
        'numberofexam' =>$request->up_numberofexam,
        'invigilation' =>$request->up_invigilation,
        'hours' =>$request->up_hours,

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
        Examinationdutyteacher::find($request->examinationdutyteacher_id)->delete();
        return response()->json([
            'statu'=>'success',
        ]);
    }
}
