<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnquirySource extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'status',
    ];

    public function enquiries()
    {
        return $this->hasMany(Enquiry::class, 'source_id', 'id');
    }
}
