<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostalExchange;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Complain;
use App\Models\PhoneLog;
use App\Models\Visitor;
use App\Models\Expense;
use App\Models\Enquiry;
use App\Models\Payroll;
use App\Models\Student;
use App\Models\Income;
use App\Models\Book;
use App\Models\Fee;
use Carbon\Carbon;
use App\User;

class DashboardController extends Controller
{
   /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct()
   {
      // Module Data
      $this->title = trans_choice('module_dashboard', 1);
      $this->route = 'admin.dashboard';
      $this->view = 'admin';
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


      $today_date = Carbon::parse(Carbon::today())->format('Y-m-d');
      $year = Carbon::parse(Carbon::today())->format('Y');
      $month = Carbon::parse(Carbon::today())->format('m');


      // Counter Data
      $data['pending_applications'] = Application::where('status', '1')->get();
      $data['active_students'] = Student::where('status', '1')->get();
      $data['active_staffs'] = User::where('status', '1')->get();
      $data['library_books'] = Book::where('status', '1')->get();

      $data['daily_visitors'] = Visitor::where('date', $today_date)->where('status', '1')->get();
      $data['daily_phone_logs'] = PhoneLog::where('date', $today_date)->where('status', '1')->get();
      $data['daily_enqueries'] = Enquiry::where('date', $today_date)->where('status', '1')->get();
      $data['daily_postals'] = PostalExchange::where('date', $today_date)->where('status', '1')->get();


      $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];


      //Line Chart
      $salaries = [];
      $fees = [];
      $expenses = [];
      $incomes = [];

      for($l = 1; $l <= $month; $l++){
        $salaries[] = Payroll::where('status', '1')->whereYear('pay_date', $year)->whereMonth('pay_date', $l)->sum('net_salary');
      }
      for($i = 1; $i <= $month; $i++){
        $fees[] = Fee::where('status', '1')->whereYear('pay_date', $year)->whereMonth('pay_date', $i)->sum('paid_amount');
      }
      for($j = 1; $j <= $month; $j++){
        $expenses[] = Expense::where('status', '1')->whereYear('date', $year)->whereMonth('date', $j)->sum('amount');
      }
      for($k = 1; $k <= $month; $k++){
        $incomes[] = Income::where('status', '1')->whereYear('date', $year)->whereMonth('date', $k)->sum('amount');
      }


      //Pie Chart
      $student_fee = Fee::where('status', '1')->whereYear('pay_date', $year)->sum('fee_amount');
      $discounts = Fee::where('status', '1')->whereYear('pay_date', $year)->sum('discount_amount');
      $fines = Fee::where('status', '1')->whereYear('pay_date', $year)->sum('fine_amount');
      $fee_paid = Fee::where('status', '1')->whereYear('pay_date', $year)->sum('paid_amount');



      //Line Chart
      $total_allowance = [];
      $total_deduction = [];
      $total_tax = [];
      $net_salary = [];

      for($q = 1; $q <= $month; $q++){
        $total_allowance[] = Payroll::where('status', '1')->whereYear('pay_date', $year)->whereMonth('pay_date', $q)->sum('total_allowance');
      }
      for($p = 1; $p <= $month; $p++){
        $total_deduction[] = Payroll::where('status', '1')->whereYear('pay_date', $year)->whereMonth('pay_date', $p)->sum('total_deduction');
      }
      for($o = 1; $o <= $month; $o++){
        $total_tax[] = Payroll::where('status', '1')->whereYear('pay_date', $year)->whereMonth('pay_date', $o)->sum('tax');
      }
      for($m = 1; $m <= $month; $m++){
        $net_salary[] = Payroll::where('status', '1')->whereYear('pay_date', $year)->whereMonth('pay_date', $m)->sum('net_salary');
      }


      
      return view($this->view.'.index', $data)->with('months', json_encode($months,JSON_NUMERIC_CHECK))->with('fees', json_encode($fees,JSON_NUMERIC_CHECK))->with('expenses', json_encode($expenses, JSON_NUMERIC_CHECK))->with('incomes', json_encode($incomes, JSON_NUMERIC_CHECK))->with('salaries', json_encode($salaries, JSON_NUMERIC_CHECK))->with('student_fee', json_encode($student_fee, JSON_NUMERIC_CHECK))->with('discounts', json_encode($discounts, JSON_NUMERIC_CHECK))->with('fines', json_encode($fines, JSON_NUMERIC_CHECK))->with('fee_paid', json_encode($fee_paid, JSON_NUMERIC_CHECK))->with('net_salary', json_encode($net_salary, JSON_NUMERIC_CHECK))->with('total_tax', json_encode($total_tax, JSON_NUMERIC_CHECK))->with('total_deduction', json_encode($total_deduction, JSON_NUMERIC_CHECK))->with('total_allowance', json_encode($total_allowance, JSON_NUMERIC_CHECK));
   }
}
