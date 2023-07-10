<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'template_id', 'student_id', 'serial_no', 'date', 'starting_year', 'ending_year', 'credits', 'point', 'barcode', 'status',
    ];

    public function template()
    {
        return $this->belongsTo(CertificateTemplate::class, 'template_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
