<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use Toastr;

class GradeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_grade', 1);
        $this->route = 'admin.grade';
        $this->view = 'admin.grade';
        $this->path = 'grade';
        $this->access = 'grade';


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
        
        $data['rows'] = Grade::orderBy('point', 'desc')->get();

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
            'title' => 'required|max:191|unique:grades,title',
            'point' => 'required|numeric|unique:grades,point',
            'min_mark' => 'required|numeric|unique:grades,max_mark',
            'max_mark' => 'required|numeric|unique:grades,min_mark',
        ]);


        // Duplicate Checking
        $pregrades = Grade::orderBy('point', 'desc')->get();
        if(isset($pregrades) && count($pregrades) > 0){
        foreach($pregrades as $pregrade){
            if($pregrade->min_mark < $request->min_mark && $pregrade->max_mark > $request->min_mark){

                Toastr::error(__('msg_data_already_exists'), __('msg_error'));
                return redirect()->back();
            }
            if($pregrade->min_mark < $request->max_mark && $pregrade->max_mark > $request->max_mark){

                Toastr::error(__('msg_data_already_exists'), __('msg_error'));
                return redirect()->back();
                
            }
        }}


        // Insert Data
        $grade = new Grade;
        $grade->title = $request->title;
        $grade->point = $request->point;
        $grade->min_mark = $request->min_mark;
        $grade->max_mark = $request->max_mark;
        $grade->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
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
    public function update(Request $request, Grade $grade)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:grades,title,'.$grade->id,
            'point' => 'required|numeric|unique:grades,point,'.$grade->id,
            'min_mark' => 'required|numeric|unique:grades,max_mark',
            'max_mark' => 'required|numeric|unique:grades,min_mark',
        ]);


        // Duplicate Checking
        $pregrades = Grade::orderBy('point', 'desc')->get();
        if(isset($pregrades) && count($pregrades) > 0){
        foreach($pregrades as $pregrade){
            if($pregrade->min_mark < $request->min_mark && $pregrade->max_mark > $request->min_mark && $pregrade->id != $grade->id){

                Toastr::error(__('msg_data_already_exists'), __('msg_error'));
                return redirect()->back();
            }
            if($pregrade->min_mark < $request->max_mark && $pregrade->max_mark > $request->max_mark && $pregrade->id != $grade->id){

                Toastr::error(__('msg_data_already_exists'), __('msg_error'));
                return redirect()->back();
                
            }
        }}


        // Update Data
        $grade->title = $request->title;
        $grade->point = $request->point;
        $grade->min_mark = $request->min_mark;
        $grade->max_mark = $request->max_mark;
        $grade->status = $request->status;
        $grade->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        // Delete Data
        $grade->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
