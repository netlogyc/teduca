<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostalExchangeType;
use App\Models\PostalExchange;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use Carbon\Carbon;
use Toastr;
use Auth;

class PostalExchangeController extends Controller
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
        $this->title = trans_choice('module_postal_exchange', 1);
        $this->route = 'admin.postal-exchange';
        $this->view = 'admin.postal-exchange';
        $this->path = 'postal-exchange';
        $this->access = 'postal-exchange';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-create|'.$this->access.'-edit|'.$this->access.'-delete', ['only' => ['index','show','status']]);
        $this->middleware('permission:'.$this->access.'-create', ['only' => ['create','store','status']]);
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


        if(!empty($request->type) || $request->type != null){
            $data['selected_type'] = $type = $request->type;
        }
        else{
            $data['selected_type'] = $type = '0';
        }

        if(!empty($request->category) || $request->category != null){
            $data['selected_category'] = $category = $request->category;
        }
        else{
            $data['selected_category'] = $category = '0';
        }

        if(!empty($request->status) || $request->status != null){
            $data['selected_status'] = $status = $request->status;
        }
        else{
            $data['selected_status'] = $status = '99';
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
        $data['categories'] = PostalExchangeType::where('status', '1')
                            ->orderBy('title', 'asc')->get();

        $rows = PostalExchange::whereDate('date', '>=', $start_date)
                    ->whereDate('date', '<=', $end_date);
                    if(!empty($request->type) || $request->type != null){
                        $rows->where('type', $type);
                    }
                    if(!empty($request->category) || $request->category != null){
                        $rows->where('category_id', $category);
                    }
                    if(!empty($request->status) || $request->status != null){
                        $rows->where('status', $status);
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

        $data['categories'] = PostalExchangeType::where('status', '1')
                            ->orderBy('title', 'asc')->get();

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
            'type' => 'required',
            'category' => 'required',
            'title' => 'required',
            'date' => 'required|date|before_or_equal:today',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);


        // Insert Data
        $postalExchange = new PostalExchange;
        $postalExchange->type = $request->type;
        $postalExchange->category_id = $request->category;
        $postalExchange->title = $request->title;
        $postalExchange->reference = $request->reference;
        $postalExchange->from = $request->from;
        $postalExchange->to = $request->to;
        $postalExchange->note = $request->note;
        $postalExchange->date = $request->date;
        $postalExchange->attach = $this->uploadMedia($request, 'attach', $this->path);
        $postalExchange->status = $request->status;
        $postalExchange->created_by = Auth::guard('web')->user()->id;
        $postalExchange->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PostalExchange $postalExchange)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $postalExchange;

        return view($this->view.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PostalExchange $postalExchange)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $postalExchange;
        $data['categories'] = PostalExchangeType::where('status', '1')
                            ->orderBy('title', 'asc')->get();

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostalExchange $postalExchange)
    {
        // Field Validation
        $request->validate([
            'type' => 'required',
            'category' => 'required',
            'title' => 'required',
            'date' => 'required|date|before_or_equal:today',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);


        // Update Data
        $postalExchange->type = $request->type;
        $postalExchange->category_id = $request->category;
        $postalExchange->title = $request->title;
        $postalExchange->reference = $request->reference;
        $postalExchange->from = $request->from;
        $postalExchange->to = $request->to;
        $postalExchange->note = $request->note;
        $postalExchange->date = $request->date;
        $postalExchange->attach = $this->updateMedia($request, 'attach', $this->path, $postalExchange);
        $postalExchange->status = $request->status;
        $postalExchange->updated_by = Auth::guard('web')->user()->id;
        $postalExchange->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostalExchange $postalExchange)
    {
        // Delete Data
        $this->deleteMedia($this->path, $postalExchange);

        $postalExchange->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {
        // Field Validation
        $request->validate([
            'status' => 'required',
        ]);


        // Status Update
        $postalExchange = PostalExchange::findOrFail($id);
        $postalExchange->status = $request->status;
        $postalExchange->updated_by = Auth::guard('web')->user()->id;
        $postalExchange->save();


        Toastr::success(__('msg_status_changed'), __('msg_success'));

        return redirect()->back();
    }
}
