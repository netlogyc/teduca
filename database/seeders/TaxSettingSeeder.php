<?php

namespace Database\Seeders;

use DB;
use App\Models\TaxSetting;
use Illuminate\Database\Seeder;

class TaxSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tax_settings')->delete();

        $tax_settings = [
            ['min_amount' => '0.00', 'max_amount' => '5000.00', 'percentange' => '0.00', 'max_no_taxable_amount' => '0.00', 'status' => '1'],
            ['min_amount' => '5001.00', 'max_amount' => '10000.00', 'percentange' => '5.00', 'max_no_taxable_amount' => '5000.00', 'status' => '1'],
            ['min_amount' => '10001.00', 'max_amount' => '20000.00', 'percentange' => '10.00', 'max_no_taxable_amount' => '5000.00', 'status' => '1'],
            ['min_amount' => '20001.00', 'max_amount' => '50000.00', 'percentange' => '15.00', 'max_no_taxable_amount' => '5000.00', 'status' => '1'],
        ];

        DB::table('tax_settings')->insert($tax_settings);
    }
}
