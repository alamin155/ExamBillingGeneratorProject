<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examcommitteebilling;
use App\Models\Rateofremunerationforexaminationwork;
use DB;
use Session;
session_start();
class RateofremunerationforexaminationworkController extends Controller
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
        $data=Rateofremunerationforexaminationwork::where('exam_id',$id)->orderBy('id','asc')->paginate(10);
        $exams=Examcommitteebilling::where('id',$id)->get();
        return view('admin.examinationwork.index',['data'=>$data,'exams'=>$exams,'id' => $id]);
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
            'details'=>'required',
            'name'=>'required',
            'amountofmoney'=>'required',
            'exam' => 'required',

        ]

    );
        $data=new Rateofremunerationforexaminationwork();
        $data->details=$request->details;
        $data->name=$request->name;
        $data->amountofmoney=$request->amountofmoney;
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
        Rateofremunerationforexaminationwork::where('id',$request->up_id,)->update([
        'details' =>$request->up_details,
        'name' =>$request->up_name,
        'amountofmoney' =>$request->up_amountofmoney,
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
        Rateofremunerationforexaminationwork::find($request->examinationwork_id)->delete();
        return response()->json([
            'statu'=>'success',
        ]);
    }
}
