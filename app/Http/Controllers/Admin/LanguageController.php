<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Language;
use Toastr;

class LanguageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_language', 1);
        $this->route = 'admin.language';
        $this->view = 'admin.language';
        $this->path = 'language';
        $this->access = 'language';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-create|'.$this->access.'-edit|'.$this->access.'-delete', ['only' => ['index','show','default']]);
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
        
        $data['rows'] = Language::orderBy('id', 'asc')->get();

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
            'name' => 'required|max:191|unique:languages,name',
            'code' => 'required|max:191|unique:languages,code',
        ]);

        // Insert Data
        $language = new Language;
        $language->name = $request->name;
        $language->code = $request->code;
        $language->description = $request->description;
        $language->direction = $request->direction;
        $language->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, Language $language)
    {
        // Field Validation
        $request->validate([
            'name' => 'required|max:191|unique:languages,name,'.$language->id,
            'code' => 'required|max:191|unique:languages,code,'.$language->id,
        ]);

        // Update Data
        $language->name = $request->name;
        $language->code = $request->code;
        $language->description = $request->description;
        $language->direction = $request->direction;
        $language->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        // Delete Data
        $language->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function default($id)
    {   
        // Set default
        Language::where('id', '=', $id)->update([
            'default' => 1,
            'status' => 1
        ]); 

        // Unset default
        Language::where('id', '!=', $id)->update([
            'default' => 0
        ]);


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }
}