<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class departmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Department::orderBy('id','asc')->get();
        return view('admin.department.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=Department::orderBy('id','desc')->get();
        return view('admin.department.create',['departments'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        
            'department_name' => 'required|unique:departments,department_name',
            'department_status'=>'required',
            
        ]);
        $data=new Department();
        $data->department_name=$request->department_name;
        $data->department_status=$request->department_status;
        $data->save();
        
        return redirect('department/create')->with('msg','Department created Successfuly!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Department::find($id);
        return view ('admin.department.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Department::find($id);
        return view('admin.department.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'department_name'=>'required',
            'department_status'=>'required',
            
        ]);
        
        $data=Department::find($id);
        $data->department_name=$request->department_name;
        $data->department_status=$request->department_status;
        $data->update();
        return redirect('department/'.$id.'/edit')->with('msg','Department updated Successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Department::where('id',$id)->delete();
        return redirect('/alldepartment')->with('msg','Department Remove Successfuly!');
    }
}
