<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentEnroll;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Grade;
use Toastr;
use Auth;

class SubjectAddDropController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_subject_adddrop', 1);
        $this->route = 'admin.subject-adddrop';
        $this->view = 'admin.subject-adddrop';
        $this->path = 'student';
        $this->access = 'student-enroll';


        $this->middleware('permission:'.$this->access.'-adddrop');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;


        $data['students'] = Student::whereHas('currentEnroll')->where('status', '1')->orderBy('student_id', 'asc')->get();
        
        if(!empty($request->student) && $request->student != Null){

            $data['selected_student'] = $request->student;

            // Student
            $student = Student::where('student_id', $request->student)->where('status', '1');
            $student->with('currentEnroll')->whereHas('currentEnroll', function ($query){
                $query->where('status', '1');
            });
            $data['row'] = $row = $student->first();


            // Subjects
            $subjects = Subject::where('status', '1');
            $subjects->with('programs')->whereHas('programs', function ($query) use ($row){
                $query->where('program_id', $row->program_id);
            });
            $data['subjects'] = $subjects->orderBy('code', 'asc')->get();


            // Current Enroll
            $data['curr_enr'] = StudentEnroll::where('student_id', $row->id)
                        ->where('status', '1')
                        ->orderBy('id', 'desc')->first();

            $data['grades'] = Grade::where('status', '1')->orderBy('min_mark', 'desc')->get();
        }
        else {
            $data['selected_student'] = Null;
        }

        return view($this->view.'.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Field Validation
        $request->validate([
            'student' => 'required',
            'subjects' => 'required',
        ]);


        // Enroll Update
        $enroll = StudentEnroll::where('student_id', $request->student)
                                ->where('status', '1')
                                ->orderBy('id', 'desc')->first();

        $enroll->subjects()->sync($request->subjects);


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
