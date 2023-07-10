<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrintSetting;
use App\Models\Semester;
use App\Models\Session;
use App\Models\Program;
use App\Models\Section;
use App\Models\Faculty;
use App\Models\Student;

class AdmitCardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_admit_card', 1);
        $this->route = 'admin.admit-card';
        $this->view = 'admin.admit-card';
        $this->path = 'print-setting';
        $this->access = 'admit-card';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-print|'.$this->access.'-download', ['only' => ['index']]);
        $this->middleware('permission:'.$this->access.'-print', ['only' => ['print','multiPrint']]);
        $this->middleware('permission:'.$this->access.'-download', ['only' => ['download']]);
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
            $data['selected_faculty'] = $faculty = '0';
        }

        if(!empty($request->program) || $request->program != null){
            $data['selected_program'] = $program = $request->program;
        }
        else{
            $data['selected_program'] = $program = '0';
        }

        if(!empty($request->session) || $request->session != null){
            $data['selected_session'] = $session = $request->session;
        }
        else{
            $data['selected_session'] = $session = '0';
        }

        if(!empty($request->semester) || $request->semester != null){
            $data['selected_semester'] = $semester = $request->semester;
        }
        else{
            $data['selected_semester'] = $semester = '0';
        }

        if(!empty($request->section) || $request->section != null){
            $data['selected_section'] = $section = $request->section;
        }
        else{
            $data['selected_section'] = $section = '0';
        }

        if(!empty($request->student_id) || $request->student_id != null){
            $data['selected_student_id'] = $student_id = $request->student_id;
        }
        else{
            $data['selected_student_id'] = Null;
        }
        

        // Search Filter
        $data['faculties'] = Faculty::where('status', '1')->orderBy('title', 'asc')->get();


        if(!empty($request->faculty) && $request->faculty != '0'){
        $data['programs'] = Program::where('faculty_id', $faculty)->where('status', '1')->orderBy('title', 'asc')->get();}

        if(!empty($request->program) && $request->program != '0'){
        $sessions = Session::where('status', 1);
        $sessions->with('programs')->whereHas('programs', function ($query) use ($program){
            $query->where('program_id', $program);
        });
        $data['sessions'] = $sessions->orderBy('id', 'desc')->get();}

        if(!empty($request->program) && $request->program != '0'){
        $semesters = Semester::where('status', 1);
        $semesters->with('programs')->whereHas('programs', function ($query) use ($program){
            $query->where('program_id', $program);
        });
        $data['semesters'] = $semesters->orderBy('id', 'asc')->get();}

        if(!empty($request->program) && $request->program != '0' && !empty($request->semester) && $request->semester != '0'){
        $sections = Section::where('status', 1);
        $sections->with('semesterPrograms')->whereHas('semesterPrograms', function ($query) use ($program, $semester){
            $query->where('program_id', $program);
            $query->where('semester_id', $semester);
        });
        $data['sections'] = $sections->orderBy('title', 'asc')->get();}


        // Student Filter
        $students = Student::where('status', '1');
        if($faculty != 0){
            $students->with('program')->whereHas('program', function ($query) use ($faculty){
                $query->where('faculty_id', $faculty);
            });
        }
        $students->with('currentEnroll')->whereHas('currentEnroll', function ($query) use ($program, $session, $semester, $section){
            if($program != 0){
            $query->where('program_id', $program);
            }
            if($session != 0){
            $query->where('session_id', $session);
            }
            if($semester != 0){
            $query->where('semester_id', $semester);
            }
            if($section != 0){
            $query->where('section_id', $section);
            }
        });
        if(!empty($request->student_id)){
            $students->where('student_id', 'LIKE', '%'.$student_id.'%');
        }
        $rows = $students->orderBy('student_id', 'asc')->get();

        // Array Sorting
        $data['rows'] = $rows->sortBy(function($query){

           return $query->student_id;

        })->all();

        
        $data['print'] = PrintSetting::where('slug', 'admit-card')->first();


        return view($this->view.'.index', $data);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        // View
        $data['rows'] = Student::where('id', $id)->orderBy('student_id', 'asc')->get();
        $data['print'] = PrintSetting::where('slug', 'admit-card')->firstOrFail();

        return view($this->view.'.print', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function multiPrint(Request $request)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $students = explode(",",$request->students);

        // View
        $data['rows'] = Student::whereIn('id', $students)->orderBy('student_id', 'asc')->get();
        $data['print'] = PrintSetting::where('slug', 'admit-card')->firstOrFail();

        return view($this->view.'.print', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        // View
        $data['row'] = Student::where('status', '1')->findOrFail($id);
        $data['print'] = PrintSetting::where('slug', 'admit-card')->firstOrFail();

        return view($this->view.'.download', $data);
    }
}
