<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width,maximum-scale=1.0">
	<title>{{ $title }}</title>

	<style type="text/css" media="print">
	@media print {
      @page { size: auto; margin: 10px; }  
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

	<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/prints/library_id_card.css') }}" media="screen, print">

  @php 
  $version = App\Models\Language::version(); 
  @endphp
  @if($version->direction == 1)
  <!-- RTL css -->
  <style type="text/css" media="screen, print">
    .template-container {
      direction: rtl;
    }
    .template-container .temp-title h2, 
    .template-container .temp-title h4, 
    .template-container .temp-footer .inner p {
      text-align: center;
    }
    .template-container .table-no-border tr td {
      float: right;
      text-align: right;
    }
    .template-container .table-no-border tr td.temp-logo {
      float: none;
    }
  </style>
  @endif
</head>
<body>

<div class="template-container printable">
  <div class="template-inner">
    <!-- Header Section -->
    <table class="table-no-border">
        <tbody>
        	<tr>
        		<td class="temp-title">
                  <div class="inner">
                    <h2>{{ $print->title }}</h2>

                    <h4>{{ $print->subtitle }}</h4>
                  </div>
                </td>
        	</tr>
            <tr>
                <td class="temp-logo">
                  <div class="inner">
                    @if(is_file('uploads/outsider/'.$row->memberable->photo))
                    <img src="{{ asset('uploads/outsider/'.$row->memberable->photo) }}" alt="Photo">
                    @else
                    <img src="{{ asset('dashboard/images/user.jpg') }}" alt="Photo">
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
            <tr class="meta-data">
                <td>{{ __('field_library_id') }}</td>
                <td class="value">: {{ $row->library_id }}</td>
            </tr>
            <tr class="meta-data">
                <td>{{ __('field_member') }} {{ __('field_type') }}</td>
                <td class="value">: {{ __('field_outsider') }}</td>
            </tr>
            <tr class="meta-data">
                <td>{{ __('field_name') }}</td>
                <td class="value">: {{ $row->memberable->first_name ?? '' }} {{ $row->memberable->last_name ?? '' }}</td>
            </tr>
            <tr class="meta-data">
                <td>{{ __('field_phone') }}</td>
                <td class="value">: {{ $row->memberable->phone ?? '' }}</td>
            </tr>
            <tr class="meta-data">
                <td>{{ __('field_validity') }}</td>
                <td class="value">: 
                	@if(isset($setting->date_format))
                        {{ date($setting->date_format, strtotime($row->date)) }}
                    @else
                        {{ date("Y-m-d", strtotime($row->date)) }}
                    @endif
                </td>
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
                    <p>{!! $print->address !!}</p>
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