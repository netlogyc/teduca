@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Card ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('btn_generate') }} {{ $title }}</h5>
                    </div>
                    <div class="card-block">
                        <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                        <a href="{{ route($route.'.generate', ['id' => $row->id, 'month' => $selected_month, 'year' => $selected_year]) }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    @php
                    $paid_leave = \App\Models\Leave::paid_leave($row->id, $selected_month, $selected_year);
                    $unpaid_leave = \App\Models\Leave::unpaid_leave($row->id, $selected_month, $selected_year);

                    $present = $attendances->where('attendance', 1)->where('user_id', $row->id)->count();
                    $absent = $attendances->where('attendance', 2)->where('user_id', $row->id)->count();
                    $leave = $attendances->where('attendance', 3)->where('user_id', $row->id)->count();
                    $holiday = $attendances->where('attendance', 4)->where('user_id', $row->id)->count();


                    $payable_days = $present + $holiday + $paid_leave;

                    $unpayable_days = $absent + $unpaid_leave;

                    if($row->basic_salary != null || $row->basic_salary != ''){
                        $basic_salary = $row->basic_salary;
                    }else{
                        $basic_salary = 0;
                    }

                    if($row->salary_type == 1){
                        $per_day_salary = $basic_salary / $total_days;
                        
                        $total_earning = $per_day_salary * $payable_days;

                        $deduction_salary = $per_day_salary * $unpayable_days;
                    }

                    if($row->salary_type == 2){
                        $total_earning = $basic_salary * $payable_days;

                        $deduction_salary = $basic_salary * $unpayable_days;
                    }

                    $total_allowance = round($payroll->total_allowance ?? 0);
                    $bonus = round($payroll->bonus ?? 0);
                    $total_deduction = round($payroll->total_deduction ?? 0);

                    $gross_salary = round($total_earning + $total_allowance + $bonus) - round($total_deduction);
                    $tax_amount = 0;

                    if(isset($payroll) && round($total_earning) == round($payroll->total_earning)){  
                        $tax_amount = round($payroll->tax ?? 0);
                    }
                    else{
                        if(isset($taxs)){
                        foreach($taxs as $tax){
                            if($tax->min_amount <= $gross_salary && $tax->max_amount >= $gross_salary){
                                $taxable_amount = $gross_salary - $tax->max_no_taxable_amount;

                                $tax_amount = ($taxable_amount / 100) * $tax->percentange;
                            }
                        }}
                    }

                    $net_salary = round($gross_salary - $tax_amount);
                    @endphp

                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_staff_id') }}:</mark> #{{ $row->staff_id }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_name') }}:</mark> {{ $row->first_name }} {{ $row->last_name }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_department') }}:</mark> {{ $row->department->title ?? '' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_designation') }}:</mark> {{ $row->designation->title ?? '' }}</p><hr/>
                            </div>
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_contract_type') }}:</mark> 
                                    @if( $row->contract_type == 1 )
                                    {{ __('contract_type_full_time') }}
                                    @elseif( $row->contract_type == 2 )
                                    {{ __('contract_type_part_time') }}
                                    @endif
                                </p><hr/>

                                <p><mark class="text-primary">{{ __('field_work_shift') }}:</mark> 
                                    {{ $row->workShift->title ?? '' }}
                                </p><hr/>

                                <p><mark class="text-primary">{{ __('field_salary_type') }}:</mark> 
                                    @if( $row->salary_type == 1 )
                                    {{ __('salary_type_fixed') }}
                                    @elseif( $row->salary_type == 2 )
                                    {{ __('salary_type_hourly') }}
                                    @endif
                                </p><hr/>

                                <p><mark class="text-primary">{{ __('field_basic_salary') }}: </mark>{{ round($row->basic_salary, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</p>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <p>{{ __('field_attendance') }}: {{ date("F - Y", strtotime($selected_year.'-'.$selected_month.'-01')) }}</p>
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ __('attendance_present') }}</th>
                                            <th>{{ __('attendance_absent') }}</th>
                                            <th>{{ __('attendance_leave') }}</th>
                                            <th>{{ __('field_paid_leave') }}</th>
                                            <th>{{ __('field_unpaid_leave') }}</th>
                                            <th>{{ __('attendance_holiday') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $present }}</td>
                                            <td>{{ $absent }}</td>
                                            <td>{{ $leave }}</td>
                                            <td>{{ $paid_leave }}</td>
                                            <td>{{ $unpaid_leave }}</td>
                                            <td>{{ $holiday }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                    <input type="hidden" name="user_id" value="{{ $row->id }}">
                    <input type="hidden" name="basic_salary" value="{{ round($basic_salary, 2) }}">
                    <input type="hidden" name="salary_type" value="{{ $row->salary_type }}">
                    <input type="hidden" name="salary_month" value="{{ date("Y-m-d", strtotime($selected_year.'-'.$selected_month.'-01')) }}">
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>{{ __('field_total_allowance') }}</h5>
                                    <button id="addAllowance" type="button" class="btn btn-info btn-sm btn-icon"><i class="fas fa-plus"></i></button>
                                </div>
                                <div class="card-block">
                                    @isset($payroll)
                                    @foreach($payroll->details->where('status', 1) as $detail)
                                    <div id="allowanceFormField" class="row">
                                        <div class="form-group col-md-6">
                                            <label for="title" class="form-label">{{ __('field_title') }} <span>*</span></label>
                                            <input type="text" class="form-control" name="allowance_titles[]" id="title" value="{{ $detail->title }}" required>

                                            <div class="invalid-feedback">{{ __('required_field') }} {{ __('field_title') }}</div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="allowance" class="form-label">{{ __('field_amount') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                                            <input type="text" class="form-control allowance" name="allowances[]" id="allowance" value="{{ round($detail->amount) }}" data_id="add-{{ $row->id }}" onkeyup="salaryCalculator('add', {{ $row->id }})" required>


                                            <div class="invalid-feedback">{{ __('required_field') }} {{ __('field_amount') }}</div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button id="removeAllowance" type="button" class="btn btn-danger btn-sm btn-icon btn-filter"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endisset

                                    <div id="newAllowance" class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>{{ __('field_total_deduction') }}</h5>
                                    <button id="addDeduction" type="button" class="btn btn-info btn-sm btn-icon"><i class="fas fa-plus"></i></button>
                                </div>
                                <div class="card-block">
                                    @isset($payroll)
                                    @foreach($payroll->details->where('status', 0) as $detail)
                                    <div id="deductionFormField" class="row">
                                        <div class="form-group col-md-6">
                                            <label for="title" class="form-label">{{ __('field_title') }} <span>*</span></label>

                                            <input type="text" class="form-control" name="deduction_titles[]" id="title" value="{{ $detail->title }}" required>

                                            <div class="invalid-feedback">{{ __('required_field') }} {{ __('field_title') }}</div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="deduction" class="form-label">{{ __('field_amount') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>

                                            <input type="text" class="form-control deduction" name="deductions[]" id="deduction" value="{{ round($detail->amount) }}" data_id="add-{{ $row->id }}" onkeyup="salaryCalculator('add', {{ $row->id }})" required>

                                            <div class="invalid-feedback">{{ __('required_field') }} {{ __('field_amount') }}</div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button id="removeDeduction" type="button" class="btn btn-danger btn-sm btn-icon btn-filter"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endisset

                                    <div id="newDeduction" class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>{{ __('field_calculate') }}</h5>
                                    <button type="button" class="btn btn-info btn-sm btn-icon" data_id="add-{{ $row->id }}" onclick="salaryCalculator('add', {{ $row->id }})"><i class="fa-solid fa-arrows-rotate"></i></button>
                                </div>
                                <div class="card-block">
                                    <div class="form-group">
                                        <label for="total_earning">{{ __('field_total_earning') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                                        <input type="text" class="form-control" name="total_earning" id="total_earning" value="{{ round($total_earning, 0) }}" readonly required data_id="add-{{ $row->id }}" onkeyup="salaryCalculator('add', {{ $row->id }})">

                                        <div class="invalid-feedback">
                                          {{ __('required_field') }} {{ __('field_total_earning') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="total_allowance">{{ __('field_total_allowance') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                                        <input type="text" class="form-control" name="total_allowance" id="total_allowance" value="{{ round($total_allowance, 0) }}" readonly required data_id="add-{{ $row->id }}" onkeyup="salaryCalculator('add', {{ $row->id }})">

                                        <div class="invalid-feedback">
                                          {{ __('required_field') }} {{ __('field_total_allowance') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="total_deduction">{{ __('field_total_deduction') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                                        <input type="text" class="form-control" name="total_deduction" id="total_deduction" value="{{ round($total_deduction, 0) }}" readonly required data_id="add-{{ $row->id }}" onkeyup="salaryCalculator('add', {{ $row->id }})">

                                        <div class="invalid-feedback">
                                          {{ __('required_field') }} {{ __('field_total_deduction') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="gross_salary">{{ __('field_gross_salary') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                                        <input type="text" class="form-control" name="gross_salary" id="gross_salary" value="{{ round($gross_salary, 0) }}" readonly required data_id="add-{{ $row->id }}" onkeyup="salaryCalculator('add', {{ $row->id }})">

                                        <div class="invalid-feedback">
                                          {{ __('required_field') }} {{ __('field_gross_salary') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tax">{{ __('field_tax') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                                        <input type="text" class="form-control" name="tax" id="tax" value="{{ round($tax_amount, 0) }}" readonly required data_id="add-{{ $row->id }}" onkeyup="salaryCalculator('add', {{ $row->id }})">

                                        <div class="invalid-feedback">
                                          {{ __('required_field') }} {{ __('field_tax') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="net_salary">{{ __('field_net_salary') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                                        <input type="text" class="form-control" name="net_salary" id="net_salary" value="{{ round($net_salary, 0) }}" readonly required data_id="add-{{ $row->id }}" onkeyup="salaryCalculator('add', {{ $row->id }})">

                                        <div class="invalid-feedback">
                                          {{ __('required_field') }} {{ __('field_net_salary') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_save') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <!-- [ Card ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection

@section('page_js')
    <script type="text/javascript">
    (function ($) {
        "use strict";
        // add Field
        $(document).on('click', '#addAllowance', function () {
            var html = '';
            html += '<hr/>';
            html += '<div id="allowanceFormField" class="row">';
            html += '<div class="form-group col-md-6"><label for="title" class="form-label">{{ __('field_title') }} <span>*</span></label><input type="text" class="form-control" name="allowance_titles[]" id="title" value="{{ old('title') }}" required><div class="invalid-feedback">{{ __('required_field') }} {{ __('field_title') }}</div></div>';
            html += '<div class="form-group col-md-4"><label for="allowance" class="form-label">{{ __('field_amount') }} ({!! $setting->currency_symbol !!}) <span>*</span></label><input type="text" class="form-control allowance" name="allowances[]" id="allowance" value="{{ old('allowance') }}" data_id="add-{{ $row->id }}" onkeyup="salaryCalculator("add", {{ $row->id }})" required><div class="invalid-feedback">{{ __('required_field') }} {{ __('field_amount') }}</div></div>';
            html += '<div class="form-group col-md-2"><button id="removeAllowance" type="button" class="btn btn-danger btn-sm btn-icon btn-filter"><i class="fas fa-trash-alt"></i></button></div>';
            html += '</div>';

            $('#newAllowance').append(html);
        });

        // remove Field
        $(document).on('click', '#removeAllowance', function () {
            $(this).closest('#allowanceFormField').remove();
        });
    }(jQuery));

    (function ($) {
        "use strict";
        // add Field
        $(document).on('click', '#addDeduction', function () {
            var html = '';
            html += '<hr/>';
            html += '<div id="deductionFormField" class="row">';
            html += '<div class="form-group col-md-6"><label for="title" class="form-label">{{ __('field_title') }} <span>*</span></label><input type="text" class="form-control" name="deduction_titles[]" id="title" value="{{ old('title') }}" required><div class="invalid-feedback">{{ __('required_field') }} {{ __('field_title') }}</div></div>';
            html += '<div class="form-group col-md-4"><label for="deduction" class="form-label">{{ __('field_amount') }} ({!! $setting->currency_symbol !!}) <span>*</span></label><input type="text" class="form-control deduction" name="deductions[]" id="deduction" value="{{ old('deduction') }}" data_id="add-{{ $row->id }}" onkeyup="salaryCalculator("add", {{ $row->id }})" required><div class="invalid-feedback">{{ __('required_field') }} {{ __('field_amount') }}</div></div>';
            html += '<div class="form-group col-md-2"><button id="removeDeduction" type="button" class="btn btn-danger btn-sm btn-icon btn-filter"><i class="fas fa-trash-alt"></i></button></div>';
            html += '</div>';

            $('#newDeduction').append(html);
        });

        // remove Field
        $(document).on('click', '#removeDeduction', function () {
            $(this).closest('#deductionFormField').remove();
        });
    }(jQuery));
    </script>


    <script type="text/javascript">
    "use strict";
    function salaryCalculator(type, id) {

        // Cal Allowance Sum
        var allowance_sum = 0;
        $("#allowanceFormField .allowance").each(function () {
          var get_allowance_value = $(this).val();
          if ($.isNumeric(get_allowance_value)) {
            allowance_sum += parseFloat(get_allowance_value);
          }
        });

        // Cal Deduction Sum
        var deduction_sum = 0;
        $("#deductionFormField .deduction").each(function () {
          var get_deduction_value = $(this).val();
          if ($.isNumeric(get_deduction_value)) {
            deduction_sum += parseFloat(get_deduction_value);
          }
        });


      // Get Data
      var total_earning = $("input[name='total_earning'][data_id='"+type+"-"+id+"']").val();
      var total_allowance = $("input[name='total_allowance'][data_id='"+type+"-"+id+"']").val();
      var total_deduction = $("input[name='total_deduction'][data_id='"+type+"-"+id+"']").val();
      var gross_salary = $("input[name='gross_salary'][data_id='"+type+"-"+id+"']").val();
      var tax_amount = $("input[name='tax'][data_id='"+type+"-"+id+"']").val();
      var net_salary = $("input[name='net_salary'][data_id='"+type+"-"+id+"']").val();

      // Valid Data
      if (isNaN(allowance_sum)) allowance_sum = 0;
      if (isNaN(deduction_sum)) deduction_sum = 0;

      // Total Gross
      var total_gross = (parseFloat(total_earning) + parseFloat(allowance_sum)) - parseFloat(deduction_sum);

        // Calculate Tax
        @php
        if(isset($taxs)){
        foreach($taxs as $key =>$value){
            $taxs[$key] = json_decode(json_encode($value));
        }
        @endphp

        var taxs = <?php echo json_encode($taxs); ?>;

        var i;
        for (i = 0; i < taxs.length; ++i) {
            if(taxs[i]['min_amount'] <= total_gross && taxs[i]['max_amount'] >= total_gross){

                var taxable_amount = total_gross - taxs[i]['max_no_taxable_amount'];

                var tax_amount = (taxable_amount / 100) * taxs[i]['percentange'];
            }
        }
        @php } @endphp
        

      // Net Total
      var net_total = parseFloat(total_gross) - parseFloat(tax_amount);

      // Pass Data
      $("input[name='total_allowance'][data_id='"+type+"-"+id+"']").val(Math.ceil(allowance_sum));
      $("input[name='total_deduction'][data_id='"+type+"-"+id+"']").val(Math.ceil(deduction_sum));
      $("input[name='gross_salary'][data_id='"+type+"-"+id+"']").val(Math.ceil(total_gross));
      $("input[name='tax'][data_id='"+type+"-"+id+"']").val(Math.ceil(tax_amount));
      $("input[name='net_salary'][data_id='"+type+"-"+id+"']").val(Math.ceil(net_total));
    }
    </script>
@endsection