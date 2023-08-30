<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Notification;
use App\Notifications\ContentNotification;
use Illuminate\Console\Command;
use App\Models\Content;
use App\Models\Student;
use Carbon\Carbon;

class ContentPublishDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'content:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Schedul Content Send!';

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
        $today_date = Carbon::parse(Carbon::today())->format('Y-m-d');
        $contents = Content::where('status', '1')->where('date', $today_date)->get();

        foreach($contents as $content){

            $students = Student::where('status', '1');
            if($content->faculty != 0){
                $students->with('program')->whereHas('program', function ($query) use ($faculty){
                    $query->where('faculty_id', $content->faculty);
                });
            }
            $students->with('currentEnroll')->whereHas('currentEnroll', function ($query) use ($program, $session, $semester, $section){
                if($content->program != 0){
                $query->where('program_id', $content->program);
                }
                if($content->session != 0){
                $query->where('session_id', $content->session);
                }
                if($content->semester != 0){
                $query->where('semester_id', $content->semester);
                }
                if($content->section != 0){
                $query->where('section_id', $content->section);
                }
                $query->where('status', '1');
            });
            $all_students = $students->orderBy('student_id', 'desc')->get();
    

            // Notification Data
            $data = [
                'id' => $content->id,
                'title' => $content->title,
                'type' => 'content'
            ];

            Notification::send($all_students, new ContentNotification($data));
        }
    }
}
