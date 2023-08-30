<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentAssignment;
use App\Models\StudentEnroll;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\Student;
use Carbon\Carbon;
use Toastr;
use Auth;

class AssignmentController extends Controller
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
        $this->title = trans_choice('module_assignment', 1);
        $this->route = 'student.assignment';
        $this->view = 'student.assignment';
        $this->path = 'assignment';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['view']      = $this->view;
        $data['path']      = $this->path;


        $data['user'] = $user = Student::where('id', Auth::guard('student')->user()->id)->firstOrFail();

        $data['sessions'] = StudentEnroll::where('student_id', $user->id)->groupBy('session_id')->get();
        $data['semesters'] = StudentEnroll::where('student_id', $user->id)->groupBy('semester_id')->get();


        if(!empty($request->session) || $request->session != null){
            $data['selected_session'] = $session = $request->session;
        }
        else{
            $data['selected_session'] = $session = '0';
        }

        if(!empty($request->semester) || $request->semester != null){
            $data['selected_semester'] = $semester = $request->semester;
        }
        else{
            $data['selected_semester'] = $semester = '0';
        }
        

        // Filter Assignment
        $assignments = StudentAssignment::with('studentEnroll')->whereHas('studentEnroll', function ($query) use ($user, $session, $semester){
                $query->where('student_id', $user->id);
            if($session != 0){
                $query->where('session_id', $session);
            }
            if($semester != 0){
                $query->where('semester_id', $semester);
            }
        });
        $assignments->with('assignment')->whereHas('assignment', function ($query){
            $query->where('start_date', '<=', Carbon::today());
        });
        $data['rows'] = $assignments->orderBy('id', 'desc')->get();


        return view($this->view.'.index', $data);
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
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['view']      = $this->view;
        $data['path']      = $this->path;


        $user = Student::where('id', Auth::guard('student')->user()->id)->firstOrFail();

        $data['row'] = $stuAss = StudentAssignment::where('id', $id)
                    ->with('studentEnroll')->whereHas('studentEnroll', function ($query) use ($user){
                        $query->where('student_id', $user->id);
                    })
                    ->with('assignment')->whereHas('assignment', function ($query){
                        $query->where('start_date', '<=', Carbon::today());
                    })
                    ->firstOrFail();


        // Read Notifications
        foreach ($user->unreadNotifications as $notification) {
            if($notification->data['type'] == 'assignment' && $notification->data['id'] == $stuAss->assignment_id) {
                $notification->markAsRead();
            }
        }


        return view($this->view.'.show', $data);
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
            'attach' => 'required|mimes:pdf,docx,zip,xlsx,ppt|max:20480',
        ]);

        // Update Data
        $assignment = StudentAssignment::find($id);
        $assignment->attendance = 1;
        $assignment->date = Carbon::today();
        $assignment->attach = $this->updateMedia($request, 'attach', $this->path, $assignment);
        $assignment->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
