<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MarksheetSetting;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Student;
use App\Models\Batch;
use App\Models\Grade;

class MarksheetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_marksheet', 1);
        $this->route = 'admin.marksheet';
        $this->view = 'admin.marksheet';
        $this->path = 'marksheet-setting';
        $this->access = 'marksheet';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-print|'.$this->access.'-download', ['only' => ['index','show']]);
        $this->middleware('permission:'.$this->access.'-print', ['only' => ['print']]);
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
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['path']      = $this->path;
        $data['access'] = $this->access;


        if(!empty($request->batch) || $request->batch != null){
            $data['selected_batch'] = $batch = $request->batch;
        }
        else{
            $data['selected_batch'] = '0';
        }

        if(!empty($request->program) || $request->program != null){
            $data['selected_program'] = $program = $request->program;
        }
        else{
            $data['selected_program'] = '0';
        }

        if(!empty($request->student_id) || $request->student_id != null){
            $data['selected_student_id'] = $student_id = $request->student_id;
        }
        else{
            $data['selected_student_id'] = null;
        }


        $data['batchs'] = Batch::where('status', '1')
                        ->orderBy('id', 'desc')->get();
        $data['programs'] = Program::where('status', '1')
                        ->orderBy('title', 'asc')->get();
        $data['grades'] = Grade::where('status', '1')
                        ->orderBy('min_mark', 'desc')->get();
        $data['print'] = MarksheetSetting::where('status', '1')->first();
        
        
        // Student List
        if(isset($request->batch) || isset($request->program) || !empty($request->student_id)){
        
            $students = Student::where('id', '!=', '0');

            if(!empty($request->batch) && $request->batch != '0'){
                $students->where('batch_id', $batch);
            }
            if(!empty($request->program) && $request->program != '0'){
                $students->where('program_id', $program);
            }
            if(!empty($request->student_id)){
                $students->where('student_id', 'LIKE', '%'.$student_id.'%');
            }
            $data['rows'] = $students->orderBy('student_id', 'asc')->get();
        }

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
        //
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
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['path']      = $this->path;
        $data['access'] = $this->access;
        
        $data['row'] = Student::findOrFail($id);
        $data['grades'] = Grade::where('status', '1')->orderBy('min_mark', 'desc')->get();

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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
        $data['grades'] = Grade::where('status', '1')->orderBy('min_mark', 'desc')->get();
        $data['marksheet'] = MarksheetSetting::where('status', '1')->firstOrFail();
        $data['row'] = Student::findOrFail($id);

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
        $data['grades'] = Grade::where('status', '1')->orderBy('min_mark', 'desc')->get();
        $data['marksheet'] = MarksheetSetting::where('status', '1')->firstOrFail();
        $data['row'] = Student::findOrFail($id);

        return view($this->view.'.download', $data);
    }
}
