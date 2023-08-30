<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::get(['staff_id', 'department_id', 'designation_id', 'first_name', 'last_name', 'father_name', 'mother_name', 'email', 'gender', 'dob', 'joining_date', 'ending_date', 'phone', 'emergency_phone', 'marital_status', 'blood_group', 'national_id', 'passport_no', 'present_province', 'present_district', 'present_address', 'permanent_province', 'permanent_district', 'permanent_address', 'education_level', 'graduation_academy', 'year_of_graduation', 'graduation_field', 'experience', 'note', 'basic_salary', 'contract_type', 'work_shift', 'salary_type', 'epf_no', 'bank_account_name', 'bank_account_no', 'bank_name', 'ifsc_code', 'bank_brach', 'tin_no', 'login', 'status']);
    }


    public function headings(): array
    {
        return ['staff_id', 'department_id', 'designation_id', 'first_name', 'last_name', 'father_name', 'mother_name', 'email', 'gender', 'dob', 'joining_date', 'ending_date', 'phone', 'emergency_phone', 'marital_status', 'blood_group', 'national_id', 'passport_no', 'present_province', 'present_district', 'present_address', 'permanent_province', 'permanent_district', 'permanent_address', 'education_level', 'graduation_academy', 'year_of_graduation', 'graduation_field', 'experience', 'note', 'basic_salary', 'contract_type', 'work_shift', 'salary_type', 'epf_no', 'bank_account_name', 'bank_account_no', 'bank_name', 'ifsc_code', 'bank_brach', 'tin_no', 'login', 'status'];
    }
}
