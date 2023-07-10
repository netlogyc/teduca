<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\LeaveType;
use App\Models\Leave;
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
        $this->route = 'admin.staff-leave';
        $this->view = 'admin.staff-leave';
        $this->path = 'staff-leave';
        $this->access = 'staff-leave';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-create|'.$this->access.'-delete', ['only' => ['index','show']]);
        $this->middleware('permission:'.$this->access.'-create', ['only' => ['create','store']]);
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
        
        $data['rows'] = Leave::where('user_id', Auth::guard('web')->user()->id)
                        ->orderBy('id', 'desc')->get();

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

        $data['types'] = LeaveType::where('status', '1')->orderBy('title', 'asc')->get();

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
            'apply_date' => 'required|date|before_or_equal:today',
            'type' => 'required',
            'from_date' => 'required|date|after_or_equal:today',
            'to_date' => 'required|date|after_or_equal:from_date',
            'pay_type' => 'required',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);


        //Insert Data
        $leave = new Leave;
        $leave->user_id = Auth::guard('web')->user()->id;
        $leave->type_id = $request->type;
        $leave->apply_date = Carbon::today();
        $leave->from_date = $request->from_date;
        $leave->to_date = $request->to_date;
        $leave->reason = $request->reason;
        $leave->pay_type = $request->pay_type;
        $leave->attach = $this->uploadMedia($request, 'attach', $this->path);
        $leave->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $leave = Leave::findOrFail($id);

        if($leave->status == 0){
            
            // Delete Attach
            $this->deleteMedia($this->path, $leave);

            // Delete data
            $leave->delete();


            Toastr::success(__('msg_deleted_successfully'), __('msg_success'));
        }
        else{
            Toastr::error(__('msg_deleted_fail'), __('msg_error'));
        }

        return redirect()->back();
    }
}
