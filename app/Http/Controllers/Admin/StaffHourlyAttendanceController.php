<?php

namespace App\Http\Controllers\Admin;

use App\Models\StaffHourlyAttendance;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Models\WorkShiftType;
use Illuminate\Http\Request;
use App\Models\ClassRoutine;
use App\Models\Designation;
use App\Models\Department;
use App\Models\Session;
use Carbon\Carbon;
use App\User;
use Toastr;
use Auth;

class StaffHourlyAttendanceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_staff_hourly_attendance', 1);
        $this->route = 'admin.staff-hourly-attendance';
        $this->view = 'admin.staff-hourly-attendance';
        $this->path = 'staff-hourly-attendance';
        $this->access = 'staff-hourly-attendance';


        $this->middleware('permission:'.$this->access.'-action', ['only' => ['index','store']]);
        $this->middleware('permission:'.$this->access.'-report', ['only' => ['report', 'reportDetails']]);
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


        if(!empty($request->staff) || $request->staff != null){
            $data['selected_staff'] = $staff = $request->staff;
        }
        else{
            $data['selected_staff'] = '';
        }

        if(!empty($request->date) || $request->date != null){
            $data['selected_date'] = $date = $request->date;
        }
        else{
            $data['selected_date'] = date("Y-m-d", strtotime(Carbon::today()));
        }


        $data['users'] = User::where('salary_type', '2')->orderBy('staff_id', 'asc')->get();


        // Filter Users
        if(!empty($request->staff)){

            $user = User::where('id', $staff)->where('salary_type', '2')->where('status', '1')->first();

            $session = Session::where('status', '1')->where('current', '1')->first();


            $dayCheck = date('l', strtotime($date));
            if($dayCheck == 'Saturday'){
                $data['classes'] = $user->classes->where('session_id', $session->id)->where('day', 1);
            }
            if($dayCheck == 'Sunday'){
                $data['classes'] = $user->classes->where('session_id', $session->id)->where('day', 2);
            }
            if($dayCheck == 'Monday'){
                $data['classes'] = $user->classes->where('session_id', $session->id)->where('day', 3);
            }
            if($dayCheck == 'Tuesday'){
                $data['classes'] = $user->classes->where('session_id', $session->id)->where('day', 4);
            }
            if($dayCheck == 'Wednesday'){
                $data['classes'] = $user->classes->where('session_id', $session->id)->where('day', 5);
            }
            if($dayCheck == 'Thursday'){
                $data['classes'] = $user->classes->where('session_id', $session->id)->where('day', 6);
            }
            if($dayCheck == 'Friday'){
                $data['classes'] = $user->classes->where('session_id', $session->id)->where('day', 7);
            }
        }


        // Attendances
        if(!empty($request->staff) && !empty($request->date)){

            $data['attendances'] = StaffHourlyAttendance::where('user_id', $request->staff)
                        ->where('date', $date)
                        ->get();
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
            'unique_ids' => 'required',
            'users' => 'required',
            'attendances' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $attendances = explode(",",$request->attendances);

        // Insert Data
        foreach($request->unique_ids as $key){
            // Insert Or Update Data
            $staffAttendance = StaffHourlyAttendance::updateOrCreate(
            [
                'user_id' => $request->users[$key],
                'date' => $request->date[$key],
                'subject_id' => $request->subjects[$key],
                'program_id' => $request->programs[$key],
                'session_id' => $request->sessions[$key],
                'semester_id' => $request->semesters[$key],
                'section_id' => $request->sections[$key],
                'start_time' => $request->start_time[$key],
                'end_time' => $request->end_time[$key],
            ],[
                'user_id' => $request->users[$key],
                'date' => $request->date[$key],
                'attendance' => $attendances[$key],
                'subject_id' => $request->subjects[$key],
                'program_id' => $request->programs[$key],
                'session_id' => $request->sessions[$key],
                'semester_id' => $request->semesters[$key],
                'section_id' => $request->sections[$key],
                'start_time' => $request->start_time[$key],
                'end_time' => $request->end_time[$key],
                'note' => $request->notes[$key],
                'created_by' => Auth::guard('web')->user()->id,
            ]);
        }


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request)
    {
        //
        $data['title'] = trans_choice('module_staff_hourly_report', 1);
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;


        if(!empty($request->role) || $request->role != null){
            $data['selected_role'] = $role = $request->role;
        }
        else{
            $data['selected_role'] = '0';
        }

        if(!empty($request->department) || $request->department != null){
            $data['selected_department'] = $department = $request->department;
        }
        else{
            $data['selected_department'] = '0';
        }

        if(!empty($request->designation) || $request->designation != null){
            $data['selected_designation'] = $designation = $request->designation;
        }
        else{
            $data['selected_designation'] = '0';
        }

        if(!empty($request->shift) || $request->shift != null){
            $data['selected_shift'] = $shift = $request->shift;
        }
        else{
            $data['selected_shift'] = '0';
        }

        if(!empty($request->month) || $request->month != null){
            $data['selected_month'] = $month = $request->month;
        }
        else{
            $data['selected_month'] = date("m", strtotime(Carbon::today()));
        }

        if(!empty($request->year) || $request->year != null){
            $data['selected_year'] = $year = $request->year;
        }
        else{
            $data['selected_year'] = date("Y", strtotime(Carbon::today()));
        }


        $data['roles'] = Role::orderBy('name', 'asc')->get();
        $data['departments'] = Department::where('status', '1')->orderBy('title', 'asc')->get();
        $data['designations'] = Designation::where('status', '1')->orderBy('title', 'asc')->get();
        $data['work_shifts'] = WorkShiftType::where('status', '1')->orderBy('title', 'asc')->get();


        // Filter Users
        if(!empty($request->role) || !empty($request->department) || !empty($request->designation) || !empty($request->shift) || !empty($request->month) || !empty($request->year)){

            $users = User::where('salary_type', '2');

            if(!empty($request->role)){
                $users->with('roles')->whereHas('roles', function ($query) use ($role){
                    $query->where('role_id', $role);
                });
            }
            if(!empty($request->department)){
                $users->where('department_id', $department);
            }
            if(!empty($request->designation)){
                $users->where('designation_id', $designation);
            }
            if(!empty($request->shift)){
                $users->where('work_shift', $shift);
            }

            $data['rows'] = $users->where('status', '1')->orderBy('staff_id', 'asc')->get();
        }


        // Attendances
        if(!empty($request->role) || !empty($request->department) || !empty($request->designation) || !empty($request->shift) || !empty($request->month) || !empty($request->year)){
            
            if(!empty($request->month) && !empty($request->year)){

                $attendances = StaffHourlyAttendance::whereYear('date', $year)->whereMonth('date', $month);
            }

            if(!empty($request->role)){
                $attendances->with('user.roles')->whereHas('user.roles', function ($query) use ($role){
                    $query->where('role_id', $role);
                });
            }
            if(!empty($request->department)){
                $attendances->with('user')->whereHas('user', function ($query) use ($department){
                    $query->where('department_id', $department);
                });
            }
            if(!empty($request->designation)){
                $attendances->with('user')->whereHas('user', function ($query) use ($designation){
                    $query->where('designation_id', $designation);
                });
            }
            if(!empty($request->shift)){
                $attendances->with('user')->whereHas('user', function ($query) use ($shift){
                    $query->where('work_shift', $shift);
                });
            }

            $data['attendances'] = $attendances->orderBy('id', 'desc')->get();
        }

        return view($this->view.'.report', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reportDetails(Request $request, $id)
    {
        //
        $data['title'] = trans_choice('module_staff_hourly_report', 1);
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;


        if(!empty($request->session) || $request->session != null){
            $data['selected_session'] = $session = $request->session;
        }
        else{
            $data['selected_session'] = $session = Session::where('status', '1')->where('current', '1')->first()->id;
        }

        if(!empty($request->month) || $request->month != null){
            $data['selected_month'] = $month = $request->month;
        }
        else{
            $data['selected_month'] = $month = date("m", strtotime(Carbon::today()));
        }

        if(!empty($request->year) || $request->year != null){
            $data['selected_year'] = $year = $request->year;
        }
        else{
            $data['selected_year'] = $year = date("Y", strtotime(Carbon::today()));
        }


        $data['sessions'] = Session::where('status', '1')->orderBy('id', 'desc')->get();
        $user = $data['user'] = User::where('id', $id)->where('salary_type', '2')->firstOrFail();

        if(isset($user) && isset($session)){
        $data['classes'] = ClassRoutine::where('teacher_id', $user->id)
                ->where('session_id', $session)
                ->where('status', '1')
                ->distinct()
                ->orderBy('id', 'desc')
                ->get(['teacher_id','subject_id','session_id','program_id','semester_id','section_id']);
        }


        // Attendances
        if(isset($month) && isset($year)){

            $data['attendances'] = StaffHourlyAttendance::where('user_id', $id)
                        ->whereYear('date', $year)
                        ->whereMonth('date', $month)
                        ->get();
        }

        return view($this->view.'.report-details', $data);
    }
}
