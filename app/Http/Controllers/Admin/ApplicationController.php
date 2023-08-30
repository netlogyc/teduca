<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use App\Models\StudentRelative;
use App\Models\StudentEnroll;
use App\Models\EnrollSubject;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\Application;
use App\Models\StatusType;
use App\Models\Province;
use App\Models\District;
use App\Models\Document;
use App\Models\Program;
use App\Models\Student;
use App\Models\Batch;
use Carbon\Carbon;
use Toastr;
use Auth;
use Hash;
use DB;

class ApplicationController extends Controller
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
        $this->title = trans_choice('module_application', 1);
        $this->route = 'admin.application';
        $this->view = 'admin.application';
        $this->path = 'student';
        $this->access = 'application';


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

        if(!empty($request->status) || $request->status != null){
            $data['selected_status'] = $status = $request->status;
        }
        else{
            $data['selected_status'] = $status = '99';
        }

        if(!empty($request->start_date) || $request->start_date != null){
            $data['selected_start_date'] = $start_date = $request->start_date;
        }
        else{
            $data['selected_start_date'] = $start_date = date('Y-m-d', strtotime(Carbon::now()->subYear()));
        }

        if(!empty($request->end_date) || $request->end_date != null){
            $data['selected_end_date'] = $end_date = $request->end_date;
        }
        else{
            $data['selected_end_date'] = $end_date = date('Y-m-d', strtotime(Carbon::today()));
        }

        if(!empty($request->registration_no) || $request->registration_no != null){
            $data['selected_registration_no'] = $registration_no = $request->registration_no;
        }
        else{
            $data['selected_registration_no'] = Null;
        }


        // Search Filter
        $data['batches'] = Batch::where('status', '1')->orderBy('id', 'desc')->get();
        $data['programs'] = Program::where('status', '1')->orderBy('title', 'asc')->get();


        // Application Filter
        $applications = Application::whereDate('apply_date', '>=', $start_date)
                    ->whereDate('apply_date', '<=', $end_date);
                    if(!empty($request->batch)){
                        $applications->where('batch_id', $batch);
                    }
                    if(!empty($request->program)){
                        $applications->where('program_id', $program);
                    }
                    if(!empty($request->registration_no)){
                        $applications->where('registration_no', 'LIKE', '%'.$registration_no.'%');
                    }
                    if(!empty($request->status) || $request->status != null){
                        $applications->where('status', $status);
                    }
        $data['rows'] = $applications->orderBy('registration_no', 'desc')->get();


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
            'admission_date' => 'required|date',
            'photo' => 'nullable|image',
            'signature' => 'nullable|image',
        ]);

        // Random Password
        $password = str_random(8);
        $data = Application::where('registration_no', $request->registration_no)->firstOrFail();

        // Insert Data
        try{
            DB::beginTransaction();
            
            $application = new Student;
            $application->student_id = $request->student_id;
            $application->registration_no = $request->registration_no;
            $application->batch_id = $request->batch;
            $application->program_id = $request->program;
            $application->admission_date = $request->admission_date;

            $application->first_name = $request->first_name;
            $application->last_name = $request->last_name;
            $application->father_name = $request->father_name;
            $application->mother_name = $request->mother_name;
            $application->father_occupation = $request->father_occupation;
            $application->mother_occupation = $request->mother_occupation;
            $application->email = $request->email;
            $application->password = Hash::make($password);
            $application->password_text = Crypt::encryptString($password);

            $application->country = $request->country;
            $application->present_province = $request->present_province;
            $application->present_district = $request->present_district;
            $application->present_village = $request->present_village;
            $application->present_address = $request->present_address;
            $application->permanent_province = $request->permanent_province;
            $application->permanent_district = $request->permanent_district;
            $application->permanent_village = $request->permanent_village;
            $application->permanent_address = $request->permanent_address;

            $application->gender = $request->gender;
            $application->dob = $request->dob;
            $application->phone = $request->phone;
            $application->emergency_phone = $request->emergency_phone;

            $application->religion = $request->religion;
            $application->caste = $request->caste;
            $application->mother_tongue = $request->mother_tongue;
            $application->marital_status = $request->marital_status;
            $application->blood_group = $request->blood_group;
            $application->nationality = $request->nationality;
            $application->national_id = $request->national_id;
            $application->passport_no = $request->passport_no;

            $application->school_name = $request->school_name;
            $application->school_exam_id = $request->school_exam_id;
            $application->school_graduation_year = $request->school_graduation_year;
            $application->school_graduation_point = $request->school_graduation_point;
            $application->collage_name = $request->collage_name;
            $application->collage_exam_id = $request->collage_exam_id;
            $application->collage_graduation_year = $request->collage_graduation_year;
            $application->collage_graduation_point = $request->collage_graduation_point;
            if($request->hasFile('photo')){
            $application->photo = $this->uploadImage($request, 'photo', $this->path, 300, 300);
            }
            else{
            $application->photo = $data->photo;
            }
            if($request->hasFile('signature')){
            $application->signature = $this->uploadImage($request, 'signature', $this->path, 300, 100);
            }
            else{
            $application->signature = $data->signature;
            }
            $application->status = '1';
            $application->created_by = Auth::guard('web')->user()->id;
            $application->save();


            // Attach Status
            $application->statuses()->attach($request->statuses);


            // Student Relatives
            if(is_array($request->relations)){
            foreach($request->relations as $key =>$relation){
                if($relation != '' && $relation != null){
                // Insert Data
                $relation = new StudentRelative;
                $relation->student_id = $application->id;
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
                $document->students()->attach($application->id);

                }
            }}
            

            // Student Enroll
            $enroll = new StudentEnroll();
            $enroll->student_id = $application->id;
            $enroll->program_id = $request->program;
            $enroll->session_id = $request->session;
            $enroll->semester_id = $request->semester;
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


            // Application Status Update
            $data->status = '2';
            $data->updated_by = Auth::guard('web')->user()->id;
            $data->save();

            DB::commit();


            Toastr::success(__('msg_created_successfully'), __('msg_success'));

            return redirect()->route($this->route.'.index');
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
    public function show(Application $application)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['row'] = $application;

        return view($this->view.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        

        $data['provinces'] = Province::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        $data['present_districts'] = District::where('status', '1')
                            ->where('province_id', $application->present_province)
                            ->orderBy('title', 'asc')->get();
        $data['permanent_districts'] = District::where('status', '1')
                            ->where('province_id', $application->permanent_province)
                            ->orderBy('title', 'asc')->get();
        $data['statuses'] = StatusType::where('status', '1')->get();
        $data['batches'] = Batch::where('status', '1')->orderBy('id', 'desc')->get();

        $data['row'] = $application;


        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
        $application->status = '0';
        $application->updated_by = Auth::guard('web')->user()->id;
        $application->save();

        
        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        DB::beginTransaction();
        // Delete
        $this->deleteMultiMedia($this->path, $application, 'photo');
        $this->deleteMultiMedia($this->path, $application, 'signature');
        
        $application->delete();
        DB::commit();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
