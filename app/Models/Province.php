<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'status',
    ];

    public function districts()
    {
        return $this->hasMany(District::class, 'province_id', 'id');
    }

    public function studentPresentProvince()
    {
        return $this->hasMany(Student::class, 'present_province');
    }

    public function studentPermanentProvince()
    {
        return $this->hasMany(Student::class, 'permanent_province');
    }

    public function stffPresentProvince()
    {
        return $this->hasMany(User::class, 'present_province');
    }

    public function stffPermanentProvince()
    {
        return $this->hasMany(User::class, 'permanent_province');
    }
}
