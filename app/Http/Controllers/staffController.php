<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Department;
use App\Models\Committee;
use Auth;

class staffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function getMyBling() {
    $data = Staff::orderBy('id', 'asc')
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

        $data = Staff::whereIn('id', $ids)->orderBy('id', 'asc')->get();
        return view('admin.staff.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=Department::orderBy('id','asc')->get();
        return view('admin.staff.create',['departments'=>$data]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'staff_name' => 'required|unique:staffs,staff_name',
            'staff_designation'=>'required',
            'staff_address'=>'required',
            'staff_description'=>'required',
            'staff_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'staff_status'=>'required',
            
        ]);

        $photo=$request->file('staff_image');
        $renamePhoto = time() . '.' . $photo->getClientOriginalExtension();
        $dest=public_path('/image');
        $photo->move($dest,$renamePhoto);

        $data=new Staff();
        $data->staff_name=$request->staff_name;
        $data->staff_designation=$request->staff_designation;
        $data->staff_address=$request->staff_address;
        $data->staff_description=$request->staff_description;
        $data->staff_image=$renamePhoto;
        $data->staff_status=$request->staff_status;
        $data->dept_id =$request->depart;
        $data->created_by=Auth::user()->id;
        $data->save();
        
        return redirect('staff/create')->with('msg','Staff created Successfuly!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Staff::find($id);
        return view ('admin.staff.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $departs=Department::orderBy('id','desc')->get();
         $data=Staff::find($id);
        return view('admin.staff.edit',['data'=>$data,'departs'=>$departs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'staff_name'=>'required',
            'staff_designation'=>'required',
            'staff_address'=>'required',
            'staff_description'=>'required',
            'staff_status'=>'required',
            
        ]);
        if($request->hasFile('staff_image'))
        {
            $photo=$request->file('staff_image');
            $renamePhoto = time() . '.' . $photo->getClientOriginalExtension();
            $dest=public_path('/image');
            $photo->move($dest,$renamePhoto); 
        }
        else
        {
            $renamePhoto=$request->prev_photo;

        }
        
        $data=Staff::find($id);
        $data->staff_name=$request->staff_name;
        $data->staff_designation=$request->staff_designation;
        $data->staff_address=$request->staff_address;
        $data->staff_image=$renamePhoto;
        $data->staff_description=$request->staff_description;
        $data->staff_status=$request->staff_status;
        $data->dept_id =$request->depart;
        $data->update();
        return redirect('staff/'.$id.'/edit')->with('msg','Staff updated Successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Staff::where('id',$id)->delete();
        return redirect('/allstaff')->with('msg','Staff Remove Successfuly!');
    }
}
