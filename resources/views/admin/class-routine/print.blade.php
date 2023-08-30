<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,maximum-scale=1.0">
    <title>{{ $title }}</title>
    
    <style type="text/css" media="screen, print">
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
    
    .class-routine-table {
      width: 100%;
      min-width: 100%;
    }
    .class-routine-table thead th {
        font-size: 14px;
        font-weight: 600;
    }
    .class-routine-table tbody td {
      vertical-align: top;
      min-width: 14%;
      padding: 0px;
    }
    .class-routine-table tbody td .class-time {
      clear: both;
      color: #111;
      font-size: 14px;
      padding: 5px;
      margin-top: 10px;
      background: transparent;
      border: 1px solid #101010;
      box-sizing: border-box;
    }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/prints/routine.css') }}" media="screen, print">

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
                    <h2>{!! $print->title !!}</h2>
                    <p>{!! strip_tags($print->body, '<br><b><i><strong><u><a><span><del>') !!}</p>
                  </div>
                </td>
                <td class="temp-logo">
                  <div class="inner">
                    @if(is_file('uploads/'.$path.'/'.$print->logo_right))
                    <img src="{{ asset('uploads/'.$path.'/'.$print->logo_right) }}" alt="Logo">
                    @endif
                  </div>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Header Section -->

    <!-- Header Section -->
    <table class="table-border">
        <thead>
            @foreach($rows as $key => $row)
            @if($loop->first)
            <tr>
                <th>{{ __('field_program') }}: {{ $row->program->shortcode ?? '' }}</th>
                <th>{{ __('field_session') }}: {{ $row->session->title ?? '' }}</th>
                <th>{{ __('field_semester') }}: {{ $row->semester->title ?? '' }}</th>
                <th>{{ __('field_section') }}: {{ $row->section->title ?? '' }}</th>
            </tr>
            @endif
            @endforeach
      </thead>
    </table>
    <!-- Header Section -->

    <!-- Header Section -->
    @if(isset($rows))
    <div class="card-block">
        <!-- [ Data table ] start -->
        <table class="table class-routine-table">
            <thead>
                <tr>
                    <th>{{ __('day_saturday') }}</th>
                    <th>{{ __('day_sunday') }}</th>
                    <th>{{ __('day_monday') }}</th>
                    <th>{{ __('day_tuesday') }}</th>
                    <th>{{ __('day_wednesday') }}</th>
                    <th>{{ __('day_thursday') }}</th>
                    <th>{{ __('day_friday') }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                $weekdays = array('1', '2', '3', '4', '5', '6', '7');
                @endphp
                <tr>
                    @foreach($weekdays as $weekday)
                    <td>
                        @foreach($rows->where('day', $weekday) as $row)
                        <div class="class-time">
                        {{ $row->subject->code ?? '' }}<br>
                        @if(isset($setting->time_format))
                        {{ date($setting->time_format, strtotime($row->start_time)) }}
                        @else
                        {{ date("h:i A", strtotime($row->start_time)) }}
                        @endif <br> @if(isset($setting->time_format))
                        {{ date($setting->time_format, strtotime($row->end_time)) }}
                        @else
                        {{ date("h:i A", strtotime($row->end_time)) }}
                        @endif<br>
                        {{ __('field_room') }}: {{ $row->room->title ?? '' }}<br>
                        {{ $row->teacher->staff_id }} - {{ $row->teacher->first_name ?? '' }}
                        </div>
                        @endforeach
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
        <!-- [ Data table ] end -->
    </div>
    @endif
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