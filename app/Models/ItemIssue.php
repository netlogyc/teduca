<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemIssue extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id', 'user_id', 'quantity', 'issue_date', 'due_date', 'return_date', 'penalty', 'note', 'attach', 'status', 'issued_by', 'received_by',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function issuedBy()
    {
        return $this->belongsTo('App\User', 'issued_by');
    }

    public function receivedBy()
    {
        return $this->belongsTo('App\User', 'received_by');
    }
}
