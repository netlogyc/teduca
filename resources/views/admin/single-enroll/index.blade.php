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
                                    <label for="student">{{ __('field_student_id') }} <span>*</span></label>
                                    <select class="form-control select2" name="student" id="student" required>
                                        <option value="">{{ __('select') }}</option>
                                        @foreach($students as $student)
                                        <option value="{{ $student->student_id }}" @if($selected_student == $student->student_id) selected @endif>{{ $student->student_id }} - {{ $student->first_name }} {{ $student->last_name }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_student_id') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-info btn-filter"><i class="fas fa-search"></i> {{ __('btn_search') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>


                    @if(isset($row))
                    <div class="card-block">
                        @php
                            $enroll = \App\Models\Student::enroll($row->id);
                        @endphp

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

                        <div class="row">
                            <div class="col-md-6">
                                <fieldset class="row gx-2 scheduler-border">
                                    <legend>{{ __('tab_basic_info') }}</legend>
                                    <p><mark class="text-primary">{{ __('field_student_id') }}:</mark> #{{ $row->student_id }}</p>
                                    <hr/>

                                    <p><mark class="text-primary">{{ __('field_name') }}:</mark> {{ $row->first_name }} {{ $row->last_name }}</p>
                                    <hr/>

                                    <p><mark class="text-primary">{{ __('field_gender') }}:</mark> 
                                        @if( $row->gender == 1 )
                                        {{ __('gender_male') }}
                                        @elseif( $row->gender == 2 )
                                        {{ __('gender_female') }}
                                        @elseif( $row->gender == 3 )
                                        {{ __('gender_other') }}
                                        @endif
                                    </p><hr/>

                                    <p><mark class="text-primary">{{ __('field_total_credit_hour') }}:</mark> {{ round($total_credits, 2) }}</p>
                                    <hr/>

                                    <p><mark class="text-primary">{{ __('field_cumulative_gpa') }}:</mark> 
                                        @php
                                        if($total_credits <= 0){
                                            $total_credits = 1;
                                        }
                                        $com_gpa = $total_cgpa / $total_credits;
                                        echo number_format((float)$com_gpa, 2, '.', '');
                                        @endphp
                                    </p>
                                    <hr/>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset class="row gx-2 scheduler-border">
                                    <legend>{{ __('field_academic_information') }}</legend>
                                    <p><mark class="text-primary">{{ __('field_batch') }}:</mark> {{ $row->batch->title ?? '' }}</p><hr/>

                                    <p><mark class="text-primary">{{ __('field_program') }}:</mark> {{ $row->program->title ?? '' }}</p><hr/>

                                    <p><mark class="text-primary">{{ __('field_session') }}:</mark> {{ $enroll->session->title ?? '' }}</p><hr/>

                                    <p><mark class="text-primary">{{ __('field_semester') }}:</mark> {{ $enroll->semester->title ?? '' }}</p><hr/>

                                    <p><mark class="text-primary">{{ __('field_section') }}:</mark> {{ $enroll->section->title ?? '' }}</p><hr/>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                @if(isset($row))  
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('status_current') }} {{ __('field_session') }}: {{ $row->currentEnroll->session->title ?? '' }} | {{ $row->currentEnroll->semester->title ?? '' }} | {{ $row->currentEnroll->section->title ?? '' }}</h5>
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

                                    @isset($row->currentEnroll->subjects)
                                    @foreach( $row->currentEnroll->subjects as $subject )
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
                                            @if(isset($row->currentEnroll->subjectMarks))
                                            @foreach($row->currentEnroll->subjectMarks as $mark)
                                                @if($mark->subject_id == $subject->id)
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
                                            @endforeach
                                            @endif
                                        </td>
                                        <td>{{ $subject_grade ?? '' }}</td>
                                    </tr>
                                    @endforeach
                                    @endisset
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

                
                <form action="{{ route($route.'.store') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('field_next_enrollment') }}</h5>
                    </div>
                    <div class="card-block">
                        <div class="row gx-2">
                            <input type="text" name="student" value="{{ $row->id }}" hidden>
                            <input type="text" name="program" value="{{ $row->program_id }}" hidden>

                            <div class="form-group col-md-3">
                                <label for="session">{{ __('field_session') }} <span>*</span></label>
                                <select class="form-control" name="session" id="session" required>
                                  <option value="">{{ __('select') }}</option>
                                  @foreach( $sessions as $session )
                                  <option value="{{ $session->id }}" @if( $enroll->session_id == $session->id) selected @endif>{{ $session->title }}</option>
                                  @endforeach
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_session') }}
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="semester">{{ __('field_semester') }} <span>*</span></label>
                                <select class="form-control next_semester" name="semester" id="semester" required>
                                  <option value="">{{ __('select') }}</option>
                                  @foreach( $semesters as $semester )
                                  <option value="{{ $semester->id }}" @if( $enroll->semester_id == $semester->id) selected @endif>{{ $semester->title }}</option>
                                  @endforeach
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_semester') }}
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="section">{{ __('field_section') }} <span>*</span></label>
                                <select class="form-control next_section" name="section" id="section" required>
                                  <option value="">{{ __('select') }}</option>
                                  @foreach( $sections as $section )
                                  <option value="{{ $section->id }}" @if( $enroll->section_id == $section->id) selected @endif>{{ $section->title }}</option>
                                  @endforeach
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_section') }}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="subject">{{ __('field_subject') }} <span>* ({{ __('select_multiple') }})</span></label>
                                <select class="form-control select2 next_subject" name="subjects[]" id="subject" multiple required>
                                    @foreach( $subjects as $subject )
                                    <option value="{{ $subject->id }}">
                                        {{ $subject->code }} - {{ $subject->title }}
                                    </option>
                                    @endforeach
                                </select>

                                <div class="invalid-feedback">
                                {{ __('required_field') }} {{ __('field_subject') }}
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmModal">
                                    <i class="fas fa-exchange"></i> {{ __('btn_enroll') }}
                                </button>
                                <!-- Include Confirm modal -->
                                @include($view.'.confirm')
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                @endif

            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection

@section('page_js')
@if(isset($row))
<script type="text/javascript">
"use strict";
// Next Section
$(".next_semester").on('change',function(e){
  e.preventDefault(e);
  var section=$(".next_section");
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    type:'POST',
    url: "{{ route('filter-section') }}",
    data:{
      _token:$('input[name=_token]').val(),
      semester: $(this).val(),
      program: '{{ $row->program_id }}'
    },
    success:function(response){
        // var jsonData=JSON.parse(response);
        $('option', section).remove();
        $('.next_section').append('<option value="">{{ __("select") }}</option>');
        $.each(response, function(){
          $('<option/>', {
            'value': this.id,
            'text': this.title
          }).appendTo('.next_section');
        });
      }

  });
});

// Next Subject
$(".next_section").on('change',function(e){
  e.preventDefault(e);
  var subject=$(".next_subject");
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    type:'POST',
    url: "{{ route('filter-enroll-subject') }}",
    data:{
      _token:$('input[name=_token]').val(),
      section: $(this).val(),
      semester: $('.next_semester option:selected').val(),
      program: '{{ $row->program_id }}'
    },
    success:function(response){
        // var jsonData=JSON.parse(response);
        $.each(response, function(){
          $('.next_subject option[value='+this.id+']').attr('selected','selected');
          $('.next_subject').select2().trigger('change');
        });
      }

  });
});
</script>
@endif
@endsection