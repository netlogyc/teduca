<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ComplainType;
use Illuminate\Support\Str;
use Toastr;

class ComplainTypeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_complain_type', 1);
        $this->route = 'admin.complain-type';
        $this->view = 'admin.complain-type';
        $this->path = 'complain-type';
        $this->access = 'complain-type';


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
        
        $data['rows'] = ComplainType::orderBy('title', 'asc')->get();

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
            'title' => 'required|max:191|unique:complain_types,title',
        ]);

        //Insert Data
        $complainType = new ComplainType;
        $complainType->title = $request->title;
        $complainType->slug = Str::slug($request->title, '-');
        $complainType->description = $request->description;
        $complainType->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ComplainType  $complainType
     * @return \Illuminate\Http\Response
     */
    public function show(ComplainType $complainType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ComplainType  $complainType
     * @return \Illuminate\Http\Response
     */
    public function edit(ComplainType $complainType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ComplainType  $complainType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComplainType $complainType)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:complain_types,title,'.$complainType->id,
        ]);

        //Update Data
        $complainType->title = $request->title;
        $complainType->slug = Str::slug($request->title, '-');
        $complainType->description = $request->description;
        $complainType->status = $request->status;
        $complainType->save();

        
        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ComplainType  $complainType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComplainType $complainType)
    {
        //Delete Data
        $complainType->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
