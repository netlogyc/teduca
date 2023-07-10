<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransportVehicle;
use App\Models\TransportRoute;
use Illuminate\Http\Request;
use Toastr;

class TransportVehicleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_transport_vehicle', 1);
        $this->route = 'admin.transport-vehicle';
        $this->view = 'admin.transport-vehicle';
        $this->path = 'transport-vehicle';
        $this->access = 'transport-vehicle';


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
        
        $data['transportRoutes'] = TransportRoute::where('status', '1')
                                    ->orderBy('title', 'asc')->get();
        $data['rows'] = TransportVehicle::orderBy('number', 'asc')->get();

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
            'number' => 'required|max:191|unique:transport_vehicles,number',
            'routes' => 'required',
        ]);

        // Insert Data
        $transportVehicle = new TransportVehicle;
        $transportVehicle->number = $request->number;
        $transportVehicle->type = $request->type;
        $transportVehicle->model = $request->model;
        $transportVehicle->capacity = $request->capacity;
        $transportVehicle->year_made = $request->year_made;
        $transportVehicle->driver_name = $request->driver_name;
        $transportVehicle->driver_license = $request->driver_license;
        $transportVehicle->driver_contact = $request->driver_contact;
        $transportVehicle->note = $request->note;
        $transportVehicle->save();

        $transportVehicle->transportRoutes()->attach($request->routes);


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TransportVehicle $transportVehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TransportVehicle $transportVehicle)
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
    public function update(Request $request, TransportVehicle $transportVehicle)
    {
        // Field Validation
        $request->validate([
            'number' => 'required|max:191|unique:transport_vehicles,number,'.$transportVehicle->id,
            'routes' => 'required',
        ]);

        // Update Data
        $transportVehicle->number = $request->number;
        $transportVehicle->type = $request->type;
        $transportVehicle->model = $request->model;
        $transportVehicle->capacity = $request->capacity;
        $transportVehicle->year_made = $request->year_made;
        $transportVehicle->driver_name = $request->driver_name;
        $transportVehicle->driver_license = $request->driver_license;
        $transportVehicle->driver_contact = $request->driver_contact;
        $transportVehicle->note = $request->note;
        $transportVehicle->status = $request->status;
        $transportVehicle->save();

        $transportVehicle->transportRoutes()->sync($request->routes);


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransportVehicle $transportVehicle)
    {
        // Delete Data
        $transportVehicle->transportRoutes()->detach();
        $transportVehicle->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
