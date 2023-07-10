<?php

namespace App\Exports;

use App\Models\Subject;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubjectsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Subject::get(['title', 'code', 'credit_hour', 'subject_type', 'class_type', 'status']);
    }


    public function headings(): array
    {
        return ['title', 'code', 'credit_hour', 'subject_type', 'class_type', 'status'];
    }
}
