<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ResultContributionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('result_contributions')->delete();

        $contributions = [
            'attendances'=>'10',
            'assignments'=>'10',
            'activities'=>'10',
            'status'=>'1',
        ];

        DB::table('result_contributions')->insert($contributions);
    }
}
