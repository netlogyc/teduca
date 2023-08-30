<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\PrintSetting;
use Toastr;

class AdmitCardSettingController extends Controller
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
        $this->title = trans_choice('module_admit_setting', 1);
        $this->route = 'admin.admit-setting';
        $this->view = 'admin.admit-setting';
        $this->path = 'print-setting';
        $this->access = 'admit-setting';


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
        
        $data['row'] = PrintSetting::where('slug', 'admit-card')->first();

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

        // Student Photo
        if($request->student_photo == null || $request->student_photo != 1){
            $student_photo = 0;
        }
        else {
            $student_photo = 1;
        }

        // Barcode
        if($request->barcode == null || $request->barcode != 1){
            $barcode = 0;
        }
        else {
            $barcode = 1;
        }


        $id = $request->id;

        // -1 means no data row found
        if($id == -1){
            // Insert Data
            $printSetting = new PrintSetting;

            $printSetting->slug = $request->slug;
            $printSetting->title = $request->title;
            $printSetting->header_left = $request->header_left;
            $printSetting->header_center = $request->header_center;
            $printSetting->header_right = $request->header_right;
            $printSetting->body = $request->body;
            $printSetting->footer_left = $request->footer_left;
            $printSetting->footer_center = $request->footer_center;
            $printSetting->footer_right = $request->footer_right;
            $printSetting->logo_left = $this->uploadImage($request, 'logo_left', $this->path, Null, 200);
            $printSetting->logo_right = $this->uploadImage($request, 'logo_right', $this->path, Null, 200);
            $printSetting->background = $this->uploadImage($request, 'background', $this->path, 800, Null);
            $printSetting->width = $request->width;
            $printSetting->height = $request->height;
            $printSetting->student_photo = $student_photo;
            $printSetting->barcode = $barcode;
            $printSetting->save();
        }
        else{
            // Update Data
            $printSetting = PrintSetting::find($id);

            $printSetting->slug = $request->slug;
            $printSetting->title = $request->title;
            $printSetting->header_left = $request->header_left;
            $printSetting->header_center = $request->header_center;
            $printSetting->header_right = $request->header_right;
            $printSetting->body = $request->body;
            $printSetting->footer_left = $request->footer_left;
            $printSetting->footer_center = $request->footer_center;
            $printSetting->footer_right = $request->footer_right;
            $printSetting->logo_left = $this->updateImage($request, 'logo_left', $this->path, Null, 200, $printSetting, 'logo_left');
            $printSetting->logo_right = $this->updateImage($request, 'logo_right', $this->path, Null, 200, $printSetting, 'logo_right');
            $printSetting->background = $this->updateImage($request, 'background', $this->path, 800, Null, $printSetting, 'background');
            $printSetting->width = $request->width;
            $printSetting->height = $request->height;
            $printSetting->student_photo = $student_photo;
            $printSetting->barcode = $barcode;
            $printSetting->save();
        }


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
