<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\User;
use Toastr;
use Auth;
use Hash;

class ProfileController extends Controller
{
    use FileUploader;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct () 
    {
        // Module Data
        $this->title     = trans_choice('module_profile', 1);
        $this->route     = 'admin.profile';
        $this->view      = 'admin.profile';
        $this->path      = 'user';
        $this->access    = 'profile';


        $this->middleware('permission:'.$this->access.'-view', ['only' => ['index']]);
        $this->middleware('permission:'.$this->access.'-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:'.$this->access.'-account', ['only' => ['account','changeMail','changePass']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['view']      = $this->view;
        $data['path']      = $this->path;
        $data['access']    = $this->access;
        
        $data['row'] = User::where('id', Auth::guard('web')->user()->id)->first();

        return view($this->view.'.index', $data);
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
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['view']      = $this->view;
        $data['path']      = $this->path;
        $data['access']    = $this->access;

        if($id == Auth::guard('web')->user()->id){

            $data['row'] = User::findOrFail($id);
        }

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
            'gender' => 'required',
            'dob' => 'required|date',
            'phone' => 'required',
            'photo' => 'nullable|image',
        ]);


        if($id == Auth::guard('web')->user()->id){

            // Update data
            $user = User::find($id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->gender = $request->gender;
            $user->dob = $request->dob;
            $user->phone = $request->phone;
            $user->emergency_phone = $request->emergency_phone;
            $user->marital_status = $request->marital_status;
            $user->blood_group = $request->blood_group;
            $user->photo = $this->updateImage($request, 'photo', $this->path, 300, 300, $user, 'photo');
            $user->save();

            Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        }
        else {

            Toastr::error(__('msg_not_permitted'), __('msg_error'));
        }

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function account()
    {
        //
        $data['title'] = trans_choice('module_admin_setting', 1);
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        return view($this->view.'.account', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changeMail(Request $request)
    {
        // Field Validation
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        // Check
        if($request->email != Auth::user()->email){

            $user = User::find(Auth::user()->id);
            $user->email = $request->email;
            $user->save();
            Auth::logout();
            
            Toastr::success(__('msg_updated_successfully'), __('msg_success'));

            return redirect()->route('login');
        }
        else{

            Toastr::error(__('msg_email_invalid'), __('msg_error'));

            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changePass(Request $request)
    {
        // Field Validation
        $request->validate([
            'old_password' => 'required',
            'password' => 'nullable|confirmed|min:8',
        ]);

        $oldPassword = $request->old_password;
        $hashedPassword = Auth::user()->password;

        // Check old password for validation
        if(Hash::check($oldPassword, $hashedPassword)){

            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->password_text = Crypt::encryptString($request->password);
            $user->save();
            Auth::logout();
            
            Toastr::success(__('msg_updated_successfully'), __('msg_success'));

            return redirect()->route('login');
        }
        else{
            
            Toastr::error(__('msg_password_invalid'), __('msg_error'));

            return redirect()->back();
        }
    }
}
