<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_id', 'source_id', 'name', 'father_name', 'phone', 'email', 'date', 'action_taken', 'assigned', 'issue', 'note', 'attach', 'status', 'created_by', 'updated_by',
    ];

    public function type()
    {
        return $this->belongsTo(ComplainType::class, 'type_id');
    }

    public function source()
    {
        return $this->belongsTo(ComplainSource::class, 'source_id');
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
