<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Prepared;
use App\Models\Examcommitteebilling;
use DB;
use Session;
session_start();
class preparedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $data=Prepared::where('exam_id',$id)->orderBy('id','asc')->paginate(10);
        $exams=Examcommitteebilling::where('id',$id)->get();

        return view('admin.prepared.index',['data'=>$data,'exams'=>$exams, 'id' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Prepared();
        
        $data->name =$request->name;
        $data->designation =$request->designation;
        $data->exam_id =$request->exam;
        $data->save();
        return response()->json([
            'statu'=>'success',
        ]);
    }  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Prepared::find($request->prepared_id)->delete();
        return response()->json([
            'statu'=>'success',
        ]);
    }
}
