<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'status',
    ];

    public function contents()
    {
        return $this->hasMany(Content::class, 'type_id', 'id');
    }
}
