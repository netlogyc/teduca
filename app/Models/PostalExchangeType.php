<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostalExchangeType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'status',
    ];

    public function exchanges()
    {
        return $this->hasMany(PostalExchange::class, 'category_id', 'id');
    }
}
