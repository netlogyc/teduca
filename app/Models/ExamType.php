<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'marks', 'contribution', 'description', 'status',
    ];

    public function exams()
    {
        return $this->hasMany(Exam::class, 'exam_type_id', 'id');
    }
}
