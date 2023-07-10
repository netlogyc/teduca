<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Leave extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_id', 'user_id', 'review_by', 'apply_date', 'from_date', 'to_date', 'reason', 'attach', 'note', 'pay_type', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reviewBy()
    {
        return $this->belongsTo(User::class, 'review_by', 'id');
    }

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class, 'type_id');
    }


    public static function paid_leave($id, $month, $year)
    {
        $paid_leave = 0;

        $lfroms = Leave::where('status', 1)->whereMonth('from_date', $month)->whereYear('from_date', $year)->get();
        if(isset($lfroms)){
            foreach ($lfroms as $lfrom) {
                if($lfrom->to_date <= date("Y-m-t", strtotime($year.'-'.$month.'-01'))){
                    if($lfrom->pay_type == 1){
                        $paid_leave = $paid_leave + (int)((strtotime($lfrom->to_date) - strtotime($lfrom->from_date))/86400) + 1;
                    }
                }
                else{
                    if($lfrom->pay_type == 1){
                        $paid_leave = $paid_leave + (int)((strtotime(date("Y-m-t", strtotime($year.'-'.$month.'-01'))) - strtotime($lfrom->from_date))/86400) + 1;
                    }
                }
            }
        }


        $ltos = Leave::where('status', 1)->whereMonth('to_date', $month)->whereYear('to_date', $year)->get();
        if(isset($ltos)){
            foreach ($ltos as $lto) {
                if($lto->from_date >= date("Y-m-d", strtotime($year.'-'.$month.'-01'))){
                    //
                }
                else{
                    if($lto->pay_type == 1){
                        $paid_leave = $paid_leave + (int)((strtotime($lto->to_date) - strtotime(date("Y-m-d", strtotime($year.'-'.$month.'-01'))))/86400) + 1;
                    }
                }
            }
        }

        return $paid_leave;
    }

    public static function unpaid_leave($id, $month, $year)
    {
        $unpaid_leave = 0;

        $lfroms = Leave::where('user_id', $id)->where('status', 1)->whereMonth('from_date', $month)->whereYear('from_date', $year)->get();
        if(isset($lfroms)){
            foreach ($lfroms as $lfrom) {
                if($lfrom->to_date <= date("Y-m-t", strtotime($year.'-'.$month.'-01'))){
                    if($lfrom->pay_type == 2){
                        $unpaid_leave = $unpaid_leave + (int)((strtotime($lfrom->to_date) - strtotime($lfrom->from_date))/86400) + 1;
                    }
                }
                else{
                    if($lfrom->pay_type == 2){
                        $unpaid_leave = $unpaid_leave + (int)((strtotime(date("Y-m-t", strtotime($year.'-'.$month.'-01'))) - strtotime($lfrom->from_date))/86400) + 1;
                    }
                }
            }
        }


        $ltos = Leave::where('user_id', $id)->where('status', 1)->whereMonth('to_date', $month)->whereYear('to_date', $year)->get();
        if(isset($ltos)){
            foreach ($ltos as $lto) {
                if($lto->from_date >= date("Y-m-d", strtotime($year.'-'.$month.'-01'))){
                    //
                }
                else{
                    if($lto->pay_type == 2){
                        $unpaid_leave = $unpaid_leave + (int)((strtotime($lto->to_date) - strtotime(date("Y-m-d", strtotime($year.'-'.$month.'-01'))))/86400) + 1;
                    }
                }
            }
        }

        return $unpaid_leave;
    }
}
