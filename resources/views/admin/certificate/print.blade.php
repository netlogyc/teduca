<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,maximum-scale=1.0">
    <title>{{ $title }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet"> 
    
    <style type="text/css" media="print">
    @media print {
      @page { size: A4 landscape; margin: 10px; }   
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
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/prints/certificate.css') }}" media="screen, print">

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

<div class="template-container printable" style="border-image: url('{{ asset('uploads/'.$path.'/'.$certificate->template->background) }}') 30 round; width: {{ $certificate->template->width }}; height: {{ $certificate->template->height }};">
    <div class="template-inner">
    <!-- Header Section -->
    <table class="table-no-border">
        <tbody>
            <tr>
                <td class="temp-logo">
                  <div class="inner">
                    @if(is_file('uploads/'.$path.'/'.$certificate->template->logo_left))
                    <img src="{{ asset('uploads/'.$path.'/'.$certificate->template->logo_left) }}" alt="Logo">
                    @endif
                  </div>
                </td>
                <td class="temp-title">
                  <div class="inner">
                    <h2>{{ $setting->title ?? '' }}</h2>
                  </div>
                </td>
                <td class="temp-logo last">
                  <div class="inner">
                    @if($certificate->template->student_photo == 1)
                    @if(is_file('uploads/student/'.$certificate->student->photo))
                    <img src="{{ asset('uploads/student/'.$certificate->student->photo) }}" alt="Student">
                    @endif
                    @endif
                  </div>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table-no-border">
        <tbody>
            <tr>
                <td class="main-title">
                    <h4>{{ $certificate->template->title ?? '' }}</h4>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Header Section -->

    <!-- Header Section -->
    <table class="table-no-border">
        <tbody>
            <tr>
                <td class="meta-data">
                    <div class="inner">{{ __('field_no') }}: {{ $certificate->serial_no }}</div>
                </td>
                <td class="meta-data last">
                    <div class="inner">{{ __('field_date') }}: 
                        @if(isset($setting->date_format))
                        {{ date($setting->date_format, strtotime($certificate->date)) }}
                        @else
                        {{ date("Y-m-d", strtotime($certificate->date)) }}
                        @endif
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Header Section -->

    <!-- Header Section -->
    <table class="table-no-border">
        <tbody>
            <tr>
                <td>
                    <div class="temp-body">
                    @if(isset($setting->date_format))
                    @php
                        $student_dob = date($setting->date_format, strtotime($certificate->student->dob));
                    @endphp
                    @else
                    @php
                        $student_dob = date("Y-m-d", strtotime($certificate->student->dob));
                    @endphp
                    @endif


                    @if($certificate->student->gender == 1)
                    @php
                        $student_gender = __('gender_male');
                    @endphp
                    @elseif($certificate->student->gender == 2)
                    @php
                        $student_gender = __('gender_female');
                    @endphp
                    @elseif($certificate->student->gender == 3)
                    @php
                        $student_gender = __('gender_other');
                    @endphp
                    @endif


                    @php
                        $grade_point = '';
                    @endphp
                    @foreach($grades as $grade)
                    @if($certificate->point >= $grade->point)
                    @php
                        $grade_point = $grade->title;
                    @endphp
                    @endif
                    @endforeach


                    @php
                        $first_name = $certificate->student->first_name ?? '';
                        $last_name = $certificate->student->last_name ?? '';
                        $student_id = $certificate->student->student_id ?? '';
                        $batch = $certificate->student->batch->title ?? '';
                        $program = $certificate->student->program->title ?? '';
                        $faculty = $certificate->student->program->faculty->title ?? '';
                        $father_name = $certificate->student->father_name ?? '';
                        $mother_name = $certificate->student->mother_name ?? '';
                        $email = $certificate->student->email ?? '';
                        $phone = $certificate->student->phone ?? '';
                    @endphp
                    @php
                    $search = array('[first_name]', '[last_name]', '[dob]', '[gender]', '[student_id]', '[batch]', '[program]', '[faculty]', '[father_name]', '[mother_name]', '[starting_year]', '[ending_year]', '[credits]', '[cgpa]', '[grade]', '[email]', '[phone]');

                    $replace = array('<span>'.$first_name.'</span>', '<span>'.$last_name.'</span>', '<span>'.$student_dob.'</span>', '<span>'.$student_gender.'</span>', '<span>'.$student_id.'</span>', '<span>'.$batch.'</span>', '<span>'.$program.'</span>', '<span>'.$faculty.'</span>', '<span>'.$father_name.'</span>', '<span>'.$mother_name.'</span>', '<span>'.date('Y',strtotime($certificate->starting_year)).'</span>', '<span>'.date('Y',strtotime($certificate->ending_year)).'</span>', '<span>'.round($certificate->credits, 2).'</span>', '<span>'.number_format((float)$certificate->point, 2, '.', '').'</span>', '<span>'.$grade_point.'</span>', '<span>'.$email.'</span>', '<span>'.$phone.'</span>');

                    $string = $certificate->template->body;
                    @endphp

                    {!! str_replace($search, $replace, $string) !!}
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Header Section -->

    <!-- Header Section -->
    @if($certificate->template->barcode == 1)
    <table class="table-no-border">
        <tbody>
            <tr>
                <td style="width: 33.33%; text-align: center;"></td>
                <td style="width: 33.33%; text-align: center; font-family: 'IDAHC39M Code 39 Barcode', Times, serif;">
                    {!! DNS1D::getBarcodeSVG($certificate->barcode, 'C39', 1, 33, '#000', false) !!}
                </td>
                <td style="width: 33.33%; text-align: center;"></td>
            </tr>
        </tbody>
    </table>
    @endif
    <table class="table-no-border">
        <tbody>
            <tr>
                <td class="temp-footer">
                  <div class="inner">
                    <p>{!! $certificate->template->footer_left !!}</p>
                  </div>
                </td>
                <td class="temp-footer">
                  <div class="inner">
                    <p>{!! $certificate->template->footer_center !!}</p>
                  </div>
                </td>
                <td class="temp-footer">
                  <div class="inner">
                    <p>{!! $certificate->template->footer_right !!}</p>
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