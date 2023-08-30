<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Program;
use Toastr;

class SessionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_session', 1);
        $this->route = 'admin.session';
        $this->view = 'admin.session';
        $this->path = 'session';
        $this->access = 'session';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-create|'.$this->access.'-edit|'.$this->access.'-delete', ['only' => ['index','show']]);
        $this->middleware('permission:'.$this->access.'-create', ['only' => ['create','store','current']]);
        $this->middleware('permission:'.$this->access.'-edit', ['only' => ['edit','update','current']]);
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
        
        $data['programs'] = Program::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['rows'] = Session::orderBy('id', 'desc')->get();

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
            'title' => 'required|max:191|unique:sessions,title',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'programs' => 'required',
        ]);

        // Insert Data
        $session = new Session;
        $session->title = $request->title;
        $session->start_date = $request->start_date;
        $session->end_date = $request->end_date;
        $session->current = 1;
        $session->save();

        // Unset current
        Session::where('id', '!=', $session->id)->update([
            'current' => 0
        ]);

        $session->programs()->attach($request->programs);


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
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
    public function update(Request $request, Session $session)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:sessions,title,'.$session->id,
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'programs' => 'required',
        ]);

        // Update Data
        $session->title = $request->title;
        $session->start_date = $request->start_date;
        $session->end_date = $request->end_date;
        $session->status = $request->status;
        $session->save();

        $session->programs()->sync($request->programs);


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        // Delete Data
        $session->programs()->detach();
        $session->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function current($id)
    {   
        // Set current
        Session::where('id', '=', $id)->update([
            'current' => 1,
            'status' => 1
        ]); 

        // Unset current
        Session::where('id', '!=', $id)->update([
            'current' => 0
        ]);


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
