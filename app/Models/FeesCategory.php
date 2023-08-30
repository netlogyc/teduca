<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeesCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'status',
    ];

    public function masters()
    {
        return $this->hasMany(FeesMaster::class, 'category_id', 'id');
    }

    public function fees()
    {
        return $this->hasMany(Fee::class, 'category_id', 'id');
    }

    public function fines()
    {
        return $this->belongsToMany(FeesFine::class, 'fees_category_fees_fine', 'fees_category_id', 'fees_fine_id');
    }

    public function discounts()
    {
        return $this->belongsToMany(FeesDiscount::class, 'fees_category_fees_discount', 'fees_category_id', 'fees_discount_id');
    }
}
