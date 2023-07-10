<?php

namespace App\Imports;

use App\Models\Subject;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SubjectsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.title' => 'required|max:191',
            '*.code' => 'required|max:191',
            '*.credit_hour' => 'required|numeric',
            '*.subject_type' => 'required|integer',
            '*.class_type' => 'required|integer',
            '*.status' => 'required|integer',
        ])->validate();


        foreach ($rows as $row) {
            Subject::updateOrCreate(
                [
                'code'    => $row['code'],
                ],[
                'title'    => $row['title'],
                'code'    => $row['code'],
                'credit_hour'    => $row['credit_hour'],
                'subject_type'    => $row['subject_type'],
                'class_type'    => $row['class_type'],
                'status'    => $row['status'],
            ]);
        }
    }
}
