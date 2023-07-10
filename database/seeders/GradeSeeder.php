<?php

namespace Database\Seeders;

use DB;
use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->delete();

        $grades = [
            ['title' => 'A', 'point' => '5.00', 'min_mark' => '80.00', 'max_mark' => '100.00', 'status' => '1'],
            ['title' => 'B', 'point' => '4.00', 'min_mark' => '70.00', 'max_mark' => '79.99', 'status' => '1'],
            ['title' => 'C', 'point' => '3.00', 'min_mark' => '60.00', 'max_mark' => '69.99', 'status' => '1'],
            ['title' => 'D', 'point' => '2.00', 'min_mark' => '50.00', 'max_mark' => '59.99', 'status' => '1'],
            ['title' => 'E', 'point' => '1.00', 'min_mark' => '40.00', 'max_mark' => '49.99', 'status' => '1'],
            ['title' => 'F', 'point' => '0.00', 'min_mark' => '0.00', 'max_mark' => '39.99', 'status' => '1'],
        ];

        DB::table('grades')->insert($grades);
    }
}
