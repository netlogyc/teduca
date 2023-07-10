<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EnrollSubject;
use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\Program;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Faculty;
use Toastr;

class EnrollSubjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_enroll_subject', 1);
        $this->route = 'admin.enroll-subject';
        $this->view = 'admin.enroll-subject';
        $this->path = 'enroll-subject';
        $this->access = 'enroll-subject';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-create|'.$this->access.'-edit|'.$this->access.'-delete', ['only' => ['index','show']]);
        $this->middleware('permission:'.$this->access.'-create', ['only' => ['create','store']]);
        $this->middleware('permission:'.$this->access.'-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:'.$this->access.'-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['faculties'] = Faculty::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['rows'] = EnrollSubject::orderBy('id', 'desc')->get();

        return view($this->view.'.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'program' => 'required',
            'semester' => 'required',
            'section' => 'required',
            'subjects' => 'required',
        ]);

        // Insert Data
        $enrollSubject = EnrollSubject::firstOrCreate(
            ['program_id' => $request->program, 'semester_id' => $request->semester, 'section_id' => $request->section],
            ['program_id' => $request->program, 'semester_id' => $request->semester, 'section_id' => $request->section]
        );

        // Attach Update
        $enrollSubject->subjects()->sync($request->subjects);

        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(EnrollSubject $enrollSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EnrollSubject $enrollSubject)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;


        $data['row'] = $enrollSubject;
        $data['rows'] = EnrollSubject::orderBy('id', 'desc')->get();

        $data['faculties'] = Faculty::where('status', '1')->orderBy('title', 'asc')->get();
        $data['programs'] = Program::where('faculty_id', $enrollSubject->program->faculty_id)->where('status', '1')->orderBy('title', 'asc')->get();

        $semesters = Semester::where('status', 1);
        $semesters->with('programs')->whereHas('programs', function ($query) use ($enrollSubject){
            $query->where('program_id', $enrollSubject->program_id);
        });
        $data['semesters'] = $semesters->orderBy('id', 'asc')->get();

        $sections = Section::where('status', 1);
        $sections->with('semesterPrograms')->whereHas('semesterPrograms', function ($query) use ($enrollSubject){
            $query->where('program_id', $enrollSubject->program_id);
            $query->where('semester_id', $enrollSubject->semester_id);
        });
        $data['sections'] = $sections->orderBy('title', 'asc')->get();

        $subjects = Subject::where('status', 1);
        $subjects->with('programs')->whereHas('programs', function ($query) use ($enrollSubject){
            $query->where('program_id', $enrollSubject->program_id);
        });
        $data['subjects'] = $subjects->orderBy('code', 'asc')->get();


        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EnrollSubject $enrollSubject)
    {
        // Field Validation
        $request->validate([
            'program' => 'required',
            'semester' => 'required',
            'section' => 'required',
            'subjects' => 'required',
        ]);

        $enroll = EnrollSubject::where('id', '!=', $enrollSubject->id)->where('program_id', $request->program)->where('semester_id', $request->semester)->where('section_id', $request->section)->first();

        if(isset($enroll)){
            Toastr::error(__('msg_data_already_exists'), __('msg_error'));
        }
        else
        {
            // Update Data
            $enrollSubject->program_id = $request->program;
            $enrollSubject->semester_id = $request->semester;
            $enrollSubject->section_id = $request->section;
            $enrollSubject->save();

            // Attach Update
            $enrollSubject->subjects()->sync($request->subjects);

            Toastr::success(__('msg_updated_successfully'), __('msg_success'));
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EnrollSubject $enrollSubject)
    {
        // Detach
        $enrollSubject->subjects()->detach();

        // Delete Data
        $enrollSubject->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }
}
