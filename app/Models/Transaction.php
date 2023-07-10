<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transactionable_id', 'transactionable_type', 'transaction_id', 'amount', 'type', 'created_by', 'updated_by',
    ];


    // Polymorphic relations
    public function transactionable()
    {
        return $this->morphTo();
    }
}
