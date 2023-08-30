<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkShiftType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'status',
    ];

    public function staffs()
    {
        return $this->hasMany(User::class, 'work_shift', 'id');
    }
}
