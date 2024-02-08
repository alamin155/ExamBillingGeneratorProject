<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Externalteacher;
use App\Models\Courses;
use App\Models\Questionpapersetterexternal;
use App\Models\Examininganswerscript;
use App\Models\Examcommitteebilling;
use DB;
use Session;
session_start();
class questionpapersetterexternalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $data=Questionpapersetterexternal::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
        $etechs=Externalteacher::orderBy('id','asc')->get();
        $couse=Courses::orderBy('id','asc')->get();
        $exams=Examcommitteebilling::where('id',$id)->get();
        return view('admin.questionpapersetterexternal.index',['data'=>$data,'etechs'=>$etechs,'couse'=>$couse,'exams'=>$exams,'id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function shiftdata()
    {
        
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
        $data=new Questionpapersetterexternal();
        $data->designation=$request->designation;
        $data->department=$request->department;
        $data->address=$request->address;
        $data->etech_id =$request->tech;
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

        Questionpapersetterexternal::where('id',$request->up_id,)->update([
        'designation'=>$request->up_designation,
        'department'=>$request->up_department,
        'address'=>$request->up_address,
        'etech_id' =>$request->up_tech,
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
        Questionpapersetterexternal::find($request->Questionpapersetterexternal_id)->delete();
        return response()->json([
            'statu'=>'success',
        ]);
    }
}
