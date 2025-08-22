<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Questionpapersetterexternal;
use App\Models\Examininganswerscript;
use App\Models\Examcommitteebilling;
use App\Models\Teacher;
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
        $ids = Session::get('bids', []);

    // Check if the provided ID is in the allowed list
    if (!in_array($id, $ids)) {
        return redirect('home')->withErrors('Invalid ID or ID not found in the allowed list.');
    }
        $data=Questionpapersetterexternal::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
        $etechs=Teacher::where('teacher_type','2')->orderBy('id','asc')->get();
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
        $request->validate([
        'tech' => 'required|unique:questionpapersetterexternals,tech_id,NULL,id,cous_id,' . $request->cous,
        'exam' => 'required',
       ]);
        $data=new Questionpapersetterexternal();
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
        

        Questionpapersetterexternal::where('id',$request->up_id,)->update([
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
        Questionpapersetterexternal::find($request->Questionpapersetterexternal_id)->delete();
        return response()->json([
            'statu'=>'success',
        ]);
    }
}
