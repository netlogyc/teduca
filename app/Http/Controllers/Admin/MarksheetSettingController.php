<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MarksheetSetting;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use Toastr;

class MarksheetSettingController extends Controller
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
        $this->title = trans_choice('module_marksheet_setting', 1);
        $this->route = 'admin.marksheet-setting';
        $this->view = 'admin.marksheet-setting';
        $this->path = 'marksheet-setting';
        $this->access = 'marksheet-setting';


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
        
        $data['row'] = MarksheetSetting::where('status', '1')->first();

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
            $marksheetSetting = new MarksheetSetting;

            $marksheetSetting->title = $request->title;
            $marksheetSetting->header_left = $request->header_left;
            $marksheetSetting->header_center = $request->header_center;
            $marksheetSetting->header_right = $request->header_right;
            $marksheetSetting->body = $request->body;
            $marksheetSetting->footer_left = $request->footer_left;
            $marksheetSetting->footer_center = $request->footer_center;
            $marksheetSetting->footer_right = $request->footer_right;
            $marksheetSetting->logo_left = $this->uploadImage($request, 'logo_left', $this->path, Null, 200);
            $marksheetSetting->logo_right = $this->uploadImage($request, 'logo_right', $this->path, Null, 200);
            $marksheetSetting->background = $this->uploadImage($request, 'background', $this->path, 800, Null);
            $marksheetSetting->width = $request->width;
            $marksheetSetting->height = $request->height;
            $marksheetSetting->student_photo = $student_photo;
            $marksheetSetting->barcode = $barcode;
            $marksheetSetting->save();
        }
        else{
            // Update Data
            $marksheetSetting = MarksheetSetting::find($id);

            $marksheetSetting->title = $request->title;
            $marksheetSetting->header_left = $request->header_left;
            $marksheetSetting->header_center = $request->header_center;
            $marksheetSetting->header_right = $request->header_right;
            $marksheetSetting->body = $request->body;
            $marksheetSetting->footer_left = $request->footer_left;
            $marksheetSetting->footer_center = $request->footer_center;
            $marksheetSetting->footer_right = $request->footer_right;
            $marksheetSetting->logo_left = $this->updateImage($request, 'logo_left', $this->path, Null, 200, $marksheetSetting, 'logo_left');
            $marksheetSetting->logo_right = $this->updateImage($request, 'logo_right', $this->path, Null, 200, $marksheetSetting, 'logo_right');
            $marksheetSetting->background = $this->updateImage($request, 'background', $this->path, 800, Null, $marksheetSetting, 'background');
            $marksheetSetting->width = $request->width;
            $marksheetSetting->height = $request->height;
            $marksheetSetting->student_photo = $student_photo;
            $marksheetSetting->barcode = $barcode;
            $marksheetSetting->save();
        }


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
