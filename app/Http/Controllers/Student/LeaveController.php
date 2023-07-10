<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\StudentLeave;
use Carbon\Carbon;
use Toastr;
use Auth;

class LeaveController extends Controller
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
        $this->title = trans_choice('module_apply_leave', 1);
        $this->route = 'student.leave';
        $this->view = 'student.leave';
        $this->path = 'leave';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['view']      = $this->view;
        $data['path']      = $this->path;
        
        $data['rows'] = StudentLeave::where('student_id', Auth::guard('student')->user()->id)->orderBy('id', 'desc')->get();

        return view($this->view.'.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

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
            'subject' => 'required',
            'apply_date' => 'required|date|before_or_equal:today',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);


        //Insert Data
        $leave = new StudentLeave;
        $leave->student_id = Auth::guard('student')->id();
        $leave->apply_date = Carbon::today();
        $leave->from_date = $request->from_date;
        $leave->to_date = $request->to_date;
        $leave->subject = $request->subject;
        $leave->reason = $request->reason;
        $leave->attach = $this->uploadMedia($request, 'attach', $this->path);
        $leave->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentLeave  $studentLeave
     * @return \Illuminate\Http\Response
     */
    public function show(StudentLeave $studentLeave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentLeave  $studentLeave
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentLeave $studentLeave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentLeave  $studentLeave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentLeave $studentLeave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentLeave  $studentLeave
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $studentLeave = StudentLeave::findOrFail($id);

        if($studentLeave->status == 0){
        // Delete Attach
        $this->deleteMedia($this->path, $studentLeave);

        // Delete data
        $studentLeave->delete();

            Toastr::success(__('msg_deleted_successfully'), __('msg_success'));
        }
        else{
            Toastr::error(__('msg_deleted_fail'), __('msg_error'));
        }

        return redirect()->back();
    }
}
