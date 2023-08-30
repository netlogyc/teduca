<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxSetting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'min_amount', 'max_amount', 'percentange', 'max_no_taxable_amount', 'status',
    ];
}
