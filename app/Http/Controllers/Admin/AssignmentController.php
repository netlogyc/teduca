<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\AssignmentNotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Controller;
use App\Models\StudentAssignment;
use App\Models\StudentEnroll;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\Assignment;
use App\Models\Semester;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\Section;
use App\Models\Session;
use App\Models\Subject;
use App\Models\Student;
use Carbon\Carbon;
use App\User;
use Toastr;
use Auth;
use DB;

class AssignmentController extends Controller
{
    use FileUploader;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_assignment', 1);
        $this->route = 'admin.assignment';
        $this->view = 'admin.assignment';
        $this->path = 'assignment';
        $this->access = 'assignment';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-create|'.$this->access.'-edit|'.$this->access.'-delete|'.$this->access.'-marking', ['only' => ['index','show']]);
        $this->middleware('permission:'.$this->access.'-create', ['only' => ['create','store']]);
        $this->middleware('permission:'.$this->access.'-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:'.$this->access.'-delete', ['only' => ['destroy']]);
        $this->middleware('permission:'.$this->access.'-marking', ['only' => ['show','marking']]);
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


        if(!empty($request->subject) || $request->subject != null){
            $data['selected_subject'] = $subject = $request->subject;
        }
        else{
            $data['selected_subject'] = $subject = '0';
        }

        if(!empty($request->start_date) || $request->start_date != null){
            $data['selected_start_date'] = $start_date = $request->start_date;
        }
        else{
            $data['selected_start_date'] = $start_date = date('Y-m-d', strtotime(Carbon::now()->subYear()));
        }

        if(!empty($request->end_date) || $request->end_date != null){
            $data['selected_end_date'] = $end_date = $request->end_date;
        }
        else{
            $data['selected_end_date'] = $end_date = date('Y-m-d', strtotime(Carbon::today()));
        }


