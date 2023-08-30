<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NotifyStudentJob;
use App\Models\StudentEnroll;
use Illuminate\Http\Request;
use App\Models\MailSetting;
use App\Models\EmailNotify;
use App\Models\Faculty;
use Toastr;
use Auth;
use DB;

class EmailNotifyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_email_notify', 1);
        $this->route = 'admin.email-notify';
        $this->view = 'admin.email-notify';
        $this->path = 'email-notify';
        $this->access = 'email-notify';


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
        $data['rows'] = EmailNotify::orderBy('id', 'desc')->get();

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
            'subject' => 'required',
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
        $emailNotify = new EmailNotify;
        $emailNotify->faculty_id = $request->faculty;
        $emailNotify->program_id = $request->program;
        $emailNotify->session_id = $request->session;
        $emailNotify->semester_id = $request->semester;
        $emailNotify->section_id = $request->section;
        $emailNotify->subject = $request->subject;
        $emailNotify->message = $request->message;
        $emailNotify->receive_count = $rows->count();
        $emailNotify->created_by = Auth::guard('web')->user()->id;
        $emailNotify->save();


        $mail = MailSetting::where('status', '1')->first();

        if(isset($mail->sender_email) && isset($mail->sender_name)){
            // Queue mail job
            foreach($rows as $key =>$row){
                
                // Mail Data
                $data['row'] = $row;
                $data['email'] = $row->student->email;
                $data['name'] = $row->student->first_name.' '.$row->student->last_name;
                $data['from'] = $mail->sender_email;
                $data['sender'] = $mail->sender_name;
                $data['subject'] = $request->subject;
                $data['message'] = $request->message;

                dispatch(new NotifyStudentJob($data));
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
    public function show(EmailNotify $emailNotify)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailNotify $emailNotify)
    {
        // Delete Data
        $emailNotify->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}