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
                                @include('common.inc.common_search_filter')

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
                    @isset($rows)
                    <form action="{{ route($route.'.store') }}" method="post">
                    @csrf
                    @if(count($rows) > 0)
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table class="display table nowrap table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                        <div class="checkbox checkbox-success d-inline">
                                            <input type="checkbox" id="checkbox" class="all_select" checked>
                                            <label for="checkbox" class="cr" style="margin-bottom: 0px;"></label>
                                        </div>
                                        </th>
                                        <th>{{ __('field_student_id') }}</th>
                                        <th>{{ __('field_name') }}</th>
                                        <th>{{ __('field_gender') }}</th>
                                        <th>{{ __('field_total_credit_hour') }}</th>
                                        <th>{{ __('field_cumulative_gpa') }}</th>
                                        <th>{{ __('field_batch') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )

                                    @php
                                        $total_credits = 0;
                                        $total_cgpa = 0;
                                    @endphp
                                    @foreach( $row->studentEnrolls as $key => $item )

                                        @if(isset($item->subjectMarks))
                                        @foreach($item->subjectMarks as $mark)

                                            @php
                                            $marks_per = round($mark->total_marks);
                                            @endphp

                                            @foreach($grades as $grade)
                                            @if($marks_per >= $grade->min_mark && $marks_per <= $grade->max_mark)
                                            @php
                                            if($grade->point > 0){
                                            $total_cgpa = $total_cgpa + ($grade->point * $mark->subject->credit_hour);
                                            $total_credits = $total_credits + $mark->subject->credit_hour;
                                            }
                                            @endphp
                                            @break
                                            @endif
                                            @endforeach

                                        @endforeach
                                        @endif

                                    @endforeach

                                    <tr>
                                        <td>
                                        <div class="checkbox checkbox-primary d-inline">
                                            <input type="checkbox" name="students[]" id="checkbox-{{ $row->id }}" value="{{ $row->id }}" checked>
                                            <label for="checkbox-{{ $row->id }}" class="cr"></label>
                                        </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.student.show', $row->id) }}" target="_blank">
                                            #{{ $row->student_id }}
                                            </a>
                                        </td>
                                        <td>{{ $row->first_name }} {{ $row->last_name }}</td>
                                        <td>
                                            @if( $row->gender == 1 )
                                            {{ __('gender_male') }}
                                            @elseif( $row->gender == 2 )
                                            {{ __('gender_female') }}
                                            @elseif( $row->gender == 3 )
                                            {{ __('gender_other') }}
                                            @endif
                                        </td>
                                        <td>{{ round($total_credits, 2) }}</td>
                                        <td>
                                            @php
                                            if($total_credits <= 0){
                                                $total_credits = 1;
                                            }
                                            $com_gpa = $total_cgpa / $total_credits;
                                            echo number_format((float)$com_gpa, 2, '.', '');
                                            @endphp
                                        </td>
                                        <td>{{ $row->batch->title ?? '' }}</td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                    
                    <div class="card-footer">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmModal">
                            <i class="fas fa-exchange"></i> {{ __('btn_make_alumni') }}
                        </button>
                        <!-- Include Confirm modal -->
                        @include($view.'.confirm')
                    </div>
                    @endif
                    </form>

                    @if(count($rows) < 1)
                    <div class="card-block">
                        <h5>{{ __('no_result_found') }}</h5>
                    </div>
                    @endif
                    @endisset
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
// checkbox all-check-button selector
$(".all_select").on('click',function(e){
    if($(this).is(":checked")){
        // check all checkbox
        $("input:checkbox").prop('checked', true);
    }
    else if($(this).is(":not(:checked)")){
        // uncheck all checkbox
        $("input:checkbox").prop('checked', false);
    }
});
</script>
@endsection