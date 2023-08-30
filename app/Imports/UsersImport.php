<?php

namespace App\Imports;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.staff_id' => 'required',
            '*.department_id' => 'required|integer',
            '*.designation_id' => 'required|integer',
            '*.first_name' => 'required',
            '*.last_name' => 'required',
            '*.email' => 'required|email',
            '*.gender' => 'required|integer',
            '*.dob' => 'required|date',
            '*.joining_date' => 'required|date',
            '*.ending_date' => 'nullable|date|after_or_equal:joining_date',
            '*.phone' => 'required',
            '*.marital_status' => 'nullable|integer',
            '*.blood_group' => 'nullable|integer',
            '*.present_province' => 'nullable|integer',
            '*.present_district' => 'nullable|integer',
            '*.permanent_province' => 'nullable|integer',
            '*.permanent_district' => 'nullable|integer',
            '*.basic_salary' => 'required|numeric',
            '*.contract_type' => 'required|integer',
            '*.work_shift' => 'required|integer',
            '*.salary_type' => 'required|integer',
            '*.login' => 'required|integer',
            '*.status' => 'required|integer',
        ])->validate();


        foreach ($rows as $row) {
            User::updateOrCreate(
                [
                'staff_id'     => $row['staff_id'],
                ],[
                'staff_id'     => $row['staff_id'],
                'department_id'    => $row['department_id'],
                'designation_id'    => $row['designation_id'],
                'first_name'    => $row['first_name'],
                'last_name'    => $row['last_name'],
                'father_name'    => $row['father_name'],
                'mother_name'    => $row['mother_name'],
                'email'    => $row['email'],
                'password'      => Hash::make($row['staff_id']),
                'password_text'     => Crypt::encryptString($row['staff_id']),
                'gender'    => $row['gender'],
                'dob'    => $row['dob'],
                'joining_date'    => $row['joining_date'],
                'ending_date'    => $row['ending_date'],
                'phone'    => $row['phone'],
                'emergency_phone'    => $row['emergency_phone'],
                'marital_status'     => $row['marital_status'],
                'blood_group'     => $row['blood_group'],
                'national_id'     => $row['national_id'],
                'passport_no'     => $row['passport_no'],
                'present_province'     => $row['present_province'],
                'present_district'     => $row['present_district'],
                'present_address'     => $row['present_address'],
                'permanent_province'     => $row['permanent_province'],
                'permanent_district'     => $row['permanent_district'],
                'permanent_address'     => $row['permanent_address'],
                'education_level'    => $row['education_level'],
                'graduation_academy'    => $row['graduation_academy'],
                'year_of_graduation'    => $row['year_of_graduation'],
                'graduation_field'    => $row['graduation_field'],
                'experience'    => $row['experience'],
                'note'    => $row['note'],
                'basic_salary'    => $row['basic_salary'],
                'contract_type'    => $row['contract_type'],
                'work_shift'    => $row['work_shift'],
                'salary_type'    => $row['salary_type'],
                'epf_no'    => $row['epf_no'],
                'bank_account_name'    => $row['bank_account_name'],
                'bank_account_no'    => $row['bank_account_no'],
                'bank_name'    => $row['bank_name'],
                'ifsc_code'    => $row['ifsc_code'],
                'bank_brach'    => $row['bank_brach'],
                'tin_no'    => $row['tin_no'],
                'login'    => $row['login'],
                'status'    => $row['status'],
            ]);
        }
    }
}
