<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\ScheduleSetting;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule_setting = ScheduleSetting::where('slug', 'fees-schedule')->first();
        if(isset($schedule_setting)){
            if($schedule_setting->time){
                $schedule->command('fees:reminder')
                     ->dailyAt($schedule_setting->time);
            }else{
                $schedule->command('fees:reminder')
                     ->dailyAt('00:01');
            }
        }

        $schedule->command('notice:send')
                ->dailyAt('01:01');

        $schedule->command('content:send')
                ->dailyAt('02:01');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
