<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplicationSetting;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use Toastr;

class ApplicationSettingController extends Controller
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
        $this->title = trans_choice('module_application_setting', 1);
        $this->route = 'admin.application-setting';
        $this->view = 'admin.application-setting';
        $this->path = 'application-setting';
        $this->access = 'application-setting';


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
        $data['path'] = $this->path;
        $data['access'] = $this->access;
        
        $data['row'] = ApplicationSetting::where('slug', 'admission')->first();

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
            'logo_left' => 'nullable|image',
            'logo_right' => 'nullable|image',
            'background' => 'nullable|image',
        ]);


        $id = $request->id;

        // -1 means no data row found
        if($id == -1){
            // Insert Data
            $applicationSetting = new ApplicationSetting;

            $applicationSetting->slug = $request->slug;
            $applicationSetting->title = $request->title;
            $applicationSetting->header_left = $request->header_left;
            $applicationSetting->header_center = $request->header_center;
            $applicationSetting->header_right = $request->header_right;
            $applicationSetting->body = $request->body;
            $applicationSetting->footer_left = $request->footer_left;
            $applicationSetting->footer_center = $request->footer_center;
            $applicationSetting->footer_right = $request->footer_right;
            $applicationSetting->logo_left = $this->uploadImage($request, 'logo_left', $this->path, Null, 200);
            $applicationSetting->logo_right = $this->uploadImage($request, 'logo_right', $this->path, Null, 200);
            $applicationSetting->background = $this->uploadImage($request, 'background', $this->path, 800, Null);
            $applicationSetting->status = $request->status ?? 0;
            $applicationSetting->save();
        }
        else{
            // Update Data
            $applicationSetting = ApplicationSetting::find($id);

            $applicationSetting->slug = $request->slug;
            $applicationSetting->title = $request->title;
            $applicationSetting->header_left = $request->header_left;
            $applicationSetting->header_center = $request->header_center;
            $applicationSetting->header_right = $request->header_right;
            $applicationSetting->body = $request->body;
            $applicationSetting->footer_left = $request->footer_left;
            $applicationSetting->footer_center = $request->footer_center;
            $applicationSetting->footer_right = $request->footer_right;
            $applicationSetting->logo_left = $this->updateImage($request, 'logo_left', $this->path, Null, 200, $applicationSetting, 'logo_left');
            $applicationSetting->logo_right = $this->updateImage($request, 'logo_right', $this->path, Null, 200, $applicationSetting, 'logo_right');
            $applicationSetting->background = $this->updateImage($request, 'background', $this->path, 800, Null, $applicationSetting, 'background');
            $applicationSetting->status = $request->status ?? 0;
            $applicationSetting->save();
        }


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
