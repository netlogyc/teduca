<?php

namespace App;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ContentNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'staff_id', 'department_id', 'designation_id', 'first_name', 'last_name', 'father_name', 'mother_name', 'email', 'password', 'password_text', 'gender', 'dob', 'joining_date', 'ending_date', 'phone', 'emergency_phone', 'religion', 'caste', 'mother_tongue', 'marital_status', 'blood_group', 'nationality', 'national_id', 'passport_no', 'country', 'present_province', 'present_district', 'present_village', 'present_address', 'permanent_province', 'permanent_district', 'permanent_village', 'permanent_address', 'education_level', 'graduation_academy', 'year_of_graduation', 'graduation_field', 'experience', 'note', 'basic_salary', 'contract_type', 'work_shift', 'salary_type', 'epf_no', 'bank_account_name', 'bank_account_no', 'bank_name', 'ifsc_code', 'bank_brach', 'tin_no', 'photo', 'signature', 'resume', 'joining_letter', 'is_admin', 'login', 'status', 'created_by', 'updated_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    

    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }

    public function designation()
    {
        return $this->belongsTo('App\Models\Designation', 'designation_id');
    }

    public function presentProvince()
    {
        return $this->belongsTo('App\Models\Province', 'present_province');
    }

    public function presentDistrict()
    {
        return $this->belongsTo('App\Models\District', 'present_district');
    }

    public function permanentProvince()
    {
        return $this->belongsTo('App\Models\Province', 'permanent_province');
    }

    public function permanentDistrict()
    {
        return $this->belongsTo('App\Models\District', 'permanent_district');
    }

    public function workShift()
    {
        return $this->belongsTo('App\Models\WorkShiftType', 'work_shift', 'id');
    }

    public function programs()
    {
        return $this->belongsToMany('App\Models\Program', 'user_program', 'user_id', 'program_id');
    }

    public function classes()
    {
        return $this->hasMany('App\Models\ClassRoutine', 'teacher_id', 'id');
    }

    public function attendances()
    {
        return $this->hasMany('App\Models\StaffAttendance', 'user_id', 'id');
    }

    public function payrolls()
    {
        return $this->hasMany('App\Models\Payroll', 'user_id', 'id');
    }

    public function leaves()
    {
        return $this->hasMany('App\Models\Leave', 'user_id', 'id');
    }

    public function leaveReviews()
    {
        return $this->hasMany('App\Models\Leave', 'review_by', 'id');
    }
    
    public function examRoutines()
    {
        return $this->belongsToMany('App\Models\ExamRoutine', 'exam_routine_user', 'user_id', 'exam_routine_id');
    }

    public function assignments()
    {
        return $this->hasMany('App\Models\Assignment', 'assign_by', 'id');
    }

    // Polymorphic relations
    public function documents()
    {
        return $this->morphToMany('App\Models\Document', 'docable');
    }
    
    public function contents()
    {
        return $this->morphToMany('App\Models\Content', 'contentable');
    }

    public function notices()
    {
        return $this->morphToMany('App\Models\Notice', 'noticeable');
    }

    public function member()
    {
        return $this->morphOne('App\Models\LibraryMember', 'memberable');
    }

    public function hostelRoom()
    {
        return $this->morphOne('App\Models\HostelMember', 'hostelable');
    }

    public function transport()
    {
        return $this->morphOne('App\Models\TransportMember', 'transportable');
    }

    public function notes()
    {
        return $this->morphMany('App\Models\Note', 'noteable');
    }

    public function roles()
    {
        return $this->morphToMany(Role::class, 'model', 'model_has_roles', 'model_id', 'role_id', 'id', 'id');
    }

    public function transactions()
    {
        return $this->morphMany('App\Models\Transaction', 'transactionable');
    }
}