        // Access Data
        $session = Session::where('status', '1')->where('current', '1')->first();

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
                $query->where('session_id', $session->id);
            }
            if(!isset($superAdmin)){
                $query->where('teacher_id', $teacher_id);
            }
        });
        $data['subjects'] = $subjects->orderBy('code', 'asc')->get();


        // Filter Assignment
        $rows = Assignment::whereDate('start_date', '>=', $start_date)
                        ->whereDate('start_date', '<=', $end_date);
                    if(!isset($superAdmin)){
                        $rows->where('assign_by', $teacher_id);
                    }
                    if(!empty($request->subject) || $request->subject != null){
                        $rows->where('subject_id', $subject);
                    }
        $data['rows'] = $rows->orderBy('id', 'desc')->get();

        return view($this->view.'.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
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


        // Search Filter
        $data['faculties'] = Faculty::where('status', '1')->orderBy('title', 'asc')->get();


        if(!empty($request->faculty) && !empty($request->program) && !empty($request->session) && !empty($request->semester) && !empty($request->section))
        {
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


        return view($this->view.'.create', $data);
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
            'faculty' => 'required',
            'program' => 'required',
            'session' => 'required',
            'semester' => 'required',
            'section' => 'required',
            'subject' => 'required',
            'title' => 'required',
            'total_marks' => 'required|numeric',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);


        //Insert Data
        try{
            DB::beginTransaction();
            // Insert
            $assignment = new Assignment;
            $assignment->faculty_id = $request->faculty;
            $assignment->program_id = $request->program;
            $assignment->session_id = $request->session;
            $assignment->semester_id = $request->semester;
            $assignment->section_id = $request->section;
            $assignment->subject_id = $request->subject;
            $assignment->title = $request->title;
            $assignment->description = $request->description;
            $assignment->total_marks = $request->total_marks;
            $assignment->start_date = Carbon::today();
            $assignment->end_date = $request->end_date;
            $assignment->attach = $this->uploadMedia($request, 'attach', $this->path);
            $assignment->assign_by = Auth::guard('web')->user()->id;
            $assignment->save();


            // Set Value
            $faculty = $request->faculty;
            $program = $request->program;
            $session = $request->session;
            $semester = $request->semester;
            $section = $request->section;
            $subject = $request->subject;

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
                $query->where('status', '1');
            });
            $students->with('currentEnroll.subjects')->whereHas('currentEnroll.subjects', function ($query) use ($subject){
                $query->where('subject_id', $subject);
            });
            $all_students = $students->orderBy('student_id', 'desc')->get();


            // Notification Data
            $data = [
                'id' => $assignment->id,
                'title' => $assignment->title,
                'type' => 'assignment'
            ];

            Notification::send($all_students, new AssignmentNotification($data));


            
            // Enrolls              
            $enrolls = StudentEnroll::where('status', '1');
            if($request->faculty != 0){
                $enrolls->with('program')->whereHas('program', function ($query) use ($faculty){
                    $query->where('faculty_id', $faculty);
                });
            }
            if($request->session != 0){
                $enrolls->where('session_id', $request->session);
            }
            if($request->program != 0){
                $enrolls->where('program_id', $request->program);
            }
            if($request->semester != 0){
                $enrolls->where('semester_id', $request->semester);
            }
            if($request->section != 0){
                $enrolls->where('section_id', $request->section);
            }
            $enrolls->with('subjects')->whereHas('subjects', function ($query) use ($subject){
                $query->where('subject_id', $subject);
            });
            $rows = $enrolls->orderBy('id', 'desc')->get();


            // Student Assignment
            foreach($rows as $row){
                $studentAssignment = new StudentAssignment();
                $studentAssignment->student_enroll_id = $row->id;
                $studentAssignment->assignment_id = $assignment->id;
                $studentAssignment->created_by = Auth::guard('web')->user()->id;
                $studentAssignment->save();
            }
            DB::commit();
            

            Toastr::success(__('msg_created_successfully'), __('msg_success'));

            return redirect()->route($this->route.'.index');
        }
        catch(\Exception $e){
            
            Toastr::error(__('msg_created_error'), __('msg_error'));

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        
        // Access Data
        $teacher_id = Auth::guard('web')->user()->id;
        $user = User::where('id', $teacher_id)->where('status', '1');
        $user->with('roles')->whereHas('roles', function ($query){
            $query->where('slug', 'super-admin');
        });
        $superAdmin = $user->first();


        // Filter Assignment
        $assignment = Assignment::where('id', $id);
        if(!isset($superAdmin)){
            $assignment->where('assign_by', $teacher_id);
        }
        $data['row'] = $assignment->firstOrFail();

        return view($this->view.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;


        // Access Data
        $teacher_id = Auth::guard('web')->user()->id;
        $user = User::where('id', $teacher_id)->where('status', '1');
        $user->with('roles')->whereHas('roles', function ($query){
            $query->where('slug', 'super-admin');
        });
        $superAdmin = $user->first();


        // Filter Assignment
        $assignment = Assignment::where('id', $id);
        if(!isset($superAdmin)){
            $assignment->where('assign_by', $teacher_id);
        }
        $data['row'] = $assignment->firstOrFail();

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        // Field Validation
        $request->validate([
            'title' => 'required',
            'total_marks' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);


        // Update Data
        $assignment->title = $request->title;
        $assignment->description = $request->description;
        $assignment->total_marks = $request->total_marks;
        // $assignment->start_date = $request->start_date;
        $assignment->end_date = $request->end_date;
        $assignment->attach = $this->updateMedia($request, 'attach', $this->path, $assignment);
        $assignment->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        DB::beginTransaction();
        // Delete Attach
        $this->deleteMedia($this->path, $assignment);

        // Delete Student Assignment
        $rows = StudentAssignment::where('assignment_id', $assignment->id)->get();
        foreach($rows as $row){
            $this->deleteMedia($this->path, $row);
            $row->delete();
        }

        // Delete Notification
        DB::table('notifications')->where('type', 'App\Notifications\AssignmentNotification')->where('data->id', $assignment->id)->delete();

        // Delete data
        $assignment->delete();
        DB::commit();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function marking(Request $request)
    {
        // Field Validation
        $request->validate([
            'assignments' => 'required',
            'marks' => 'required',
        ]);


        // Update Data
        foreach($request->assignments as $key => $assignment_id){

            if($request->marks[$key] == null || $request->marks[$key] == ''){
                $assignment_mark = Null;
            }
            else{
                $assignment_mark =  $request->marks[$key];
            }

            $assignment = StudentAssignment::find($assignment_id);
            $assignment->marks = $assignment_mark;
            $assignment->updated_by = Auth::id();
            $assignment->save();
        }


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
