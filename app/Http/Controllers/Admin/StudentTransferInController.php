<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use App\Models\StudentRelative;
use App\Models\StudentTransfer;
use App\Models\TransferCreadit;
use App\Models\StudentEnroll;
use App\Models\EnrollSubject;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\StatusType;
use App\Models\Province;
use App\Models\Semester;
use App\Models\Document;
use App\Models\Session;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Batch;
use Carbon\Carbon;
use Toastr;
use Hash;
use Auth;
use DB;

class StudentTransferInController extends Controller
{
    use FileUploader;

    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_transfer_in', 1);
        $this->route = 'admin.student-transfer-in';
        $this->view = 'admin.student-transfer-in';
        $this->path = 'student';
        $this->access = 'student-transfer-in';


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

        $data['rows'] = StudentTransfer::where('status', '0')->orderBy('id', 'desc')->get();

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
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['batches'] = Batch::where('status', '1')->orderBy('id', 'desc')->get();
        $data['sessions'] = Session::where('status', '1')->orderBy('id', 'desc')->get();
        $data['semesters'] = Semester::where('status', '1')->orderBy('id', 'asc')->get();
        $data['provinces'] = Province::where('status', '1')->orderBy('title', 'asc')->get();
        $data['subjects'] = Subject::where('status', '1')->orderBy('code', 'asc')->get();
        $data['statuses'] = StatusType::where('status', '1')->get();

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
            'student_id' => 'required|unique:students,student_id',
            'batch' => 'required',
            'program' => 'required',
            'session' => 'required',
            'semester' => 'required',
            'section' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'photo' => 'nullable|image',
            'signature' => 'nullable|image',
            'transfer_id' => 'required',
            'university_name' => 'required',
            'date' => 'required|date',
        ]);

        // Random Password
        $password = str_random(8);

        // Insert Data
        DB::beginTransaction();
        $student = new Student;
        $student->student_id = $request->student_id;
        $student->batch_id = $request->batch;
        $student->program_id = $request->program;
        $student->admission_date = $request->admission_date;

        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->father_occupation = $request->father_occupation;
        $student->mother_occupation = $request->mother_occupation;
        $student->email = $request->email;
        $student->password = Hash::make($password);
        $student->password_text = Crypt::encryptString($password);

        $student->country = $request->country;
        $student->present_province = $request->present_province;
        $student->present_district = $request->present_district;
        $student->present_village = $request->present_village;
        $student->present_address = $request->present_address;
        $student->permanent_province = $request->permanent_province;
        $student->permanent_district = $request->permanent_district;
        $student->permanent_village = $request->permanent_village;
        $student->permanent_address = $request->permanent_address;

        $student->gender = $request->gender;
        $student->dob = $request->dob;
        $student->phone = $request->phone;
        $student->emergency_phone = $request->emergency_phone;

        $student->religion = $request->religion;
        $student->caste = $request->caste;
        $student->mother_tongue = $request->mother_tongue;
        $student->marital_status = $request->marital_status;
        $student->blood_group = $request->blood_group;
        $student->nationality = $request->nationality;
        $student->national_id = $request->national_id;
        $student->passport_no = $request->passport_no;

        $student->school_name = $request->school_name;
        $student->school_exam_id = $request->school_exam_id;
        $student->school_graduation_year = $request->school_graduation_year;
        $student->school_graduation_point = $request->school_graduation_point;
        $student->collage_name = $request->collage_name;
        $student->collage_exam_id = $request->collage_exam_id;
        $student->collage_graduation_year = $request->collage_graduation_year;
        $student->collage_graduation_point = $request->collage_graduation_point;
        if(isset($request->photo)){
        $student->photo = $this->uploadImage($request, 'photo', $this->path, 300, 300);
        }
        if(isset($request->signature)){
        $student->signature = $this->uploadImage($request, 'signature', $this->path, 300, 100);
        }
        $student->status = '1';
        $student->is_transfer = '1';
        $student->created_by = Auth::guard('web')->user()->id;
        $student->save();


        // Attach Status
        $student->statuses()->attach($request->statuses);


        // Student Relatives
        if(is_array($request->relations)){
        foreach($request->relations as $key =>$relation){
            if($relation != '' && $relation != null){
            // Insert Data
            $relation = new StudentRelative;
            $relation->student_id = $student->id;
            $relation->relation = $request->relations[$key];
            $relation->name = $request->relative_names[$key];
            $relation->occupation = $request->occupations[$key];
            // $relation->email = $request->relative_emails[$key];
            $relation->phone = $request->relative_phones[$key];
            $relation->address = $request->addresses[$key];
            $relation->save();
            }
        }}


        // Student Documents
        if(is_array($request->documents)){
        $documents = $request->file('documents');
        foreach($documents as $key =>$attach){

            // Valid extension check
            $valid_extensions = array('jpg','jpeg','png','gif','ico','svg','webp','pdf','doc','docx','txt','zip','rar','csv','xls','xlsx','ppt','pptx','mp3','avi','mp4','mpeg','3gp');
            $file_ext = $attach->getClientOriginalExtension();
            if(in_array($file_ext, $valid_extensions, true))
            {

            //Upload Files
            $filename = $attach->getClientOriginalName();
            $extension = $attach->getClientOriginalExtension();
            $fileNameToStore = str_replace([' ','-','&','#','$','%','^',';',':'],'_',$filename).'_'.time().'.'.$extension;

            // Move file inside public/uploads/ directory
            $attach->move('uploads/'.$this->path.'/', $fileNameToStore);

            // Insert Data
            $document = new Document;
            $document->title = $request->titles[$key];
            $document->attach = $fileNameToStore;
            $document->save();

            // Attach
            $document->students()->attach($student->id);

            }
        }}
        

        // Student Enroll
        $enroll = new StudentEnroll();
        $enroll->student_id = $student->id;
        $enroll->session_id = $request->session;
        $enroll->semester_id = $request->semester;
        $enroll->program_id = $request->program;
        $enroll->section_id = $request->section;
        $enroll->created_by = Auth::guard('web')->user()->id;
        $enroll->save();


        // Assign Subjects
        $enrollSubject = EnrollSubject::where('program_id', $request->program)->where('semester_id', $request->semester)->where('section_id', $request->section)->first();
        
        if(isset($enrollSubject)){
            foreach($enrollSubject->subjects as $subject){
                // Attach Subject
                $enroll->subjects()->attach($subject->id);
            }
        }


        //Student Transfer Info
        $transfer = new StudentTransfer;
        $transfer->student_id = $student->id;
        $transfer->transfer_id = $request->transfer_id;
        $transfer->university_name = $request->university_name;
        $transfer->date = $request->date;
        $transfer->note = $request->note;
        $transfer->status = '0';
        $transfer->created_by = Auth::guard('web')->user()->id;
        $transfer->save();


        // Transfer Credits
        if(is_array($request->t_subjects)){
        foreach($request->t_subjects as $key => $t_subject)
        {
            $creadit = new TransferCreadit;
            $creadit->student_id = $student->id;
            $creadit->program_id = $request->program;
            $creadit->session_id = $request->t_sessions[$key];
            $creadit->semester_id = $request->t_semesters[$key];
            $creadit->subject_id = $request->t_subjects[$key];
            $creadit->marks = $request->marks[$key];
            $creadit->save();
        }}
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
        $data['access'] = $this->access;


        $data['sessions'] = Session::where('status', '1')->orderBy('id', 'desc')->get();
        $data['semesters'] = Semester::where('status', '1')->orderBy('id', 'asc')->get();
        $data['subjects'] = Subject::where('status', '1')->orderBy('code', 'asc')->get();

        $data['row'] = StudentTransfer::find($id);

        
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
            'transfer_id' => 'required',
            'university_name' => 'required',
            'date' => 'required|date',
        ]);


        DB::beginTransaction();
        // Update Data
        $transfer = StudentTransfer::find($id);
        $transfer->transfer_id = $request->transfer_id;
        $transfer->university_name = $request->university_name;
        $transfer->date = $request->date;
        $transfer->note = $request->note;
        $transfer->updated_by = Auth::guard('web')->user()->id;
        $transfer->save();


        // Transfer Credits
        if(is_array($request->t_subjects)){
        foreach($request->t_subjects as $key => $t_subject)
        {
            if(isset($request->t_creadit_id[$key])){

                $creadit = TransferCreadit::find($request->t_creadit_id[$key]);
                $creadit->program_id = $request->t_programs[$key];
                $creadit->session_id = $request->t_sessions[$key];
                $creadit->semester_id = $request->t_semesters[$key];
                $creadit->subject_id = $request->t_subjects[$key];
                $creadit->marks = $request->marks[$key];
                $creadit->save();
            }
            else{

                $creadit = new TransferCreadit;
                $creadit->student_id = $request->student_id;
                $creadit->program_id = $request->t_programs[$key];
                $creadit->session_id = $request->t_sessions[$key];
                $creadit->semester_id = $request->t_semesters[$key];
                $creadit->subject_id = $request->t_subjects[$key];
                $creadit->marks = $request->marks[$key];
                $creadit->save();
            }
        }}
        DB::commit();


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
