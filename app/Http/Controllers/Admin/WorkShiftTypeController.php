<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkShiftType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Toastr;

class WorkShiftTypeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_work_shift_type', 1);
        $this->route = 'admin.work-shift-type';
        $this->view = 'admin.work-shift-type';
        $this->path = 'work-shift-type';
        $this->access = 'work-shift-type';


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
        
        $data['rows'] = WorkShiftType::orderBy('title', 'asc')->get();

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
            'title' => 'required|max:191|unique:work_shift_types,title',
        ]);


        // Insert Data
        $workShiftType = new WorkShiftType;
        $workShiftType->title = $request->title;
        $workShiftType->slug = Str::slug($request->title, '-');
        $workShiftType->description = $request->description;
        $workShiftType->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkShiftType  $workShiftType
     * @return \Illuminate\Http\Response
     */
    public function show(WorkShiftType $workShiftType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkShiftType  $workShiftType
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkShiftType $workShiftType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkShiftType  $workShiftType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkShiftType $workShiftType)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:work_shift_types,title,'.$workShiftType->id,
        ]);

        
        // Update Data
        $workShiftType->title = $request->title;
        $workShiftType->slug = Str::slug($request->title, '-');
        $workShiftType->description = $request->description;
        $workShiftType->status = $request->status;
        $workShiftType->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkShiftType  $workShiftType
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkShiftType $workShiftType)
    {
        //Data Delete
        $workShiftType->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
