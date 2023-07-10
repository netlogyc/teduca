<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Program;
use App\Models\Faculty;
use Toastr;

class ProgramController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_program', 1);
        $this->route = 'admin.program';
        $this->view = 'admin.program';
        $this->path = 'program';
        $this->access = 'program';


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
        $data['rows'] = Program::orderBy('title', 'asc')->get();

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
            'faculty' => 'required',
            'title' => 'required|max:191|unique:programs,title',
            'shortcode' => 'required|max:191|unique:programs,shortcode',
        ]);

        // Registration status
        if($request->registration == null || $request->registration != 1){
            $registration = 0;
        }
        else {
            $registration = 1;
        }

        // Insert Data
        $program = new Program;
        $program->faculty_id = $request->faculty;
        $program->title = $request->title;
        $program->slug = Str::slug($request->title, '-');
        $program->shortcode = $request->shortcode;
        $program->registration = $registration;
        $program->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        // Field Validation
        $request->validate([
            'faculty' => 'required',
            'title' => 'required|max:191|unique:programs,title,'.$program->id,
            'shortcode' => 'required|max:191|unique:programs,shortcode,'.$program->id,
        ]);

        // Registration status
        if($request->registration == null || $request->registration != 1){
            $registration = 0;
        }
        else {
            $registration = 1;
        }

        // Update Data
        $program->faculty_id = $request->faculty;
        $program->title = $request->title;
        $program->slug = Str::slug($request->title, '-');
        $program->shortcode = $request->shortcode;
        $program->registration = $registration;
        $program->status = $request->status;
        $program->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        // Delete Data
        $program->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
