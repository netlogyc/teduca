<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\ItemSupplier;
use App\Models\ItemStock;
use App\Models\ItemStore;
use App\Models\Item;
use Carbon\Carbon;
use Toastr;
use Auth;

class ItemStockController extends Controller
{
    use FileUploader;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_item_stock', 1);
        $this->route = 'admin.item-stock';
        $this->view = 'admin.item-stock';
        $this->path = 'item-stock';
        $this->access = 'item-stock';


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


        if(!empty($request->item) || $request->item != null){
            $data['selected_item'] = $item = $request->item;
        }
        else{
            $data['selected_item'] = $item = '0';
        }

        if(!empty($request->supplier) || $request->supplier != null){
            $data['selected_supplier'] = $supplier = $request->supplier;
        }
        else{
            $data['selected_supplier'] = $supplier = '0';
        }

        if(!empty($request->store) || $request->store != null){
            $data['selected_store'] = $store = $request->store;
        }
        else{
            $data['selected_store'] = $store = '0';
        }

        if(!empty($request->start_date) || $request->start_date != null){
            $data['selected_start_date'] = $start_date = $request->start_date;
        }
        else{
            $data['selected_start_date'] = $start_date = date('Y-m-d', strtotime(Carbon::now()->subYear()));
        }

        if(!empty($request->end_date) || $request->end_date != null){
            $data['selected_end_date'] = $end_date = $request->end_date;
        }
        else{
            $data['selected_end_date'] = $end_date = date('Y-m-d', strtotime(Carbon::today()));
        }


        // Search Filter
        $data['suppliers'] = ItemSupplier::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['stores'] = ItemStore::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['items'] = Item::where('status', '1')
                            ->orderBy('name', 'asc')->get();

        $rows = ItemStock::whereDate('date', '>=', $start_date)
                    ->whereDate('date', '<=', $end_date);
                    if(!empty($request->item) || $request->item != null){
                        $rows->where('item_id', $item);
                    }
                    if(!empty($request->supplier) || $request->supplier != null){
                        $rows->where('supplier_id', $supplier);
                    }
                    if(!empty($request->store) || $request->store != null){
                        $rows->where('store_id', $store);
                    }
        $data['rows'] = $rows->orderBy('id', 'desc')->get();

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

        $data['suppliers'] = ItemSupplier::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['stores'] = ItemStore::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['items'] = Item::where('status', '1')
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
            'item' => 'required',
            'supplier' => 'required',
            'store' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'date' => 'required|date|before_or_equal:today',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);


        // Insert Data
        $itemStock = new ItemStock;
        $itemStock->item_id = $request->item;
        $itemStock->supplier_id = $request->supplier;
        $itemStock->store_id = $request->store;
        $itemStock->quantity = $request->quantity;
        $itemStock->price = $request->price;
        $itemStock->date = $request->date;
        $itemStock->reference = $request->reference;
        $itemStock->payment_method = $request->payment_method;
        $itemStock->description = $request->description;
        $itemStock->attach = $this->uploadMedia($request, 'attach', $this->path);
        $itemStock->created_by = Auth::guard('web')->user()->id;
        $itemStock->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ItemStock $itemStock)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $itemStock;

        return view($this->view.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemStock $itemStock)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $itemStock;
        $data['suppliers'] = ItemSupplier::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['stores'] = ItemStore::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['items'] = Item::where('status', '1')
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
    public function update(Request $request, ItemStock $itemStock)
    {
        // Field Validation
        $request->validate([
            'item' => 'required',
            'supplier' => 'required',
            'store' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'date' => 'required|date|before_or_equal:today',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);


        // Update Data
        $itemStock->item_id = $request->item;
        $itemStock->supplier_id = $request->supplier;
        $itemStock->store_id = $request->store;
        $itemStock->quantity = $request->quantity;
        $itemStock->price = $request->price;
        $itemStock->date = $request->date;
        $itemStock->reference = $request->reference;
        $itemStock->payment_method = $request->payment_method;
        $itemStock->description = $request->description;
        $itemStock->attach = $this->updateMedia($request, 'attach', $this->path, $itemStock);
        $itemStock->status = $request->status;
        $itemStock->updated_by = Auth::guard('web')->user()->id;
        $itemStock->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemStock $itemStock)
    {
        // Delete Data
        $this->deleteMedia($this->path, $itemStock);

        $itemStock->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
