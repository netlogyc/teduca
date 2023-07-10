<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaxSetting;
use Toastr;

class TaxSettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_tax_setting', 1);
        $this->route = 'admin.tax-setting';
        $this->view = 'admin.tax-setting';
        $this->path = 'tax-setting';
        $this->access = 'tax-setting';


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
        
        $data['rows'] = TaxSetting::orderBy('min_amount', 'asc')->get();

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
            'min_amount' => 'required|numeric|unique:tax_settings,max_amount',
            'max_amount' => 'required|numeric|unique:tax_settings,min_amount',
            'percentange' => 'required|numeric',
            'max_no_taxable_amount' => 'nullable|numeric',
        ]);


        // Duplicate Checking
        $pretaxs = TaxSetting::orderBy('min_amount', 'asc')->get();
        if(isset($pretaxs) && count($pretaxs) > 0){
        foreach($pretaxs as $pretax){
            if($pretax->min_amount < $request->min_amount && $pretax->max_amount > $request->min_amount){

                Toastr::error(__('msg_data_already_exists'), __('msg_error'));
                return redirect()->back();
            }
            if($pretax->min_amount < $request->max_amount && $pretax->max_amount > $request->max_amount){

                Toastr::error(__('msg_data_already_exists'), __('msg_error'));
                return redirect()->back();
                
            }
        }}


        // Insert Data
        $taxSetting = new TaxSetting;
        $taxSetting->min_amount = $request->min_amount;
        $taxSetting->max_amount = $request->max_amount;
        $taxSetting->percentange = $request->percentange;
        $taxSetting->max_no_taxable_amount = $request->max_no_taxable_amount ?? '0';
        $taxSetting->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaxSetting  $taxSetting
     * @return \Illuminate\Http\Response
     */
    public function show(TaxSetting $taxSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaxSetting  $taxSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(TaxSetting $taxSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaxSetting  $taxSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaxSetting $taxSetting)
    {
        // Field Validation
        $request->validate([
            'min_amount' => 'required|numeric|unique:tax_settings,max_amount',
            'max_amount' => 'required|numeric|unique:tax_settings,min_amount',
            'percentange' => 'required|numeric',
            'max_no_taxable_amount' => 'nullable|numeric',
        ]);


        // Duplicate Checking
        $pretaxs = TaxSetting::orderBy('min_amount', 'asc')->get();
        if(isset($pretaxs) && count($pretaxs) > 0){
        foreach($pretaxs as $pretax){
            if($pretax->min_amount < $request->min_amount && $pretax->max_amount > $request->min_amount && $pretax->id != $taxSetting->id){

                Toastr::error(__('msg_data_already_exists'), __('msg_error'));
                return redirect()->back();
            }
            if($pretax->min_amount < $request->max_amount && $pretax->max_amount > $request->max_amount && $pretax->id != $taxSetting->id){

                Toastr::error(__('msg_data_already_exists'), __('msg_error'));
                return redirect()->back();
                
            }
        }}

        // Update Data
        $taxSetting->min_amount = $request->min_amount;
        $taxSetting->max_amount = $request->max_amount;
        $taxSetting->percentange = $request->percentange;
        $taxSetting->max_no_taxable_amount = $request->max_no_taxable_amount ?? '0';
        $taxSetting->status = $request->status;
        $taxSetting->save();

        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaxSetting  $taxSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaxSetting $taxSetting)
    {
        //Delete Data
        $taxSetting->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
