<?php

namespace Database\Seeders;

use DB;
use App\Models\SMSSetting;
use Illuminate\Database\Seeder;

class SMSSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('s_m_s_settings')->delete();
        
        $s_m_s_settings = SMSSetting::create([

            'nexmo_key'=>'7e29c3ce',
            'nexmo_secret'=>'6gK9ve4soFO6RP5d',
            'nexmo_sender_name'=>'ABC',
            'twilio_sid'=>'AC8f4bfd69c98ad28c8f3a1dc8a8cca836',
            'twilio_auth_token'=>'4c880b6a9061a145d5c2a92de7e51cdf',
            'twilio_number'=>'+14154461617',
            'status'=>'1',
            
        ]);
    }
}
