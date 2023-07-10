<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemStock extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id', 'supplier_id', 'store_id', 'quantity', 'price', 'date', 'reference', 'payment_method', 'description', 'attach', 'status', 'created_by', 'updated_by',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function supplier()
    {
        return $this->belongsTo(ItemSupplier::class, 'supplier_id');
    }

    public function store()
    {
        return $this->belongsTo(ItemStore::class, 'store_id');
    }
}
