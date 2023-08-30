<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IdCardSetting;
use App\Models\LibraryMember;
use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\Department;
use Carbon\Carbon;
use App\User;
use Toastr;
use Auth;

class LibraryStaffController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_staff', 1).' '.trans_choice('module_member', 1);
        $this->route = 'admin.library-staff';
        $this->view = 'admin.library-staff';
        $this->path = 'user';
        $this->access = 'library-member';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-create|'.$this->access.'-edit|'.$this->access.'-card', ['only' => ['index','show']]);
        $this->middleware('permission:'.$this->access.'-create', ['only' => ['create','store']]);
        $this->middleware('permission:'.$this->access.'-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:'.$this->access.'-card', ['only' => ['libraryCard']]);
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

        $data['departments'] = Department::where('status', 1)->orderBy('title', 'asc')->get();
        $data['designations'] = Designation::where('status', 1)->orderBy('title', 'asc')->get();


        if(!empty($request->department) || $request->department != null){
            $data['selected_department'] = $department = $request->department;
        }
        else{
            $data['selected_department'] = '0';
        }

        if(!empty($request->designation) || $request->designation != null){
            $data['selected_designation'] = $designation = $request->designation;
        }
        else{
            $data['selected_designation'] = '0';
        }

        if(!empty($request->staff_id) || $request->staff_id != null){
            $data['selected_staff_id'] = $staff_id = $request->staff_id;
        }
        else{
            $data['selected_staff_id'] = Null;
        }


        // Staff List
        $users = User::where('id', '!=', '0');
        if(!empty($request->department) && $request->department != '0'){
            $users->where('department_id', $department);
        }
        if(!empty($request->designation) && $request->designation != '0'){
            $users->where('designation_id', $designation);
        }
        if(!empty($request->staff_id)){
            $users->where('staff_id', 'LIKE', '%'.$staff_id.'%');
        }
        $data['rows'] = $users->orderBy('staff_id', 'desc')->get();
        

        $data['print'] = IdCardSetting::where('slug', 'library-card')->first();

        return view($this->view.'.index', $data);
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
            'library_id' => 'required|unique:library_members,library_id',
            'member_id' => 'required',
        ]);

        $user = User::findOrFail($request->member_id);
        $card_setting = IdCardSetting::where('slug', 'library-card')->first();

        
        // Insert Data
        $member = new LibraryMember;
        $member->library_id = $request->library_id;
        $member->date = Carbon::today()->addYears($card_setting->validity ?? 0)->format('Y-m-d');
        $member->created_by = Auth::guard('web')->user()->id;

        $user->member()->save($member);


        Toastr::success(__('msg_added_successfully'), __('msg_success'));

        return redirect()->back();
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
            'member_id' => 'required',
            'status' => 'required'
        ]);


        // Update Data
        $member = LibraryMember::findOrFail($request->member_id);
        $member->status = $request->status;
        $member->updated_by = Auth::guard('web')->user()->id;
        $member->save();

        if($request->status == 0){
            Toastr::success(__('msg_canceled_successfully'), __('msg_success'));
        }
        elseif($request->status == 1){
            Toastr::success(__('msg_approve_successfully'), __('msg_success'));
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function libraryCard($id)
    {
        //
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['view']      = $this->view;
        $data['path']      = $this->path;

        $data['row'] = LibraryMember::findOrFail($id);

        $data['print'] = IdCardSetting::where('slug', 'library-card')->firstOrFail();

        return view($this->view.'.card', $data);
    }
}
