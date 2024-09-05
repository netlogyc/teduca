<?php

namespace Database\Seeders;

use App\Models\EnrollSubject;
use App\Models\Student;
use App\Models\StudentEnroll;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use League\Csv\Reader;

class StudentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        $csv = Reader::createFromPath('students.csv', 'r');
        
        $csv->setHeaderOffset(0); // Establece la fila de encabezado
        foreach ($csv as $row) {
            // DB::beginTransaction();

            try {
                // Crear el estudiante
                $student = Student::create([
                    'student_id' => $row['student_id'],
                    'batch_id' => $row['batch_id'],
                    'program_id' => $row['program_id'],
                    'admission_date' => $row['admission_date'],
                    'first_name' => $row['first_name'],
                    'second_name' => $row['second_name'],
                    'last_name' => $row['last_name'],
                    'second_surname' => $row['second_surname'],
                    'email' => $row['email'],
                    'password' => Hash::make($row['password'],),
                    'password_text' => Crypt::encryptString($row['password']),
                    'gender' => $row['gender'],
                    'dob' => $row['dob'],
                    'phone' => $row['phone'],
                    'marital_status' => $row['marital_status'],
                    'nationality' => $row['nationality'],
                    'status' => $row['status'],
                    'created_by' => $row['created_by'],
                ]);
    
                // Asociar estados
                $student->statuses()->attach([10]);
    
     

                // Inscribir al estudiante
                StudentEnroll::create([
                    'student_id' => $student->id,
                    'session_id' => 9,
                    'semester_id' => $row['semester'],
                    'program_id' => $row['program_id'],
                    'section_id' => $row['section'],
                    'created_by' => 1
                ]);
    
                // Asignar asignaturas
                $enrollSubject = EnrollSubject::where('program_id', $row['program_id'])
                                              ->where('semester_id', $row['semester'])
                                              ->where('section_id', $row['section'])
                                              ->first();
    
                if ($enrollSubject) {
                    foreach ($enrollSubject->subjects as $subject) {
                        $student->enrollments()->first()->subjects()->attach($subject->id);
                    }
                }
    
                // DB::commit();
            } catch (\Exception $e) {
                // DB::rollBack();
            }
        }
        
    }
}