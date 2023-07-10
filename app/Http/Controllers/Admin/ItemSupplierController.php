<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemSupplier;
use Toastr;

class ItemSupplierController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_item_supplier', 1);
        $this->route = 'admin.item-supplier';
        $this->view = 'admin.item-supplier';
        $this->path = 'item-supplier';
        $this->access = 'item-supplier';


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
        
        $data['rows'] = ItemSupplier::orderBy('title', 'asc')->get();

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
            'title' => 'required|max:191|unique:item_suppliers,title',
            'email' => 'nullable|email',
        ]);

        // Insert Data
        $itemSupplier = new ItemSupplier;
        $itemSupplier->title = $request->title;
        $itemSupplier->email = $request->email;
        $itemSupplier->phone = $request->phone;
        $itemSupplier->address = $request->address;
        $itemSupplier->contact_person = $request->contact_person;
        $itemSupplier->designation = $request->designation;
        $itemSupplier->contact_person_email = $request->contact_person_email;
        $itemSupplier->contact_person_phone = $request->contact_person_phone;
        $itemSupplier->description = $request->description;
        $itemSupplier->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ItemSupplier $itemSupplier)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $itemSupplier;

        return view($this->view.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemSupplier $itemSupplier)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $itemSupplier;

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemSupplier $itemSupplier)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:item_suppliers,title,'.$itemSupplier->id,
            'email' => 'nullable|email',
        ]);

        // Update Data
        $itemSupplier->title = $request->title;
        $itemSupplier->email = $request->email;
        $itemSupplier->phone = $request->phone;
        $itemSupplier->address = $request->address;
        $itemSupplier->contact_person = $request->contact_person;
        $itemSupplier->designation = $request->designation;
        $itemSupplier->contact_person_email = $request->contact_person_email;
        $itemSupplier->contact_person_phone = $request->contact_person_phone;
        $itemSupplier->description = $request->description;
        $itemSupplier->status = $request->status;
        $itemSupplier->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemSupplier $itemSupplier)
    {
        // Delete Data
        $itemSupplier->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
