<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Teacher;
use App\Models\Department;
use DB;
use Session;
session_start();

class teacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Teacher::orderBy('id','asc')->get();
        return view('admin.teacher.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=Department::orderBy('id','desc')->get();
        return view('admin.teacher.create',['departments'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'teacher_name'=>'required',
            'teacher_designation'=>'required',
            'teacher_address'=>'required',
            'teacher_type'=>'required',
            'teacher_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'teacher_status'=>'required',
            
        ]);

        $photo=$request->file('teacher_image');
        $renamePhoto = time() . '.' . $photo->getClientOriginalExtension();
        $dest=public_path('/image');
        $photo->move($dest,$renamePhoto);

        $data=new Teacher();
        $data->teacher_name=$request->teacher_name;
        $data->teacher_designation=$request->teacher_designation;
        $data->teacher_address=$request->teacher_address;
        $data->teacher_type=$request->teacher_type;
        $data->teacher_image=$renamePhoto;
        $data->teacher_status=$request->teacher_status;
        $data->dept_id =$request->depart;
        $data->save();
        
        return redirect('teacher/create')->with('msg','Teacher created Successfuly!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Teacher::find($id);
        return view ('admin.teacher.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departs=Department::orderBy('id','desc')->get();
        $data=Teacher::find($id);
        return view('admin.teacher.edit',['departs'=>$departs,'data'=>$data]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'teacher_name'=>'required',
            'teacher_designation'=>'required',
            'teacher_address'=>'required',
            'teacher_type'=>'required',
            'teacher_status'=>'required',
            
        ]);
        if($request->hasFile('teacher_image'))
        {
            $photo=$request->file('teacher_image');
            $renamePhoto = time() . '.' . $photo->getClientOriginalExtension();
            $dest=public_path('/image');
            $photo->move($dest,$renamePhoto); 
        }
        else
        {
            $renamePhoto=$request->prev_photo;

        }
        
        $data=Teacher::find($id);
        $data->teacher_name=$request->teacher_name;
        $data->teacher_designation=$request->teacher_designation;
        $data->teacher_address=$request->teacher_address;
        $data->teacher_image=$renamePhoto;
        $data->teacher_type=$request->teacher_type;
        $data->teacher_status=$request->teacher_status;
        $data->dept_id =$request->depart;
        $data->update();
        return redirect('teacher/'.$id.'/edit')->with('msg','Teacher updated Successfuly!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Teacher::where('id',$id)->delete();
        return redirect('/addteacher')->with('msg','Teacher Remove Successfuly!');
    }
}
