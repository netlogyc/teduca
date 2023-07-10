<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'shortcode', 'status',
    ];

    public function programs()
    {
        return $this->hasMany(Program::class, 'faculty_id', 'id');
    }
}
