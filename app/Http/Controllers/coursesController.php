<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Committee;
use Auth;

class coursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function getMyBling() {
    $data = Courses::orderBy('id', 'asc')
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

        $data = Courses::whereIn('id', $ids)->orderBy('id', 'asc')->get();
    
        return view('admin.courses.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=Courses::orderBy('id','desc')->get();
        return view('admin.courses.create',['courses'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_code' => 'required|unique:courses,course_code',
            'course_title'=>'required',
            'course_credit'=>'required',
            'course_type'=>'required',
            'course_status'=>'required',
            
        ]);
        $data=new Courses();
        $data->course_title=$request->course_title;
        $data->course_code=$request->course_code;
        $data->course_credit=$request->course_credit;
        $data->course_type=$request->course_type;
        $data->course_status=$request->course_status;
        $data->created_by=Auth::user()->id;
        $data->save();
        
        return redirect('courses/create')->with('msg','Courses created Successfuly!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Courses::find($id);
        return view ('admin.courses.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Courses::find($id);
        return view('admin.courses.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'course_title'=>'required',
            'course_code'=>'required',
            'course_credit'=>'required',
            'course_type'=>'required',
            'course_status'=>'required',
            
        ]);
        
        $data=Courses::find($id);
        $data->course_title=$request->course_title;
        $data->course_code=$request->course_code;
        $data->course_credit=$request->course_credit;
        $data->course_type=$request->course_type;
        $data->course_status=$request->course_status;
        $data->update();
        return redirect('courses/'.$id.'/edit')->with('msg','Courses updated Successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Courses::where('id',$id)->delete();
        return redirect('/allcourses')->with('msg','Courses Remove Successfuly!');
    }
}
