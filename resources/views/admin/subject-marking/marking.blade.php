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

                    @isset($contribution)
                    @if($contribution != 100)
                    <div class="card-block">
                        <div class="alert alert-danger" role="alert">
                            {{ __('msg_your_contribution_is_not_correct') }}
                        </div>
                    </div>
                    @endif
                    @endisset

                    <div class="card-block">
                        <form class="needs-validation" novalidate method="get" action="{{ route($route.'.index') }}">
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
                        @if(isset($markings))
                        @if(count($markings) > 0)
                        <div class="alert alert-success" role="alert">
                            {{ __('marks_given') }}
                        </div>
                        @else
                        <div class="alert alert-danger" role="alert">
                            {{ __('marks_not_given') }}
                        </div>
                        @endif
                        @endif
                    </div>
                    @endif
                    
                    <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @isset($rows)
                    @foreach($rows as $row)
                        @php
                        foreach($row->subjectMarks->where('subject_id', $selected_subject) as $check){

                            if($check->student_enroll_id == $row->id){
                                $check_data = $check;
                                break;
                            }
                        }
                        @endphp
                    @endforeach
                    
                    <div class="card-block">
                        <div class="row">
                            <div class="form-group col-sm-6 col-md-3">
                                <label for="publish_date">{{ __('field_publish_date') }} <span>*</span></label>
                                <input type="date" class="form-control date" name="publish_date" id="publish_date" value="{{ $check_data->publish_date ?? '' }}" required>
                                    
                                <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('field_publish_date') }}
                                </div>
                            </div>

                            <div class="form-group col-sm-6 col-md-3">
                                <label for="publish_time">{{ __('field_publish_time') }} <span>*</span></label>
                                <input type="time" class="form-control time" name="publish_time" id="publish_time" value="{{ $check_data->publish_time ?? '' }}" required>
                                    
                                <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('field_publish_time') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endisset


                    @if(isset($rows))
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table class="display table nowrap table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('field_student_id') }}</th>
                                        <th>{{ __('field_name') }}</th>
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
                                        <th>{{ __('field_exam') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <input type="hidden" name="students[]" value="{{ $row->id }}">
                                    <input type="hidden" name="subjects[]" value="{{ $subject->id }}">
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
                                        @php
                                            $exam_marks = 0;
                                            $contributeOfMarks = 0;
                                            $max_marks = $exam_contribution ?? 0;
                                        @endphp
                                        @foreach($row->exams->where('subject_id', $selected_subject) as $exam)
                                        @if($exam->attendance == 1 && $exam->student_enroll_id == $row->id && $exam->contribution > 0)

                                        @php
                                            $percentOfMarks = ($exam->achieve_marks / $exam->marks) * 100;
                                            $contributeOfMarks = $contributeOfMarks + (($percentOfMarks / 100) * $exam->contribution);
                                            $exam_marks = $contributeOfMarks;
                                        @endphp
                                            
                                        @endif
                                        @endforeach

                                        @php
                                        $mark = '0';
                                        $attend = '0';
                                        $assignment = '0';
                                        $activity = '0';

                                        //Subject Marks
                                        foreach($row->subjectMarks->where('subject_id', $selected_subject) as $marking){
                                        if($marking->student_enroll_id == $row->id){
                                         $mark = $marking->exam_marks;
                                         $attend = $marking->attendances;
                                         $assignment = $marking->assignments;
                                         $activity = $marking->activities;
                                         break;
                                        }
                                        }
                                        @endphp
                                        <input type="text" class="form-control exam_marks autonumber" name="exam_marks[]" id="exam_marks" value="{{ round($exam_marks ?? $mark) }}" 
                                        style="width: 80px;" data-v-max="{{ $max_marks }}" data-v-min="0" data_id="total-{{ $row->id }}" onkeyup="marksCalculator('total', {{ $row->id }})" readonly required>
                                        </td>
                                        @php
                                        $present = $studentAttendance->where('student_enroll_id', $row->id)->where('subject_id', $selected_subject)->where('attendance', 1)->count();

                                        $absent = $studentAttendance->where('student_enroll_id', $row->id)->where('subject_id', $selected_subject)->where('attendance', 2)->count();

                                        $leave = $studentAttendance->where('student_enroll_id', $row->id)->where('subject_id', $selected_subject)->where('attendance', 3)->count();

                                        $total_present = $present + $leave;
                                        $total_attendance = $total_present + $absent;

                                        if(!empty($total_attendance)){
                                            $attendance_mark = ($con_attendances / $total_attendance) * $total_present;
                                        }else{
                                            $attendance_mark = 0;
                                        }
                                        @endphp

                                        @if(isset($con_attendances) && $con_attendances > 0)
                                        <td>
                                            <input type="text" class="form-control attendances autonumber" name="attendances[]" id="attendances" value="{{ round($attendance_mark ?? $attend) }}" style="width: 80px;" data-v-max="{{ $con_attendances }}" data-v-min="0" data_id="total-{{ $row->id }}" onkeyup="marksCalculator('total', {{ $row->id }})" readonly required>
                                        </td>
                                        @endif
                                        @if(isset($con_assignments) && $con_assignments > 0)
                                        <td>
                                            <input type="text" class="form-control assignments autonumber" name="assignments[]" id="assignments" value="{{ $assignment ? round($assignment, 2) : '' }}" style="width: 80px;" data-v-max="{{ $con_assignments }}" data-v-min="0" data_id="total-{{ $row->id }}" onkeyup="marksCalculator('total', {{ $row->id }})" required>
                                        </td>
                                        @endif
                                        @if(isset($con_activities) && $con_activities > 0)
                                        <td>
                                            <input type="text" class="form-control activities autonumber" name="activities[]" id="activities" value="{{ $activity ? round($activity, 2) : '' }}" style="width: 80px;" data-v-max="{{ $con_activities }}" data-v-min="0" data_id="total-{{ $row->id }}" onkeyup="marksCalculator('total', {{ $row->id }})" required>
                                        </td>
                                        @endif

                                        <td>
                                            @php
                                            $total_marks = round($assignment ?? '0', 2) + round($activity ?? '0', 2) + round($exam_marks ?? $mark) + round($attendance_mark ?? $attend)
                                            @endphp
                                            <input type="text" class="form-control total_marks autonumber" name="total_marks[]" id="total_marks" value="{{ round($total_marks) }}" style="width: 80px;" data-v-max="100" data-v-min="0" readonly data_id="total-{{ $row->id }}" onkeyup="marksCalculator('total', {{ $row->id }})" readonly required>
                                        </td>
                                        <td>
                                            @foreach($row->exams->where('subject_id', $selected_subject)->sortByDesc('contribution') as $exam)
                                            @if($exam->contribution > 0)
                                                <span class="badge badge-dark">
                                                {{ $exam->type->title ?? '' }} - {{ round($exam->achieve_marks ?? '0', 2) }} ({{ round($exam->type->marks ?? '', 2) }}) ({{ round($exam->contribution, 2) }} %)
                                                </span><br>
                                            @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- [ Data table ] end -->
                    </div>

                    @isset($contribution)
                    @if(count($rows) > 0 && $contribution == 100)
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success update" ><i class="fas fa-check"></i> {{ __('btn_update') }}</button>
                    </div>
                    @endif
                    @endisset

                    @if(count($rows) < 1)
                    <div class="card-block">
                        <h5>{{ __('no_result_found') }}</h5>
                    </div>
                    @endif
                    @endif
                    </form>

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
        function marksCalculator(type, id) {

          var exam_marks = $(".exam_marks[data_id='"+type+"-"+id+"']").val();
          var attendances = $(".attendances[data_id='"+type+"-"+id+"']").val();
          var assignments = $(".assignments[data_id='"+type+"-"+id+"']").val();
          var activities = $(".activities[data_id='"+type+"-"+id+"']").val();
          var total_marks = $(".total_marks[data_id='"+type+"-"+id+"']").val();

          if (isNaN(attendances)) attendances = 0;
          if (isNaN(assignments)) assignments = 0;
          if (isNaN(activities)) activities = 0;

          var total_marks = parseFloat(exam_marks) + parseFloat(attendances) + parseFloat(assignments) + parseFloat(activities);

          $(".attendances[data_id='"+type+"-"+id+"']").val(attendances);
          $(".assignments[data_id='"+type+"-"+id+"']").val(assignments);
          $(".activities[data_id='"+type+"-"+id+"']").val(activities);
          $(".total_marks[data_id='"+type+"-"+id+"']").val(total_marks);

        }
    </script>
@endsection
