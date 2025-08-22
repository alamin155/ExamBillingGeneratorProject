<?php

namespace App\Http\Controllers;
use App\Models\ExamRemunerationHeads;
use App\Models\Department;
use Illuminate\Http\Request;
class ExamRemunerationHeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=ExamRemunerationHeads::orderBy('id','asc')->get();
        return view('admin.ExamRemunerationHead.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=Department::orderBy('id','asc')->get();
        return view('admin.ExamRemunerationHead.create',['departments'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'head_name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'role' => 'nullable|string|max:100',
        'amount' => 'nullable|numeric',
        'condition_text' => 'nullable|string|max:255',
        ]);

        $data=new ExamRemunerationHeads();
        $data->head_name=$request->head_name;
        $data->description=$request->description;
        $data->role=$request->role;
        $data->amount=$request->amount;
        $data->condition_text=$request->condition_text;
        $data->secret_key=$request->secret_key;
        $data->save();
        return redirect('ExamRemunerationHead/create')->with('msg','Exam Remuneration Head created Successfuly!');
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
         $data=ExamRemunerationHeads::find($id);
        return view('admin.ExamRemunerationHead.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'head_name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'role' => 'nullable|string|max:100',
        'amount' => 'nullable|numeric',
        'condition_text' => 'nullable|string|max:255',
        ]);

        $data=ExamRemunerationHeads::find($id);
        $data->head_name=$request->head_name;
        $data->description=$request->description;
        $data->role=$request->role;
        $data->amount=$request->amount;
        $data->condition_text=$request->condition_text;
        $data->update();
        return redirect('ExamRemunerationHead/'.$id.'/edit')->with('msg','ExamRemunerationHead updated Successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ExamRemunerationHeads::where('id',$id)->delete();
        return redirect('/allExamRemunerationHead')->with('msg','Exam Remuneration Head Remove Successfuly!');
    
    }
}
