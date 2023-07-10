<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutsideUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'father_name', 'mother_name', 'father_occupation', 'mother_occupation', 'father_photo', 'mother_photo', 'email', 'phone', 'country', 'present_province', 'present_district', 'present_village', 'present_address', 'permanent_province', 'permanent_district', 'permanent_village', 'permanent_address', 'education_level', 'occupation', 'gender', 'dob', 'religion', 'caste', 'mother_tongue', 'marital_status', 'blood_group', 'nationality', 'national_id', 'passport_no', 'photo', 'signature', 'status', 'created_by', 'updated_by',
    ];

    // Polymorphic relations
    public function member()
    {
        return $this->morphOne(LibraryMember::class, 'memberable');
    }

    public function presentProvince()
    {
        return $this->belongsTo(Province::class, 'present_province');
    }

    public function presentDistrict()
    {
        return $this->belongsTo(District::class, 'present_district');
    }

    public function permanentProvince()
    {
        return $this->belongsTo(Province::class, 'permanent_province');
    }

    public function permanentDistrict()
    {
        return $this->belongsTo(District::class, 'permanent_district');
    }
}
