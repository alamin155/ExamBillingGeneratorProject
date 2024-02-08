<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Remark;
use App\Models\Committee;
use App\Models\Examcommitteebilling;
use DB;
use Session;
session_start();

class committeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id) 
    {
        $data=Committee::where('exam_id',$id)->orderBy('remk_id','asc')->paginate(10);
        //$data=Committee::orderBy('id','asc')->paginate(10);
        $techs=Teacher::orderBy('id','asc')->get();
        $remks=Remark::orderBy('id','asc')->get();
        $exams=Examcommitteebilling::where('id',$id)->get();


        return view('admin.committee.index',['data'=>$data,'techs'=>$techs,'remks'=>$remks,'exams'=>$exams, 'id' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     */
    
    public function create()
    {
        $data=Teacher::orderBy('id','asc')->get();
        $data1=Remark::orderBy('id','asc')->get();
        $data3=Examcommitteebilling::orderBy('id','asc');
        return view('admin.committee.create',['teachers'=>$data,'remarks'=>$data1,'exambillings'=>$data3]);
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
        $data=new Committee();
        $data->designation=$request->designation;
        $data->department=$request->department;
        $data->address=$request->address;
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
        $data=Committee::orderBy('id','asc')->paginate(10);
        $techs=Teacher::orderBy('id','asc')->get();
        $remks=Remark::orderBy('id','asc')->get();
        $exams=Examcommitteebilling::orderBy('id','asc')->get();
        return view('admin.examcommitteebilling.show',['data'=>$data,'techs'=>$techs,'remks'=>$remks]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    

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

        Committee::where('id',$request->up_id,)->update([
        'designation'=>$request->up_designation,
        'department'=>$request->up_department,
        'address'=>$request->up_address,
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
        Committee::find($request->committee_id)->delete();
        return response()->json([
            'statu'=>'success',
        ]);
    }
    public function searchcommittee(Request $request)
    {
        
        $data=Committee::where('designation', 'like', '%'.$request->search_string.'%')
        ->orderBy('id','asc')
        ->paginate(10);
        if($data->count() >=1){
            return view('admin.committee.paginate',['data'=>$data]);
        }else{
            return response()->json([
                'status'=>'nothing found',
            ]);
        }
    }

    
}
