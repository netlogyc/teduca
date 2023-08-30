<?php

namespace Database\Seeders;

use DB;
use App\Models\ExamType;
use Illuminate\Database\Seeder;

class ExamTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exam_types')->delete();

        $exam_types = [
            ['title' => 'Final Exam', 'marks' => '100', 'contribution' => '50'],
            ['title' => 'Midterm Exam', 'marks' => '50', 'contribution' => '20'],
            ['title' => 'Test Exam', 'marks' => '20', 'contribution' => '0'],
        ];

        DB::table('exam_types')->insert($exam_types);
    }
}
