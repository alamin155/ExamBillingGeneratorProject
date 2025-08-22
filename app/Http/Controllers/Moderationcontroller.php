<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Remark;
use App\Models\ModerationModel;
use App\Models\Examcommitteebilling;
use DB;
use Session;
session_start();
class Moderationcontroller extends Controller
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
        $data=ModerationModel::where('exam_id',$id)->orderBy('remk_id','asc')->paginate(10);
        //$data=Committee::orderBy('id','asc')->paginate(10);
        $techs=Teacher::orderBy('id','asc')->get();
        $remks=Remark::orderBy('id','asc')->get();
        $exams=Examcommitteebilling::where('id',$id)->get();


        return view('admin.moderation.index',['data'=>$data,'techs'=>$techs,'remks'=>$remks,'exams'=>$exams, 'id' => $id]);
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
        'tech' => 'required|unique:moderations,tech_id,NULL,id,exam_id,' . $request->exam,
        'remk' => 'required',
        'exam' => 'required',
       ]);
            
        $data=new ModerationModel();
        
        $data->tech_id =$request->tech;
        $data->remk_id =$request->remk;
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
        ModerationModel::where('id',$request->up_id,)->update([
        'tech_id' =>$request->up_tech,
        'remk_id' =>$request->up_remk,

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
        ModerationModel::find($request->moderation_id)->delete();
        return response()->json([
            'statu'=>'success',
        ]);
    }
}
