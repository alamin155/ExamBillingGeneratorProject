<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class QuestionpapersetterinternalController extends Controller
{
    public function questionpapersetterinternal()
    {
        return view('admin.Questionpapersetterinternal');

    }
    public function savequestionpapersetterinternal(Request $request)
    {
        $data=array();
        $data['questionpapersetterinternal_sl']=$request->questionpapersetterinternal_sl;
        $data['questionpapersetterinternal_coursecode']=$request->questionpapersetterinternal_coursecode;
        $data['questionpapersetterinternal_quantity']=$request->questionpapersetterinternal_quantity;
        $data['questionpapersetterinternal_name']=$request->questionpapersetterinternal_name;
        $data['questionpapersetterinternal_designation']=$request->questionpapersetterinternal_designation;
        DB::table('questionpapersetterinternals')->insert($data);
        Session::put('exception','Question Paper Setter (Internal) Added Successful!');
        return Redirect::to('/addquestionpapersetterinternal');

    }
}
