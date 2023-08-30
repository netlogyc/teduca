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
                                    <label for="type">{{ __('field_type') }} <span>*</span></label>
                                    <select class="form-control" name="type" id="type" required>
                                        <option value="">{{ __('select') }}</option>
                                        @foreach( $types as $type )
                                        <option value="{{ $type->id }}" @if( $selected_type == $type->id) selected @endif>{{ $type->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_type') }}
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
                    
                    @if(isset($rows))
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
                        <div class="clearfix"></div>
                    </div>

                    <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="subject" value="{{ $selected_subject }}">
                    <input type="hidden" name="type" value="{{ $selected_type }}">
                    <input type="hidden" name="attendances" class="attendances" value="">

                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table class="display table nowrap table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('field_student_id') }}</th>
                                        <th>{{ __('field_name') }}</th>
                                        <th>{{ __('field_attendance') }}</th>
                                        <th>{{ __('field_subject') }}</th>
                                        <th>{{ __('field_type') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $subjects as $subject )
                                    @if($subject->id == $selected_subject)
                                    @php
                                        $cur_subject = $subject->code;
                                    @endphp
                                    @endif
                                    @endforeach
                                    @foreach( $types as $type )
                                    @if($type->id == $selected_type)
                                    @php
                                        $cur_type = $type->title;
                                    @endphp
                                    @endif
                                    @endforeach
                                  @foreach( $rows as $key => $row )
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
                                        <input type="text" name="students[]" value="{{ $row->id }}" hidden>

                                        <div class="form-group d-inline">
                                            <div class="radio radio-primary d-inline">
                                                <input class="c-present" type="radio" data_id="{{ $row->id }}"name="attendances-{{ $key }}" id="attendance-p-{{ $key }}" value="1" required 

                                                @if(isset($attendances))
                                                @foreach($attendances as $attendance)
                                                    @if($attendance->student_enroll_id == $row->id && $attendance->attendance == 1)
                                                        checked
                                                    @endif
                                                @endforeach
                                                @endif
                                                >
                                                <label for="attendance-p-{{ $key }}" class="cr">{{ __('attendance_present') }}</label>
                                            </div>
                                        </div>
                                        <div class="form-group d-inline">
                                            <div class="radio radio-danger d-inline">
                                                <input class="c-absent" type="radio" data_id="{{ $row->id }}"name="attendances-{{ $key }}" id="attendance-a-{{ $key }}" value="2" required 

                                                @if(isset($attendances))
                                                @foreach($attendances as $attendance)
                                                    @if($attendance->student_enroll_id == $row->id && $attendance->attendance == 2)
                                                        checked
                                                    @endif
                                                @endforeach
                                                @endif
                                                >
                                                <label for="attendance-a-{{ $key }}" class="cr">{{ __('attendance_absent') }}</label>
                                            </div>
                                        </div>
                                        </td>
                                        <td>{{ $cur_subject ?? '' }}</td>
                                        <td>{{ $cur_type ?? '' }}</td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                    
                    @if(count($rows) < 1)
                    <div class="card-block">
                        <h5>{{ __('no_result_found') }}</h5>
                    </div>
                    @endif

                    @if(count($rows) > 0)
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
</script>
@endsection