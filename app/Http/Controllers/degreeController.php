<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Degree;

class degreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Degree::orderBy('id','asc')->get();
        return view('admin.degree.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=Degree::orderBy('id','desc')->get();
        return view('admin.degree.create',['degrees'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'degree_name' => 'required|unique:degrees,degree_name',
            'degree_description'=>'required',
            'degree_status'=>'required',
            
        ]);
        $data=new Degree();
        $data->degree_name=$request->degree_name;
        $data->degree_description=$request->degree_description;
        $data->degree_status=$request->degree_status;
        $data->save();
        
        return redirect('degree/create')->with('msg','Degree created Successfuly!');
    

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Degree::find($id);
        return view ('admin.degree.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Degree::find($id);
        return view('admin.degree.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'degree_name'=>'required',
            'degree_description'=>'required',
            'degree_status'=>'required',
            
        ]);
        
        $data=Degree::find($id);
        $data->degree_name=$request->degree_name;
        $data->degree_description=$request->degree_description;
        $data->degree_status=$request->degree_status;
        $data->update();
        return redirect('degree/'.$id.'/edit')->with('msg','Degree updated Successfuly!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Degree::where('id',$id)->delete();
        return redirect('/alldegree')->with('msg','Degree Remove Successfuly!');
    }
}
