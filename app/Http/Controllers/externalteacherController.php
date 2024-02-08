<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Externalteacher;
use App\Models\Examininganswerscript;
use DB;
use Session;
session_start();


class externalteacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data=Externalteacher::orderBy('id','asc')->paginate(15);
        $departs=Department::orderBy('id','asc')->get();
        return view('admin.externalteacher.index',['data'=>$data,'departs'=>$departs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=Department::orderBy('id','asc')->get();

        return view('admin.externalteacher.modal',['departments'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
            'name'=>'required',
            'designation'=>'required',
            'address'=>'required',
            'mobile'=>'required',
            'email'=>'required',
            'bankname'=>'required',
            'bankaccount'=>'required',
            'status'=>'required',
            
        ]
    );
     

        $data=new Externalteacher();
        $data->name=$request->name;
        $data->designation=$request->designation;
        $data->address=$request->address;
        $data->mobile=$request->mobile;
        $data->email=$request->email;
        $data->bankname=$request->bankname;
        $data->bankaccount=$request->bankaccount;
        $data->status=$request->status;
       // $data->dept_id =$request->depart;

        $data->dept_id =$request->depart;
        $data->save();
        return response()->json([
            'statu'=>'success',
        ]);
        
       //return redirect('externalteacher/create')->with('msg','Teacher created Successfuly!');
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
    public function edit(Request $request)
    {
        $departs=Department::orderBy('id','asc')->get();
        $data=Externalteacher::find($id);
        return view('admin.externalteacher.edit',['departments'=>$departs,'data'=>$data]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate(
            [
            'up_name'=>'required',
            'up_designation'=>'required',
            'up_address'=>'required',
            'up_mobile'=>'required',
            'up_email'=>'required',
            'up_bankname'=>'required',
            'up_bankaccount'=>'required',
            'up_status'=>'required',
            
        ]
    );

        Externalteacher::where('id',$request->up_id,)->update([
        'name'=>$request->up_name,
        'designation'=>$request->up_designation,
        'address'=>$request->up_address,
        'mobile'=>$request->up_mobile,
        'email'=>$request->up_email,
        'bankname'=>$request->up_bankname,
        'bankaccount'=>$request->up_bankaccount,
        'status'=>$request->up_status,
        'dept_id' =>$request->up_depart,

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
        Externalteacher::find($request->teacher_id)->delete();
        return response()->json([
            'statu'=>'success',
        ]);
    }
    
    
}
