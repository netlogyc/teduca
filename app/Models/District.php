<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'province_id', 'title', 'description', 'status',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function studentPresentDistrict()
    {
        return $this->hasMany(Student::class, 'present_district');
    }

    public function studentPermanentDistrict()
    {
        return $this->hasMany(Student::class, 'permanent_district');
    }

    public function staffPresentDistrict()
    {
        return $this->hasMany(User::class, 'present_district');
    }

    public function stffPermanentDistrict()
    {
        return $this->hasMany(User::class, 'permanent_district');
    }
}
