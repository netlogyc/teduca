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
                        <form class="needs-validation" novalidate method="get" action="{{ route('admin.exam-result') }}">
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
                    <div class="card-header">
                        <a href="{{ route('admin.exam-result') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>

                        @if(isset($rows))
                        <button type="button" class="btn btn-dark btn-print">
                            <i class="fas fa-print"></i> {{ __('btn_print') }}
                        </button>
                        @endif
                    </div>
                    
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table class="display table nowrap table-striped table-hover printable">
                                <thead>
                                    <tr>
                                        <th>{{ __('field_student_id') }}</th>
                                        <th>{{ __('field_name') }}</th>
                                        <th>{{ __('field_subject') }}</th>
                                        <th>{{ __('field_type') }}</th>
                                        <th>{{ __('field_attendance') }}</th>
                                        @if(isset($rows))
                                        @foreach( $rows as $row )
                                        @if($loop->first)
                                        @php
                                            $max_marks = $row->type->marks;
                                        @endphp
                                        @endif
                                        @endforeach
                                        @endif
                                        <th>
                                            {{ __('field_marks') }}
                                            @if(isset($max_marks))
                                             ({{ round($max_marks, 2) }})
                                            @endif
                                         </th>
                                        <th>{{ __('field_point') }}</th>
                                        <th>{{ __('field_grade') }}</th>
                                        <th>{{ __('field_note') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>
                                            @isset($row->studentEnroll->student->student_id)
                                            <a href="{{ route('admin.student.show', $row->studentEnroll->student->id) }}">
                                            #{{ $row->studentEnroll->student->student_id ?? '' }}
                                            </a>
                                            @endisset
                                        </td>
                                        <td>{{ $row->studentEnroll->student->first_name ?? '' }} {{ $row->studentEnroll->student->last_name ?? '' }}</td>
                                        <td>{{ $row->subject->code ?? '' }}</td>
                                        <td>{{ $row->type->title ?? '' }}</td>
                                        <td>
                                            @if($row->attendance == 1)
                                            <span class="badge badge-primary">{{ __('attendance_present') }}</span>
                                            @else
                                            <span class="badge badge-danger">{{ __('attendance_absent') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->attendance == 1)
                                                {{ round($row->achieve_marks, 2) }}
                                            @else
                                                <span class="badge badge-danger">{{ __('attendance_absent') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->attendance == 1)
                                                @php
                                                $marks_per = (100 / $row->marks) * $row->achieve_marks;
                                                @endphp
                                                @foreach($grades as $grade)
                                                @if($marks_per >= $grade->min_mark && $marks_per <= $grade->max_mark)
                                                {{ number_format((float)$grade->point, 2, '.', '') }}
                                                @endif
                                                @endforeach
                                            @else
                                                <span class="badge badge-danger">{{ __('status_failed') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->attendance == 1)
                                                @foreach($grades as $grade)
                                                @if($marks_per >= $grade->min_mark && $marks_per <= $grade->max_mark)
                                                {{ $grade->title }}
                                                @endif
                                                @endforeach
                                            @else
                                                <span class="badge badge-danger">{{ __('status_failed') }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $row->note }}</td>
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
                    @endif

                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection