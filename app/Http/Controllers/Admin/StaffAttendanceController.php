<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Models\StaffAttendance;
use App\Models\WorkShiftType;
use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\Department;
use Carbon\Carbon;
use App\User;
use Toastr;
use Auth;

class StaffAttendanceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_staff_daily_attendance', 1);
        $this->route = 'admin.staff-daily-attendance';
        $this->view = 'admin.staff-daily-attendance';
        $this->path = 'staff-daily-attendance';
        $this->access = 'staff-daily-attendance';


        $this->middleware('permission:'.$this->access.'-action', ['only' => ['index','store']]);
        $this->middleware('permission:'.$this->access.'-report', ['only' => ['report']]);
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

        if(!empty($request->date) || $request->date != null){
            $data['selected_date'] = $date = $request->date;
        }
        else{
            $data['selected_date'] = date("Y-m-d", strtotime(Carbon::today()));
        }


        $data['roles'] = Role::orderBy('name', 'asc')->get();
        $data['departments'] = Department::where('status', '1')->orderBy('title', 'asc')->get();
        $data['designations'] = Designation::where('status', '1')->orderBy('title', 'asc')->get();
        $data['work_shifts'] = WorkShiftType::where('status', '1')->orderBy('title', 'asc')->get();


        // Filter Users
        if(!empty($request->role) || !empty($request->department) || !empty($request->designation) || !empty($request->shift) || !empty($request->date)){

            $users = User::where('salary_type', '1');

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
        if(!empty($request->role) || !empty($request->department) || !empty($request->designation) || !empty($request->shift) || !empty($request->date)){

            $attendances = StaffAttendance::where('date', $date);

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
            'users' => 'required',
            'date' => 'required|date|before_or_equal:today',
            'attendances' => 'required',
        ]);

        $date = date("Y-m-d H:i:s", strtotime($request->date));
        $attendances = explode(",",$request->attendances);

        // Insert Data
        foreach($request->users as $key =>$user){
            // Insert Or Update Data
            $staffAttendance = StaffAttendance::updateOrCreate(
            [
                'user_id' => $request->users[$key], 
                'date' => $date
            ],[
                'user_id' => $request->users[$key],
                'date' => $date,
                'attendance' => $attendances[$key],
                'note' => $request->notes[$key],
                'created_by' => Auth::guard('web')->user()->id,
            ]);
        }


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request)
    {
        //
        $data['title'] = trans_choice('module_staff_daily_report', 1);
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

            $users = User::where('salary_type', '1');

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

                $attendances = StaffAttendance::whereYear('date', $year)->whereMonth('date', $month);
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
}
