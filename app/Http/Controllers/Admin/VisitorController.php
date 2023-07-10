<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisitPurpose;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\PrintSetting;
use App\Models\Department;
use App\Models\Visitor;
use Carbon\Carbon;
use Toastr;
use Auth;

class VisitorController extends Controller
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
        $this->title = trans_choice('module_visitor_log', 1);
        $this->route = 'admin.visitor';
        $this->view = 'admin.visitor';
        $this->path = 'visitor';
        $this->access = 'visitor';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-create|'.$this->access.'-edit|'.$this->access.'-delete|'.$this->access.'-print', ['only' => ['index','show','outTime']]);
        $this->middleware('permission:'.$this->access.'-create', ['only' => ['create','store']]);
        $this->middleware('permission:'.$this->access.'-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:'.$this->access.'-delete', ['only' => ['destroy']]);
        $this->middleware('permission:'.$this->access.'-print', ['only' => ['tokenPrint']]);
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


        if(!empty($request->purpose) || $request->purpose != null){
            $data['selected_purpose'] = $purpose = $request->purpose;
        }
        else{
            $data['selected_purpose'] = $purpose = '0';
        }

        if(!empty($request->department) || $request->department != null){
            $data['selected_department'] = $department = $request->department;
        }
        else{
            $data['selected_department'] = $department = '0';
        }

        if(!empty($request->token) || $request->token != null){
            $data['selected_token'] = $token = $request->token;
        }
        else{
            $data['selected_token'] = $token = null;
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
        $data['purposes'] = VisitPurpose::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['departments'] = Department::where('status', '1')
                            ->orderBy('title', 'asc')->get();

        $rows = Visitor::whereDate('date', '>=', $start_date)
                    ->whereDate('date', '<=', $end_date);
                    if(!empty($request->purpose) || $request->purpose != null){
                        $rows->where('purpose_id', $purpose);
                    }
                    if(!empty($request->department) || $request->department != null){
                        $rows->where('department_id', $department);
                    }
                    if(!empty($request->token) || $request->token != null){
                        $rows->where('token', 'LIKE', '%'.$token.'%');
                    }
        $data['rows'] = $rows->orderBy('id', 'desc')->get();

        $data['print'] = PrintSetting::where('slug', 'visitor-token')->first();

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

        $data['purposes'] = VisitPurpose::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['departments'] = Department::where('status', '1')
                            ->orderBy('title', 'asc')->get();

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
            'purpose' => 'required',
            'name' => 'required',
            'date' => 'required|date|before_or_equal:today',
            'persons' => 'required|numeric',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);


        // Insert Data
        $visitor = new Visitor;
        $visitor->purpose_id = $request->purpose;
        $visitor->department_id = $request->department;
        $visitor->name = $request->name;
        $visitor->father_name = $request->father_name;
        $visitor->phone = $request->phone;
        $visitor->email = $request->email;
        $visitor->address = $request->address;
        $visitor->visit_from = $request->visit_from;
        $visitor->id_no = $request->id_no;
        $visitor->date = $request->date;
        $visitor->in_time = date('H:i:s', strtotime($request->in_time));
        $visitor->out_time = $request->out_time;
        $visitor->persons = $request->persons;
        $visitor->note = $request->note;
        $visitor->attach = $this->uploadMedia($request, 'attach', $this->path);
        $visitor->created_by = Auth::guard('web')->user()->id;
        $visitor->save();

        // Set Token
        $visitor->token = 'Pass-'. (intval($visitor->id) + intval(100000));
        $visitor->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $visitor;

        return view($this->view.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $visitor;
        $data['purposes'] = VisitPurpose::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['departments'] = Department::where('status', '1')
                            ->orderBy('title', 'asc')->get();

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        // Field Validation
        $request->validate([
            'purpose' => 'required',
            'name' => 'required',
            'date' => 'required|date|before_or_equal:today',
            'persons' => 'required|numeric',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);


        // Update Data
        $visitor->purpose_id = $request->purpose;
        $visitor->department_id = $request->department;
        $visitor->name = $request->name;
        $visitor->father_name = $request->father_name;
        $visitor->phone = $request->phone;
        $visitor->email = $request->email;
        $visitor->address = $request->address;
        $visitor->visit_from = $request->visit_from;
        $visitor->id_no = $request->id_no;
        $visitor->date = $request->date;
        $visitor->in_time = $request->in_time;
        $visitor->out_time = $request->out_time;
        $visitor->persons = $request->persons;
        $visitor->note = $request->note;
        $visitor->attach = $this->updateMedia($request, 'attach', $this->path, $visitor);
        $visitor->updated_by = Auth::guard('web')->user()->id;
        $visitor->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        // Delete Data
        $this->deleteMedia($this->path, $visitor);

        $visitor->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function outTime($id)
    {
        // Visitor Exit Time Update
        $visitor = Visitor::findOrFail($id);
        $visitor->out_time = date("H:i:s");
        $visitor->updated_by = Auth::guard('web')->user()->id;
        $visitor->save();

        Toastr::success(__('msg_status_changed'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tokenPrint($id)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = 'print-setting';

        // View
        $data['print'] = PrintSetting::where('slug', 'visitor-token')->firstOrFail();
        $data['row'] = Visitor::findOrFail($id);

        return view($this->view.'.print', $data);
    }
}
