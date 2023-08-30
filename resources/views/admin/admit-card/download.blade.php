<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

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

<div class="template-container" id="downloadable" style="width: {{ $print->width }}; height: {{ $print->height }};">
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
    
    <!-- PDF Js -->
    <script src="{{ asset('dashboard/plugins/jquery/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/html2pdf/js/html2pdf.bundle.min.js') }}"></script>

    <script type="text/javascript">
        "use strict";
        var pdf_title =  '{{ $row->student_id }}-{{ $enroll->semester->title }}' + '.pdf'
        var pdf_content = document.getElementById("downloadable");

        var options = {
          margin:       0,
          filename:     pdf_title,
          image:        { type: 'jpeg', quality: 8.00 },
          html2canvas:  { scale: 2 },
          jsPDF:        { unit: 'in', format: 'A4', orientation: 'portrait' }
        };

        html2pdf(pdf_content, options);
    </script>
</body>
</html>