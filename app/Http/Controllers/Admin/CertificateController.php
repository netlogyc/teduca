<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CertificateTemplate;
use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\Student;
use App\Models\Program;
use App\Models\Batch;
use App\Models\Grade;
use Toastr;

class CertificateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_certificate', 1);
        $this->route = 'admin.certificate';
        $this->view = 'admin.certificate';
        $this->path = 'certificate-template';
        $this->access = 'certificate';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-create|'.$this->access.'-edit|'.$this->access.'-print|'.$this->access.'-download', ['only' => ['index','show']]);
        $this->middleware('permission:'.$this->access.'-create', ['only' => ['create','store']]);
        $this->middleware('permission:'.$this->access.'-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:'.$this->access.'-print', ['only' => ['print']]);
        $this->middleware('permission:'.$this->access.'-download', ['only' => ['download']]);
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


        if(!empty($request->batch) || $request->batch != null){
            $data['selected_batch'] = $batch = $request->batch;
        }
        else{
            $data['selected_batch'] = '0';
        }

        if(!empty($request->program) || $request->program != null){
            $data['selected_program'] = $program = $request->program;
        }
        else{
            $data['selected_program'] = '0';
        }

        if(!empty($request->student_id) || $request->student_id != null){
            $data['selected_student_id'] = $student_id = $request->student_id;
        }
        else{
            $data['selected_student_id'] = null;
        }

        if(!empty($request->template) || $request->template != null){
            $data['selected_template'] = $template = $request->template;
        }
        else{
            $data['selected_template'] = '0';
        }


        $data['batchs'] = Batch::where('status', '1')
                        ->orderBy('id', 'desc')->get();
        $data['programs'] = Program::where('status', '1')
                        ->orderBy('title', 'asc')->get();
        $data['grades'] = Grade::where('status', '1')
                        ->orderBy('point', 'asc')->get();
        $data['templates'] = CertificateTemplate::where('status', '1')
                        ->orderBy('title', 'asc')->get();


        if(!empty($request->template)){

            $data['certificate_template'] = CertificateTemplate::where('id', $template)->first();
        }


        // Filter Student
        if(!empty($request->batch) || !empty($request->program) || !empty($request->student_id) || !empty($request->template)){

            $students = Student::where('status', '!=', '0');

            if(!empty($request->batch) && $request->batch != '0'){
                $students->where('batch_id', $batch);
            }
            if(!empty($request->program) && $request->program != '0'){
                $students->where('program_id', $program);
            }
            if(!empty($request->student_id)){
                $students->where('student_id', 'LIKE', '%'.$student_id.'%');
            }

            $data['rows'] = $students->orderBy('student_id', 'asc')->get();
        }


        // Certificate List
        if(!empty($request->batch) || !empty($request->program) || !empty($request->student_id) || !empty($request->template)){
        
            $certificate = Certificate::where('status', '!=', '0');
            if(!empty($request->template) && $request->template != '0'){
                $certificate->where('template_id', $template);
            }
            if(!empty($request->batch) && $request->batch != '0'){
                $certificate->with('student')->whereHas('student', function ($query) use ($batch){
                    $query->where('batch_id', $batch);
                });
            }
            if(!empty($request->program) && $request->program != '0'){
                $certificate->with('student')->whereHas('student', function ($query) use ($program){
                    $query->where('program_id', $program);
                });
            }
            if(!empty($request->student_id) && $request->student_id != '0'){
                $certificate->with('student')->whereHas('student', function ($query) use ($student_id){
                    $query->where('student_id', 'LIKE', '%'.$student_id.'%');
                });
            }
            $data['certificates'] = $certificate->orderBy('id', 'desc')->get();
        }


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
            'student_id' => 'required',
            'template_id' => 'required',
            'date' => 'required|date',
            'starting_year' => 'required|numeric',
            'ending_year' => 'required|numeric',
            'credits' => 'required|numeric',
            'point' => 'required|numeric',
        ]);


        $row = Student::where('id', $request->student_id)->first();
        $grades = Grade::where('status', '1')
                        ->orderBy('point', 'asc')->get();

        // Result Calculation
        $total_credits = 0;
        $total_cgpa = 0;
        $starting_year = '0000';
        $ending_year = '0000';

        foreach( $row->studentEnrolls as $key => $item ){
            if($key == 0){
            $starting_year = $item->session->start_date;
            }
            $ending_year = $item->session->end_date;


            if(isset($item->subjectMarks)){
            foreach($item->subjectMarks as $mark){

                $marks_per = round($mark->total_marks);

                foreach($grades as $grade){
                    if($marks_per >= $grade->min_mark && $marks_per <= $grade->max_mark){
                        if($grade->point > 0){
                        $total_cgpa = $total_cgpa + ($grade->point * $mark->subject->credit_hour);
                        $total_credits = $total_credits + $mark->subject->credit_hour;
                        }
                    break;
                    }
                }
            }}
        }

        $original_credits = $total_credits;
        if($total_credits <= 0){
            $total_credits = 1;
        }
        $com_gpa = $total_cgpa / $total_credits;


        // Insert Data
        $certificate = new Certificate;
        $certificate->template_id = $request->template_id;
        $certificate->student_id = $request->student_id;
        $certificate->date = $request->date;
        $certificate->starting_year = $starting_year;
        $certificate->ending_year = $ending_year;
        $certificate->credits = $original_credits;
        $certificate->point = number_format((float)$com_gpa, 2, '.', '');
        $certificate->status = '1';
        $certificate->save();

        // Set SL No
        $certificate->serial_no = (intval($certificate->id) + intval(100000));
        $certificate->barcode = (intval($certificate->id) + intval(100000));
        $certificate->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {
        // Field Validation
        $request->validate([
            'student_id' => 'required',
            'date' => 'required|date',
            'starting_year' => 'required|numeric',
            'ending_year' => 'required|numeric',
            'credits' => 'required|numeric',
            'point' => 'required|numeric',
        ]);


        $row = Student::where('id', $request->student_id)->first();
        $grades = Grade::where('status', '1')->orderBy('point', 'asc')->get();

        // Result Calculation
        $total_credits = 0;
        $total_cgpa = 0;
        $starting_year = '0000';
        $ending_year = '0000';

        foreach( $row->studentEnrolls as $key => $item ){
            if($key == 0){
            $starting_year = $item->session->start_date;
            }
            $ending_year = $item->session->end_date;
            

            if(isset($item->subjectMarks)){
            foreach($item->subjectMarks as $mark){

                $marks_per = round($mark->total_marks);

                foreach($grades as $grade){
                    if($marks_per >= $grade->min_mark && $marks_per <= $grade->max_mark){
                        if($grade->point > 0){
                        $total_cgpa = $total_cgpa + ($grade->point * $mark->subject->credit_hour);
                        $total_credits = $total_credits + $mark->subject->credit_hour;
                        }
                    break;
                    }
                }
            }}
        }

        $original_credits = $total_credits;
        if($total_credits <= 0){
            $total_credits = 1;
        }
        $com_gpa = $total_cgpa / $total_credits;


        // Update Data
        $certificate->date = $request->date;
        $certificate->starting_year = $starting_year;
        $certificate->ending_year = $ending_year;
        $certificate->credits = $original_credits;
        $certificate->point = number_format((float)$com_gpa, 2, '.', '');
        $certificate->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        // View
        $data['certificate'] = Certificate::where('status', '1')->findOrFail($id);
        $data['grades'] = Grade::where('status', '1')->orderBy('point', 'asc')->get();

        return view($this->view.'.print', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        // View
        $data['certificate'] = Certificate::where('status', '1')->findOrFail($id);
        $data['grades'] = Grade::where('status', '1')->orderBy('point', 'asc')->get();

        return view($this->view.'.download', $data);
    }
}
