<?php

namespace App\Imports;

use App\Models\Book;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BooksImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.category_id' => 'required|integer',
            '*.title' => 'required|max:191',
            '*.isbn' => 'required|max:30',
            '*.author' => 'required',
            '*.price' => 'nullable|numeric',
            '*.quantity' => 'required|numeric',
            '*.status' => 'required|integer',
        ])->validate();


        foreach ($rows as $row) {
            Book::updateOrCreate(
                [
                'isbn'    => $row['isbn'],
                ],[
                'category_id'     => $row['category_id'],
                'title'    => $row['title'],
                'isbn'    => $row['isbn'],
                'author'    => $row['author'],
                'publisher'    => $row['publisher'],
                'edition'    => $row['edition'],
                'publish_year'    => $row['publish_year'],
                'language'    => $row['language'],
                'price'    => $row['price'],
                'quantity'    => $row['quantity'],
                'section'    => $row['section'],
                'column'    => $row['column'],
                'row'    => $row['row'],
                'description'    => $row['description'],
                'note'    => $row['note'],
                'status'    => $row['status'],
            ]);
        }
    }
}
