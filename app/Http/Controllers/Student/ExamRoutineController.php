<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentEnroll;
use Illuminate\Http\Request;
use App\Models\ExamRoutine;
use App\Models\ExamType;
use App\Models\Session;
use Auth;

class ExamRoutineController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_exam_routine', 1);
        $this->route = 'student.exam-routine';
        $this->view = 'student.exam-routine';
        $this->path = 'exam-routine';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['view']      = $this->view;
        $data['path']      = $this->path;


        if(!empty($request->type) || $request->type != null){
            $data['selected_type'] = $type = $request->type;
        }
        else{
            $data['selected_type'] = '0';
        }


        $data['types'] = ExamType::where('status', '1')->orderBy('title', 'asc')->get();
        $session = Session::where('status', '1')->where('current', '1')->first();

        if(isset($session)){
        $enroll = StudentEnroll::where('student_id', Auth::guard('student')->user()->id)
                        ->where('session_id', $session->id)
                        ->where('status', '1')
                        ->first();
        }


        // Exam Routine
        if(isset($enroll) && isset($session) && !empty($request->type)){
        $data['rows'] = ExamRoutine::where('status', '1')
                        ->where('exam_type_id', $request->type)
                        ->where('session_id', $enroll->session_id)
                        ->where('program_id', $enroll->program_id)
                        ->where('semester_id', $enroll->semester_id)
                        ->where('section_id', $enroll->section_id)
                        ->orderBy('date', 'asc')
                        ->orderBy('start_time', 'asc')
                        ->get();
        }
        
        
        return view($this->view.'.index', $data);
    }
}
