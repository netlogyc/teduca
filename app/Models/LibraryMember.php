<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibraryMember extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'memberable_id', 'memberable_type', 'library_id', 'date', 'status', 'created_by', 'updated_by',
    ];

    public function issuReturn()
    {
        return $this->hasMany(IssueReturn::class, 'member_id', 'id');
    }

    // Polymorphic relations
    public function memberable()
    {
        return $this->morphTo();
    }
}
