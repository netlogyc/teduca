<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'limit', 'description', 'status',
    ];

    public function leaves()
    {
        return $this->hasMany(Leave::class, 'type_id', 'id');
    }
}
