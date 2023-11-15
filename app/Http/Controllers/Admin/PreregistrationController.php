<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Preregistration;
use Illuminate\Http\Request;
use Toastr;

class PreregistrationController extends Controller
{
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_preregistration', 1);
        $this->route = 'admin.preregistration';
        $this->view = 'admin.preregistration';
        $this->path = 'preregistration';
        $this->access = 'preregistration';


        // $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-create|'.$this->access.'-edit|'.$this->access.'-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:'.$this->access.'-create', ['only' => ['create','store']]);
        $this->middleware('permission:'.$this->access.'-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:'.$this->access.'-delete', ['only' => ['destroy']]);
    }
    public function index()
    {

       
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;
        
        $data['rows'] = Preregistration::orderBy('fecha_de_inters', 'asc')->get();
        // return $data['rows'];
        // return $data;
        return view($this->view.'.index', $data);
    }
    public function show()
    {
        return view($this->view.'.view');
    }
    public function update(Request $request, $id)
    {
       

        // Field Validation
        $request->validate([
            'status' => 'required',
        ]);
        
        // Update Data
        $preregistration = Preregistration::findOrFail($id);
        $preregistration->status = $request->status;
        $preregistration->save();

        Toastr::success(__('Se ha actualizado el estado'), __('msg_success'));

        // if($request->status == 0){
        //     Toastr::success(__('msg_canceled_successfully'), __('msg_success'));
        // }
        // elseif($request->status == 1){
        //     Toastr::success(__('msg_approve_successfully'), __('msg_success'));
        // }

        return redirect()->back();
    }
    public function view(Preregistration $preregistration)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['row'] = $preregistration;
        // $data['row'] = Preregistration::whete('id',$id)->orderBy('fecha_de_inters', 'asc')->get();

        // $data['fees'] = Fee::with('studentEnroll')->whereHas('studentEnroll', function ($query) use ($student){
        //             $query->where('student_id', $student->id);
        //         })
        //         ->orderBy('id', 'desc')->get();

        // $data['grades'] = Grade::where('status', '1')->orderBy('min_mark', 'desc')->get();

        return view($this->view.'.show', $data);
    }
}
