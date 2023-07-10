<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentAssignment;
use App\Models\StudentEnroll;
use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Student;
use App\Models\Event;
use App\Models\Fee;
use Carbon\Carbon;
use Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_dashboard', 1);
        $this->route = 'student.dashboard';
        $this->view = 'student';
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


        $student_id = Auth::guard('student')->user()->id;
        $current_session = Session::where('status', '1')->where('current', '1')->first();

        if(isset($current_session)){
            $enroll = StudentEnroll::where('student_id', $student_id)
                            ->where('session_id', $current_session->id)
                            ->where('status', '1')
                            ->first();

            if(isset($enroll)){
                $session = $enroll->session_id;
                $semester = $enroll->semester_id;
            }
        }


        // Assignments
        if(isset($enroll) && isset($session) && isset($semester)){
        $assignments = StudentAssignment::with('studentEnroll')->whereHas('studentEnroll', function ($query) use ($student_id, $session, $semester){
            $query->where('student_id', $student_id);
            $query->where('session_id', $session);
            $query->where('semester_id', $semester);
        });
        $assignments->with('assignment')->whereHas('assignment', function ($query){
            $query->where('start_date', '<=', Carbon::today());
        });

        $data['assignments'] = $assignments->orderBy('id', 'desc')->limit(10)->get();
        }


        // Fees
        if(isset($enroll) && isset($session) && isset($semester)){
        $fees = Fee::with('studentEnroll')->whereHas('studentEnroll', function ($query) use ($student_id, $session, $semester){
            $query->where('student_id', $student_id);
            $query->where('session_id', $session);
            $query->where('semester_id', $semester);
        });

        $data['fees'] = $fees->where('status', '<=', '1')
                        ->orderBy('assign_date', 'desc')
                        ->limit(10)
                        ->get();
        }


        // Events
        $data['events'] = Event::where('status', '1')->orderBy('id', 'asc')->get();

        $data['latest_events'] = Event::where('status', '1')
                            ->where('end_date', '>=', Carbon::today())
                            ->orderBy('start_date', 'asc')
                            ->limit(10)
                            ->get();


        return view($this->view.'.index', $data);
    }
}
