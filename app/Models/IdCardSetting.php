<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdCardSetting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'title', 'subtitle', 'logo', 'background', 'website_url', 'validity', 'address', 'student_photo', 'signature', 'barcode', 'status',
    ];
}
