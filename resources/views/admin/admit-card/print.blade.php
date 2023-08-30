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
    table, img, svg, .template-container {
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
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/prints/admit_card.css') }}" media="screen, print">

    @php 
    $version = App\Models\Language::version(); 
    @endphp
    @if($version->direction == 1)
    <!-- RTL css -->
    <style type="text/css" media="screen, print">
      .template-container {
        direction: rtl;
      }
    </style>
    @endif
</head>
<body>

@foreach($rows as $row)
<div class="template-container printable" style="width: {{ $print->width }}; height: {{ $print->height }};">
  <div class="template-inner">
    <!-- Header Section -->
    <table class="table-no-border">
        <tbody>
            <tr>
                <td class="temp-logo">
                  <div class="inner">
                    @if(is_file('uploads/'.$path.'/'.$print->logo_left))
                    <img src="{{ asset('uploads/'.$path.'/'.$print->logo_left) }}" alt="Logo">
                    @endif
                  </div>
                </td>
                <td class="temp-title">
                  <div class="inner">
                    <h2>{{ $print->title }}</h2>

                    <h4>{!! strip_tags($print->body, '<br><b><i><strong><u><a><span><del>') !!}</h4>
                  </div>
                </td>
                <td class="temp-logo last">
                  <div class="inner">
                    @if($print->student_photo == 1)
                    @if(is_file('uploads/student/'.$row->photo))
                    <img src="{{ asset('uploads/student/'.$row->photo) }}" alt="Photo">
                    @endif
                    @endif
                  </div>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Header Section -->

    @php
        $enroll = \App\Models\Student::enroll($row->id);
    @endphp
    <!-- Header Section -->
    <table class="table-border">
        <tbody>
            <tr>
                <th>{{ __('field_student_id') }}</th>
                <th>{{ __('field_name') }}</th>
                <th>{{ __('field_program') }}</th>
                <th>{{ __('field_session') }}</th>
                <th>{{ __('field_semester') }}</th>
            </tr>
            <tr>
                <td>{{ $row->student_id }}</td>
                <td>{{ $row->first_name }} {{ $row->last_name }}</td>
                <td>{{ $enroll->program->shortcode ?? '' }}</td>
                <td>{{ $enroll->session->title ?? '' }}</td>
                <td>{{ $enroll->semester->title ?? '' }}</td>
            </tr>
        </tbody>
    </table>
    <!-- Header Section -->

    <!-- Header Section -->
    <table class="table-no-border">
        <tbody>
            <tr>
                <td class="temp-footer">
                  <div class="inner">
                    <p>{!! $print->footer_left !!}</p>
                  </div>
                </td>
                <td class="temp-footer last">
                  <div class="inner">
                    <p>{!! $print->footer_right !!}</p>
                  </div>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Header Section -->
  </div>
</div>
@endforeach

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