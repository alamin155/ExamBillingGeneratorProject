<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Accepetd;
use DB;
use Session;
session_start();

class AcceptedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::orderBy('id','asc')->get();
        $data=Accepetd::orderBy('id','asc')->get();
        return view('accepted',['user'=>$user,'data'=>$data,]);
        
        
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
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id',$id)->delete();
        return redirect('/useraccepted')->with('msg','User Remove Successfuly!');
    }


    public function updateStatus($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => true, 'status' => $user->status]);
    }

}
