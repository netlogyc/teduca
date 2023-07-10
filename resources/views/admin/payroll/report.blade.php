@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }}</h5>
                    </div>
                    <div class="card-block">
                        <form class="needs-validation" novalidate method="get" action="{{ route($route.'.report') }}">
                            <div class="row gx-2">
                                <div class="form-group col-md-3">
                                    <label for="salary_type">{{ __('field_salary_type') }} <span>*</span></label>
                                    <select class="form-control" name="salary_type" id="salary_type" required>
                                        <option value="">{{ __('select') }}</option>
                                        <option value="1" @if($selected_salary_type == 1) selected @endif>{{ __('salary_type_fixed') }}</option>
                                        <option value="2" @if($selected_salary_type == 2) selected @endif>{{ __('salary_type_hourly') }}</option>
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_salary_type') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="department">{{ __('field_department') }}</label>
                                    <select class="form-control" name="department" id="department">
                                        <option value="">{{ __('all') }}</option>
                                        @foreach( $departments as $department )
                                        <option value="{{ $department->id }}" @if( $selected_department == $department->id) selected @endif>{{ $department->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_department') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="designation">{{ __('field_designation') }}</label>
                                    <select class="form-control" name="designation" id="designation">
                                        <option value="">{{ __('all') }}</option>
                                        @foreach( $designations as $designation )
                                        <option value="{{ $designation->id }}" @if( $selected_designation == $designation->id) selected @endif>{{ $designation->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_designation') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="contract_type">{{ __('field_contract_type') }} </label>
                                    <select class="form-control" name="contract_type" id="contract_type">
                                        <option value="">{{ __('all') }}</option>
                                        <option value="1" {{ $selected_contract == 1 ? 'selected' : '' }}>{{ __('contract_type_full_time') }}</option>
                                        <option value="2" {{ $selected_contract == 2 ? 'selected' : '' }}>{{ __('contract_type_part_time') }}</option>
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_contract_type') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="shift">{{ __('field_work_shift') }}</label>
                                    <select class="form-control" name="shift" id="shift">
                                        <option value="">{{ __('all') }}</option>
                                        @foreach( $work_shifts as $shift )
                                        <option value="{{ $shift->id }}" @if( $selected_shift == $shift->id) selected @endif>{{ $shift->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_work_shift') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="month">{{ __('field_month') }} <span>*</span></label>
                                    <select class="form-control" name="month" id="month" required>
                                        <option value="1" @if($selected_month == 1) selected @endif>{{ __('month_january') }}</option>
                                        <option value="2" @if($selected_month == 2) selected @endif>{{ __('month_february') }}</option>
                                        <option value="3" @if($selected_month == 3) selected @endif>{{ __('month_march') }}</option>
                                        <option value="4" @if($selected_month == 4) selected @endif>{{ __('month_april') }}</option>
                                        <option value="5" @if($selected_month == 5) selected @endif>{{ __('month_may') }}</option>
                                        <option value="6" @if($selected_month == 6) selected @endif>{{ __('month_june') }}</option>
                                        <option value="7" @if($selected_month == 7) selected @endif>{{ __('month_july') }}</option>
                                        <option value="8" @if($selected_month == 8) selected @endif>{{ __('month_august') }}</option>
                                        <option value="9" @if($selected_month == 9) selected @endif>{{ __('month_september') }}</option>
                                        <option value="10" @if($selected_month == 10) selected @endif>{{ __('month_october') }}</option>
                                        <option value="11" @if($selected_month == 11) selected @endif>{{ __('month_november') }}</option>
                                        <option value="12" @if($selected_month == 12) selected @endif>{{ __('month_december') }}</option>
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_month') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="year">{{ __('field_year') }} <span>*</span></label>
                                    <select class="form-control" name="year" id="year" required>
                                        <option value="{{ date("Y") }}" @if($selected_year == date("Y")) selected @endif>{{ date("Y") }}</option>
                                        <option value="{{ date("Y") - 1 }}" @if($selected_year == date("Y") - 1) selected @endif>{{ date("Y") - 1 }}</option>
                                        <option value="{{ date("Y") - 2 }}" @if($selected_year == date("Y") - 2) selected @endif>{{ date("Y") - 2 }}</option>
                                        <option value="{{ date("Y") - 3 }}" @if($selected_year == date("Y") - 3) selected @endif>{{ date("Y") - 3 }}</option>
                                        <option value="{{ date("Y") - 4 }}" @if($selected_year == date("Y") - 4) selected @endif>{{ date("Y") - 4 }}</option>
                                        <option value="{{ date("Y") - 5 }}" @if($selected_year == date("Y") - 5) selected @endif>{{ date("Y") - 5 }}</option>
                                        <option value="{{ date("Y") - 6 }}" @if($selected_year == date("Y") - 6) selected @endif>{{ date("Y") - 6 }}</option>
                                        <option value="{{ date("Y") - 7 }}" @if($selected_year == date("Y") - 7) selected @endif>{{ date("Y") - 7 }}</option>
                                        <option value="{{ date("Y") - 8 }}" @if($selected_year == date("Y") - 8) selected @endif>{{ date("Y") - 8 }}</option>
                                        <option value="{{ date("Y") - 9 }}" @if($selected_year == date("Y") - 9) selected @endif>{{ date("Y") - 9 }}</option>
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_year') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-info btn-filter"><i class="fas fa-search"></i> {{ __('btn_filter') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    @if(isset($rows))
                    <div class="card-block">
                        <a href="{{ route($route.'.report') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>

                        @if(isset($rows))
                        <button type="button" class="btn btn-dark btn-print">
                            <i class="fas fa-print"></i> {{ __('btn_print') }}
                        </button>
                        @endif
                    </div>
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table class="display table nowrap table-striped table-hover table-bordered printable">
                                <thead>
                                    <tr>
                                        <th>{{ __('field_staff_id') }}</th>
                                        <th>{{ __('field_name') }}</th>
                                        <th>{{ __('field_basic_salary') }}</th>
                                        <th>{{ __('field_total_earning') }}</th>
                                        <th>{{ __('field_total_allowance') }}</th>
                                        <th>{{ __('field_total_deduction') }}</th>
                                        <th>{{ __('field_gross_salary') }}</th>
                                        <th>{{ __('field_tax') }}</th>
                                        <th>{{ __('field_net_salary') }}</th>
                                        <th>{{ __('field_status') }}</th>
                                        <th>{{ __('field_pay_date') }}</th>
                                        <th>{{ __('field_payment_method') }}</th>
                                        <th>{{ __('field_note') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  @if(isset($rows))
                                    @foreach( $rows as $key => $row)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.user.show', $row->user->id) }}">
                                                #{{ $row->user->staff_id ?? '' }}
                                            </a>
                                        </td>
                                        <td>{{ $row->user->first_name ?? '' }} {{ $row->user->last_name ?? '' }}</td>
                                        <td>
                                            {{ round($row->basic_salary, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!} / 

                                            @if( $row->salary_type == 1 )
                                            {{ __('salary_type_fixed') }}
                                            @elseif( $row->salary_type == 2 )
                                            {{ __('salary_type_hourly') }}
                                            @endif
                                        </td>
                                        <td>{{ round($row->total_earning, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</td>
                                        <td>{{ round($row->total_allowance, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</td>
                                        <td>{{ round($row->total_deduction, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</td>
                                        <td>{{ round($row->gross_salary, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</td>
                                        <td>{{ round($row->tax, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</td>
                                        <td>{{ round($row->net_salary, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</td>
                                        <td>
                                            @if($row->status == 1)
                                            <span class="badge badge-pill badge-success">{{ __('status_paid') }}</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">{{ __('status_unpaid') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->status == 1)
                                            @if(isset($setting->date_format))
                                            {{ date($setting->date_format, strtotime($row->pay_date)) }}
                                            @else
                                            {{ date("Y-m-d", strtotime($row->pay_date)) }}
                                            @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if( $row->payment_method == 1 )
                                            {{ __('payment_method_card') }}
                                            @elseif( $row->payment_method == 2 )
                                            {{ __('payment_method_cash') }}
                                            @elseif( $row->payment_method == 3 )
                                            {{ __('payment_method_cheque') }}
                                            @elseif( $row->payment_method == 4 )
                                            {{ __('payment_method_bank') }}
                                            @elseif( $row->payment_method == 5 )
                                            {{ __('payment_method_e_wallet') }}
                                            @endif
                                        </td>
                                        <td>{{ $row->note }}</td>
                                    </tr>
                                    @endforeach
                                  @endif
                                </tbody>
                                <tfooter>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>{{ __('field_grand_total') }}</th>
                                        <th>{{ round($rows->sum('total_earning'), $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</th>
                                        <th>{{ round($rows->sum('total_allowance'), $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</th>
                                        <th>{{ round($rows->sum('total_deduction'), $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</th>
                                        <th>{{ round($rows->sum('gross_salary'), $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</th>
                                        <th>{{ round($rows->sum('tax'), $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</th>
                                        <th>{{ round($rows->sum('net_salary'), $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfooter>
                            </table>
                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection