<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class ModerationCommitteeController extends Controller
{
    public function moderationcommitee()
    {
        return view('admin.Moderation Committee');
    }
    public function savemoderationcommitee(Request $request)
    {
        $data=array();
        $data['moderationcommittee_sl']=$request->moderationcommittee_sl;
        $data['moderationcommittee_name']=$request->moderationcommittee_name;
        $data['moderationcommittee_designation']=$request->moderationcommittee_designation;
        $data['moderationcommittee_address']=$request->moderationcommittee_address;
        $data['moderationcommittee_remark']=$request->moderationcommittee_remark;
        DB::table('moderationcommittees')->insert($data);
        Session::put('exception','Moderation Committee Added Successful!');
        return Redirect::to('/addmoderationcommitee');
    }
}
