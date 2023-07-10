<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\StatusType;
use Toastr;

class StatusTypeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_status_type', 1);
        $this->route = 'admin.status-type';
        $this->view = 'admin.status-type';
        $this->path = 'status-type';
        $this->access = 'status-type';


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
    public function index()
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;
        
        $data['rows'] = StatusType::orderBy('title', 'asc')->get();

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
            'title' => 'required|max:191|unique:status_types,title',
        ]);

        // Insert Data
        $statusType = new StatusType;
        $statusType->title = $request->title;
        $statusType->slug = Str::slug($request->title, '-');
        $statusType->description = $request->description;
        $statusType->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusType  $statusType
     * @return \Illuminate\Http\Response
     */
    public function show(StatusType $statusType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusType  $statusType
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusType $statusType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StatusType  $statusType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusType $statusType)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:status_types,title,'.$statusType->id,
        ]);

        // Update Data
        $statusType->title = $request->title;
        $statusType->slug = Str::slug($request->title, '-');
        $statusType->description = $request->description;
        $statusType->status = $request->status;
        $statusType->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusType  $statusType
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusType $statusType)
    {
        // Delete Data
        $statusType->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
