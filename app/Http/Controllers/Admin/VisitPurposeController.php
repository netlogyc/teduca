<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisitPurpose;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Toastr;

class VisitPurposeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_visit_purpose', 1);
        $this->route = 'admin.visit-purpose';
        $this->view = 'admin.visit-purpose';
        $this->path = 'visit-purpose';
        $this->access = 'visit-purpose';


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
        
        $data['rows'] = VisitPurpose::orderBy('title', 'asc')->get();

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
            'title' => 'required|max:191|unique:visit_purposes,title',
        ]);

        // Insert Data
        $visitPurpose = new VisitPurpose;
        $visitPurpose->title = $request->title;
        $visitPurpose->slug = Str::slug($request->title, '-');
        $visitPurpose->description = $request->description;
        $visitPurpose->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(VisitPurpose $visitPurpose)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(VisitPurpose $visitPurpose)
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
    public function update(Request $request, VisitPurpose $visitPurpose)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:visit_purposes,title,'.$visitPurpose->id,
        ]);

        // Update Data
        $visitPurpose->title = $request->title;
        $visitPurpose->slug = Str::slug($request->title, '-');
        $visitPurpose->description = $request->description;
        $visitPurpose->status = $request->status;
        $visitPurpose->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisitPurpose $visitPurpose)
    {
        // Delete Data
        $visitPurpose->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
