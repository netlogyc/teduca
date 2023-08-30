<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferCreadit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'program_id', 'session_id', 'semester_id', 'subject_id', 'marks', 'note', 'status',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
