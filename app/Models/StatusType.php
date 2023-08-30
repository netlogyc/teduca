<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'status',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'status_type_student', 'status_type_id', 'student_id');
    }

    public function discounts()
    {
        return $this->belongsToMany(FeesDiscount::class, 'fees_discount_status_type', 'status_type_id', 'fees_discount_id');
    }
}
