<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExpenseCategory;
use App\Models\IncomeCategory;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Income;
use Carbon\Carbon;
use Toastr;

class OutcomeCalculationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_outcome_calculation', 1);
        $this->route = 'admin.outcome';
        $this->view = 'admin.outcome';
        $this->access = 'outcome';


        $this->middleware('permission:'.$this->access.'-view', ['only' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['access'] = $this->access;


        if(!empty($request->start_date) || $request->start_date != null){
            $data['start_date'] = $start_date = $request->start_date;
            $data['date_range'] = '20';
        }
        else{
            $data['start_date'] = $start_date = date("Y-m-d", strtotime(Carbon::today()->subYears(1)));
            $data['date_range'] = '12';

        }

        if(!empty($request->end_date) || $request->end_date != null){
            $data['end_date'] = $end_date = $request->end_date;
        }
        else{
            $data['end_date'] = $end_date = date("Y-m-d", strtotime(Carbon::today()));
        }

        
        $data['total_income'] = Income::where('date', '>=', $start_date)
                            ->where('date', '<=', $end_date)
                            ->where('status', '1')
                            ->sum('amount');

        $data['total_expense'] = Expense::where('date', '>=', $start_date)
                            ->where('date', '<=', $end_date)
                            ->where('status', '1')
                            ->sum('amount');

        // Pie Chart
        $data['income_categories'] = IncomeCategory::where('status', '1')
                            ->orderBy('title', 'asc')->get();

        $data['expense_categories'] = ExpenseCategory::where('status', '1')
                            ->orderBy('title', 'asc')->get();


        $year = Carbon::parse(Carbon::today())->format('Y');
        $month = Carbon::parse(Carbon::today())->format('m');
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        //Line Chart
        $monthly_incomes = [];
        $monthly_expenses = [];


        for($i = 1; $i <= $month; $i++){
            $monthly_incomes[] = Income::where('status', '1')->whereYear('date', $year)->whereMonth('date', $i)->sum('amount');
        }
        for($j = 1; $j <= $month; $j++){
            $monthly_expenses[] = Expense::where('status', '1')->whereYear('date', $year)->whereMonth('date', $j)->sum('amount');
        }


        return view($this->view.'.index', $data)->with('months', json_encode($months,JSON_NUMERIC_CHECK))->with('monthly_incomes', json_encode($monthly_incomes,JSON_NUMERIC_CHECK))->with('monthly_expenses', json_encode($monthly_expenses,JSON_NUMERIC_CHECK));
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
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['access'] = $this->access;


        // Start Date
        if($id != 0){
            $data['start_date'] = $start_date = date("Y-m-d", strtotime(Carbon::today()->subMonths($id)));
        }
        else{
            $data['start_date'] = $start_date = '2001-01-01';
        }

        // End Date
        $data['end_date'] = $end_date = date("Y-m-d", strtotime(Carbon::today()));

        $data['date_range'] = $id;


        $data['total_income'] = Income::where('date', '>=', $start_date)
                            ->where('date', '<=', $end_date)
                            ->where('status', '1')
                            ->sum('amount');

        $data['total_expense'] = Expense::where('date', '>=', $start_date)
                            ->where('date', '<=', $end_date)
                            ->where('status', '1')
                            ->sum('amount');

        // Pie Chart
        $data['income_categories'] = IncomeCategory::where('status', '1')
                            ->orderBy('title', 'asc')->get();

        $data['expense_categories'] = ExpenseCategory::where('status', '1')
                            ->orderBy('title', 'asc')->get();
        

        $year = Carbon::parse(Carbon::today())->format('Y');
        $month = Carbon::parse(Carbon::today())->format('m');
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        //Line Chart
        $monthly_incomes = [];
        $monthly_expenses = [];


        for($i = 1; $i <= $month; $i++){
            $monthly_incomes[] = Income::where('status', '1')->whereYear('date', $year)->whereMonth('date', $i)->sum('amount');
        }
        for($j = 1; $j <= $month; $j++){
            $monthly_expenses[] = Expense::where('status', '1')->whereYear('date', $year)->whereMonth('date', $j)->sum('amount');
        }


        return view($this->view.'.index', $data)->with('months', json_encode($months,JSON_NUMERIC_CHECK))->with('monthly_incomes', json_encode($monthly_incomes,JSON_NUMERIC_CHECK))->with('monthly_expenses', json_encode($monthly_expenses,JSON_NUMERIC_CHECK));
    }
}
