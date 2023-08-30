@extends('student.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h5>{{ $title }}</h5>
                  </div>

                  <ul class="list-group list-group-flush">
                    @if(isset($row->student_id))
                    <li class="list-group-item"><mark class="text-primary">{{ __('field_student_id') }} :</mark> {{ $row->student_id }}</li>
                    @endif
                    <li class="list-group-item"><mark class="text-primary">{{ __('field_name') }} :</mark> {{ $row->first_name }} {{ $row->last_name }}</li>

                    <li class="list-group-item"><mark class="text-primary">{{ __('field_batch') }} :</mark> {{ $row->batch->title ?? '' }}</li>
                    <li class="list-group-item"><mark class="text-primary">{{ __('field_program') }} :</mark> {{ $row->program->title ?? '' }}</li>

                    @php
                        $total_credits = 0;
                        $total_cgpa = 0;
                    @endphp
                    @foreach( $row->studentEnrolls as $key => $item )

                        @if(isset($item->subjectMarks))
                        @foreach($item->subjectMarks as $mark)
                        @if((date('Y-m-d', strtotime($mark->publish_date)) == date('Y-m-d') && date('H:i:s', strtotime($mark->publish_time)) <= date('H:i:s')) || date('Y-m-d', strtotime($mark->publish_date)) < date('Y-m-d'))

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

                        @endif
                        @endforeach
                        @endif

                    @endforeach

                    <li class="list-group-item"><mark class="text-primary">{{ __('field_total_credit_hour') }} :</mark> {{ round($total_credits, 2) }}</li>

                    <li class="list-group-item"><mark class="text-primary">{{ __('field_cumulative_gpa') }} :</mark> 
                        @php
                        if($total_credits <= 0){
                            $total_credits = 1;
                        }
                        $com_gpa = $total_cgpa / $total_credits;
                        echo number_format((float)$com_gpa, 2, '.', '');
                        @endphp
                    </li>
                  </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                  <div class="card-block">
                      <table class="display table table-striped">
                          <thead>
                              <tr>
                                <th>{{ __('field_grade') }}</th>
                                <th>{{ __('field_point') }}</th>
                                <th>{{ __('field_min_mark') }}</th>
                                <th>{{ __('field_max_mark') }}</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($grades as $grade)
                              <tr>
                                <td>{{ $grade->title }}</td>
                                <td>{{ number_format((float)$grade->point, 2, '.', '') }}</td>
                                <td>{{ number_format((float)$grade->min_mark, 2, '.', '') }} %</td>
                                <td>{{ number_format((float)$grade->max_mark, 2, '.', '') }} %</td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                @php
                    $semesters_check = 0;
                    $semester_items = array();
                @endphp

                @foreach( $row->studentEnrolls as $key => $enroll )
                @if($semesters_check != $enroll->session->title)
                @php
                    array_push($semester_items, array($enroll->session->title, $enroll->semester->title, $enroll->section->title));
                    $semesters_check = $enroll->session->title;
                @endphp
                @endif
                @endforeach

                @foreach($semester_items as $key => $semester_item)
                <div class="clearfix"></div>
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $semester_item[0] }} | {{ $semester_item[1] }} | {{ $semester_item[2] }}</h5>
                    </div>
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table class="display table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __('field_code') }}</th>
                                        <th>{{ __('field_subject') }}</th>
                                        <th>{{ __('field_credit_hour') }}</th>
                                        <th>{{ __('field_point') }}</th>
                                        <th>{{ __('field_grade') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $semester_credits = 0;
                                        $semester_cgpa = 0;
                                    @endphp
                                    @foreach( $row->studentEnrolls as $key => $item )
                                    @if($semester_item[1] == $item->semester->title && $semester_item[0] == $item->session->title)

                                    @foreach( $item->subjects as $subject )
                                    @php
                                        $semester_credits = $semester_credits + $subject->credit_hour;
                                        $subject_grade = null;
                                    @endphp
                                    
                                    <tr>
                                        <td>{{ $subject->code }}</td>
                                        <td>
                                            {{ $subject->title }}
                                            @if($subject->subject_type == 0)
                                             ({{ __('subject_type_optional') }})
                                            @endif
                                        </td>
                                        <td>{{ round($subject->credit_hour, 2) }}</td>
                                        <td>
                                            @if(isset($item->subjectMarks))
                                            @foreach($item->subjectMarks as $mark)
                                                @if($mark->subject_id == $subject->id)
                                                @if((date('Y-m-d', strtotime($mark->publish_date)) == date('Y-m-d') && date('H:i:s', strtotime($mark->publish_time)) <= date('H:i:s')) || date('Y-m-d', strtotime($mark->publish_date)) < date('Y-m-d'))

                                                @php
                                                $marks_per = round($mark->total_marks);
                                                @endphp

                                                @foreach($grades as $grade)
                                                @if($marks_per >= $grade->min_mark && $marks_per <= $grade->max_mark)
                                                {{ number_format((float)$grade->point * $subject->credit_hour, 2, '.', '') }}
                                                @php
                                                $semester_cgpa = $semester_cgpa + ($grade->point * $subject->credit_hour);
                                                $subject_grade = $grade->title;
                                                @endphp
                                                @break
                                                @endif
                                                @endforeach

                                                @endif
                                                @endif
                                            @endforeach
                                            @endif
                                        </td>
                                        <td>{{ $subject_grade ?? '' }}</td>
                                    </tr>
                                    @endforeach

                                    @endif
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">{{ __('field_term_total') }}</th>
                                        <th>{{ $semester_credits }}</th>
                                        <th>{{ number_format((float)$semester_cgpa, 2, '.', '') }}</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection