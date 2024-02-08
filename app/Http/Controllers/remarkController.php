<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Remark;

class remarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Remark::orderBy('id','asc')->get();
        return view('admin.remark.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=Remark::orderBy('id','desc')->get();
        return view('admin.remark.create',['remarks'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'remark_title'=>'required',
            'remark_status'=>'required',
            
        ]);
        $data=new Remark();
        $data->remark_title=$request->remark_title;
        $data->remark_status=$request->remark_status;
        $data->save();
        
        return redirect('remark/create')->with('msg','Remark created Successfuly!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Remark::find($id);
        return view ('admin.remark.show',['data'=>$data]);    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Remark::find($id);
        return view('admin.remark.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'remark_title'=>'required',
            'remark_status'=>'required',
            
        ]);
        
        $data=Remark::find($id);
        $data->remark_title=$request->remark_title;
        $data->remark_status=$request->remark_status;
        $data->update();
        return redirect('remark/'.$id.'/edit')->with('msg','Remark updated Successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Remark::where('id',$id)->delete();
        return redirect('/allremark')->with('msg','Remark Remove Successfuly!');
    }
}
