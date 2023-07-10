<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContentType;
use Illuminate\Support\Str;
use Toastr;

class ContentTypeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_content_type', 1);
        $this->route = 'admin.content-type';
        $this->view = 'admin.content-type';
        $this->path = 'content-type';
        $this->access = 'content-type';


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
        
        $data['rows'] = ContentType::orderBy('title', 'asc')->get();

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
            'title' => 'required|max:191|unique:content_types,title',
        ]);


        // Insert Data
        $contentType = new ContentType;
        $contentType->title = $request->title;
        $contentType->slug = Str::slug($request->title, '-');
        $contentType->description = $request->description;
        $contentType->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContentType  $contentType
     * @return \Illuminate\Http\Response
     */
    public function show(ContentType $contentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContentType  $contentType
     * @return \Illuminate\Http\Response
     */
    public function edit(ContentType $contentType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContentType  $contentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContentType $contentType)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:content_types,title,'.$contentType->id,
        ]);

        
        // Update Data
        $contentType->title = $request->title;
        $contentType->slug = Str::slug($request->title, '-');
        $contentType->description = $request->description;
        $contentType->status = $request->status;
        $contentType->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContentType  $contentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContentType $contentType)
    {
        //Data Delete
        $contentType->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
