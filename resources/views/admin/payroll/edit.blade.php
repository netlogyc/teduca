<!-- Edit modal content -->
<div id="editModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <form class="needs-validation" novalidate action="{{ route($route.'.update', $payroll_data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="text" name="month" value="{{ $selected_month }}" hidden>
            <input type="text" name="year" value="{{ $selected_year }}" hidden>

            @php
            $paid_leave = \App\Models\Leave::paid_leave($row->id, $selected_month, $selected_year);
            $unpaid_leave = \App\Models\Leave::unpaid_leave($row->id, $selected_month, $selected_year);

            $present = $attendances->where('attendance', 1)->where('user_id', $row->id)->count();
            $absent = $attendances->where('attendance', 2)->where('user_id', $row->id)->count();
            $leave = $attendances->where('attendance', 3)->where('user_id', $row->id)->count();
            $holiday = $attendances->where('attendance', 4)->where('user_id', $row->id)->count();


            $working_days = $present + $holiday + $paid_leave;

            $deduction_days = $absent + $unpaid_leave;

            if($row->basic_salary != null || $row->basic_salary != ''){
                $basic_salary = $row->basic_salary;
            }else{
                $basic_salary = 0;
            }
            if($row->salary_type == 1){
                $per_day_salary = $basic_salary / $total_days;
                
                $total_earning = $per_day_salary * $working_days;

                $deduction_salary = $per_day_salary * $deduction_days;
            }

            if($row->salary_type == 2){
                $total_earning = $basic_salary * $working_days;

                $deduction_salary = $basic_salary * $deduction_days;
            }

            $bonus = round($payroll_data->bonus ?? 0);
            $gross_salary = round($total_earning + $bonus);

            if(round($total_earning) == round($payroll_data->total_earning)){  
                $tax_amount = round($payroll_data->tax ?? 0);
            }
            else{
                $tax_amount = 0;

                if(isset($taxs)){
                foreach($taxs as $tax){
                    if($tax->min_amount <= $gross_salary && $tax->max_amount >= $gross_salary){
                        $taxable_amount = $gross_salary - $tax->max_no_taxable_amount;

                        $tax_amount = ($taxable_amount / 100) * $tax->percentange;
                    }
                }}
            }

            $total_deduction = round($deduction_salary + $tax_amount);
            $net_salary = round($gross_salary - $tax_amount);
            @endphp

            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">{{ __('modal_edit') }} {{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- View Start -->
                <div class="">
                    <div class="row">
                        <div class="col-md-6">
                            <p><mark class="text-primary">{{ __('field_staff_id') }}:</mark> #{{ $row->staff_id }}</p><hr/>

                            <p><mark class="text-primary">{{ __('field_contract_type') }}:</mark> 
                                @if( $row->contract_type == 1 )
                                {{ __('contract_type_full_time') }}
                                @elseif( $row->contract_type == 2 )
                                {{ __('contract_type_part_time') }}
                                @endif
                            </p><hr/>
                        </div>
                        <div class="col-md-6">
                            <p><mark class="text-primary">{{ __('field_name') }}:</mark> {{ $row->first_name }} {{ $row->last_name }}</p><hr/>

                            <p><mark class="text-primary">{{ __('field_basic_salary') }}: </mark>{{ round($row->basic_salary, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!} / 
                                @if( $row->salary_type == 1 )
                                {{ __('salary_type_fixed') }}
                                @elseif( $row->salary_type == 2 )
                                {{ __('salary_type_hourly') }}
                                @endif
                            </p>
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
                <br/>
                <!-- View End -->

                <!-- Form Start -->
                <input type="hidden" name="user_id" value="{{ $row->id }}">
                <input type="hidden" name="basic_salary" value="{{ $basic_salary }}">
                <input type="hidden" name="salary_type" value="{{ $row->salary_type }}">
                <input type="hidden" name="salary_month" value="{{ date("Y-m-d", strtotime($selected_year.'-'.$selected_month.'-01')) }}">
                <div class="clearfix"></div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="total_earning">{{ __('field_total_earning') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                        <input type="text" class="form-control" name="total_earning" id="total_earning" value="{{ round($total_earning, 0) }}" readonly required data_id="edit-{{ $row->id }}" onkeyup="salaryCalculator('edit', {{ $row->id }})">

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_total_earning') }}
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="bonus">{{ __('field_bonus') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                        <input type="text" class="form-control" name="bonus" id="bonus" value="{{ round($bonus, 0) }}" required data_id="edit-{{ $row->id }}" onkeyup="salaryCalculator('edit', {{ $row->id }})">

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_bonus') }}
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="gross_salary">{{ __('field_gross_salary') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                        <input type="text" class="form-control" name="gross_salary" id="gross_salary" value="{{ round($gross_salary, 0) }}" readonly required data_id="edit-{{ $row->id }}" onkeyup="salaryCalculator('edit', {{ $row->id }})">

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_gross_salary') }}
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="tax">{{ __('field_tax') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                        <input type="text" class="form-control" name="tax" id="tax" value="{{ round($tax_amount, 0) }}" readonly required data_id="edit-{{ $row->id }}" onkeyup="salaryCalculator('edit', {{ $row->id }})">

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_tax') }}
                        </div>
                    </div>

                    <input type="text" name="deduction_salary" value="{{ round($deduction_salary, 0) }}" hidden data_id="edit-{{ $row->id }}" onkeyup="salaryCalculator('edit', {{ $row->id }})">

                    <div class="form-group col-md-4">
                        <label for="total_deduction">{{ __('field_total_deduction') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                        <input type="text" class="form-control" name="total_deduction" id="total_deduction" value="{{ round($total_deduction, 0) }}" readonly required data_id="edit-{{ $row->id }}" onkeyup="salaryCalculator('edit', {{ $row->id }})">

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_total_deduction') }}
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="net_salary">{{ __('field_net_salary') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                        <input type="text" class="form-control" name="net_salary" id="net_salary" value="{{ round($net_salary, 0) }}" readonly required data_id="edit-{{ $row->id }}" onkeyup="salaryCalculator('edit', {{ $row->id }})">

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_net_salary') }}
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="note">{{ __('field_note') }}</label>
                        <input type="text" class="form-control" name="note" id="note" value="{{ $payroll_data->note }}">

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_note') }}
                        </div>
                    </div>
                </div>
                <!-- Form End -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> {{ __('btn_close') }}</button>
                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_update') }}</button>
            </div>
          </form>
        </div>
    </div>
</div>