<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostalExchange extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'category_id', 'title', 'reference', 'from', 'to', 'note', 'date', 'attach', 'status', 'created_by', 'updated_by',
    ];

    public function category()
    {
        return $this->belongsTo(PostalExchangeType::class, 'category_id');
    }

    public function recordedBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}
