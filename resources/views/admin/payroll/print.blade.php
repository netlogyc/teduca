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
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/prints/pay_slip.css') }}" media="screen, print">

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
    .table-no-border.receipt thead th:nth-child(1), 
    .table-no-border.receipt tbody td:nth-child(1), 
    .table-no-border.receipt .tfoot th:nth-child(1) {
      text-align: right;
    }
    .template-container .table-no-border tr td.temp-logo {
      float: none;
    }
    .table-no-border.receipt .exam-title {
      text-align: right !important;
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
                <td class="meta-data">{{ __('field_staff_id') }}</td>
                <td class="meta-data value width2">: {{ $row->user->staff_id ?? '' }}</td>
                <td class="meta-data">{{ __('field_contract_type') }}</td>
                <td class="meta-data value">: 
                    @if( $row->user->contract_type == 1 )
                    {{ __('contract_type_full_time') }}
                    @elseif( $row->user->contract_type == 2 )
                    {{ __('contract_type_part_time') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="meta-data">{{ __('field_name') }}</td>
                <td class="meta-data value width2">: {{ $row->user->first_name ?? '' }} {{ $row->user->last_name ?? '' }}</td>
                <td class="meta-data">{{ __('field_salary_type') }}</td>
                <td class="meta-data value">: 
                    @if( $row->salary_type == 1 )
                    {{ __('salary_type_fixed') }}
                    @elseif( $row->salary_type == 2 )
                    {{ __('salary_type_hourly') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="meta-data">{{ __('field_department') }}</td>
                <td class="meta-data value width2">: {{ $row->user->department->title ?? '' }}</td>
                <td class="meta-data">{{ __('field_pay_date') }}</td>
                <td class="meta-data value">: 
                    @if($row->status == 1)
                    @if(isset($setting->date_format))
                    {{ date($setting->date_format, strtotime($row->pay_date)) }}
                    @else
                    {{ date("Y-m-d", strtotime($row->pay_date)) }}
                    @endif
                    @endif
                </td>
            </tr>
            <tr>
                <td class="meta-data">{{ __('field_designation') }}</td>
                <td class="meta-data value width2">: {{ $row->user->designation->title ?? '' }}</td>
                <td class="meta-data">{{ __('field_payment_method') }}</td>
                <td class="meta-data value">: 
                    @if( $row->payment_method == 1 )
                    {{ __('payment_method_card') }}
                    @elseif( $row->payment_method == 2 )
                    {{ __('payment_method_cash') }}
                    @elseif( $row->payment_method == 3 )
                    {{ __('payment_method_cheque') }}
                    @elseif( $row->payment_method == 4 )
                    {{ __('payment_method_bank') }}
                    @elseif( $row->payment_method == 5 )
                    {{ __('payment_method_e_wallet') }}
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Header Section -->

    <!-- Header Section -->
    <table class="table-no-border receipt">
        <thead>
            <tr>
                <th class="width2">{{ __('field_type') }}</th>
                <th>{{ __('field_amount') }}</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td colspan="2" class="exam-title">
                    {{ date("F Y", strtotime($row->salary_month)) }}
                </td>
            </tr>
            <tr class="border-bottom">
                <td>{{ __('field_total_earning') }}</td>
                <td>{{ round($row->total_earning, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</td>
            </tr>
            @foreach($row->details->where('status', 1) as $detail)
            <tr class="border-bottom">
                <td>{{ $detail->title }}</td>
                <td>+ {{ round($detail->amount, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</td>
            </tr>
            @endforeach
            @foreach($row->details->where('status', 0) as $detail)
            <tr class="border-bottom">
                <td>{{ $detail->title }}</td>
                <td>- {{ round($detail->amount, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</td>
            </tr>
            @endforeach
            <tr class="border-bottom">
                <td>{{ __('field_gross_salary') }}</td>
                <td>~ {{ round($row->gross_salary, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</td>
            </tr>
            <tr class="border-bottom">
                <td>{{ __('field_tax') }}</td>
                <td>- {{ round($row->tax, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</td>
            </tr>
            <tr class="tfoot">
                <th>{{ __('field_net_salary') }}:</th>
                <th>= {{ round($row->net_salary, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</th>
            </tr>
        </tbody>
    </table>
    <!-- Header Section -->

    <!-- Header Section -->
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