<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Degree;
use App\Models\Committee;
use Auth;

class degreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function getMyBling() {
    $data = Degree::orderBy('id', 'asc')
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

        $data = Degree::whereIn('id', $ids)->orderBy('id', 'asc')->get();
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
        $data->created_by=Auth::user()->id;
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
