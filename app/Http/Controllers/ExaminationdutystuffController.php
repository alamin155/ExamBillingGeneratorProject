<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examcommitteebilling;
use App\Models\Staff;
use App\Models\Examinationdutystuff;
use DB;
use Session;
session_start();
class ExaminationdutystuffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $data=Examinationdutystuff::where('exam_id',$id)->orderBy('staf_id','asc')->paginate(10);
        $staffs=Staff::orderBy('id','asc')->get();
        $exams=Examcommitteebilling::where('id',$id)->get();
        return view('admin.examinationdutystuff.index',['data'=>$data,'staffs'=>$staffs,'exams'=>$exams,'id' => $id]);
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
            'hours'=>'required',
            'staf' => 'required|unique:examinationdutystuffs,staf_id,NULL,id,exam_id,' . $request->exam,
        
            'exam' => 'required',
            
        ]

    );
        $data=new Examinationdutystuff();
        $data->numberofexam=$request->numberofexam;
        $data->staf_id =$request->staf;
        $data->examdutycarriedout=$request->examdutycarriedout;
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
        Examinationdutystuff::where('id',$request->up_id,)->update([
        'staf_id' =>$request->up_staf,
        'examdutycarriedout' =>$request->up_examdutycarriedout,
        'numberofexam' =>$request->up_numberofexam,
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
        Examinationdutystuff::find($request->examinationdutystuff_id)->delete();
        return response()->json([
            'statu'=>'success',
        ]);
    }
}
