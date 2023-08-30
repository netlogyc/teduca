<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.student_id' => 'required',
            '*.batch_id' => 'required|integer',
            '*.program_id' => 'required|integer',
            '*.admission_date' => 'required|date',
            '*.first_name' => 'required',
            '*.last_name' => 'required',
            '*.email' => 'required',
            '*.phone' => 'required',
            '*.present_province' => 'nullable|integer',
            '*.present_district' => 'nullable|integer',
            '*.permanent_province' => 'nullable|integer',
            '*.permanent_district' => 'nullable|integer',
            '*.gender' => 'required|integer',
            '*.dob' => 'required|date',
            '*.marital_status' => 'nullable|integer',
            '*.blood_group' => 'nullable|integer',
            '*.login' => 'required|integer',
            '*.status' => 'required|integer',
            '*.is_transfer' => 'nullable|integer',
        ])->validate();
  

        foreach ($rows as $row) {
            Student::updateOrCreate(
                [
                'student_id'     => $row['student_id'],
                ],[
                'student_id'     => $row['student_id'],
                'batch_id'     => $row['batch_id'],
                'program_id'     => $row['program_id'],
                'admission_date'     => $row['admission_date'],
                'first_name'     => $row['first_name'],
                'last_name'     => $row['last_name'],
                'father_name'     => $row['father_name'],
                'mother_name'     => $row['mother_name'],
                'father_occupation'     => $row['father_occupation'],
                'mother_occupation'     => $row['mother_occupation'],
                'email'     => $row['email'],
                'password'      => Hash::make($row['student_id']),
                'password_text'     => Crypt::encryptString($row['student_id']),
                'phone'     => $row['phone'],
                'present_province'     => $row['present_province'],
                'present_district'     => $row['present_district'],
                'present_address'     => $row['present_address'],
                'permanent_province'     => $row['permanent_province'],
                'permanent_district'     => $row['permanent_district'],
                'permanent_address'     => $row['permanent_address'],
                'gender'     => $row['gender'],
                'dob'     => $row['dob'],
                'religion'     => $row['religion'],
                'marital_status'     => $row['marital_status'],
                'blood_group'     => $row['blood_group'],
                'national_id'     => $row['national_id'],
                'passport_no'     => $row['passport_no'],
                'school_name'     => $row['school_name'],
                'school_exam_id'     => $row['school_exam_id'],
                'school_graduation_year'     => $row['school_graduation_year'],
                'school_graduation_point'     => $row['school_graduation_point'],
                'collage_name'     => $row['collage_name'],
                'collage_exam_id'     => $row['collage_exam_id'],
                'collage_graduation_year'     => $row['collage_graduation_year'],
                'collage_graduation_point'     => $row['collage_graduation_point'],
                'login'     => $row['login'],
                'status'     => $row['status'],
                'is_transfer'     => $row['is_transfer'],
            ]);
        }
    }
}
