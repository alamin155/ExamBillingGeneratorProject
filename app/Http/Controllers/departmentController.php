<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Committee;
use Auth;

class departmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function getMyBling() {
    $data = Department::orderBy('id', 'asc')
        ->where('created_by', Auth::user()->id)
        ->pluck('id'); // Use pluck() to get only the 'id' column

    $data2 = Committee::select('committees.exam_id')
        ->join('teachers', 'committees.tech_id', '=', 'teachers.id')
        ->where('teachers.email', Auth::user()->email)
        ->pluck('committees.exam_id'); // Use pluck() to get only the 'exam_id' column

    return array_merge($data->toArray(), $data2->toArray()); // Merge both arrays
}
    public function index()
    {
        $ids = $this->getMyBling(); // Retrieve IDs from the method
    //Session::put('ids', $ids); // Store the IDs in the session variable without quotes around 'ids'

        $data = Department::whereIn('id', $ids)->orderBy('id', 'asc')->get();
        return view('admin.department.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=Department::orderBy('id','asc')->get();
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
        $data->created_by=Auth::user()->id;
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
