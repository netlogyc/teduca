<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'purpose_id', 'department_id', 'name', 'father_name', 'phone', 'email', 'address', 'visit_from', 'id_no', 'token', 'date', 'in_time', 'out_time', 'persons', 'note', 'attach', 'status', 'created_by', 'updated_by',
    ];

    public function purpose()
    {
        return $this->belongsTo(VisitPurpose::class, 'purpose_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function recordedBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}
