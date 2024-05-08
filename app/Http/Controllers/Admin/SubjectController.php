<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Subject;
use App\Models\Faculty;
use Toastr;
use DB;

class SubjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_subject', 1);
        $this->route = 'admin.subject';
        $this->view = 'admin.subject';
        $this->path = 'subject';
        $this->access = 'subject';


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

        if(!empty($request->subject_type) || $request->subject_type != null){
            $data['selected_subject_type'] = $subject_type = $request->subject_type;
        }
        else{
            $data['selected_subject_type'] = Null;
        }

        if(!empty($request->class_type) || $request->class_type != null){
            $data['selected_class_type'] = $class_type = $request->class_type;
        }
        else{
            $data['selected_class_type'] = Null;
        }


        $data['faculties'] = Faculty::where('status', '1')->orderBy('title', 'asc')->get();
        if(!empty($request->faculty) || $request->faculty != '0'){
        $data['programs'] = Program::where('faculty_id', $request->faculty)->where('status', '1')->orderBy('title', 'asc')->get();
        }


        // Subject Search
        $subject = Subject::where('id', '!=', null);

        if(!empty($request->faculty) && $request->faculty != '0'){
            $subject->with('programs.faculty')->whereHas('programs.faculty', function ($query) use ($faculty){
                $query->where('id', $faculty);
            });
        }
        if(!empty($request->program) && $request->program != '0'){
            $subject->with('programs')->whereHas('programs', function ($query) use ($program){
                $query->where('id', $program);
            });
        }
        if(!empty($request->subject_type)){
            if($subject_type == 2){
                $subject_type = 0;
            }
            $subject->where('subject_type', $subject_type);
        }
        if(!empty($request->class_type)){
            $subject->where('class_type', $class_type);
        }

        $data['rows'] = $subject->orderBy('title', 'asc')->get();

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
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        $data['faculties'] = Faculty::where('status', '1')->orderBy('title', 'asc')->get();

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

            'title' => 'required|max:191',
            'code' => 'required|max:191',
            'field_sufficiency'=>'required',

            'credit_hour' => 'required',
            'field_intensity'=> 'required',
            'theoretical_unit'=> 'required',

            'practical_unit'=> 'required',
            'minimum_note'=> 'required|numeric|between:0,5',
            'maximum_note'=> 'required|numeric|between:0,5',
            
            'passing_grade'=> 'required|numeric|between:0,5',
            'homologable'=> 'required',
            'minimum_grade_approved'=> '',

            'class_type' => 'required',
            'subject_type' => 'required',
            'field_start'=> 'required',
            
            'field_ends'=> 'required',

        ]);


        DB::beginTransaction();
        // Insert Data
        $subject = new Subject;

        $subject->title = $request->title;
        $subject->code = $request->code;
        $subject->field_sufficiency=$request->field_sufficiency;

        $subject->credit_hour = $request->credit_hour;
        $subject->field_intensity= $request->field_intensity;
        $subject->theoretical_unit= $request->theoretical_unit;

        $subject->practical_unit= $request->practical_unit;
        $subject->minimum_note= $request->minimum_note;
        $subject->maximum_note= $request->maximum_note;

        $subject->passing_grade= $request->passing_grade;
        $subject->homologable= $request->homologable;
        $subject->minimum_grade_approved= $request->minimum_grade_approved;

        $subject->class_type = $request->class_type;
        $subject->subject_type = $request->subject_type;
        $subject->field_start= $request->field_start;

        $subject->field_ends= $request->field_ends;
        
        // $subject->total_marks = $request->total_marks;
        // $subject->passing_marks = $request->passing_marks;
        // $subject->description = $request->description;
        // $subject->practical_unit= $request->practical_unit;
        
        $subject->save();

        // Attach
        $subject->programs()->attach($request->programs);
        DB::commit();

        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $subject;

        return view($this->view.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $subject;
        $data['faculties'] = Faculty::where('status', '1')->orderBy('title', 'asc')->get();

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191',
            'code' => 'required|max:191',
            'field_sufficiency'=>'required',

            'credit_hour' => 'required',
            'field_intensity'=> 'required',
            'theoretical_unit'=> 'required',

            'practical_unit'=> 'required',
            'minimum_note'=> 'required|numeric|between:0,5',
            'maximum_note'=> 'required|numeric|between:0,5',

            'passing_grade'=> 'required|numeric|between:0,5',
            'homologable'=> 'required',
            'minimum_grade_approved'=> '',

            'class_type' => 'required',
            'subject_type' => 'required',
            'field_start'=> 'required',
            
            'field_ends'=> 'required',

        ]);


        DB::beginTransaction();
        // Update Data

        $subject->title = $request->title;
        $subject->code = $request->code;
        $subject->field_sufficiency=$request->field_sufficiency;

        $subject->credit_hour = $request->credit_hour;
        $subject->field_intensity= $request->field_intensity;
        $subject->theoretical_unit= $request->theoretical_unit;

        $subject->practical_unit= $request->practical_unit;
        $subject->minimum_note= $request->minimum_note;
        $subject->maximum_note= $request->maximum_note;

        $subject->passing_grade= $request->passing_grade;
        $subject->homologable= $request->homologable;
        $subject->minimum_grade_approved= $request->minimum_grade_approved;

        $subject->class_type = $request->class_type;
        $subject->subject_type = $request->subject_type;
        $subject->field_start= $request->field_start;

        $subject->field_ends= $request->field_ends;


        $subject->status = $request->status;

    
        // $subject->description = $request->description;
        // $subject->passing_marks = $request->passing_marks;
        // $subject->total_marks = $request->total_marks;

        // $subject->Qualification=$request->Qualification;
        // $subject->field_modality=$request->field_modality;
        // $subject->Qualifying_minimum_note=$request->Qualifying_minimum_note;


        $subject->save();

        // Attach Update
        $subject->programs()->sync($request->programs);
        DB::commit();

        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        DB::beginTransaction();
        // Detach
        $subject->programs()->detach();
        
        // Delete Data
        $subject->delete();
        DB::commit();
        
        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
