<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SMSSetting;
use Toastr;

class SMSSettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_sms_setting', 1);
        $this->route = 'admin.sms-setting';
        $this->view = 'admin.sms-setting';
        $this->access = 'sms-setting';


        $this->middleware('permission:'.$this->access.'-view');
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
        $data['access'] = $this->access;

        $data['row'] = SMSSetting::where('status', '1')->first();

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
            'status' => 'required',
        ]);



        $id = $request->id;

        // -1 means no data row found
        if($id == -1){
            // Insert Data
            $input = $request->all();
            $data = SMSSetting::create($input);
        }
        else{
            // Update Data
            $data = SMSSetting::find($id);

            $input = $request->all();
            $data->update($input);
        }

        // Update to Env
        $this->changeEnvironmentVariable('NEXMO_KEY', $request->nexmo_key);
        $this->changeEnvironmentVariable('NEXMO_SECRET', $request->nexmo_secret);
        $this->changeEnvironmentVariable('TWILIO_SID', $request->twilio_sid);
        $this->changeEnvironmentVariable('TWILIO_AUTH_TOKEN', $request->twilio_auth_token);
        $this->changeEnvironmentVariable('TWILIO_NUMBER', $request->twilio_number);


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    
    // Update Env Config
    public static function changeEnvironmentVariable($key,$value)
    {
        $path = base_path('.env');

        if(is_bool(env($key)))
        {
            $old = env($key)? 'true' : 'false';
        }
        elseif(env($key)===null){
            $old = 'null';
        }
        else{
            $old = env($key);
        }

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                "$key=".$old, "$key=".$value, file_get_contents($path)
            ));
        }
    }
}
