<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use App\Models\Teacher;
use App\Models\Department;
use App\Models\Courses;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $staffs = Staff::orderBy('id', 'asc')->get();
        $teachers = Teacher::all();       // Assuming you have Teacher model
        $departments = Department::all(); // Assuming Department model
        $courses = Courses::all();         // Assuming Course model

        // Pass all to the view
        return view('home', compact('staffs', 'teachers', 'departments', 'courses'));
        
    
    }

    public function adminHome()
    {
        $staffs = Staff::orderBy('id', 'asc')->get();
        $teachers = Teacher::all();       // Assuming you have Teacher model
        $departments = Department::all(); // Assuming Department model
        $courses = Courses::all();         // Assuming Course model

        // Pass all to the view
        return view('adminhome', compact('staffs', 'teachers', 'departments', 'courses'));
        
    }
    
}
