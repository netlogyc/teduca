<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemStore;
use Toastr;

class ItemStoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_item_store', 1);
        $this->route = 'admin.item-store';
        $this->view = 'admin.item-store';
        $this->path = 'item-store';
        $this->access = 'item-store';


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
        
        $data['rows'] = ItemStore::orderBy('title', 'asc')->get();

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
            'title' => 'required|max:191|unique:item_stores,title',
            'store_no' => 'required|max:191|unique:item_stores,store_no',
            'email' => 'nullable|email',
        ]);

        // Insert Data
        $itemStore = new ItemStore;
        $itemStore->title = $request->title;
        $itemStore->store_no = $request->store_no;
        $itemStore->in_charge = $request->in_charge;
        $itemStore->email = $request->email;
        $itemStore->phone = $request->phone;
        $itemStore->address = $request->address;
        $itemStore->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ItemStore $itemStore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemStore $itemStore)
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
    public function update(Request $request, ItemStore $itemStore)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:item_stores,title,'.$itemStore->id,
            'store_no' => 'required|max:191|unique:item_stores,store_no,'.$itemStore->id,
            'email' => 'nullable|email',
        ]);

        // Update Data
        $itemStore->title = $request->title;
        $itemStore->store_no = $request->store_no;
        $itemStore->in_charge = $request->in_charge;
        $itemStore->email = $request->email;
        $itemStore->phone = $request->phone;
        $itemStore->address = $request->address;
        $itemStore->status = $request->status;
        $itemStore->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemStore $itemStore)
    {
        // Delete Data
        $itemStore->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
