<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'noteable_id', 'noteable_type', 'title', 'description', 'attach', 'status', 'created_by', 'updated_by',
    ];

    // Polymorphic relations
    public function noteable()
    {
        return $this->morphTo();
    }
}
