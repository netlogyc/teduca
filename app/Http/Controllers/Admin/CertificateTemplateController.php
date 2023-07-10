<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CertificateTemplate;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use Toastr;

class CertificateTemplateController extends Controller
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
        $this->title = trans_choice('module_certificate_template', 1);
        $this->route = 'admin.certificate-template';
        $this->view = 'admin.certificate-template';
        $this->path = 'certificate-template';
        $this->access = 'certificate-template';


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
    public function index()
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;
        
        $data['rows'] = CertificateTemplate::orderBy('title', 'asc')->get();

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
            'title' => 'required|max:191|unique:certificate_templates,title',
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

        // Insert Data
        $certificateTemplate = new CertificateTemplate;
        $certificateTemplate->title = $request->title;
        $certificateTemplate->header_left = $request->header_left;
        $certificateTemplate->header_center = $request->header_center;
        $certificateTemplate->header_right = $request->header_right;
        $certificateTemplate->body = $request->body;
        $certificateTemplate->footer_left = $request->footer_left;
        $certificateTemplate->footer_center = $request->footer_center;
        $certificateTemplate->footer_right = $request->footer_right;
        $certificateTemplate->logo_left = $this->uploadImage($request, 'logo_left', $this->path, Null, 200);
        $certificateTemplate->logo_right = $this->uploadImage($request, 'logo_right', $this->path, Null, 200);
        $certificateTemplate->background = $this->uploadImage($request, 'background', $this->path, 800, Null);
        $certificateTemplate->width = $request->width;
        $certificateTemplate->height = $request->height;
        $certificateTemplate->student_photo = $student_photo;
        $certificateTemplate->barcode = $barcode;
        $certificateTemplate->save();


        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CertificateTemplate $certificateTemplate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificateTemplate $certificateTemplate)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $certificateTemplate;

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CertificateTemplate $certificateTemplate)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:certificate_templates,title,'.$certificateTemplate->id,
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

        // Update Data
        $certificateTemplate->title = $request->title;
        $certificateTemplate->header_left = $request->header_left;
        $certificateTemplate->header_center = $request->header_center;
        $certificateTemplate->header_right = $request->header_right;
        $certificateTemplate->body = $request->body;
        $certificateTemplate->footer_left = $request->footer_left;
        $certificateTemplate->footer_center = $request->footer_center;
        $certificateTemplate->footer_right = $request->footer_right;
        $certificateTemplate->logo_left = $this->updateImage($request, 'logo_left', $this->path, Null, 200, $certificateTemplate, 'logo_left');
        $certificateTemplate->logo_right = $this->updateImage($request, 'logo_right', $this->path, Null, 200, $certificateTemplate, 'logo_right');
        $certificateTemplate->background = $this->updateImage($request, 'background', $this->path, 800, Null, $certificateTemplate, 'background');
        $certificateTemplate->width = $request->width;
        $certificateTemplate->height = $request->height;
        $certificateTemplate->student_photo = $student_photo;
        $certificateTemplate->barcode = $barcode;
        $certificateTemplate->status = $request->status;
        $certificateTemplate->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificateTemplate $certificateTemplate)
    {
        // Delete Data
        $this->deleteMultiMedia($this->path, $certificateTemplate, 'logo_left');
        $this->deleteMultiMedia($this->path, $certificateTemplate, 'logo_right');
        $this->deleteMultiMedia($this->path, $certificateTemplate, 'background');
        
        $certificateTemplate->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
