<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ComplainSource;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\ComplainType;
use App\Models\Complain;
use Carbon\Carbon;
use App\User;
use Toastr;
use Auth;

class ComplainController extends Controller
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
        $this->title = trans_choice('module_complain', 1);
        $this->route = 'admin.complain';
        $this->view = 'admin.complain';
        $this->path = 'complain';
        $this->access = 'complain';


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

        if(!empty($request->source) || $request->source != null){
            $data['selected_source'] = $source = $request->source;
        }
        else{
            $data['selected_source'] = $source = '0';
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
            $data['selected_start_date'] = $start_date = date('Y-m-d', strtotime(Carbon::now()->subYear()));
        }

        if(!empty($request->end_date) || $request->end_date != null){
            $data['selected_end_date'] = $end_date = $request->end_date;
        }
        else{
            $data['selected_end_date'] = $end_date = date('Y-m-d', strtotime(Carbon::today()));
        }


        // Search Filter
        $data['types'] = ComplainType::where('status', '1')
                        ->orderBy('title', 'asc')->get();
        $data['sources'] = ComplainSource::where('status', '1')
                        ->orderBy('title', 'asc')->get();

        $rows = Complain::whereDate('date', '>=', $start_date)
                    ->whereDate('date', '<=', $end_date);
                    if(!empty($request->type) || $request->type != null){
                        $rows->where('type_id', $type);
                    }
                    if(!empty($request->source) || $request->source != null){
                        $rows->where('source_id', $source);
                    }
                    if(!empty($request->status) || $request->status != null){
                        $rows->where('status', $status);
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

        $data['types'] = ComplainType::where('status', '1')
                        ->orderBy('title', 'asc')->get();
        $data['sources'] = ComplainSource::where('status', '1')
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
            'email' => 'nullable|email',
            'date' => 'required|date|before_or_equal:today',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);


        //Insert Data
        $complain = new Complain;
        $complain->type_id = $request->type;
        $complain->source_id = $request->source;
        $complain->name = $request->name;
        $complain->father_name = $request->father_name;
        $complain->phone = $request->phone;
        $complain->email = $request->email;
        $complain->date = $request->date;
        $complain->action_taken = $request->action_taken;
        $complain->assigned = $request->assigned;
        $complain->issue = $request->issue;
        $complain->note = $request->note;
        $complain->attach = $this->uploadMedia($request, 'attach', $this->path);
        $complain->created_by = Auth::guard('web')->user()->id;
        $complain->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function show(Complain $complain)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $complain;

        return view($this->view.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function edit(Complain $complain)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $complain;
        $data['types'] = ComplainType::where('status', '1')
                        ->orderBy('title', 'asc')->get();
        $data['sources'] = ComplainSource::where('status', '1')
                        ->orderBy('title', 'asc')->get();
        $data['users'] = User::where('status', '1')
                        ->orderBy('staff_id', 'asc')->get();

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complain $complain)
    {
        // Field Validation
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'email' => 'nullable|email',
            'date' => 'required|date|before_or_equal:today',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);


        //Update Data
        $complain->type_id = $request->type;
        $complain->source_id = $request->source;
        $complain->name = $request->name;
        $complain->father_name = $request->father_name;
        $complain->phone = $request->phone;
        $complain->email = $request->email;
        $complain->date = $request->date;
        $complain->action_taken = $request->action_taken;
        $complain->assigned = $request->assigned;
        $complain->issue = $request->issue;
        $complain->note = $request->note;
        $complain->attach = $this->updateMedia($request, 'attach', $this->path, $complain);
        $complain->status = $request->status;
        $complain->updated_by = Auth::guard('web')->user()->id;
        $complain->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complain $complain)
    {
        // Delete Attach
        $this->deleteMedia($this->path, $complain);

        // Delete data
        $complain->delete();

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
        $complain = Complain::findOrFail($id);
        $complain->status = $request->status;
        $complain->updated_by = Auth::guard('web')->user()->id;
        $complain->save();


        Toastr::success(__('msg_status_changed'), __('msg_success'));

        return redirect()->back();
    }
}
