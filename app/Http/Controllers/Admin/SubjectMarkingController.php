<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResultContribution;
use App\Models\StudentAttendance;
use App\Models\SubjectMarking;
use App\Models\StudentEnroll;
use Illuminate\Http\Request;
use App\Models\ExamType;
use App\Models\Semester;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\Session;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Grade;
use Carbon\Carbon;
use App\User;
use Toastr;
use Auth;

class SubjectMarkingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_subject_marking', 1);
        $this->route = 'admin.subject-marking';
        $this->view = 'admin.subject-marking';
        $this->path = 'subject-marking';
        $this->access = 'subject';
        
        $this->middleware('permission:'.$this->access.'-marking', ['only' => ['index','store']]);
        $this->middleware('permission:'.$this->access.'-result', ['only' => ['result']]);
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

        if(!empty($request->type) || $request->type != null){
            $data['selected_type'] = $type = $request->type;
        }
        else{
            $data['selected_type'] = '0';
        }

        if(!empty($request->subject) || $request->subject != null){
            $data['selected_subject'] = $subject = $request->subject;
        }
        else{
            $data['selected_subject'] = '0';
        }


        // Filter Search
        $data['faculties'] = Faculty::where('status', '1')->orderBy('title', 'asc')->get();
        $data['examTypes'] = ExamType::where('status', '1')->orderBy('contribution', 'desc')->get();
        $data['resultContributions'] = ResultContribution::where('status', '1')->first();
        
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

        if(!empty($request->program) && $request->program != '0' && !empty($request->session) && $request->session != '0'){
            // Access Data
            $teacher_id = Auth::guard('web')->user()->id;
            $user = User::where('id', $teacher_id)->where('status', '1');
            $user->with('roles')->whereHas('roles', function ($query){
                $query->where('slug', 'super-admin');
            });
            $superAdmin = $user->first();

            // Filter Subject
            $subjects = Subject::where('status', '1');
            $subjects->with('classes')->whereHas('classes', function ($query) use ($teacher_id, $session, $superAdmin){
                if(isset($session)){
                    $query->where('session_id', $session);
                }
                if(!isset($superAdmin)){
                    $query->where('teacher_id', $teacher_id);
                }
            });
            $subjects->with('programs')->whereHas('programs', function ($query) use ($program){
                $query->where('program_id', $program);
            });
            $data['subjects'] = $subjects->orderBy('code', 'asc')->get();
        }


        // Filter Student
        if(!empty($request->program) && !empty($request->session) && !empty($request->subject)){

            // Check Subject Access
            $subject_check = Subject::where('id', $subject);
            $subject_check->with('classes')->whereHas('classes', function ($query) use ($teacher_id, $session, $superAdmin){
                if(isset($session)){
                    $query->where('session_id', $session);
                }
                if(!isset($superAdmin)){
                    $query->where('teacher_id', $teacher_id);
                }
            })->firstOrFail();


            // Enrolls
            $enrolls = StudentEnroll::where('id', '!=', null);
            if(!empty($request->session) && $request->session != '0'){
                $enrolls->where('session_id', $session);
            }
            if(!empty($request->program) && $request->program != '0'){
                $enrolls->where('program_id', $program);
            }
            if(!empty($request->semester) && $request->semester != '0'){
                $enrolls->where('semester_id', $semester);
            }
            if(!empty($request->section) && $request->section != '0'){
                $enrolls->where('section_id', $section);
            }
            if(!empty($request->subject) && $request->subject != '0'){
              $enrolls->with('exams')->whereHas('exams', function ($query) use ($subject){
                    $query->where('subject_id', $subject);
                });
            }
            $enrolls->with('student')->whereHas('student', function ($query){
                $query->orderBy('student_id', 'asc');
            });
            
            $rows = $enrolls->get();

            // Array Sorting
            $data['rows'] = $rows->sortBy(function($query){

               return $query->student->student_id;

            })->all();
        }


        // Filter Student Attendances
        if(!empty($request->program) && !empty($request->session) && !empty($request->subject)){

            $attendances = StudentAttendance::where('id', '!=', null);
            
            $attendances->with('studentEnroll')->whereHas('studentEnroll', function ($query) use ($program, $session, $semester, $section){
                if($program != '0'){
                    $query->where('program_id', $program);
                }
                if($session != '0'){
                    $query->where('session_id', $session);
                }
                if($semester != '0'){
                    $query->where('semester_id', $semester);
                }
                if($section != '0'){
                    $query->where('section_id', $section);
                }
            });

            if(!empty($request->subject) && $request->subject != '0'){
                $attendances->where('subject_id', $subject);
            }

            $data['studentAttendance'] = $attendances->orderBy('id', 'desc')->get();
        }


        // Filter Subject
        if(!empty($request->subject)){

            $data['subject'] = Subject::where('id', $request->subject)->first();
        }


        // Filter Marks
        if(!empty($request->program) && !empty($request->session) && !empty($request->subject)){

            $markings = SubjectMarking::where('subject_id', $subject);
            
            $markings->with('studentEnroll')->whereHas('studentEnroll', function ($query) use ($program, $session, $semester, $section){
                if($program != '0'){
                    $query->where('program_id', $program);
                }
                if($session != '0'){
                    $query->where('session_id', $session);
                }
                if($semester != '0'){
                    $query->where('semester_id', $semester);
                }
                if($section != '0'){
                    $query->where('section_id', $section);
                }
            });

            $markings->with('studentEnroll.student')->whereHas('studentEnroll.student', function ($query){
                $query->orderBy('student_id', 'asc');
            });

            $data['markings'] = $markings->get();
        }


        return view($this->view.'.marking', $data);
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
            'students' => 'required',
            'subjects' => 'required',
            'exam_marks' => 'required',
            'total_marks' => 'required',
            'publish_date' => 'required|date',
        ]);


        // Update Data
        foreach($request->students as $key => $student_id){
            // Insert Or Update Data
            $subjectMarking = SubjectMarking::updateOrCreate(
            [
                'student_enroll_id' => $request->students[$key],
                'subject_id' => $request->subjects[$key]
            ],[
                'student_enroll_id' => $request->students[$key],
                'subject_id' => $request->subjects[$key],
                'exam_marks' => $request->exam_marks[$key],
                'attendances' => $request->attendances[$key] ?? 0,
                'assignments' => $request->assignments[$key] ?? 0,
                'activities' => $request->activities[$key] ?? 0,
                'total_marks' => $request->total_marks[$key],
                'publish_date' => $request->publish_date,
                'publish_time' => $request->publish_time,
            ]);
        }


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function result(Request $request)
    {
        //
        $data['title'] = trans_choice('module_subject_result', 1);
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

        if(!empty($request->subject) || $request->subject != null){
            $data['selected_subject'] = $subject = $request->subject;
        }
        else{
            $data['selected_subject'] = '0';
        }


        $data['faculties'] = Faculty::where('status', '1')->orderBy('title', 'asc')->get();
        $data['grades'] = Grade::where('status', '1')->orderBy('min_mark', 'desc')->get();
        $data['examTypes'] = ExamType::where('status', '1')->orderBy('contribution', 'desc')->get();
        $data['resultContributions'] = ResultContribution::where('status', '1')->first();

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

        if(!empty($request->program) && $request->program != '0' && !empty($request->session) && $request->session != '0'){
            // Access Data
            $teacher_id = Auth::guard('web')->user()->id;
            $user = User::where('id', $teacher_id)->where('status', '1');
            $user->with('roles')->whereHas('roles', function ($query){
                $query->where('slug', 'super-admin');
            });
            $superAdmin = $user->first();

            // Filter Subject
            $subjects = Subject::where('status', '1');
            $subjects->with('classes')->whereHas('classes', function ($query) use ($teacher_id, $session, $superAdmin){
                if(isset($session)){
                    $query->where('session_id', $session);
                }
                if(!isset($superAdmin)){
                    $query->where('teacher_id', $teacher_id);
                }
            });
            $subjects->with('programs')->whereHas('programs', function ($query) use ($program){
                $query->where('program_id', $program);
            });
            $data['subjects'] = $subjects->orderBy('code', 'asc')->get();
        }


        // Filter Marks
        if(!empty($request->program) && !empty($request->session) && !empty($request->subject)){

            // Check Subject Access
            $subject_check = Subject::where('id', $subject);
            $subject_check->with('classes')->whereHas('classes', function ($query) use ($teacher_id, $session, $superAdmin){
                if(isset($session)){
                    $query->where('session_id', $session);
                }
                if(!isset($superAdmin)){
                    $query->where('teacher_id', $teacher_id);
                }
            })->firstOrFail();


            // Marks
            $markings = SubjectMarking::where('subject_id', $subject);
            
            $markings->with('studentEnroll')->whereHas('studentEnroll', function ($query) use ($program, $session, $semester, $section){
                if($program != '0'){
                    $query->where('program_id', $program);
                }
                if($session != '0'){
                    $query->where('session_id', $session);
                }
                if($semester != '0'){
                    $query->where('semester_id', $semester);
                }
                if($section != '0'){
                    $query->where('section_id', $section);
                }
            });

            $markings->with('studentEnroll.student')->whereHas('studentEnroll.student', function ($query){
                $query->orderBy('student_id', 'asc');
            });

            $rows = $markings->get();

            // Array Sorting
            $data['rows'] = $rows->sortBy(function($query){

               return $query->studentEnroll->student->student_id;

            })->all();
        }


        return view($this->view.'.result', $data);
    }
}
