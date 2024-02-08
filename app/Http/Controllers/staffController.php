<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class staffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Staff::orderBy('id','asc')->get();
        return view('admin.staff.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=Staff::orderBy('id','desc')->get();
        return view('admin.staff.create',['staffs'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'staff_name'=>'required',
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
         $data=Staff::find($id);
        return view('admin.staff.edit',['data'=>$data]);
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
