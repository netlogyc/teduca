<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IncomeCategory;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\Income;
use Carbon\Carbon;
use Toastr;
use Auth;

class IncomeController extends Controller
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
        $this->title = trans_choice('module_income', 1);
        $this->route = 'admin.income';
        $this->view = 'admin.income';
        $this->path = 'income';
        $this->access = 'income';


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


        if(!empty($request->title) || $request->title != null){
            $data['selected_title'] = $title = $request->title;
        }
        else{
            $data['selected_title'] = $title = null;
        }

        if(!empty($request->category) || $request->category != null){
            $data['selected_category'] = $category = $request->category;
        }
        else{
            $data['selected_category'] = $category = '0';
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
        $data['categories'] = IncomeCategory::where('status', '1')
                            ->orderBy('title', 'asc')->get();

        $rows = Income::whereDate('date', '>=', $start_date)
                    ->whereDate('date', '<=', $end_date);
                    if(!empty($request->title) || $request->title != null){
                        $rows->where('title', 'LIKE', '%'.$title.'%');
                    }
                    if(!empty($request->category) || $request->category != null){
                        $rows->where('category_id', $category);
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

        $data['categories'] = IncomeCategory::where('status', '1')
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
            'category' => 'required',
            'title' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required|date|before_or_equal:today',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);


        // Insert Data
        $income = new Income;
        $income->category_id = $request->category;
        $income->title = $request->title;
        $income->invoice_id = $request->invoice_id;
        $income->amount = $request->amount;
        $income->date = $request->date;
        $income->note = $request->note;
        $income->payment_method = $request->payment_method;
        $income->attach = $this->uploadMedia($request, 'attach', $this->path);
        $income->created_by = Auth::guard('web')->user()->id;
        $income->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $income;

        return view($this->view.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $income;
        $data['categories'] = IncomeCategory::where('status', '1')
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
    public function update(Request $request, Income $income)
    {
        // Field Validation
        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required|date|before_or_equal:today',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);


        // Update Data
        $income->category_id = $request->category;
        $income->title = $request->title;
        $income->invoice_id = $request->invoice_id;
        $income->amount = $request->amount;
        $income->date = $request->date;
        $income->note = $request->note;
        $income->payment_method = $request->payment_method;
        $income->attach = $this->updateMedia($request, 'attach', $this->path, $income);
        $income->updated_by = Auth::guard('web')->user()->id;
        $income->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        // Delete Data
        $this->deleteMedia($this->path, $income);

        $income->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
