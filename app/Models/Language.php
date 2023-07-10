<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session;

class Language extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code', 'description', 'direction', 'default', 'status',
    ];

    // Language Version
    static public function version()
    {
        if(Session()->has('locale')){

            $version = Language::where('code', Session()->get('locale'))->first();
        }
        else{
            $version = Language::where('default', 1)->first();
        }

        return $version;
    }
}
