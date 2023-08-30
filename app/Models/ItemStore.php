<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemStore extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'store_no', 'in_charge', 'email', 'phone', 'address', 'status',
    ];

    public function stocks()
    {
        return $this->hasMany(ItemStock::class, 'store_id', 'id');
    }
}
