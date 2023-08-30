<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'title', 'isbn', 'code', 'author', 'publisher', 'edition', 'publish_year', 'language', 'price', 'quantity', 'section', 'column', 'row', 'description', 'note', 'attach', 'status',
    ];

    public function category()
    {
        return $this->belongsTo(BookCategory::class, 'category_id');
    }

    public function issues()
    {
        return $this->hasMany(IssueReturn::class, 'book_id', 'id');
    }
}
