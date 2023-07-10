<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Notice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'faculty_id', 'program_id', 'session_id', 'semester_id', 'section_id', 'category_id', 'notice_no', 'title', 'description', 'date', 'attach', 'status', 'created_by', 'updated_by',
    ];

    public function category()
    {
        return $this->belongsTo(NoticeCategory::class, 'category_id');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }


    // Polymorphic relations
    public function users()
    {
        return $this->morphedByMany(User::class, 'noticeable');
    }

    public function students()
    {
        return $this->morphedByMany(Student::class, 'noticeable');
    }
}
