<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemSupplier extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'email', 'phone', 'address', 'contact_person', 'designation', 'contact_person_email', 'contact_person_phone', 'description', 'status',
    ];

    public function stocks()
    {
        return $this->hasMany(ItemStock::class, 'supplier_id', 'id');
    }
}
