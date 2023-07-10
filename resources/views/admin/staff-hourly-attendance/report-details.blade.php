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
                        <h5>#{{ $user->staff_id }} - {{ $user->first_name }} {{ $user->last_name }}</h5>
                    </div>
                    <div class="card-block">
                        <a href="{{ route($route.'.report') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                        @if(isset($classes))
                        <button type="button" class="btn btn-dark btn-print">
                            <i class="fas fa-print"></i> {{ __('btn_print') }}
                        </button>
                        @endif
                    </div>

                    <div class="card-block">
                        <form class="needs-validation" novalidate method="get" action="">
                            <div class="row gx-2">
                                <div class="form-group col-md-3">
                                    <label for="session">{{ __('field_session') }} <span>*</span></label>
                                    <select class="form-control" name="session" id="session" required>
                                        @foreach( $sessions as $session )
                                        <option value="{{ $session->id }}" @if($selected_session == $session->id) selected @endif>{{ $session->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_session') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="month">{{ __('field_month') }}</label>
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
                                    <label for="year">{{ __('field_year') }}</label>
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
                                    <button type="submit" class="btn btn-info btn-filter"><i class="fas fa-search"></i> {{ __('btn_search') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    @if(isset($attendances) && isset($classes))
                    <div class="card-header">
                        <p>{{ __('attendance_present') }}: <span class="text-primary">{{ __('P') }}</span> | {{ __('attendance_absent') }}: <span class="text-danger">{{ __('A') }}</span> | {{ __('attendance_leave') }}: <span class="text-success">{{ __('L') }}</span> | {{ __('attendance_holiday') }}: <span class="text-warning">{{ __('H') }}</span></p>
                    </div>
                    <div class="card-block">
                        @php
                        $start = $selected_year.'-'.$selected_month.'-01';
                        $date = $selected_year.'-'.$selected_month.'-01';
                        @endphp
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table class="table table-attendance table-striped table-hover table-bordered printable">
                                <thead>
                                    <tr>
                                        <th>{{ __('field_subject') }}</th>
                                        <th>{{ __('field_program') }}</th>
                                        <th>{{ __('field_semester') }}</th>
                                        @for($i = 0; $i < \Carbon\Carbon::parse($start)->daysInMonth; ++$i)

                                            <th class='text-center'>
                                                {{ date('d', strtotime($date)) }}
                                            </th>

                                            @php
                                            $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
                                            @endphp
                                        @endfor
                                        <th>{{ __('P') }}</th>
                                        <th>{{ __('A') }}</th>
                                        <th>{{ __('L') }}</th>
                                        <th>{{ __('H') }}</th>
                                        <th>{{ __('%') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($classes as $class)
                                  @php
                                    $atten_date = date("Y-m-d", strtotime($selected_year.'-'.$selected_month.'-01'));
                                  @endphp
                                    <tr>
                                        <td>{{ $class->subject->code ?? '' }}</td>
                                        <td>{{ $class->program->shortcode ?? '' }}</td>
                                        <td>{{ $class->semester->title ?? '' }} ({{ $class->section->title ?? '' }})</td>
                                        @for($i = 0; $i < \Carbon\Carbon::parse($start)->daysInMonth; ++$i)
                                            <td>
                                            @if(isset($attendances))
                                            @foreach($attendances as $attendance)
                                                @if($attendance->subject_id == $class->subject->id && $attendance->session_id == $class->session_id && $attendance->program_id == $class->program_id && $attendance->semester_id == $class->semester_id && $attendance->section_id == $class->section_id && date("Y-m-d", strtotime($attendance->date)) == $atten_date)
                                                @if($attendance->attendance == 1)
                                                <div class="text-primary">{{ __('P') }}</div>
                                                @elseif($attendance->attendance == 2)
                                                <div class="text-danger">{{ __('A') }}</div>
                                                @elseif($attendance->attendance == 3)
                                                <div class="text-success">{{ __('L') }}</div>
                                                @elseif($attendance->attendance == 4)
                                                <div class="text-warning">{{ __('H') }}</div>
                                                @endif
                                                @endif
                                            @endforeach
                                            @endif

                                            @php
                                            $atten_date = date("Y-m-d", strtotime("+1 day", strtotime($atten_date)));
                                            @endphp
                                            </td>
                                        @endfor
                                        @php
                                            $total_present = 0;
                                            $total_absent = 0;
                                            $total_leave = 0;
                                            $total_holiday = 0;
                                        @endphp
                                        @if(isset($attendances))
                                          @foreach($attendances as $subject_attend)
                                                @if($subject_attend->subject_id == $class->subject->id)
                                                      @if($subject_attend->attendance == 1)
                                                      @php
                                                            $total_present = $total_present + 1;
                                                      @endphp
                                                      @elseif($subject_attend->attendance == 2)
                                                      @php
                                                            $total_absent = $total_absent + 1;
                                                      @endphp
                                                      @elseif($subject_attend->attendance == 3)
                                                      @php
                                                            $total_leave = $total_leave + 1;
                                                      @endphp
                                                      @elseif($subject_attend->attendance == 4)
                                                      @php
                                                            $total_holiday = $total_holiday + 1;
                                                      @endphp
                                                      @endif
                                                @endif
                                          @endforeach
                                        @endif
                                        <td>{{ $total_present }}</td>
                                        <td>{{ $total_absent }}</td>
                                        <td>{{ $total_leave }}</td>
                                        <td>{{ $total_holiday }}</td>
                                        @php
                                            $total_working_days = $total_present + $total_absent + $total_leave;
                                            if($total_working_days == 0){
                                                $total_working_days = 1;
                                            }
                                        @endphp
                                        <td>{{ round((($total_present / $total_working_days) * 100), 2) }} %</td>
                                    </tr>
                                 @endforeach
                                </tbody>
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