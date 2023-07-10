<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,maximum-scale=1.0">
    <title>{{ $title }}</title>
    
    <style type="text/css" media="print">
    @media print {
      @page { size: A4 portrait; margin: 10px auto; }   
      @page :footer { display: none }
      @page :header { display: none }
      body { margin: 15mm 15mm 15mm 15mm; }
      table, tbody {page-break-before: auto;}
    }
    table, img, svg {
      break-inside: avoid;
    }
    .template-container {
      -webkit-transform: scale(1.0);  /* Saf3.1+, Chrome */
      -moz-transform: scale(1.0);  /* FF3.5+ */
      -ms-transform: scale(1.0);  /* IE9 */
      -o-transform: scale(1.0);  /* Opera 10.5+ */
      transform: scale(1.0);
    }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/prints/marksheet.css') }}" media="screen, print">

    @php 
    $version = App\Models\Language::version(); 
    @endphp
    @if($version->direction == 1)
    <!-- RTL css -->
    <style type="text/css" media="screen, print">
    .template-container {
      direction: rtl;
    }
    .template-container .top-meta-table tr td,
    .template-container .top-meta-table tr th {
      float: right;
      text-align: right;
    }
    .table-no-border.marksheet td:nth-child(1), 
    .table-no-border.marksheet td:nth-child(2) {
      text-align: right;
    }
    </style>
    @endif
</head>
<body>

<div class="template-container printable" style="width: {{ $marksheet->width }}; height: {{ $marksheet->height }};">
  <div class="template-inner">
    <!-- Header Section -->
    <table class="table-no-border">
        <tbody>
            <tr>
                <td class="temp-logo">
                  <div class="inner">
                    @if(is_file('uploads/'.$path.'/'.$marksheet->logo_left))
                    <img src="{{ asset('uploads/'.$path.'/'.$marksheet->logo_left) }}" alt="Logo">
                    @endif
                  </div>
                </td>
                <td class="temp-title">
                  <div class="inner">
                    <h2>{{ $setting->title }}</h2>
                    <h4>{{ $marksheet->title }}</h4>
                  </div>
                </td>
                <td class="temp-logo last">
                  <div class="inner">
                    @if(is_file('uploads/'.$path.'/'.$marksheet->logo_right))
                    <img src="{{ asset('uploads/'.$path.'/'.$marksheet->logo_right) }}" alt="Logo">
                    @endif
                  </div>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Header Section -->

    @php
        $total_credits = 0;
        $total_cgpa = 0;
        $starting_year = '';
        $ending_year = '';
    @endphp


    {{-- CGPA and Credit Cal --}}
    @foreach( $row->studentEnrolls as $key => $item )

        {{-- Year Selection --}}
        @if($loop->first)
        @php
            $starting_year = $item->session->title;
        @endphp
        @endif

        @if($loop->last)
        @php
            $ending_year = $item->session->title;
        @endphp
        @endif

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

    <br/>

    <!-- Header Section -->
    <table class="table-no-border top-meta-table">
        <tbody>
            <tr>
                <td class="meta-data">{{ __('field_student_id') }}</td>
                <td class="meta-data width2">: {{ $row->student_id }}</td>

                <td class="meta-data">{{ __('field_starting_year') }}</td>
                <td class="meta-data">: {{ $starting_year }}</td>
            </tr>
            <tr>
                <td class="meta-data">{{ __('field_name') }}</td>
                <td class="meta-data width2">: {{ $row->first_name }} {{ $row->last_name }}</td>
                <td class="meta-data">{{ __('field_ending_year') }}</td>
                <td class="meta-data">: {{ $ending_year }}</td>
            </tr>
            <tr>
                <td class="meta-data">{{ __('field_gender') }}</td>
                <td class="meta-data width2">: 
                    @if( $row->gender == 1 )
                    {{ __('gender_male') }}
                    @elseif( $row->gender == 2 )
                    {{ __('gender_female') }}
                    @elseif( $row->gender == 3 )
                    {{ __('gender_other') }}
                    @endif
                </td>
                <td class="meta-data">{{ __('field_dob') }}</td>
                <td class="meta-data">:
                    @if(isset($setting->date_format))
                    {{ date($setting->date_format, strtotime($row->dob)) }}
                    @else
                    {{ date("Y-m-d", strtotime($row->dob)) }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="meta-data">{{ __('field_batch') }}</td>
                <td class="meta-data width2">: {{ $row->batch->title ?? '' }}</td>
                <td class="meta-data">{{ __('field_total_credit_hour') }}</td>
                <td class="meta-data">: {{ round($total_credits, 2) }}</td>
            </tr>
            <tr>
                <td class="meta-data">{{ __('field_program') }}</td>
                <td class="meta-data width2">: {{ $row->program->title ?? '' }}</td>

                @php
                    if($total_credits <= 0){
                        $total_credits = 1;
                    }
                    $com_gpa = $total_cgpa / $total_credits;
                @endphp

                <td class="meta-data">{{ __('field_cumulative_gpa') }}</td>
                <td class="meta-data">: {{ number_format((float)$com_gpa, 2, '.', '') }}</td>
            </tr>
        </tbody>
    </table>
    <!-- Header Section -->

    <br/>

    <!-- Header Section -->
    <table class="table-no-border marksheet">
        <thead>
            <tr>
                <th>{{ __('field_code') }}</th>
                <th class="width2">{{ __('field_subject') }}</th>
                <th>{{ __('field_credit_hour') }}</th>
                <th>{{ __('field_point') }}</th>
                <th>{{ __('field_grade') }}</th>
            </tr>
        </thead>


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
        <tbody>
            <tr>
                <td colspan="5" class="semester-title">{{ $semester_item[0] }} | {{ $semester_item[1] }} | {{ $semester_item[2] }}</td>
            </tr>

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

            @endif
            @endforeach

            <tr class="tfoot">
                <th colspan="2">{{ __('field_term_total') }}:</th>
                <th>{{ $semester_credits }}</th>
                <th>{{ number_format((float)$semester_cgpa, 2, '.', '') }}</th>
                <th></th>
            </tr>
        </tbody>
        @endforeach
    </table>
    <!-- Header Section -->

    <!-- Header Section -->
    <table class="table-no-border">
        <tbody>
            <tr>
                <td class="temp-footer">
                  <div class="inner">
                    <p>{!! $marksheet->footer_left !!}</p>
                  </div>
                </td>
                <td class="temp-footer">
                  <div class="inner">
                    <p>{!! $marksheet->footer_center !!}</p>
                  </div>
                </td>
                <td class="temp-footer">
                  <div class="inner">
                    <p>{!! $marksheet->footer_right !!}</p>
                  </div>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Header Section -->
  </div>
</div>

    <!-- Print Js -->
    <script src="{{ asset('dashboard/plugins/jquery/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/print/js/jQuery.print.min.js') }}"></script>

    <script type="text/javascript">
    $( document ).ready(function() {
      "use strict";
      $.print(".printable");
    });
    </script>

</body>
</html>