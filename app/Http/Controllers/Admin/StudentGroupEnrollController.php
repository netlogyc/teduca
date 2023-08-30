<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentEnroll;
use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\Section;
use App\Models\Session;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Grade;
use Toastr;
use Auth;
use DB;

class StudentGroupEnrollController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_group_enroll', 1);
        $this->route = 'admin.group-enroll';
        $this->view = 'admin.group-enroll';
        $this->path = 'student';
        $this->access = 'student-enroll';


        $this->middleware('permission:'.$this->access.'-group');
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


        if(!empty($request->faculty) || $request->faculty != null){
            $data['selected_faculty'] = $faculty = $request->faculty;
        }
        else{
            $data['selected_faculty'] = '0';
        }

        if(!empty($request->program) || $request->program != null){
            $data['selected_program'] = $program = $request->program;
        }
        else{
            $data['selected_program'] = '0';
        }

        if(!empty($request->session) || $request->session != null){
            $data['selected_session'] = $session = $request->session;
        }
        else{
            $data['selected_session'] = '0';
        }

        if(!empty($request->semester) || $request->semester != null){
            $data['selected_semester'] = $semester = $request->semester;
        }
        else{
            $data['selected_semester'] = '0';
        }

        if(!empty($request->section) || $request->section != null){
            $data['selected_section'] = $section = $request->section;
        }
        else{
            $data['selected_section'] = '0';
        }


        // Search Filter
        $data['faculties'] = Faculty::where('status', '1')->orderBy('title', 'asc')->get();


        if(!empty($request->faculty) && !empty($request->program) && !empty($request->session) && !empty($request->semester) && !empty($request->section)){

            $data['programs'] = Program::where('faculty_id', $faculty)->where('status', '1')->orderBy('title', 'asc')->get();

            $sessions = Session::where('status', 1);
            $sessions->with('programs')->whereHas('programs', function ($query) use ($program){
                $query->where('program_id', $program);
            });
            $data['sessions'] = $sessions->orderBy('id', 'desc')->get();

            $semesters = Semester::where('status', 1);
            $semesters->with('programs')->whereHas('programs', function ($query) use ($program){
                $query->where('program_id', $program);
            });
            $data['semesters'] = $semesters->orderBy('id', 'asc')->get();

            $sections = Section::where('status', 1);
            $sections->with('semesterPrograms')->whereHas('semesterPrograms', function ($query) use ($program, $semester){
                $query->where('program_id', $program);
                $query->where('semester_id', $semester);
            });
            $data['sections'] = $sections->orderBy('title', 'asc')->get();

            $subjects = Subject::where('status', 1);
            $subjects->with('programs')->whereHas('programs', function ($query) use ($program){
                $query->where('program_id', $program);
            });
            $data['subjects'] = $subjects->orderBy('code', 'asc')->get();

            $data['grades'] = Grade::where('status', '1')->orderBy('min_mark', 'desc')->get();
        }


        // Student Filter
        if(!empty($request->faculty) && !empty($request->program) && !empty($request->session) && !empty($request->semester) && !empty($request->section)){

            $students = Student::where('status', '1');
            if(!empty($request->faculty)){
                $students->with('program')->whereHas('program', function ($query) use ($faculty){
                    $query->where('faculty_id', $faculty);
                });
            }
            if(!empty($request->program) && !empty($request->session) && !empty($request->semester) && !empty($request->section)){
                $students->with('currentEnroll')->whereHas('currentEnroll', function ($query) use ($program, $session, $semester, $section){
                    $query->where('program_id', $program);
                    $query->where('session_id', $session);
                    $query->where('semester_id', $semester);
                    $query->where('section_id', $section);
                    $query->where('status', '1');
                });
            }

            $rows = $students->orderBy('student_id', 'asc')->get();

            // Array Sorting
            $data['rows'] = $rows->sortBy(function($query){

               return $query->student_id;

            })->all();
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
            'semester' => 'required',
            'session' => 'required',
            'section' => 'required',
            'program' => 'required',
            'students' => 'required',
            'subjects' => 'required',
        ]);


        try{
            DB::beginTransaction();

            foreach($request->students as $key => $student){
            if(!empty($student) || $student == ''){

                // Duplicate Enroll Check
                $duplicate_check = StudentEnroll::where('student_id', $student)->where('session_id', $request->session)->where('semester_id', $request->semester)->where('section_id', $request->section)->first();
                $session_check = StudentEnroll::where('student_id', $student)->where('session_id', $request->session)->first();
                // $semester_check = StudentEnroll::where('student_id', $student)->where('semester_id', $request->semester)->first();

                if(!isset($duplicate_check) && !isset($session_check)){
                    // Pre Enroll Update
                    $pre_enroll = StudentEnroll::where('student_id', $student)->where('status', '1')->first();
                    if(isset($pre_enroll)){
                        $pre_enroll->status = '0';
                        $pre_enroll->save();
                    }

                    // Student New Enroll
                    $enroll = new StudentEnroll;
                    $enroll->student_id = $student;
                    $enroll->program_id = $request->program;
                    $enroll->session_id = $request->session;
                    $enroll->semester_id = $request->semester;
                    $enroll->section_id = $request->section;
                    $enroll->created_by = Auth::guard('web')->user()->id;
                    $enroll->save();

                    // Attach Subject
                    $enroll->subjects()->attach($request->subjects);

                    Toastr::success(__('msg_promoted_successfully'), __('msg_success'));
                }
                else{

                    Toastr::error(__('msg_enroll_already_exists'), __('msg_error'));
                }
            }}
            DB::commit();
            
            return redirect()->back();
        }
        catch(\Exception $e){

            Toastr::error(__('msg_created_error'), __('msg_error'));

            return redirect()->back();
        }
    }
}
