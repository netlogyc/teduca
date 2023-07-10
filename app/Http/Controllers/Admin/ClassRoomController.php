<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ClassRoom;
use App\Models\Program;
use Toastr;

class ClassRoomController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_class_room', 1);
        $this->route = 'admin.room';
        $this->view = 'admin.room';
        $this->path = 'room';
        $this->access = 'class-room';


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
        
        $data['programs'] = Program::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['rows'] = ClassRoom::orderBy('title', 'asc')->get();

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
            'title' => 'required|max:191|unique:class_rooms,title',
            'capacity' => 'nullable|numeric',
        ]);

        // Insert Data
        $classRoom = new ClassRoom;
        $classRoom->title = $request->title;
        $classRoom->slug = Str::slug($request->title, '-');
        $classRoom->floor = $request->floor;
        $classRoom->capacity = $request->capacity;
        $classRoom->type = $request->type;
        $classRoom->description = $request->description;
        $classRoom->save();

        // Attach
        $classRoom->programs()->attach($request->programs);

        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassRoom $classRoom)
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
            'title' => 'required|max:191|unique:class_rooms,title,'.$id,
            'capacity' => 'nullable|numeric',
        ]);

        // Update Data
        $classRoom = ClassRoom::findOrFail($id);
        $classRoom->title = $request->title;
        $classRoom->slug = Str::slug($request->title, '-');
        $classRoom->floor = $request->floor;
        $classRoom->capacity = $request->capacity;
        $classRoom->type = $request->type;
        $classRoom->description = $request->description;
        $classRoom->status = $request->status;
        $classRoom->save();

        // Attach Update
        $classRoom->programs()->sync($request->programs);

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
        $classRoom = ClassRoom::findOrFail($id);

        // Detach
        $classRoom->programs()->detach();

        // Delete Data
        $classRoom->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
