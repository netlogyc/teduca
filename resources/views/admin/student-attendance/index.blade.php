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
                        <form class="needs-validation" novalidate method="get" action="{{ route($route.'.index') }}">
                            <div class="row gx-2">
                                @include('common.inc.subject_search_filter')

                                <div class="form-group col-md-3">
                                    <label for="date">{{ __('field_date') }} <span>*</span></label>
                                    <input type="date" class="form-control date" name="date" value="{{ $selected_date }}" required>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_date') }}
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
                    @if(isset($rows))
                    @if(count($rows) > 0)
                    <div class="card-block">
                        @if(isset($attendances))
                            @if(count($attendances) > 0)
                            <div class="alert alert-success" role="alert">
                                {{ __('attendance_taken') }}
                            </div>
                            @else
                            <div class="alert alert-danger" role="alert">
                                {{ __('attendance_not_taken') }}
                            </div>
                            @endif
                        @else
                            <div class="alert alert-danger" role="alert">
                                {{ __('attendance_not_taken') }}
                            </div>
                        @endif
                    </div>
                    @endif
                    @endif

                    @if(isset($rows))
                    @if(count($rows) > 0)
                    <div class="card-header">
                        <div class="form-group d-inline">
                            <div class="radio radio-primary d-inline">
                                <input type="radio" name="all_check" id="attendance-p" class="all_present">
                                <label for="attendance-p" class="cr">{{ __('all') }} {{ __('attendance_present') }}</label>
                            </div>
                        </div>
                        <div class="form-group d-inline">
                            <div class="radio radio-danger d-inline">
                                <input type="radio" name="all_check" id="attendance-a" class="all_absent">
                                <label for="attendance-a" class="cr">{{ __('all') }} {{ __('attendance_absent') }}</label>
                            </div>
                        </div>
                        <div class="form-group d-inline">
                            <div class="radio radio-success d-inline">
                                <input type="radio" name="all_check" id="attendance-l" class="all_leave">
                                <label for="attendance-l" class="cr">{{ __('all') }} {{ __('attendance_leave') }}</label>
                            </div>
                        </div>
                        <div class="form-group d-inline">
                            <div class="radio radio-warning d-inline">
                                <input type="radio" name="all_check" id="attendance-h" class="all_holiday">
                                <label for="attendance-h" class="cr">{{ __('all') }} {{ __('attendance_holiday') }}</label>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-block">
                        <input type="hidden" name="subject" value="{{ $selected_subject }}">
                        <input type="hidden" name="date" value="{{ $selected_date }}">
                        <input type="hidden" name="attendances" class="attendances" value="">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table class="display table nowrap table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('field_student_id') }}</th>
                                        <th>{{ __('field_name') }}</th>
                                        <th>{{ __('field_attendance') }}</th>
                                        <th>{{ __('field_note') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <input type="hidden" name="students[]" value="{{ $row->id }}">
                                    <tr>
                                        <td>
                                            @isset($row->student->student_id)
                                            <a href="{{ route('admin.student.show', $row->student->id) }}">
                                            #{{ $row->student->student_id ?? '' }}
                                            </a>
                                            @endisset
                                        </td>
                                        <td>{{ $row->student->first_name ?? '' }} {{ $row->student->last_name ?? '' }}</td>
                                        <td>
                                            <div class="form-group d-inline">
                                                <div class="radio radio-primary d-inline">
                                                    <input class="c-present" type="radio" data_id="{{ $row->id }}"name="attendances-{{ $key }}" id="attendance-p-{{ $key }}" value="1"

                                                    @if(isset($attendances))
                                                    @foreach($attendances as $attendance)
                                                        @if($attendance->student_enroll_id == $row->id && $attendance->attendance == 1)
                                                            checked
                                                        @endif
                                                    @endforeach
                                                    @endif
                                                     required>
                                                    <label for="attendance-p-{{ $key }}" class="cr">{{ __('attendance_present') }}</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-inline">
                                                <div class="radio radio-danger d-inline">
                                                    <input class="c-absent" type="radio" data_id="{{ $row->id }}"name="attendances-{{ $key }}" id="attendance-a-{{ $key }}" value="2" 

                                                    @if(isset($attendances))
                                                    @foreach($attendances as $attendance)
                                                        @if($attendance->student_enroll_id == $row->id && $attendance->attendance == 2)
                                                            checked
                                                        @endif
                                                    @endforeach
                                                    @endif
                                                     required>
                                                    <label for="attendance-a-{{ $key }}" class="cr">{{ __('attendance_absent') }}</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-inline">
                                                <div class="radio radio-success d-inline">
                                                    <input class="c-leave" type="radio" data_id="{{ $row->id }}"name="attendances-{{ $key }}" id="attendance-l-{{ $key }}" value="3"

                                                    @if(isset($attendances))
                                                    @foreach($attendances as $attendance)
                                                        @if($attendance->student_enroll_id == $row->id && $attendance->attendance == 3)
                                                            checked
                                                        @endif
                                                    @endforeach
                                                    @endif
                                                     required>
                                                    <label for="attendance-l-{{ $key }}" class="cr">{{ __('attendance_leave') }}</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-inline">
                                                <div class="radio radio-warning d-inline">
                                                    <input class="c-holiday" type="radio" data_id="{{ $row->id }}"name="attendances-{{ $key }}" id="attendance-h-{{ $key }}" value="4"

                                                    @if(isset($attendances))
                                                    @foreach($attendances as $attendance)
                                                        @if($attendance->student_enroll_id == $row->id && $attendance->attendance == 4)
                                                            checked
                                                        @endif
                                                    @endforeach
                                                    @endif
                                                     required>
                                                    <label for="attendance-h-{{ $key }}" class="cr">{{ __('attendance_holiday') }}</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="text" style="width: 100px;" class="form-control" name="notes[]" id="note-{{ $key }}" 
                                            @if(isset($attendances))
                                            @foreach($attendances as $attendance)
                                                @if($attendance->student_enroll_id == $row->id)
                                                    value="{{ $attendance->note }}"
                                                @endif
                                            @endforeach
                                            @endif
                                            placeholder="{{ __('field_note') }}">
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success update"><i class="fas fa-check"></i> {{ __('btn_update') }}</button>
                    </div>
                    </form>
                    @endif

                    @if(count($rows) < 1)
                    <div class="card-block">
                        <h5>{{ __('no_result_found') }}</h5>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection

@section('page_js')
<script type="text/javascript">
    "use strict";
    $(document).ready(function() {
        $(".update").on('click',function(e){
            var attendances = [];
            $.each($("input[data_id]:checked"), function(){
                attendances.push($(this).val());
            });

            $(".attendances").val( attendances.join(',') );
        });
    });


    // checkbox all-check-button selector
    $(".all_present").on('click',function(e){
        if($(this).is(":checked")){
            // check all checkbox
            $(".c-present").prop('checked', true);
        }
        else if($(this).is(":not(:checked)")){
            // uncheck all checkbox
            $(".c-present").prop('checked', false);
        }
    });
    $(".all_absent").on('click',function(e){
        if($(this).is(":checked")){
            // check all checkbox
            $(".c-absent").prop('checked', true);
        }
        else if($(this).is(":not(:checked)")){
            // uncheck all checkbox
            $(".c-absent").prop('checked', false);
        }
    });
    $(".all_leave").on('click',function(e){
        if($(this).is(":checked")){
            // check all checkbox
            $(".c-leave").prop('checked', true);
        }
        else if($(this).is(":not(:checked)")){
            // uncheck all checkbox
            $(".c-leave").prop('checked', false);
        }
    });
    $(".all_holiday").on('click',function(e){
        if($(this).is(":checked")){
            // check all checkbox
            $(".c-holiday").prop('checked', true);
        }
        else if($(this).is(":not(:checked)")){
            // uncheck all checkbox
            $(".c-holiday").prop('checked', false);
        }
    });
</script>
@endsection