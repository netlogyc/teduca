<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemCategory;
use App\Models\Department;
use App\Models\ItemIssue;
use App\Models\Item;
use Carbon\Carbon;
use App\User;
use Toastr;
use Auth;

class ItemIssueController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_item_issue', 1);
        $this->route = 'admin.item-issue';
        $this->view = 'admin.item-issue';
        $this->path = 'item-issue';
        $this->access = 'item-issue';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-action|'.$this->access.'-delete', ['only' => ['index','show']]);
        $this->middleware('permission:'.$this->access.'-action', ['only' => ['create','store','edit','update','penalty']]);
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

        if(!empty($request->user) || $request->user != null){
            $data['selected_user'] = $user = $request->user;
        }
        else{
            $data['selected_user'] = $user = '0';
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


        $data['search_items'] = Item::where('status', '1')
                            ->orderBy('name', 'asc')->get();
        $data['search_users'] = User::where('status', '1')
                            ->orderBy('staff_id', 'asc')->get();
        $data['categories'] = ItemCategory::where('status', '1')
                        ->orderBy('title', 'asc')->get();
        $data['departments'] = Department::where('status', '1')
                        ->orderBy('title', 'asc')->get();
                        

        // Search Filter
        $rows = ItemIssue::whereDate('issue_date', '>=', $start_date)
                    ->whereDate('issue_date', '<=', $end_date);
                    if(!empty($request->item) || $request->item != null){
                        $rows->where('item_id', $item);
                    }
                    if(!empty($request->user) || $request->user != null){
                        $rows->where('user_id', $user);
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
            'user' => 'required',
            'quantity' => 'required|numeric',
            'issue_date' => 'required|date|before_or_equal:today',
            'due_date' => 'required|date|after_or_equal:issue_date',
        ]);

        // Insert Data
        $itemIssue = new ItemIssue();
        $itemIssue->item_id = $request->item;
        $itemIssue->user_id = $request->user;
        $itemIssue->quantity = $request->quantity;
        $itemIssue->issue_date = $request->issue_date;
        $itemIssue->due_date = $request->due_date;
        $itemIssue->issued_by = Auth::guard('web')->user()->id;
        $itemIssue->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ItemIssue $itemIssue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemIssue $itemIssue)
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
    public function update(Request $request, ItemIssue $itemIssue)
    {
        // Field Validation
        $request->validate([
            'return_date' => 'required|date|before_or_equal:today',
        ]);

        // Update Data
        $itemIssue->return_date = $request->return_date;
        $itemIssue->status = 2;
        $itemIssue->received_by = Auth::guard('web')->user()->id;
        $itemIssue->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemIssue $itemIssue)
    {
        // Delete Data
        $itemIssue->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));
        
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function penalty(Request $request, $id)
    {
        // Field Validation
        $request->validate([
            'penalty' => 'required|numeric',
        ]);

        
        // Update Data
        $itemIssue = ItemIssue::find($id);
        $itemIssue->penalty = $request->penalty;
        $itemIssue->status = 0;
        $itemIssue->received_by = Auth::guard('web')->user()->id;
        $itemIssue->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));
        
        return redirect()->back();
    }
}
