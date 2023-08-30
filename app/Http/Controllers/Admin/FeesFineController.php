<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeesCategory;
use App\Models\FeesFine;
use Toastr;

class FeesFineController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_fees_fine', 1);
        $this->route = 'admin.fees-fine';
        $this->view = 'admin.fees-fine';
        $this->path = 'fees-fine';
        $this->access = 'fees-fine';


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
        
        $data['categories'] = FeesCategory::where('status', '1')->orderBy('title', 'asc')->get();
        $data['rows'] = FeesFine::orderBy('start_day', 'asc')->get();

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
        //Field Validation
        $request->validate([
            'start_day' => 'required|integer',
            'end_day' => 'required|integer',
            'amount' => 'required|numeric',
            'type' => 'required|integer',
            'categories' => 'required',
        ]);


        // Insert Data
        $feesFine = new FeesFine;
        $feesFine->start_day = $request->start_day;
        $feesFine->end_day = $request->end_day;
        $feesFine->amount = $request->amount;
        $feesFine->type = $request->type;
        $feesFine->save();

        // Create Attach
        $feesFine->feesCategories()->attach($request->categories);


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeesFine  $feesFine
     * @return \Illuminate\Http\Response
     */
    public function show(FeesFine $feesFine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeesFine  $feesFine
     * @return \Illuminate\Http\Response
     */
    public function edit(FeesFine $feesFine)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;
        
        $data['categories'] = FeesCategory::where('status', '1')->orderBy('title', 'asc')->get();
        $data['rows'] = FeesFine::orderBy('start_day', 'asc')->get();
        $data['row'] = $feesFine;

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeesFine  $feesFine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Field Validation
        $request->validate([
            'start_day' => 'required|integer',
            'end_day' => 'required|integer',
            'amount' => 'required|numeric',
            'type' => 'required|integer',
            'categories' => 'required',
        ]);


        // Update Data
        $feesFine = FeesFine::findOrFail($id);
        $feesFine->start_day = $request->start_day;
        $feesFine->end_day = $request->end_day;
        $feesFine->amount = $request->amount;
        $feesFine->type = $request->type;
        $feesFine->status = $request->status;
        $feesFine->save();

        // Update Attach
        $feesFine->feesCategories()->sync($request->categories);
        

        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeesFine  $feesFine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete Attach
        $feesFine = FeesFine::findOrFail($id);
        $feesFine->feesCategories()->detach();

        //Delete Data
        $feesFine->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
