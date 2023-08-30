<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,maximum-scale=1.0">
    <title>{{ $title }}</title>
    
    <style type="text/css" media="print">
    @media print {
      @page { size: A4 landscape; margin: 10px; }  
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
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/prints/book_token.css') }}" media="screen, print">

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
    </style>
    @endif
</head>
<body>

@foreach($rows as $row)
<div class="template-container printable">
  <div class="template-inner">
    <!-- Header Section -->
    <table class="table-no-border">
        <tbody>
            <tr>
                <td class="temp-title">
                  <h2>{{ $row->title }}</h2>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Header Section -->

    <!-- Header Section -->
    <table class="table-no-border top-meta-table">
        <tbody>
            <tr>
                <td class="meta-data">{{ __('field_rack') }}</td>
                <td class="meta-data value">: {{ $row->section }}</td>
                <td class="meta-data">{{ __('field_column') }}</td>
                <td class="meta-data value">: {{ $row->column }}</td>
                <td class="meta-data">{{ __('field_row') }}</td>
                <td class="meta-data value">: {{ $row->row }}</td>
            </tr>
        </tbody>
    </table>
    <!-- Header Section -->

    <br/>
    @php
        $barcode = $row->isbn;
    @endphp
    @if(strlen($barcode) <= 20)
    <table class="table-no-border">
        <tbody>
            <tr>
                <td style="width: 10%; text-align: center;"></td>
                <td style="width: 80%; text-align: center; font-family: 'IDAHC39M Code 39 Barcode', Times, serif;">
                    {!! DNS1D::getBarcodeSVG($barcode, 'C39', 1, 50, '#000', false) !!}
                    <div>
                        {{ $barcode }}
                    </div>
                </td>
                <td style="width: 10%; text-align: center;"></td>
            </tr>
        </tbody>
    </table>
    @else
    {{ __('Barcode value too large to print!') }}
    @endif
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