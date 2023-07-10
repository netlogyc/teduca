<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhoneLog;
use Carbon\Carbon;
use Toastr;
use Auth;

class PhoneLogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_phone_log', 1);
        $this->route = 'admin.phone-log';
        $this->view = 'admin.phone-log';
        $this->path = 'phone-log';
        $this->access = 'phone-log';


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


        if(!empty($request->call_type) || $request->call_type != null){
            $data['selected_call_type'] = $call_type = $request->call_type;
        }
        else{
            $data['selected_call_type'] = $call_type = '0';
        }

        if(!empty($request->phone) || $request->phone != null){
            $data['selected_phone'] = $phone = $request->phone;
        }
        else{
            $data['selected_phone'] = $phone = null;
        }

        if(!empty($request->start_date) || $request->start_date != null){
            $data['selected_start_date'] = $start_date = $request->start_date;
        }
        else{
            $data['selected_start_date'] = $start_date = date('Y-m-d', strtotime(Carbon::now()->subYear()));
        }

        if(!empty($request->end_date) || $request->end_date != null){
            $data['selected_end_date'] = $end_date = $request->end_date;
        }
        else{
            $data['selected_end_date'] = $end_date = date('Y-m-d', strtotime(Carbon::today()));
        }


        // Search Filter
        $rows = PhoneLog::whereDate('date', '>=', $start_date)
                    ->whereDate('date', '<=', $end_date);
                    if(!empty($request->call_type) || $request->call_type != null){
                        $rows->where('call_type', $call_type);
                    }
                    if(!empty($request->phone) || $request->phone != null){
                        $rows->where('phone', 'LIKE', '%'.$phone.'%');
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
            'name' => 'required',
            'phone' => 'required',
            'date' => 'required|date|before_or_equal:today',
            'follow_up_date' => 'nullable|date|after_or_equal:date',
            'purpose' => 'required',
            'call_type' => 'required',
        ]);


        // Insert Data
        $phoneLog = new PhoneLog;
        $phoneLog->name = $request->name;
        $phoneLog->phone = $request->phone;
        $phoneLog->date = $request->date;
        $phoneLog->follow_up_date = $request->follow_up_date;
        $phoneLog->call_duration = $request->call_duration;
        $phoneLog->start_time = date('H:i:s', strtotime($request->start_time));
        $phoneLog->end_time = $request->end_time;
        $phoneLog->purpose = $request->purpose;
        $phoneLog->note = $request->note;
        $phoneLog->call_type = $request->call_type;
        $phoneLog->created_by = Auth::guard('web')->user()->id;
        $phoneLog->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PhoneLog  $phoneLog
     * @return \Illuminate\Http\Response
     */
    public function show(PhoneLog $phoneLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhoneLog  $phoneLog
     * @return \Illuminate\Http\Response
     */
    public function edit(PhoneLog $phoneLog)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $phoneLog;

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PhoneLog  $phoneLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhoneLog $phoneLog)
    {
        // Field Validation
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'date' => 'required|date|before_or_equal:today',
            'follow_up_date' => 'nullable|date|after_or_equal:date',
            'purpose' => 'required',
            'call_type' => 'required',
        ]);


        // Update Data
        $phoneLog->name = $request->name;
        $phoneLog->phone = $request->phone;
        $phoneLog->date = $request->date;
        $phoneLog->follow_up_date = $request->follow_up_date;
        $phoneLog->call_duration = $request->call_duration;
        $phoneLog->start_time = $request->start_time;
        $phoneLog->end_time = $request->end_time;
        $phoneLog->purpose = $request->purpose;
        $phoneLog->note = $request->note;
        $phoneLog->call_type = $request->call_type;
        $phoneLog->updated_by = Auth::guard('web')->user()->id;
        $phoneLog->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PhoneLog  $phoneLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhoneLog $phoneLog)
    {
        // Delete Data
        $phoneLog->delete();
        
        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
