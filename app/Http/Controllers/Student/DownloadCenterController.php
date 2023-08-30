<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Content;
use Carbon\Carbon;
use Auth;

class DownloadCenterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_download', 1);
        $this->route = 'student.download';
        $this->view = 'student.download';
        $this->path = 'content';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['view']      = $this->view;
        $data['path']      = $this->path;
        

        $user = Student::where('id', Auth::guard('student')->user()->id)->firstOrFail();


        // Filter Contents
        $contents = Content::where('status', '1')->where('date', '<=', Carbon::today());
        $contents->with('students')->whereHas('students', function ($query) use ($user){
            $query->where('contentable_id', $user->id);
            $query->where('contentable_type', 'App\Models\Student');
        });

        $data['rows'] = $contents->orderBy('date', 'desc')->get();
        

        return view($this->view.'.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['view']      = $this->view;
        $data['path']      = $this->path;

        
        $user = Student::where('id', Auth::guard('student')->user()->id)->firstOrFail();


        // Filter Contents
        $contents = Content::where('status', '1')->where('date', '<=', Carbon::today());
        $contents->with('students')->whereHas('students', function ($query) use ($user){
            $query->where('contentable_id', $user->id);
            $query->where('contentable_type', 'App\Models\Student');
        });

        $data['row'] = $contents->where('id', $id)->firstOrFail();


        // Read Notifications
        foreach ($user->unreadNotifications as $notification) {
            if($notification->data['type'] == 'content' && $notification->data['id'] == $id) {
                $notification->markAsRead();
            }
        }


        return view($this->view.'.show', $data);
    }
}
