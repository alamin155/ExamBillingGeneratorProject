<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Examcommitteebilling;
use App\Models\Questiontypingpublishing;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class QuestiontypingpublishingController extends Controller
{
    public function index(string $id)
    {
        $ids = Session::get('bids', []);

        if (!in_array($id, $ids)) {
            return redirect('home')->withErrors('Invalid ID or ID not found in the allowed list.');
        }

        $data = Questiontypingpublishing::where('exam_id',$id)
                 ->orderBy('tech_id','asc')->paginate(10);
        $techs = Teacher::orderBy('id','asc')->get();
        $exams = Examcommitteebilling::where('id',$id)->get();

        return view('admin.questiontypingpublishing.index',[
            'data'=>$data,
            'techs'=>$techs,
            'exams'=>$exams,
            'id' => $id
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
        'numberofquestion'=>'required',
        'numberofpage'=>'required',
        'tech'=>'required',
        'exam' => 'required',
    ]);

    $data=new Questiontypingpublishing();
    $data->numberofquestion=$request->numberofquestion;
    $data->numberofpage=$request->numberofpage;
    $data->tech_id =$request->tech;
    $data->exam_id=$request->exam;
    $data->save();

    return response()->json([
        'status'=>true,
        'message'=>'Question Typing & Publishing Add Successfully!'
    ]);    
    }

    public function update(Request $request)
    {
        Questiontypingpublishing::where('id',$request->up_id)->update([
            'tech_id' =>$request->up_tech,
            'numberofquestion' =>$request->up_numberofquestion,
            'numberofpage' =>$request->up_numberofpage,
        ]);

        return response()->json([
            'status'=>'success',
        ]);
    }

    public function destroy(Request $request)
    {
        Questiontypingpublishing::find($request->questiontypingpublishing_id)->delete();

        return response()->json([
            'status'=>'success',
        ]);
    }
}
