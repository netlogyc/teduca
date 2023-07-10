<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentEnroll;
use Illuminate\Http\Request;
use App\Models\ClassRoutine;
use App\Models\Session;
use Auth;

class ClassRoutineController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_class_routine', 1);
        $this->route = 'student.class-routine';
        $this->view = 'student.class-routine';
        $this->path = 'class-routine';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['view']      = $this->view;
        $data['path']      = $this->path;

        $session = Session::where('status', '1')->where('current', '1')->first();

        if(isset($session)){
        $enroll = StudentEnroll::where('student_id', Auth::guard('student')->user()->id)
                        ->where('session_id', $session->id)
                        ->where('status', '1')
                        ->first();
        }


        // Class Routine
        if(isset($enroll) && isset($session)){
        $data['rows'] = ClassRoutine::where('status', '1')
                        ->where('session_id', $enroll->session_id)
                        ->where('program_id', $enroll->program_id)
                        ->where('semester_id', $enroll->semester_id)
                        ->where('section_id', $enroll->section_id)
                        ->orderBy('start_time', 'asc')
                        ->get();
        }
        

        return view($this->view.'.index', $data);
    }
}
