<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeesFine extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_day', 'end_day', 'amount', 'type', 'status',
    ];

    public function feesCategories()
    {
        return $this->belongsToMany(FeesCategory::class, 'fees_category_fees_fine', 'fees_fine_id', 'fees_category_id');
    }
}
