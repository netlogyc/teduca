<?php

namespace Database\Seeders;

use DB;
use App\Models\StatusType;
use Illuminate\Database\Seeder;

class StatusTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_types')->delete();

        $status_types = [
            ['title' => 'New Admission', 'slug' => 'new-admission', 'status' => '1'],
            ['title' => 'Continue', 'slug' => 'continue', 'status' => '1'],
            ['title' => 'Pass Out', 'slug' => 'pass-out', 'status' => '1'],
            ['title' => 'Drop Out', 'slug' => 'drop-out', 'status' => '1'],
            ['title' => 'Transfer In', 'slug' => 'transfer-in', 'status' => '1'],
            ['title' => 'Transfer Out', 'slug' => 'transfer-out', 'status' => '1'],
            ['title' => 'Disabled', 'slug' => 'disabled', 'status' => '1'],
        ];

        DB::table('status_types')->insert($status_types);
    }
}
