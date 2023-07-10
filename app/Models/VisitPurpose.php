<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitPurpose extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'status',
    ];

    public function visitors()
    {
        return $this->hasMany(Visitor::class, 'purpose_id', 'id');
    }
}
