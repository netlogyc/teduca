<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResultContribution;
use Illuminate\Http\Request;
use App\Models\ExamType;
use Toastr;

class ResultContributionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_result_contribution', 1);
        $this->route = 'admin.result-contribution';
        $this->view = 'admin.result-contribution';
        $this->access = 'result-contribution';


        $this->middleware('permission:'.$this->access.'-view');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['access'] = $this->access;
        
        $data['row'] = ResultContribution::where('status', '1')->first();
        $data['exams'] = ExamType::orderBy('id', 'asc')->get();

        return view($this->view.'.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Field Validation
        $request->validate([
            'attendances' => 'required|numeric',
            'assignments' => 'required|numeric',
            'activities' => 'required|numeric',
            'contributions' => 'required',
        ]);


        // Check Contribution Total
        $exam_contributions = 0;
        foreach($request->contributions as $contribution){
            if(!is_numeric($contribution)){
                Toastr::error(__('msg_your_contribution_is_not_correct'), __('msg_error'));

                return redirect()->back();
            }
            else {
                $exam_contributions = $exam_contributions + $contribution;
            }
        }
        if( ($exam_contributions + $request->attendances + $request->assignments + $request->activities) != 100 ) {

            Toastr::error(__('msg_your_contribution_is_not_correct'), __('msg_error'));

            return redirect()->back();
        }



        $id = $request->id;

        // -1 means no data row found
        if($id == -1){
            // Insert Data
            $contribution = new ResultContribution;
            $contribution->attendances = $request->attendances;
            $contribution->assignments = $request->assignments;
            $contribution->activities = $request->activities;
            $contribution->save();
        }
        else{
            // Update Data
            $contribution = ResultContribution::find($id);
            $contribution->attendances = $request->attendances;
            $contribution->assignments = $request->assignments;
            $contribution->activities = $request->activities;
            $contribution->save();
        }


        // Update Exam Contributions
        foreach($request->exams as $key => $exam){
            $exam = ExamType::find($exam);
            $exam->contribution = $request->contributions[$key];
            $exam->save();
        }


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
