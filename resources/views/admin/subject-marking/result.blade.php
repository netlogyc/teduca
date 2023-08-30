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
                        <form class="needs-validation" novalidate method="get" action="{{ route('admin.subject-result') }}">
                            <div class="row gx-2">
                                @include('common.inc.subject_search_filter')

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
                        <a href="{{ route('admin.subject-result') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                        
                        <button type="button" class="btn btn-dark btn-print">
                            <i class="fas fa-print"></i> {{ __('btn_print') }}
                        </button>
                    </div>
                    @endif

                    @php
                        $contribution = 0;
                        $exam_contribution = 0;
                    @endphp
                    @foreach($examTypes as $examType)
                        @php
                        $contribution = $contribution + $examType->contribution;
                        $exam_contribution = $exam_contribution + $examType->contribution;
                        @endphp
                    @endforeach
                    @isset($resultContributions)
                    @php
                        $con_attendances = $resultContributions->attendances;
                        $con_assignments = $resultContributions->assignments;
                        $con_activities = $resultContributions->activities;

                        $contribution = $contribution + $con_attendances + $con_assignments + $con_activities;
                    @endphp
                    @endisset

                    @if(isset($rows))
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table class="display table nowrap table-striped table-hover printable">
                                <thead>
                                    <tr>
                                        <th>{{ __('field_student_id') }}</th>
                                        <th>{{ __('field_name') }}</th>
                                        <th>{{ __('field_point') }}</th>
                                        <th>{{ __('field_grade') }}</th>
                                        <th>{{ __('field_exam') }} ({{ round($exam_contribution ?? '', 2) }})</th>
                                        @if(isset($con_attendances) && $con_attendances > 0)
                                        <th>{{ __('field_attendance') }} ({{ round($con_attendances, 2) }})</th>
                                        @endif
                                        @if(isset($con_assignments) && $con_assignments > 0)
                                        <th>{{ __('field_assignment') }} ({{ round($con_assignments, 2) }})</th>
                                        @endif
                                        @if(isset($con_activities) && $con_activities > 0)
                                        <th>{{ __('field_activities') }} ({{ round($con_activities, 2) }})</th>
                                        @endif
                                        <th>{{ __('field_total_marks') }}</th>
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
                                        
                                        @foreach($grades as $grade)
                                        @if($grade->min_mark <= $row->total_marks && $grade->max_mark >= $row->total_marks)
                                        
                                        <td>{{ $grade->title }}</td>
                                        <td>{{ number_format((float)$grade->point, 2, '.', '') }}</td>
                                        @endif
                                        @endforeach

                                        <td>{{ round($row->exam_marks, 2) }}</td>

                                        @if(isset($con_attendances) && $con_attendances > 0)
                                        <td>{{ round($row->attendances, 2) }}</td>
                                        @endif
                                        @if(isset($con_assignments) && $con_assignments > 0)
                                        <td>{{ round($row->assignments, 2) }}</td>
                                        @endif
                                        @if(isset($con_activities) && $con_activities > 0)
                                        <td>{{ round($row->activities, 2) }}</td>
                                        @endif
                                        
                                        <td>{{ round($row->total_marks) }}</td>
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