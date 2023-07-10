<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostalExchangeType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Toastr;

class PostalExchangeTypeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_postal_type', 1);
        $this->route = 'admin.postal-type';
        $this->view = 'admin.postal-type';
        $this->path = 'postal-type';
        $this->access = 'postal-type';


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
        
        $data['rows'] = PostalExchangeType::orderBy('title', 'asc')->get();

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
            'title' => 'required|max:191|unique:postal_exchange_types,title',
        ]);

        // Insert Data
        $postalExchangeType = new PostalExchangeType;
        $postalExchangeType->title = $request->title;
        $postalExchangeType->slug = Str::slug($request->title, '-');
        $postalExchangeType->description = $request->description;
        $postalExchangeType->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PostalExchangeType $postalExchangeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PostalExchangeType $postalExchangeType)
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
    public function update(Request $request, $id)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:postal_exchange_types,title,'.$id,
        ]);

        // Update Data
        $postalExchangeType = PostalExchangeType::find($id);
        $postalExchangeType->title = $request->title;
        $postalExchangeType->slug = Str::slug($request->title, '-');
        $postalExchangeType->description = $request->description;
        $postalExchangeType->status = $request->status;
        $postalExchangeType->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete Data
        $postalExchangeType = PostalExchangeType::find($id);
        $postalExchangeType->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
