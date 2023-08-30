<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'attach', 'status',
    ];

	// Polymorphic relations
    public function students()
    {
        return $this->morphedByMany(Student::class, 'docable');
    }

    public function users()
    {
        return $this->morphedByMany('App\User', 'docable');
    }
}
