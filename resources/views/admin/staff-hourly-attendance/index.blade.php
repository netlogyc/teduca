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
                                <div class="form-group col-md-3">
                                    <label for="staff">{{ __('field_staff_id') }} <span>*</span></label>
                                    <select class="form-control select2" name="staff" id="staff" required>
                                    <option value="">{{ __('select') }}</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}" @if( $selected_staff == $user->id) selected @endif>
                                        {{ $user->staff_id }} - {{ $user->first_name }} {{ $user->last_name }}
                                    </option>
                                    @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_staff_id') }}
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label for="date">{{ __('field_date') }} <span>*</span></label>
                                    <input type="date" class="form-control date" name="date" id="date" value="{{ $selected_date }}" required>

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
                    @if(isset($classes))
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
                        @endif
                    </div>
                    @endif
                    
                    @if(isset($classes))
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
                        <input type="hidden" name="attendances" class="attendances" value="">

                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('field_subject') }}</th>
                                        <th>{{ __('field_attendance') }}</th>
                                        <th>{{ __('field_note') }}</th>
                                        <th>{{ __('field_start_time') }}</th>
                                        <th>{{ __('field_end_time') }}</th>
                                        <th>{{ __('field_program') }}</th>
                                        <th>{{ __('field_semester') }}</th>
                                        <th>{{ __('field_section') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @php $unique_id = 0; @endphp
                                  @foreach( $classes as $key => $class )
                                    <input type="text" name="unique_ids[]" value="{{ $unique_id }}" hidden>
                                    @php $unique_id = $unique_id + 1 @endphp

                                    <input type="text" name="users[]" value="{{ $class->teacher->id }}" hidden>
                                    <input type="text" name="programs[]" value="{{ $class->program_id }}" hidden>
                                    <input type="text" name="sessions[]" value="{{ $class->session_id }}" hidden>
                                    <input type="text" name="semesters[]" value="{{ $class->semester_id }}" hidden>
                                    <input type="text" name="sections[]" value="{{ $class->section_id }}" hidden>
                                    <input type="text" name="subjects[]" value="{{ $class->subject_id }}" hidden>

                                    @if(isset($attendances))
                                    @foreach($attendances as $attendance)
                                        @if($attendance->user_id == $class->teacher_id && $attendance->subject_id == $class->subject_id && $attendance->session_id == $class->session_id && $attendance->program_id == $class->program_id && $attendance->semester_id == $class->semester_id && $attendance->section_id == $class->section_id)
                                        @php
                                        $attend = $attendance;
                                        @endphp

                                        @endif
                                    @endforeach
                                    @endif
                                    <tr>
                                        <td>{{ $class->subject->code ?? '' }}</td>
                                        <td>
                                            <div class="form-group d-inline">
                                                <div class="radio radio-primary d-inline">
                                                    <input class="c-present" type="radio" data_id="{{ $class->teacher->id }}"name="attendances-{{ $key }}" id="attendance-p-{{ $key }}" value="1" 

                                                    @if(isset($attend))
                                                    @if($attend->attendance == 1)
                                                            checked 
                                                        @endif
                                                    @endif
                                                    required>
                                                    <label for="attendance-p-{{ $key }}" class="cr">{{ __('attendance_present') }}</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-inline">
                                                <div class="radio radio-danger d-inline">
                                                    <input class="c-absent" type="radio" data_id="{{ $class->teacher->id }}"name="attendances-{{ $key }}" id="attendance-a-{{ $key }}" value="2" 

                                                    @if(isset($attend))
                                                    @if($attend->attendance == 2)
                                                            checked 
                                                        @endif
                                                    @endif
                                                    required>
                                                    <label for="attendance-a-{{ $key }}" class="cr">{{ __('attendance_absent') }}</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-inline">
                                                <div class="radio radio-success d-inline">
                                                    <input class="c-leave" type="radio" data_id="{{ $class->teacher->id }}"name="attendances-{{ $key }}" id="attendance-l-{{ $key }}" value="3" 

                                                    @if(isset($attend))
                                                    @if($attend->attendance == 3)
                                                            checked 
                                                        @endif
                                                    @endif
                                                    required>
                                                    <label for="attendance-l-{{ $key }}" class="cr">{{ __('attendance_leave') }}</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-inline">
                                                <div class="radio radio-warning d-inline">
                                                    <input class="c-holiday" type="radio" data_id="{{ $class->teacher->id }}"name="attendances-{{ $key }}" id="attendance-h-{{ $key }}" value="4" 

                                                    @if(isset($attend))
                                                    @if($attend->attendance == 4)
                                                            checked 
                                                        @endif
                                                    @endif
                                                    required>
                                                    <label for="attendance-h-{{ $key }}" class="cr">{{ __('attendance_holiday') }}</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="notes[]" id="note-{{ $key }}" value="{{ $attend->note ?? '' }}" placeholder="{{ __('field_note') }}" style="width: 100px;">
                                        </td>
                                        <td>
                                            @if(isset($setting->time_format))
                                            {{ date($setting->time_format, strtotime($class->start_time)) }}
                                            @else
                                            {{ date("h:i A", strtotime($class->start_time)) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($setting->time_format))
                                            {{ date($setting->time_format, strtotime($class->end_time)) }}
                                            @else
                                            {{ date("h:i A", strtotime($class->end_time)) }}
                                            @endif
                                        </td>

                                        <input type="time" class="form-control" name="start_time[]" value="{{ $attend->start_time ?? $class->start_time }}" hidden required>
                                        <input type="time" class="form-control" name="end_time[]" value="{{ $attend->end_time ?? $class->end_time }}" hidden required>
                                        <input type="date" class="form-control" name="date[]" value="{{ $attend->date ?? $selected_date }}" hidden required>
                                        
                                        <td>{{ $class->program->shortcode ?? '' }}</td>
                                        <td>{{ $class->semester->title ?? '' }}</td>
                                        <td>{{ $class->section->title ?? '' }}</td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                    @if(count($classes) > 0)
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success update"><i class="fas fa-check"></i> {{ __('btn_update') }}</button>
                    </div>
                    @endif
                    </form>
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