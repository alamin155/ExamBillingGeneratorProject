<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Remark;
use App\Models\Committee;
use Auth;

class remarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function getMyBling() {
    $data = Remark::orderBy('id', 'asc')
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

        $data = Remark::whereIn('id', $ids)->orderBy('id', 'asc')->get();
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
            'remark_title' => 'required|unique:remarks,remark_title',
            'remark_status'=>'required',
            
        ]);
        $data=new Remark();
        $data->remark_title=$request->remark_title;
        $data->remark_status=$request->remark_status;
        $data->created_by=Auth::user()->id;
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
