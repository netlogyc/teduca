<?php

namespace Database\Seeders;

use DB;
use App\Models\FeesCategory;
use Illuminate\Database\Seeder;

class FeesCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fees_categories')->delete();

        $fees_categories = [
            ['title' => 'Admission Fees', 'slug' => 'admission-fees', 'status' => '1'],
            ['title' => 'Semester Fees', 'slug' => 'semester-fees', 'status' => '1'],
            ['title' => 'Exam Fees', 'slug' => 'exam-fees', 'status' => '1'],
        ];

        DB::table('fees_categories')->insert($fees_categories);
    }
}
