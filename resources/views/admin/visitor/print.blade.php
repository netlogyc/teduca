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
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/prints/visitor_token.css') }}" media="screen, print">

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
    .template-container .table-no-border tr td.temp-logo {
      float: none;
    }
    .template-container .temp-title {
      float: right;
      text-align: right;
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
                <td class="temp-title">
                  <div class="inner">
                    <h2>{{ $print->title }}</h2>
                    <p>{{ $row->token }}</p>
                  </div>
                </td>
                <td class="temp-logo last">
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
    <table class="table-no-border top-meta-table">
        <tbody>
            <tr>
                <td class="meta-data">{{ __('field_name') }}</td>
                <td class="meta-data value width2">: {{ $row->name }}</td>
                <td class="meta-data">{{ __('field_purpose') }}</td>
                <td class="meta-data value width2">: {{ $row->purpose->title ?? '' }}</td>
            </tr>
            <tr>
                <td class="meta-data">{{ __('field_phone') }}</td>
                <td class="meta-data value width2">: {{ $row->phone }}</td>
                <td class="meta-data">{{ __('field_department') }}</td>
                <td class="meta-data value width2">: {{ $row->department->title ?? '' }}</td>
            </tr>
            <tr>
                <td class="meta-data">{{ __('field_email') }}</td>
                <td class="meta-data value width2">: {{ $row->email }}</td>
                <td class="meta-data">{{ __('field_date') }}</td>
                <td class="meta-data value width2">: 
                    @if(isset($setting->date_format))
                    {{ date($setting->date_format, strtotime($row->date)) }}
                    @else
                    {{ date("Y-m-d", strtotime($row->date)) }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="meta-data">{{ __('field_persons') }}</td>
                <td class="meta-data value width2">: {{ $row->persons }}</td>
                <td class="meta-data">{{ __('field_in_time') }}</td>
                <td class="meta-data value width2">: 
                    @if(isset($setting->time_format))
                    {{ date($setting->time_format, strtotime($row->in_time)) }}
                    @else
                    {{ date("h:i A", strtotime($row->in_time)) }}
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Header Section -->

    <!-- Header Section -->
    <br/>
    @if($print->barcode == 1)
    <br/>
    <table class="table-no-border">
        <tbody>
            <tr>
                <td style="width: 33.33%; text-align: center;"></td>
                <td style="width: 33.33%; text-align: center; font-family: 'IDAHC39M Code 39 Barcode', Times, serif;">
                    {!! DNS1D::getBarcodeSVG($row->token, 'C39', 1, 33, '#000', false) !!}
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
                  @isset($print->footer_left)
                  <div class="inner">
                    <p>{!! $print->footer_left !!}</p>
                  </div>
                  @endisset
                </td>
                <td class="temp-footer last">
                  @isset($print->footer_right)
                  <div class="inner">
                    <p>{!! $print->footer_right !!}</p>
                  </div>
                  @endisset
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