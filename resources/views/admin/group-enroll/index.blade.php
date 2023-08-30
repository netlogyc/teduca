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
                @isset($rows)
                <form action="{{ route($route.'.store') }}" method="post">
                @csrf
                @if(count($rows) > 0)
                <div class="card">
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

                                    <input type="text" name="program" value="{{ $selected_program }}" hidden>
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
                </div>
                

                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('field_next_enrollment') }}</h5>
                    </div>
                    <div class="card-block">
                        <div class="row gx-2">
                            <div class="form-group col-md-3">
                                <label for="session">{{ __('field_session') }} <span>*</span></label>
                                <select class="form-control" name="session" id="session" required>
                                  <option value="">{{ __('select') }}</option>
                                  @foreach( $sessions as $session )
                                  <option value="{{ $session->id }}" @if( $selected_session == $session->id) selected @endif>{{ $session->title }}</option>
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
                                  <option value="{{ $semester->id }}" @if( $selected_semester == $semester->id) selected @endif>{{ $semester->title }}</option>
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
                                  <option value="{{ $section->id }}" @if( $selected_section == $section->id) selected @endif>{{ $section->title }}</option>
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
                @endif
                </form>

                @if(count($rows) < 1)
                <div class="card">
                    <div class="card-block">
                        <h5>{{ __('no_result_found') }}</h5>
                    </div>
                </div>
                @endif
                @endisset

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
      program: '{{ $selected_program }}'
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
      program: '{{ $selected_program }}'
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