<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentEnroll;
use Illuminate\Http\Request;
use App\Jobs\SMSSenderJob;
use App\Models\SMSSetting;
use App\Models\SMSNotify;
use App\Models\Faculty;
use Toastr;
use Auth;
use DB;

class SMSNotifyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_sms_notify', 1);
        $this->route = 'admin.sms-notify';
        $this->view = 'admin.sms-notify';
        $this->path = 'sms-notify';
        $this->access = 'sms-notify';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-create|'.$this->access.'-delete', ['only' => ['index','show']]);
        $this->middleware('permission:'.$this->access.'-create', ['only' => ['create','store']]);
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

        $data['faculties'] = Faculty::where('status', '1')->orderBy('title', 'asc')->get();
        $data['rows'] = SMSNotify::orderBy('id', 'desc')->get();

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
            'program' => 'required',
            'session' => 'required',
            'semester' => 'required',
            'section' => 'required',
            'message' => 'required',
        ]);


        // Set Value
        $faculty = $request->faculty;
        $program = $request->program;
        $session = $request->session;
        $semester = $request->semester;
        $section = $request->section;

        // Student Filter
        $enrolls = StudentEnroll::where('status', '1');
        if($faculty != 0){
            $enrolls->with('program')->whereHas('program', function ($query) use ($faculty){
                $query->where('faculty_id', $faculty);
            });
        }
        if($program != 0){
            $enrolls->where('program_id', $program);
        }
        if($session != 0){
            $enrolls->where('session_id', $session);
        }
        if($semester != 0){
            $enrolls->where('semester_id', $semester);
        }
        if($section != 0){
            $enrolls->where('section_id', $section);
        }
        $enrolls->with('student')->whereHas('student', function ($query){
            $query->where('status', '1');
            $query->orderBy('student_id', 'asc');
        });
        $rows = $enrolls->get();


        DB::beginTransaction();
        // Insert Data
        $sMSNotify = new SMSNotify;
        $sMSNotify->faculty_id = $request->faculty;
        $sMSNotify->program_id = $request->program;
        $sMSNotify->session_id = $request->session;
        $sMSNotify->semester_id = $request->semester;
        $sMSNotify->section_id = $request->section;
        $sMSNotify->message = $request->message;
        $sMSNotify->receive_count = $rows->count();
        $sMSNotify->created_by = Auth::guard('web')->user()->id;
        $sMSNotify->save();


        $sms = SMSSetting::where('status', '!=', '0')->first();

        if(isset($sms)){
            // Queue SMS job
            foreach($rows as $key =>$row){
                
                // SMS Data
                $data['row'] = $row;
                $data['phone'] = str_replace(array('(',')','+','_','-',' '), '', $row->student->phone);
                $data['message'] = strip_tags($request->message);

                dispatch(new SMSSenderJob($data));
            }

            Toastr::success(__('msg_sent_successfully'), __('msg_success'));
        }
        else{
            Toastr::success(__('msg_receiver_not_found'), __('msg_success'));
        }
        DB::commit();


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SMSNotify $sMSNotify)
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
        // Delete Data
        $sMSNotify = SMSNotify::find($id);
        $sMSNotify->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
