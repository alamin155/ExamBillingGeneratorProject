<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Examcommitteebilling;
use App\Models\Oralexamination;
use DB;
use Session;
session_start();

class OralexaminationController extends Controller
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
        $data=Oralexamination::where('exam_id',$id)->orderBy('tech_id','asc')->paginate(10);
        $techs=Teacher::orderBy('id','asc')->get();
        $exams=Examcommitteebilling::where('id',$id)->get();
        return view('admin.oralexamination.index',['data'=>$data,'techs'=>$techs,'exams'=>$exams,'id' => $id]);
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
            'numberofstudent'=>'required',
            'tech' => 'required|unique:oralexaminations,tech_id,NULL,id,exam_id,' . $request->exam,
            'exam' => 'required',

        ]

    );
        $data=new Oralexamination();
        $data->numberofstudent=$request->numberofstudent;
        $data->tech_id =$request->tech;
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
        Oralexamination::where('id',$request->up_id,)->update([
        'tech_id' =>$request->up_tech,
        'numberofstudent' =>$request->up_numberofstudent,
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
        Oralexamination::find($request->oralexamination_id)->delete();
        return response()->json([
            'statu'=>'success',
        ]);
    }
}
