<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ComplainSource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Toastr;

class ComplainSourceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_complain_source', 1);
        $this->route = 'admin.complain-source';
        $this->view = 'admin.complain-source';
        $this->path = 'complain-source';
        $this->access = 'complain-source';


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
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;
        
        $data['rows'] = ComplainSource::orderBy('title', 'asc')->get();

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
            'title' => 'required|max:191|unique:complain_sources,title',
        ]);

        //Insert Data
        $complainSource = new ComplainSource;
        $complainSource->title = $request->title;
        $complainSource->slug = Str::slug($request->title, '-');
        $complainSource->description = $request->description;
        $complainSource->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ComplainSource  $complainSource
     * @return \Illuminate\Http\Response
     */
    public function show(ComplainSource $complainSource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ComplainSource  $complainSource
     * @return \Illuminate\Http\Response
     */
    public function edit(ComplainSource $complainSource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ComplainSource  $complainSource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComplainSource $complainSource)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:complain_sources,title,'.$complainSource->id,
        ]);

        //Update Data
        $complainSource->title = $request->title;
        $complainSource->slug = Str::slug($request->title, '-');
        $complainSource->description = $request->description;
        $complainSource->status = $request->status;
        $complainSource->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ComplainSource  $complainSource
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComplainSource $complainSource)
    {
        //Data Delete
        $complainSource->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));
        
        return redirect()->back();
    }
}
