<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference_id', 'source_id', 'program_id', 'name', 'father_name', 'phone', 'email', 'address', 'purpose', 'note', 'date', 'follow_up_date', 'assigned', 'number_of_students', 'status', 'created_by', 'updated_by',
    ];

    public function reference()
    {
        return $this->belongsTo(EnquiryReference::class, 'reference_id');
    }

    public function source()
    {
        return $this->belongsTo(EnquirySource::class, 'source_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function assign()
    {
        return $this->belongsTo('App\User', 'assigned');
    }

    public function recordedBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}
