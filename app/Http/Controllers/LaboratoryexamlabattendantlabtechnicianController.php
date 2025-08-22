<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Laboratoryexamlabattendantlabtechnician;
use App\Models\Courses;
use App\Models\Examcommitteebilling;
use App\Models\Staff;
use DB;
use Session;
session_start();
class LaboratoryexamlabattendantlabtechnicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $ids = Session::get('bids', []);

    // Check if the provided ID is in the allowed list
    if (!in_array($id, $ids)) {
        return redirect('home')->withErrors('Invalid ID or ID not found in the allowed list.');
    }
        $data=Laboratoryexamlabattendantlabtechnician::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
        $staffs=Staff::orderBy('id','asc')->get();
        $couse=Courses::orderBy('id','asc')->get();
        $exams=Examcommitteebilling::where('id',$id)->get();
        return view('admin.laboratoryexamlabattendantlabtechnician.index',['data'=>$data,'staffs'=>$staffs,'couse'=>$couse,'exams'=>$exams,'id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
      // 'staf' => 'required|unique:laboratoryexamlabattendantlabtechnicians,staf_id,NULL,id,exam_id,' . $request->exam,
        
        'exam' => 'required',
        'numberofday' => 'required',
       ]);
        
        $numberOfDay = $request->input('numberofday');
        $stafIds = $request->input('staf');
        $cousId = $request->input('cous');
        $examId = $request->input('exam');

        // Loop through each selected staff ID and save the data
        foreach ($stafIds as $stafId) {
            $data = new Laboratoryexamlabattendantlabtechnician();
            $data->numberofday = $numberOfDay;
            $data->staf_id = $stafId;
            $data->cous_id = $cousId;
            $data->exam_id = $examId;
            $data->save();
        }

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        Laboratoryexamlabattendantlabtechnician::where('id',$request->up_id,)->update([
        'staf_id' =>$request->up_staf,
        'cous_id' =>$request->up_cous,
        'numberofday' =>$request->up_numberofday,
        

        ]);

        return response()->json([
            'statu'=>'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Laboratoryexamlabattendantlabtechnician::find($request->laboratoryexamlabattendantlabtechnician_id)->delete();
        return response()->json([
            'statu'=>'success',
        ]);
    }
}
