<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HostelRoomType;
use Illuminate\Http\Request;
use App\Models\HostelRoom;
use App\Models\Hostel;
use Toastr;

class HostelRoomController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_hostel_room', 1);
        $this->route = 'admin.hostel-room';
        $this->view = 'admin.hostel-room';
        $this->path = 'hostel-room';
        $this->access = 'hostel-room';


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
    public function index(Request $request)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;


        if(!empty($request->hostel) || $request->hostel != null){
            $data['selected_hostel'] = $hostel = $request->hostel;
        }
        else{
            $data['selected_hostel'] = $hostel = '0';
        }

        if(!empty($request->room_type) || $request->room_type != null){
            $data['selected_room_type'] = $room_type = $request->room_type;
        }
        else{
            $data['selected_room_type'] = $room_type = '0';
        }


        // Search Filter
        $data['room_types'] = HostelRoomType::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['hostels'] = Hostel::where('status', '1')
                            ->orderBy('name', 'asc')->get();

        $rows = HostelRoom::where('id', '!=', '0');
                    if(!empty($request->hostel) || $request->hostel != null){
                        $rows->where('hostel_id', $hostel);
                    }
                    if(!empty($request->room_type) || $request->room_type != null){
                        $rows->where('room_type_id', $room_type);
                    }
        $data['rows'] = $rows->orderBy('name', 'asc')->get();

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
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        $data['room_types'] = HostelRoomType::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['hostels'] = Hostel::where('status', '1')
                            ->orderBy('name', 'asc')->get();

        return view($this->view.'.create', $data);
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
            'name' => 'required',
            'hostel' => 'required',
            'room_type' => 'required',
            'bed' => 'required|numeric',
            // 'fee' => 'required|numeric',
        ]);


        // Insert Data
        $hostelRoom = new HostelRoom;
        $hostelRoom->name = $request->name;
        $hostelRoom->hostel_id = $request->hostel;
        $hostelRoom->room_type_id = $request->room_type;
        $hostelRoom->bed = $request->bed;
        $hostelRoom->fee = $request->fee;
        $hostelRoom->description = $request->description;
        $hostelRoom->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(HostelRoom $hostelRoom)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $hostelRoom;

        return view($this->view.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(HostelRoom $hostelRoom)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $hostelRoom;
        $data['room_types'] = HostelRoomType::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['hostels'] = Hostel::where('status', '1')
                            ->orderBy('name', 'asc')->get();

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HostelRoom $hostelRoom)
    {
        // Field Validation
        $request->validate([
            'name' => 'required',
            'hostel' => 'required',
            'room_type' => 'required',
            'bed' => 'required|numeric',
            // 'fee' => 'required|numeric',
        ]);


        // Update Data
        $hostelRoom->name = $request->name;
        $hostelRoom->hostel_id = $request->hostel;
        $hostelRoom->room_type_id = $request->room_type;
        $hostelRoom->bed = $request->bed;
        $hostelRoom->fee = $request->fee;
        $hostelRoom->description = $request->description;
        $hostelRoom->status = $request->status;
        $hostelRoom->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HostelRoom $hostelRoom)
    {
        // Delete Data
        $hostelRoom->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
