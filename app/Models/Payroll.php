<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'basic_salary', 'salary_type', 'total_earning', 'total_allowance', 'bonus', 'total_deduction', 'gross_salary', 'tax', 'net_salary', 'salary_month', 'pay_date', 'payment_method', 'note', 'status', 'created_by', 'updated_by',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function details()
    {
        return $this->hasMany(PayrollDetail::class, 'payroll_id', 'id');
    }
}
