<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IdCardSetting;
use App\Models\LibraryMember;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\OutsideUser;
use App\Models\Province;
use App\Models\District;
use Carbon\Carbon;
use Toastr;
use Auth;
use DB;

class OutSideUserController extends Controller
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
        $this->title = trans_choice('module_outsider', 1).' '.trans_choice('module_member', 1);
        $this->route = 'admin.library-outsider';
        $this->view = 'admin.library-outsider';
        $this->path = 'outsider';
        $this->access = 'library-member';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-create|'.$this->access.'-edit|'.$this->access.'-delete|'.$this->access.'-card', ['only' => ['index','show','status']]);
        $this->middleware('permission:'.$this->access.'-create', ['only' => ['create','store']]);
        $this->middleware('permission:'.$this->access.'-edit', ['only' => ['edit','update','status']]);
        $this->middleware('permission:'.$this->access.'-delete', ['only' => ['destroy']]);
        $this->middleware('permission:'.$this->access.'-card', ['only' => ['libraryCard']]);
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

        $data['rows'] = OutsideUser::orderBy('id', 'desc')->get();

        $data['print'] = IdCardSetting::where('slug', 'library-card')->first();

        return view($this->view.'.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['provinces'] = Province::where('status', '1')
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email|unique:outside_users,email',
            'phone' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'library_id' => 'required|unique:library_members,library_id',
            'photo' => 'nullable|image',
            'signature' => 'nullable|image',
        ]);

        $card_setting = IdCardSetting::where('slug', 'library-card')->first();

        // Insert Data
        DB::beginTransaction();
        $outsideUser = new OutsideUser;
        $outsideUser->first_name = $request->first_name;
        $outsideUser->last_name = $request->last_name;
        $outsideUser->father_name = $request->father_name;
        $outsideUser->mother_name = $request->mother_name;
        $outsideUser->father_occupation = $request->father_occupation;
        $outsideUser->mother_occupation = $request->mother_occupation;
        $outsideUser->email = $request->email;
        $outsideUser->phone = $request->phone;

        $outsideUser->country = $request->country;
        $outsideUser->present_province = $request->present_province;
        $outsideUser->present_district = $request->present_district;
        $outsideUser->present_village = $request->present_village;
        $outsideUser->present_address = $request->present_address;
        $outsideUser->permanent_province = $request->permanent_province;
        $outsideUser->permanent_district = $request->permanent_district;
        $outsideUser->permanent_village = $request->permanent_village;
        $outsideUser->permanent_address = $request->permanent_address;

        $outsideUser->education_level = $request->education_level;
        $outsideUser->occupation = $request->occupation;
        $outsideUser->gender = $request->gender;
        $outsideUser->dob = $request->dob;

        $outsideUser->religion = $request->religion;
        $outsideUser->caste = $request->caste;
        $outsideUser->mother_tongue = $request->mother_tongue;
        $outsideUser->marital_status = $request->marital_status;
        $outsideUser->blood_group = $request->blood_group;
        $outsideUser->nationality = $request->nationality;
        $outsideUser->national_id = $request->national_id;
        $outsideUser->passport_no = $request->passport_no;

        $outsideUser->photo = $this->uploadImage($request, 'photo', $this->path, 300, 300);
        $outsideUser->signature = $this->uploadImage($request, 'signature', $this->path, 300, 100);
        $outsideUser->created_by = Auth::guard('web')->user()->id;
        $outsideUser->save();


        // Create Member
        $member = new LibraryMember;
        $member->library_id = $request->library_id;
        $member->date = Carbon::today()->addYears($card_setting->validity ?? 0)->format('Y-m-d');
        $member->created_by = Auth::guard('web')->user()->id;

        $outsideUser->member()->save($member);
        DB::commit();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $outsideUser = OutsideUser::findOrFail($id);

        $data['provinces'] = Province::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['present_districts'] = District::where('status', '1')
                            ->where('province_id', $outsideUser->present_province)
                            ->orderBy('title', 'asc')->get();
        $data['permanent_districts'] = District::where('status', '1')
                            ->where('province_id', $outsideUser->permanent_province)
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
    public function update(Request $request, $id)
    {
        // Field Validation
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email|unique:outside_users,email,'.$id,
            'phone' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'photo' => 'nullable|image',
            'signature' => 'nullable|image',
        ]);


        // Update Data
        $outsideUser = OutsideUser::findOrFail($id);
        $outsideUser->first_name = $request->first_name;
        $outsideUser->last_name = $request->last_name;
        $outsideUser->father_name = $request->father_name;
        $outsideUser->mother_name = $request->mother_name;
        $outsideUser->father_occupation = $request->father_occupation;
        $outsideUser->mother_occupation = $request->mother_occupation;
        $outsideUser->email = $request->email;
        $outsideUser->phone = $request->phone;

        $outsideUser->country = $request->country;
        $outsideUser->present_province = $request->present_province;
        $outsideUser->present_district = $request->present_district;
        $outsideUser->present_village = $request->present_village;
        $outsideUser->present_address = $request->present_address;
        $outsideUser->permanent_province = $request->permanent_province;
        $outsideUser->permanent_district = $request->permanent_district;
        $outsideUser->permanent_village = $request->permanent_village;
        $outsideUser->permanent_address = $request->permanent_address;

        $outsideUser->education_level = $request->education_level;
        $outsideUser->occupation = $request->occupation;
        $outsideUser->gender = $request->gender;
        $outsideUser->dob = $request->dob;

        $outsideUser->religion = $request->religion;
        $outsideUser->caste = $request->caste;
        $outsideUser->mother_tongue = $request->mother_tongue;
        $outsideUser->marital_status = $request->marital_status;
        $outsideUser->blood_group = $request->blood_group;
        $outsideUser->nationality = $request->nationality;
        $outsideUser->national_id = $request->national_id;
        $outsideUser->passport_no = $request->passport_no;

        $outsideUser->photo = $this->updateImage($request, 'photo', $this->path, 300, 300, $outsideUser, 'photo');
        $outsideUser->signature = $this->updateImage($request, 'signature', $this->path, 300, 100, $outsideUser, 'signature');
        $outsideUser->updated_by = Auth::guard('web')->user()->id;
        $outsideUser->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete Data
        $outsideUser = OutsideUser::findOrFail($id);
        $this->deleteMultiMedia($this->path, $outsideUser, 'photo');
        $this->deleteMultiMedia($this->path, $outsideUser, 'signature');

        $outsideUser->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
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
