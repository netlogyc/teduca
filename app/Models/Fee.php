<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_enroll_id', 'category_id', 'fee_amount', 'fine_amount', 'discount_amount', 'paid_amount', 'assign_date', 'due_date', 'pay_date', 'payment_method', 'note', 'status', 'created_by', 'updated_by',
    ];
  
    public function studentEnroll()
    {
        return $this->belongsTo(StudentEnroll::class, 'student_enroll_id');
    }
  
    public function category()
    {
        return $this->belongsTo(FeesCategory::class, 'category_id');
    }
}
