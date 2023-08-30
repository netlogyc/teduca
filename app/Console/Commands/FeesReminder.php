<?php

namespace App\Console\Commands;

use App\Notifications\FeesReminderNotification;
use Illuminate\Console\Command;
use App\Models\ScheduleSetting;
use App\Models\Fee;
use Carbon\Carbon;

class FeesReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fees:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Due fees reminder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //
        $schedule_setting = ScheduleSetting::where('slug', 'fees-schedule')->first();
        $days = Carbon::now()->addDays($schedule_setting->day);

        if($schedule_setting->email == 1){
            $fees = Fee::where('pay_date', null)->where('due_date', $days)->where('status', '0')->get();
            foreach($fees as $fee){
                $fee->studentEnroll->student->notify(new FeesReminderNotification());
            }
        }
        if($schedule_setting->sms == 1){
            $fees = Fee::where('pay_date', null)->where('due_date', $days)->where('status', '0')->get();
            foreach($fees as $fee){
                $fee->studentEnroll->student->notify(new FeesReminderNotification());
            }
        }
    }
}
