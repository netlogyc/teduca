<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'title', 'invoice_id', 'amount', 'date', 'payment_method', 'note', 'attach', 'status', 'created_by', 'updated_by',
    ];

    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'category_id');
    }

    public function recordedBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}
