<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Teacher;
use App\Models\Department;
use App\Models\Staff;
use App\Models\Courses;
use App\Models\Examcommitteebilling;
use App\Models\Committee;
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
     public function index1()
    {
       $data=Teacher::orderBy('id','asc')->get();
        return view('admin.teacher.index1',['data'=>$data]);
    }
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
            'teacher_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'mobile' => ['required', 'numeric', 'digits:11'],
            'email'=>'required',
            'bankaccount'=>'nullable',
            'bankname'=>'nullable',
            'receivedno'=>'nullable',
            'Branchname'=>'nullable',
        ]);

      //  $photo=$request->file('teacher_image');
       // $renamePhoto = time() . '.' . $photo->getClientOriginalExtension();
        //$dest=public_path('/image');
        //$photo->move($dest,$renamePhoto);

        $data=new Teacher();
        $data->teacher_name=$request->teacher_name;
        $data->teacher_designation=$request->teacher_designation;
        $data->teacher_address=$request->teacher_address;
        $data->teacher_type=$request->teacher_type;
        //$data->teacher_image=$renamePhoto;
         if ($request->hasFile('teacher_image')) {
    $photo = $request->file('teacher_image');
    $renamePhoto = time() . '.' . $photo->getClientOriginalExtension();
    $dest = public_path('/image');
    $photo->move($dest, $renamePhoto);
    $data->teacher_image = $renamePhoto;
} else {
    $data->teacher_image = 'default.png'; // or default image
}
        $data->mobile=$request->mobile;
        $data->email=$request->email;
        //$data->bankaccount=$request->bankaccount;
        if ($request->has('bankaccount') && !empty($request->bankaccount)) {
    $data->bankaccount = $request->bankaccount;
} else {
    $data->bankaccount = 'default';  // replace 'default' with your desired default value
}

        //$data->bankname=$request->bankname;
if ($request->has('bankname') && !empty($request->bankname)) {
    $data->bankname = $request->bankname;
} else {
    $data->bankname = 'default';  // replace 'default' with your desired default value
}

       // $data->receivedno=$request->receivedno;
        if ($request->has('receivedno') && !empty($request->receivedno)) {
    $data->receivedno = $request->receivedno;
} else {
    $data->receivedno = 'default';  // replace 'default' with your desired default value
}
        //$data->Branchname=$request->Branchname;
if ($request->has('Branchname') && !empty($request->Branchname)) {
    $data->Branchname = $request->Branchname;
} else {
    $data->Branchname = 'default';  // replace 'default' with your desired default value
}
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
            'mobile' => 'required',
            'email'=>'required',
            'bankaccount'=>'required',
            'bankname'=>'required',
            'receivedno' =>'required',
            'Branchname'=>'required',
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
        $data->mobile=$request->mobile;
        $data->email=$request->email;
        $data->bankaccount=$request->bankaccount;
        $data->bankname=$request->bankname;
        $data->receivedno=$request->receivedno;
        $data->Branchname=$request->Branchname;
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
    //Total Number of teacher
    public function teacherlist()
    {
        //$data=Teacher::orderBy('id','asc')->get();
        $teachers = Teacher::all();
        $departments = Department::all();
        $staffs=Staff::all();
        $courses=Courses::all();
        return view('home', [
            'teachers' => $teachers,
            'departments' => $departments,
            'staffs' => $staffs,
            'courses'=> $courses,
        ]);
        return view('home',['data'=>$data]);
    }
   public function searchTeacher(Request $request)
{
    $data = Teacher::where('teacher_name', 'like', '%' . $request->search_string . '%')
        ->orderBy('id', 'asc')
        ->orwhere('teacher_designation', 'like', '%' . $request->search_string . '%')
        ->get(); // Fetch the results
    
    if($data->count() >= 1){
        return view('admin.teacher.search', ['data' => $data]);
    }
    else{
        return response()->json([
            'status' => 'nothing_found',
        ]);
    }
}

}
