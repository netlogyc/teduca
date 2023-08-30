<?php

namespace Database\Seeders;

use DB;
use App\Models\MailSetting;
use Illuminate\Database\Seeder;

class MailSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mail_settings')->delete();
        
        $mail_settings = MailSetting::create([

            'driver'=>'smtp',
            'host'=>'smtp.mailtrap.io',
            'port'=>'2525',
            'username'=>'5b1c119ce5a400',
            'password'=>'e177cd2e8894b5',
            'encryption'=>'tls',
            'sender_email'=>'info@mail.com',
            'sender_name'=>'Info Company',
            'reply_email'=>'info@mail.com',
            'status'=>'1',
            
        ]);
    }
}
