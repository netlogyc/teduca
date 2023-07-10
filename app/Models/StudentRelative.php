<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRelative extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'relation', 'name', 'occupation', 'email', 'phone', 'address', 'photo',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
