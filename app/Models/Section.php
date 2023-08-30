<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'seat', 'status',
    ];

    public function semesterPrograms()
    {
        return $this->hasMany(ProgramSemesterSection::class, 'section_id', 'id');
    }

    public function programSemesters()
    {
        return $this->hasMany(ProgramSemesterSection::class, 'section_id', 'id');
    }

    public function studentEnrolls()
    {
        return $this->hasMany(StudentEnroll::class, 'section_id');
    }

    public function classes()
    {
        return $this->hasMany(ClassRoutine::class, 'section_id', 'id');
    }

    public function contents()
    {
        return $this->hasMany(Content::class, 'section_id', 'id');
    }
}
