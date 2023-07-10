<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentTransfer;
use App\Models\StudentEnroll;
use Illuminate\Http\Request;
use App\Models\StatusType;
use App\Models\Student;
use App\Models\Grade;
use Toastr;
use Auth;
use DB;

class StudentTransferOutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_transfer_out', 1);
        $this->route = 'admin.student-transfer-out';
        $this->view = 'admin.student-transfer-out';
        $this->path = 'student';
        $this->access = 'student-transfer-out';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-create|'.$this->access.'-edit', ['only' => ['index','show']]);
        $this->middleware('permission:'.$this->access.'-create', ['only' => ['create','store']]);
        $this->middleware('permission:'.$this->access.'-edit', ['only' => ['edit','update']]);
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

        $data['rows'] = StudentTransfer::where('status', '1')->orderBy('id', 'desc')->get();

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
        $data['access'] = $this->access;


        $data['students'] = Student::whereHas('currentEnroll')->where('status', '1')->orderBy('student_id', 'asc')->get();
        
        if($request->student){

            $data['selected_student'] = $request->student;

            $data['statuses'] = StatusType::where('status', '1')->orderBy('title', 'asc')->get();

            $data['row'] = Student::where('student_id', $request->student)->first();

            $data['grades'] = Grade::where('status', '1')->orderBy('min_mark', 'desc')->get();
        }
        else {
            $data['selected_student'] = Null;
        }

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
            'student' => 'required',
            'transfer_id' => 'required|numeric',
            'university_name' => 'required',
            'date' => 'required|date',
        ]);


        try{
            $student = Student::where('student_id', $request->student)->first();
            $check = StudentTransfer::where('student_id', $student->id)->first();

            if(empty($check)){

                DB::beginTransaction();
                $transfer = new StudentTransfer;
                $transfer->student_id = $student->id;
                $transfer->transfer_id = $request->transfer_id;
                $transfer->university_name = $request->university_name;
                $transfer->date = $request->date;
                $transfer->note = $request->note;
                $transfer->status = '1';
                $transfer->created_by = Auth::guard('web')->user()->id;
                $transfer->save();

                
                // Pre Enroll Update
                $pre_enroll = StudentEnroll::where('student_id', $student->id)->where('status', '1')->first();
                if(isset($pre_enroll)){
                    $pre_enroll->status = '0';
                    $pre_enroll->save();
                }

                // Update Student
                $student->is_transfer = '2';
                $student->status = '3';
                $student->save();

                // Update Status
                $student->statuses()->sync($request->statuses);
                DB::commit();


                Toastr::success(__('msg_the_student_transfered'), __('msg_success'));

                return redirect()->route($this->view.'.index');
            }
            else{

                Toastr::success(__('msg_the_student_already_transfered'), __('msg_success'));

                return redirect()->back();
            }
        }
        catch(\Exception $e){

            Toastr::error(__('msg_created_error'), __('msg_error'));
            
            return redirect()->back();
        }
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
            'transfer_id' => 'required|numeric',
            'university_name' => 'required',
            'date' => 'required|date',
        ]);


        // Update Data
        $transfer = StudentTransfer::findOrFail($id);
        $transfer->transfer_id = $request->transfer_id;
        $transfer->university_name = $request->university_name;
        $transfer->date = $request->date;
        $transfer->note = $request->note;
        $transfer->updated_by = Auth::guard('web')->user()->id;
        $transfer->save();


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
        //
    }
}
