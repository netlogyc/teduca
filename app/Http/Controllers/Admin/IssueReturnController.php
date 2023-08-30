<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LibraryMember;
use Illuminate\Http\Request;
use App\Models\IssueReturn;
use App\Models\Book;
use Carbon\Carbon;
use Toastr;
use Auth;

class IssueReturnController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_issue_return', 1);
        $this->route = 'admin.issue-return';
        $this->view = 'admin.issue-return';
        $this->path = 'issue-return';
        $this->access = 'book-issue-return';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-action|'.$this->access.'-delete', ['only' => ['index','show']]);
        $this->middleware('permission:'.$this->access.'-action', ['only' => ['create','store','edit','update','penalty']]);
        $this->middleware('permission:'.$this->access.'-delete', ['only' => ['destroy']]);
        $this->middleware('permission:'.$this->access.'-over', ['only' => ['dateOver']]);
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

        $books = Book::where('status', '1')->get();

        $issue_books = array();
        foreach($books as $book){
            if($book->quantity <= $book->issues->where('status', '<=', '1')->count()){
                array_push($issue_books, $book->id);
            }
        }

        $data['books'] = Book::whereNotIn('id', $issue_books)
                        ->where('status', '1')
                        ->orderBy('isbn', 'asc')->get();

        $data['members'] = LibraryMember::where('status', '1')
                        ->orderBy('library_id', 'asc')->get();

        $data['rows'] = IssueReturn::orderBy('id', 'desc')->get();

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
            'book' => 'required',
            'member' => 'required',
            'issue_date' => 'required|date|before_or_equal:today',
            'due_date' => 'required|date|after_or_equal:issue_date',
        ]);

        // Insert Data
        $issueReturn = new IssueReturn();
        $issueReturn->book_id = $request->book;
        $issueReturn->member_id = $request->member;
        $issueReturn->issue_date = $request->issue_date;
        $issueReturn->due_date = $request->due_date;
        $issueReturn->issued_by = Auth::guard('web')->user()->id;
        $issueReturn->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(IssueReturn $issueReturn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(IssueReturn $issueReturn)
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
    public function update(Request $request, IssueReturn $issueReturn)
    {
        // Field Validation
        $request->validate([
            'return_date' => 'required|date|before_or_equal:today',
        ]);

        // Update Data
        $issueReturn->return_date = $request->return_date;
        $issueReturn->status = 2;
        $issueReturn->received_by = Auth::guard('web')->user()->id;
        $issueReturn->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(IssueReturn $issueReturn)
    {
        // Delete Data
        $issueReturn->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));
        
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dateOver()
    {
        //
        $data['title'] = trans_choice('module_return_date_over', 1);
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['rows'] = IssueReturn::where('return_date', null)
                ->where('due_date', '<', Carbon::today())
                ->where('status', '1')
                ->orderBy('id', 'desc')
                ->get();

        return view($this->view.'.date-over', $data);
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
        $issueReturn = IssueReturn::find($id);
        $issueReturn->penalty = $request->penalty;
        $issueReturn->status = 0;
        $issueReturn->received_by = Auth::guard('web')->user()->id;
        $issueReturn->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));
        
        return redirect()->back();
    }
}
