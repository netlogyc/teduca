<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'status',
    ];

    public function users()
    {
        return $this->hasMany('App\User', 'department_id', 'id');
    }

    public function visitors()
    {
        return $this->hasMany(Visitor::class, 'department_id', 'id');
    }
}
