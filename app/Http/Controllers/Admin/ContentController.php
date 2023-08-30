<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Notification;
use App\Notifications\ContentNotification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\ContentType;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\Content;
use Carbon\Carbon;
use Toastr;
use Auth;
use DB;

class ContentController extends Controller
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
        $this->title = trans_choice('module_content', 1);
        $this->route = 'admin.content';
        $this->view = 'admin.content';
        $this->path = 'content';
        $this->access = 'content';


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


        if(!empty($request->type) || $request->type != null){
            $data['selected_type'] = $type = $request->type;
        }
        else{
            $data['selected_type'] = $type = '0';
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

        
        // Search Filter
        $data['types'] = ContentType::where('status', '1')
                            ->orderBy('title', 'asc')->get();

        $rows = Content::whereDate('date', '>=', $start_date)
                    ->whereDate('date', '<=', $end_date);
                    if(!empty($request->type) || $request->type != null){
                        $rows->where('type_id', $type);
                    }
        $data['rows'] = $rows->orderBy('id', 'desc')->get();

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

        $data['faculties'] = Faculty::where('status', '1')->orderBy('title', 'asc')->get();
        $data['types'] = ContentType::where('status', '1')->orderBy('title', 'asc')->get();

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
            'faculty' => 'required',
            'program' => 'required',
            'session' => 'required',
            'semester' => 'required',
            'section' => 'required',
            'type' => 'required',
            'title' => 'required|max:191',
            'date' => 'required|date|after_or_equal:today',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);

        
        //Insert Data
        try{
            DB::beginTransaction();
            //Insert
            $content = new Content;
            $content->faculty_id = $request->faculty;
            $content->program_id = $request->program;
            $content->session_id = $request->session;
            $content->semester_id = $request->semester;
            $content->section_id = $request->section;
            $content->type_id = $request->type;
            $content->title = $request->title;
            $content->description = $request->description;
            $content->date = $request->date;
            $content->url = $request->url;
            $content->attach = $this->uploadMedia($request, 'attach', $this->path);
            $content->created_by = Auth::guard('web')->user()->id;
            $content->save();



            // Set Value
            $faculty = $request->faculty;
            $program = $request->program;
            $session = $request->session;
            $semester = $request->semester;
            $section = $request->section;

            // Student Filter
            $students = Student::where('status', '1');
            if($faculty != 0){
                $students->with('program')->whereHas('program', function ($query) use ($faculty){
                    $query->where('faculty_id', $faculty);
                });
            }
            $students->with('currentEnroll')->whereHas('currentEnroll', function ($query) use ($program, $session, $semester, $section){
                if($program != 0){
                $query->where('program_id', $program);
                }
                if($session != 0){
                $query->where('session_id', $session);
                }
                if($semester != 0){
                $query->where('semester_id', $semester);
                }
                if($section != 0){
                $query->where('section_id', $section);
                }
                $query->where('status', '1');
            });
            $all_students = $students->orderBy('student_id', 'desc')->get();

            $content->students()->attach($all_students);


            // Notification Data
            $data = [
                'id' => $content->id,
                'title' => $content->title,
                'type' => 'content'
            ];


            $today_date = Carbon::parse(Carbon::today())->format('Y-m-d');

            if($request->date == $today_date){
                
                Notification::send($all_students, new ContentNotification($data));
            }
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
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $content;

        return view($this->view.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['types'] = ContentType::where('status', '1')->orderBy('title', 'asc')->get();

        $data['row'] = $content;

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        // Field Validation
        $request->validate([
            'type' => 'required',
            'title' => 'required|max:191',
            'date' => 'required|date',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);


        //Update Data
        $content->type_id = $request->type;
        // $content->title = $request->title;
        $content->description = $request->description;
        $content->date = $request->date;
        $content->url = $request->url;
        $content->attach = $this->updateMedia($request, 'attach', $this->path, $content);
        $content->status = $request->status;
        $content->updated_by = Auth::guard('web')->user()->id;
        $content->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        DB::beginTransaction();
        // Delete Attach
        $this->deleteMedia($this->path, $content);
        $content->students()->detach();
        $content->users()->detach();

        // Delete Notification
        DB::table('notifications')->where('type', 'App\Notifications\ContentNotification')->where('data->id', $content->id)->delete();

        // Delete data
        $content->delete();
        DB::commit();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));
        
        return redirect()->back();
    }
}