<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EnquiryReference;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Toastr;

class EnquiryReferenceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_enquiry_reference', 1);
        $this->route = 'admin.enquiry-reference';
        $this->view = 'admin.enquiry-reference';
        $this->path = 'enquiry-reference';
        $this->access = 'enquiry-reference';


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
        
        $data['rows'] = EnquiryReference::orderBy('title', 'asc')->get();

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
            'title' => 'required|max:191|unique:enquiry_references,title',
        ]);

        // Insert Data
        $enquiryReference = new EnquiryReference;
        $enquiryReference->title = $request->title;
        $enquiryReference->slug = Str::slug($request->title, '-');
        $enquiryReference->description = $request->description;
        $enquiryReference->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(EnquiryReference $enquiryReference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EnquiryReference $enquiryReference)
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
    public function update(Request $request, EnquiryReference $enquiryReference)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:enquiry_references,title,'.$enquiryReference->id,
        ]);

        // Update Data
        $enquiryReference->title = $request->title;
        $enquiryReference->slug = Str::slug($request->title, '-');
        $enquiryReference->description = $request->description;
        $enquiryReference->status = $request->status;
        $enquiryReference->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EnquiryReference $enquiryReference)
    {
        // Delete Data
        $enquiryReference->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
