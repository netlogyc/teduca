<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\MeetingType;
use Toastr;

class MeetingTypeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_meeting_type', 1);
        $this->route = 'admin.meeting-type';
        $this->view = 'admin.meeting-type';
        $this->path = 'meeting-type';
        $this->access = 'meeting-type';


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
        
        $data['rows'] = MeetingType::orderBy('title', 'asc')->get();

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
            'title' => 'required|max:191|unique:meeting_types,title',
        ]);

        // Insert Data
        $meetingType = new MeetingType;
        $meetingType->title = $request->title;
        $meetingType->slug = Str::slug($request->title, '-');
        $meetingType->description = $request->description;
        $meetingType->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MeetingType $meetingType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MeetingType $meetingType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MeetingType $meetingType)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:meeting_types,title,'.$meetingType->id,
        ]);

        // Update Data
        $meetingType->title = $request->title;
        $meetingType->slug = Str::slug($request->title, '-');
        $meetingType->description = $request->description;
        $meetingType->status = $request->status;
        $meetingType->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeetingType $meetingType)
    {
        // Delete Data
        $meetingType->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
