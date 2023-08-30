<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentLeave;
use App\Traits\FileUploader;
use Toastr;
use Auth;
use DB;

class StudentLeaveManagementController extends Controller
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
        $this->title = trans_choice('module_leave_manage', 1);
        $this->route = 'admin.student-leave-manage';
        $this->view = 'admin.student-leave-manage';
        $this->path = 'leave';
        $this->access = 'student-leave-manage';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-edit|'.$this->access.'-delete', ['only' => ['index','show']]);
        $this->middleware('permission:'.$this->access.'-edit', ['only' => ['update', 'status']]);
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
        
        $data['rows'] = StudentLeave::orderBy('id', 'desc')->get();

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
        // Field Validation
        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'status' => 'required',
        ]);


        //Update Data
        $leave = StudentLeave::findOrFail($id);
        $leave->review_by = Auth::guard('web')->user()->id;
        $leave->from_date = $request->from_date;
        $leave->to_date = $request->to_date;
        $leave->note = $request->note;
        $leave->status = $request->status;
        $leave->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
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
        $leave = StudentLeave::findOrFail($id);
        // Delete Attach
        $this->deleteMedia($this->path, $leave);

        // Delete data
        $leave->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {
        // Field Validation
        $request->validate([
            'status' => 'required',
        ]);

        //Status Update
        $leave = StudentLeave::findOrFail($id);
        $leave->status = $request->status;
        $leave->review_by = Auth::guard('web')->user()->id;
        $leave->save();


        if($request->status == 1) {
            Toastr::success(__('msg_approve_successfully'), __('msg_success'));
        }
        else {
            Toastr::success(__('msg_reject_successfully'), __('msg_success'));
        }

        return redirect()->back();
    }
}
