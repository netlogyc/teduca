<?php

namespace App\Exports;

use App\Models\Application;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ApplicationsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Application::get(['registration_no', 'program_id', 'apply_date', 'first_name', 'last_name', 'father_name', 'mother_name', 'father_occupation', 'mother_occupation', 'present_province', 'present_district', 'present_address', 'permanent_province', 'permanent_district', 'permanent_address', 'phone', 'email', 'gender', 'dob', 'marital_status', 'blood_group', 'national_id', 'passport_no', 'school_name', 'school_exam_id', 'school_graduation_year', 'school_graduation_point', 'collage_name', 'collage_exam_id', 'collage_graduation_year', 'collage_graduation_point']);
    }


    public function headings(): array
    {
        return ['registration_no', 'program_id', 'apply_date', 'first_name', 'last_name', 'father_name', 'mother_name', 'father_occupation', 'mother_occupation', 'present_province', 'present_district', 'present_address', 'permanent_province', 'permanent_district', 'permanent_address', 'phone', 'email', 'gender', 'dob', 'marital_status', 'blood_group', 'national_id', 'passport_no', 'school_name', 'school_exam_id', 'school_graduation_year', 'school_graduation_point', 'collage_name', 'collage_exam_id', 'collage_graduation_year', 'collage_graduation_point'];
    }
}
