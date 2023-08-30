<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(PermissionSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(SMSSettingSeeder::class);
        $this->call(MailSettingSeeder::class);
        
        $this->call(SessionSeeder::class);
        $this->call(FeesCategorySeeder::class);
        $this->call(StatusTypeSeeder::class);
        $this->call(TaxSettingSeeder::class);
        $this->call(WorkShiftSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(LeaveTypeSeeder::class);
        $this->call(ExamTypeSeeder::class);
        $this->call(ResultContributionSeeder::class);
    }
}
