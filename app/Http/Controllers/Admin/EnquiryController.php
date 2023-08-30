<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EnquiryReference;
use App\Models\EnquirySource;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Enquiry;
use Carbon\Carbon;
use App\User;
use Toastr;
use Auth;

class EnquiryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_enquiry', 1);
        $this->route = 'admin.enquiry';
        $this->view = 'admin.enquiry';
        $this->path = 'enquiry';
        $this->access = 'enquiry';


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


        if(!empty($request->reference) || $request->reference != null){
            $data['selected_reference'] = $reference = $request->reference;
        }
        else{
            $data['selected_reference'] = $reference = '0';
        }

        if(!empty($request->source) || $request->source != null){
            $data['selected_source'] = $source = $request->source;
        }
        else{
            $data['selected_source'] = $source = '0';
        }

        if(!empty($request->program) || $request->program != null){
            $data['selected_program'] = $program = $request->program;
        }
        else{
            $data['selected_program'] = $program = '0';
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
        $data['references'] = EnquiryReference::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['sources'] = EnquirySource::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['programs'] = Program::where('status', '1')
                            ->orderBy('title', 'asc')->get();

        $rows = Enquiry::whereDate('date', '>=', $start_date)
                    ->whereDate('date', '<=', $end_date);
                    if(!empty($request->reference) || $request->reference != null){
                        $rows->where('reference_id', $reference);
                    }
                    if(!empty($request->source) || $request->source != null){
                        $rows->where('source_id', $source);
                    }
                    if(!empty($request->program) || $request->program != null){
                        $rows->where('program_id', $program);
                    }
        $data['rows'] = $rows->orderBy('id', 'desc')->get();

        return view($this->view .'.index', $data);
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

        $data['references'] = EnquiryReference::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['sources'] = EnquirySource::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['programs'] = Program::where('status', '1')
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
            'program' => 'required',
            'name' => 'required',
            'email' => 'nullable|email',
            'date' => 'required|date|before_or_equal:today',
            'follow_up_date' => 'nullable|date|after_or_equal:today',
        ]);


        //Insert Data
        $enquiry = new Enquiry;
        $enquiry->reference_id = $request->reference;
        $enquiry->source_id = $request->source;
        $enquiry->program_id = $request->program;
        $enquiry->name = $request->name;
        $enquiry->father_name = $request->father_name;
        $enquiry->phone = $request->phone;
        $enquiry->email = $request->email;
        $enquiry->address = $request->address;
        $enquiry->purpose = $request->purpose;
        $enquiry->note = $request->note;
        $enquiry->date = $request->date;
        $enquiry->follow_up_date = $request->follow_up_date;
        $enquiry->assigned = $request->assigned;
        $enquiry->number_of_students = 1;
        $enquiry->created_by = Auth::guard('web')->user()->id;
        $enquiry->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function show(Enquiry $enquiry)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $enquiry;

        return view($this->view.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquiry $enquiry)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $enquiry;
        $data['references'] = EnquiryReference::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['sources'] = EnquirySource::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['programs'] = Program::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['users'] = User::where('status', '1')
                            ->orderBy('staff_id', 'asc')->get();

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquiry $enquiry)
    {
        // Field Validation
        $request->validate([
            'program' => 'required',
            'name' => 'required',
            'email' => 'nullable|email',
            'date' => 'required|date|before_or_equal:today',
            'follow_up_date' => 'nullable|date|after_or_equal:date',
        ]);


        //Update Data
        $enquiry->reference_id = $request->reference;
        $enquiry->source_id = $request->source;
        $enquiry->program_id = $request->program;
        $enquiry->name = $request->name;
        $enquiry->father_name = $request->father_name;
        $enquiry->phone = $request->phone;
        $enquiry->email = $request->email;
        $enquiry->address = $request->address;
        $enquiry->purpose = $request->purpose;
        $enquiry->note = $request->note;
        $enquiry->date = $request->date;
        $enquiry->follow_up_date = $request->follow_up_date;
        $enquiry->assigned = $request->assigned;
        $enquiry->number_of_students = 1;
        $enquiry->status = $request->status;
        $enquiry->updated_by = Auth::guard('web')->user()->id;
        $enquiry->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquiry $enquiry)
    {
        // Delete data
        $enquiry->delete();

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
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->status = $request->status;
        $enquiry->updated_by = Auth::guard('web')->user()->id;
        $enquiry->save();


        Toastr::success(__('msg_status_changed'), __('msg_success'));

        return redirect()->back();
    }
}
