<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BooksExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Book::get(['category_id', 'title', 'isbn', 'author', 'publisher', 'edition', 'publish_year', 'language', 'price', 'quantity', 'section', 'column', 'row', 'description', 'note', 'status']);
    }


    public function headings(): array
    {
        return ['category_id', 'title', 'isbn', 'author', 'publisher', 'edition', 'publish_year', 'language', 'price', 'quantity', 'section', 'column', 'row', 'description', 'note', 'status'];
    }
}
