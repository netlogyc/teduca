<?php

namespace Database\Seeders;

use DB;
use App\Models\LeaveType;
use Illuminate\Database\Seeder;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leave_types')->delete();

        $leave_types = [
            ['title' => 'Casual Leave', 'slug' => 'casual-leave', 'status' => '1'],
            ['title' => 'Sick Leave', 'slug' => 'sick-leave', 'status' => '1'],
            ['title' => 'Maternity Leave', 'slug' => 'maternity-leave', 'status' => '1'],
            ['title' => 'Marriage Leave', 'slug' => 'marriage-leave', 'status' => '1'],
            ['title' => 'Bereavement Leave', 'slug' => 'bereavement-leave', 'status' => '1'],
        ];

        DB::table('leave_types')->insert($leave_types);
    }
}
