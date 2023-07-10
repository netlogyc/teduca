<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_calendar', 1);
        $this->route = 'student.event';
        $this->view = 'student.calendar';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function calendar()
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->view;
        
        $data['rows'] = Event::where('status', '1')->orderBy('id', 'asc')->get();

        $data['latest_events'] = Event::where('status', '1')
                            ->where('end_date', '>=', Carbon::today())
                            ->orderBy('start_date', 'asc')
                            ->limit(10)
                            ->get();

        return view('student.calendar.index', $data);
    }
}
