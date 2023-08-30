<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'academy_code', 'meta_title', 'meta_description', 'meta_keywords', 'logo_path', 'favicon_path', 'phone', 'email', 'fax', 'address', 'language', 'date_format', 'time_format', 'week_start', 'time_zone', 'currency', 'currency_symbol', 'decimal_place', 'copyright_text', 'status',
    ];
}
