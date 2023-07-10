<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category_id', 'unit', 'serial_number', 'quantity', 'description', 'attach', 'status',
    ];

    public function category()
    {
        return $this->belongsTo(ItemCategory::class, 'category_id');
    }

    public function stocks()
    {
        return $this->hasMany(ItemStock::class, 'item_id', 'id');
    }

    public function issues()
    {
        return $this->hasMany(ItemIssue::class, 'item_id', 'id');
    }
}
