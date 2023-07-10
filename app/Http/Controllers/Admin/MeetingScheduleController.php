<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MeetingSchedule;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\MeetingType;
use Carbon\Carbon;
use App\User;
use Toastr;
use Auth;

class MeetingScheduleController extends Controller
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
        $this->title = trans_choice('module_meeting', 1);
        $this->route = 'admin.meeting';
        $this->view = 'admin.meeting';
        $this->path = 'meeting';
        $this->access = 'meeting';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-create|'.$this->access.'-edit|'.$this->access.'-delete', ['only' => ['index','show','status']]);
        $this->middleware('permission:'.$this->access.'-create', ['only' => ['create','store','status']]);
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


        if(!empty($request->type) || $request->type != null){
            $data['selected_type'] = $type = $request->type;
        }
        else{
            $data['selected_type'] = $type = '0';
        }

        if(!empty($request->user) || $request->user != null){
            $data['selected_user'] = $user = $request->user;
        }
        else{
            $data['selected_user'] = $user = '0';
        }

        if(!empty($request->status) || $request->status != null){
            $data['selected_status'] = $status = $request->status;
        }
        else{
            $data['selected_status'] = $status = '99';
        }

        if(!empty($request->start_date) || $request->start_date != null){
            $data['selected_start_date'] = $start_date = $request->start_date;
        }
        else{
            $data['selected_start_date'] = $start_date = date('Y-m-d', strtotime(Carbon::now()));
        }

        if(!empty($request->end_date) || $request->end_date != null){
            $data['selected_end_date'] = $end_date = $request->end_date;
        }
        else{
            $data['selected_end_date'] = $end_date = date('Y-m-d', strtotime(Carbon::today()->addYear()));
        }


        // Search Filter
        $data['types'] = MeetingType::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['users'] = User::where('status', '1')
                            ->orderBy('staff_id', 'asc')->get();

        $rows = MeetingSchedule::whereDate('date', '>=', $start_date)
                    ->whereDate('date', '<=', $end_date);
                    if(!empty($request->type) || $request->type != null){
                        $rows->where('type_id', $type);
                    }
                    if(!empty($request->user) || $request->user != null){
                        $rows->where('user_id', $user);
                    }
                    if(!empty($request->status) || $request->status != null){
                        $rows->where('status', $status);
                    }
        $data['rows'] = $rows->orderBy('id', 'desc')->get();

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

        $data['types'] = MeetingType::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['users'] = User::where('status', '1')
                            ->orderBy('staff_id', 'asc')->get();

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
            'type' => 'required',
            'name' => 'required',
            'date' => 'required|date|after_or_equal:today',
            'persons' => 'required|numeric',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);


        // Insert Data
        $meetingSchedule = new MeetingSchedule;
        $meetingSchedule->type_id = $request->type;
        $meetingSchedule->user_id = $request->user;
        $meetingSchedule->name = $request->name;
        $meetingSchedule->father_name = $request->father_name;
        $meetingSchedule->phone = $request->phone;
        $meetingSchedule->email = $request->email;
        $meetingSchedule->address = $request->address;
        $meetingSchedule->purpose = $request->purpose;
        $meetingSchedule->id_no = $request->id_no;
        $meetingSchedule->date = $request->date;
        $meetingSchedule->in_time = date('H:i:s', strtotime($request->in_time));
        $meetingSchedule->out_time = $request->out_time;
        $meetingSchedule->persons = $request->persons;
        $meetingSchedule->note = $request->note;
        $meetingSchedule->attach = $this->uploadMedia($request, 'attach', $this->path);
        $meetingSchedule->created_by = Auth::guard('web')->user()->id;
        $meetingSchedule->save();

        // Set Token
        $meetingSchedule->token = 'Pass-'. (intval($meetingSchedule->id) + intval(100000));
        $meetingSchedule->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
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

        $data['row'] = MeetingSchedule::find($id);

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

        $data['row'] = MeetingSchedule::find($id);
        $data['types'] = MeetingType::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['users'] = User::where('status', '1')
                            ->orderBy('staff_id', 'asc')->get();

        return view($this->view.'.edit', $data);
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
            'type' => 'required',
            'name' => 'required',
            'date' => 'required|date',
            'persons' => 'required|numeric',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);


        // Update Data
        $meetingSchedule = MeetingSchedule::find($id);
        $meetingSchedule->type_id = $request->type;
        $meetingSchedule->user_id = $request->user;
        $meetingSchedule->name = $request->name;
        $meetingSchedule->father_name = $request->father_name;
        $meetingSchedule->phone = $request->phone;
        $meetingSchedule->email = $request->email;
        $meetingSchedule->address = $request->address;
        $meetingSchedule->purpose = $request->purpose;
        $meetingSchedule->id_no = $request->id_no;
        $meetingSchedule->date = $request->date;
        $meetingSchedule->in_time = $request->in_time;
        $meetingSchedule->out_time = $request->out_time;
        $meetingSchedule->persons = $request->persons;
        $meetingSchedule->note = $request->note;
        $meetingSchedule->status = $request->status;
        $meetingSchedule->attach = $this->updateMedia($request, 'attach', $this->path, $meetingSchedule);
        $meetingSchedule->updated_by = Auth::guard('web')->user()->id;
        $meetingSchedule->save();


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
        // Delete Data
        $meetingSchedule = MeetingSchedule::find($id);
        $this->deleteMedia($this->path, $meetingSchedule);

        $meetingSchedule->delete();

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

        
        // Status Update
        $meetingSchedule = MeetingSchedule::findOrFail($id);
        $meetingSchedule->status = $request->status;
        $meetingSchedule->updated_by = Auth::guard('web')->user()->id;
        $meetingSchedule->save();


        Toastr::success(__('msg_status_changed'), __('msg_success'));

        return redirect()->back();
    }
}
