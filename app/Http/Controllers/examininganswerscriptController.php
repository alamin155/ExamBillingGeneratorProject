<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Questionpaperinternal;
use App\Models\Questionpapersetterexternal;
use App\Models\Teacher;
use App\Models\Externalteacher;
use App\Models\Examininganswerscript;
use App\Models\Department;
use App\Models\Examcommitteebilling;
use DB;
use Session;
session_start();
class examininganswerscriptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $data=Examininganswerscript::where('exam_id',$id)->orderBy('cous_id','asc')->paginate(10);
        $internals=Questionpaperinternal::orderBy('id','asc')->get();
        $externals=Questionpapersetterexternal::orderBy('id','asc')->get();
        $couse=Courses::orderBy('id','asc')->get();
        //$couse=Questionpaperinternal::join('questionpapersetterexternals', 'questionpaperinternals.cous_id', '=', 'questionpapersetterexternals.cous_id')
    //->select('questionpaperinternals.*', 'questionpapersetterexternals.*')
    //->get();

        $exams=Examcommitteebilling::where('id',$id)->get();
        return view('admin.examininganswerscript.index',['data'=>$data,'internals'=>$internals,'couse'=>$couse,'exams'=>$exams,'externals'=>$externals,'id' => $id]);
       
       //$courses = Questionpaperinternal::with(['questionpapersetterexternal', 'questionpapersetterexternal.Externalteacher'])
    //->join('questionpapersetterexternals', 'questionpaperinternals.cous_id', '=', 'questionpapersetterexternals.cous_id')
    //->join('externalteachers', 'questionpapersetterexternals.id', '=', 'externalteachers.id')
    //->select('questionpaperinternals.*', 'questionpapersetterexternals.*', 'externalteachers.*')
    //->get();
        




      //$couse = Questionpaperinternal::with('questionpapersetterexternal')
    //->leftjoin('questionpapersetterexternals', 'questionpaperinternals.cous_id', '=', 'questionpapersetterexternals.cous_id')
    //->select('questionpaperinternals.*', 'questionpapersetterexternals.*')->union(Questionpaperinternal::with('questionpapersetterexternal')
    //->rightJoin('questionpapersetterexternals', 'questionpaperinternals.cous_id', '=', 'questionpapersetterexternals.cous_id')
    //->select('questionpaperinternals.*', 'questionpapersetterexternals.*'))
    //->get();


        

// You can customize the selection of columns in the get method according to your requirements


        
        //$couse = Courses::with('questionpaperinternal', 'questionpapersetterexternal', 'examininganswerscript')
        
        //->get();
//couse=Courses::orderBy('id','asc')->get();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
            'noscript'=>'required',
            
        ]

    );
        $data=new Examininganswerscript();
        $data->noscript=$request->noscript;
        $data->internal_id =$request->internal;
        $data->external_id =$request->external;
        $data->cous_id=$request->cous;
        $data->exam_id=$request->exam;
        
        $data->save();
        return response()->json([
            'statu'=>'success',
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
         Examininganswerscript::where('id',$request->up_id,)->update([
        'internal_id' =>$request->up_internal,
        'external_id' =>$request->up_external,
        'cous_id' =>$request->up_cous,
        'noscript' =>$request->up_noscript,

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
        Examininganswerscript::find($request->examininganswerscript_id)->delete();
        return response()->json([
            'statu'=>'success',
        ]);
    }
}
