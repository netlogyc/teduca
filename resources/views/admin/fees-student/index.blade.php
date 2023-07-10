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

                                @include('common.inc.fees_search_filter')

                                <div class="form-group col-md-3">
                                    <label for="category">{{ __('field_fees_type') }} <span>*</span></label>
                                    <select class="form-control" name="category" id="category">
                                        <option value="">{{ __('all') }}</option>
                                        @foreach( $categories as $category )
                                        <option value="{{ $category->id }}" @if( $selected_category == $category->id) selected @endif>{{ $category->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_fees_type') }}
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="student_id">{{ __('field_student_id') }}</label>
                                    <input type="text" class="form-control" name="student_id" id="student_id" value="{{ $selected_student_id }}">

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_student_id') }}
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-info btn-filter"><i class="fas fa-search"></i> {{ __('btn_search') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    @if(isset($rows))
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="export-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('field_student_id') }}</th>
                                        <th>{{ __('field_fees_type') }}</th>
                                        <th>{{ __('field_fee') }}</th>
                                        <th>{{ __('field_discount') }}</th>
                                        <th>{{ __('field_fine_amount') }}</th>
                                        <th>{{ __('field_net_amount') }}</th>
                                        <th>{{ __('field_due_date') }}</th>
                                        <th>{{ __('field_status') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            @isset($row->studentEnroll->student->student_id)
                                            <a href="{{ route('admin.student.show', $row->studentEnroll->student->id) }}">
                                            #{{ $row->studentEnroll->student->student_id ?? '' }}
                                            </a>
                                            @endisset
                                        </td>
                                        <td>{{ $row->category->title ?? '' }}</td>
                                        <td>
                                            @if(isset($setting->decimal_place))
                                            {{ number_format((float)$row->fee_amount, $setting->decimal_place, '.', '') }} 
                                            @else
                                            {{ number_format((float)$row->fee_amount, 2, '.', '') }} 
                                            @endif 
                                            {!! $setting->currency_symbol !!}
                                        </td>
                                        <td>
                                            @php 
                                            $discount_amount = 0;
                                            $today = date('Y-m-d');
                                            @endphp

                                            @isset($row->category)
                                            @foreach($row->category->discounts->where('status', '1') as $discount)

                                            @php
                                            $availability = \App\Models\FeesDiscount::availability($discount->id, $row->studentEnroll->student_id);
                                            @endphp

                                            @if(isset($availability))
                                            @if($discount->start_date <= $today && $discount->end_date >= $today)
                                                @if($discount->type == '1')
                                                    @php
                                                    $discount_amount = $discount_amount + $discount->amount;
                                                    @endphp
                                                @else
                                                    @php
                                                    $discount_amount = $discount_amount + ( ($row->fee_amount / 100) * $discount->amount);
                                                    @endphp
                                                @endif
                                            @endif
                                            @endif
                                            @endforeach
                                            @endisset


                                            @if(isset($setting->decimal_place))
                                            {{ number_format((float)$discount_amount, $setting->decimal_place, '.', '') }} 
                                            @else
                                            {{ number_format((float)$discount_amount, 2, '.', '') }} 
                                            @endif 
                                            {!! $setting->currency_symbol !!}
                                        </td>
                                        <td>
                                            @php
                                                $fine_amount = 0;
                                            @endphp
                                            @if(empty($row->pay_date) || $row->due_date < $row->pay_date)
                                                
                                                @php
                                                $due_date = strtotime($row->due_date);
                                                $today = strtotime(date('Y-m-d')); 
                                                $days = (int)(($today - $due_date)/86400);
                                                @endphp

                                                @if($row->due_date < date("Y-m-d"))

                                                @isset($row->category)
                                                @foreach($row->category->fines->where('status', '1') as $fine)
                                                @if($fine->start_day <= $days && $fine->end_day >= $days)
                                                    @if($fine->type == '1')
                                                        @php
                                                        $fine_amount = $fine_amount + $fine->amount;
                                                        @endphp
                                                    @else
                                                        @php
                                                        $fine_amount = $fine_amount + ( ($row->fee_amount / 100) * $fine->amount);
                                                        @endphp
                                                    @endif
                                                @endif
                                                @endforeach
                                                @endisset
                                                @endif
                                            @endif


                                            @if(isset($setting->decimal_place))
                                            {{ number_format((float)$fine_amount, $setting->decimal_place, '.', '') }} 
                                            @else
                                            {{ number_format((float)$fine_amount, 2, '.', '') }} 
                                            @endif 
                                            {!! $setting->currency_symbol !!}
                                        </td>
                                        <td>
                                            @php
                                            $net_amount = ($row->fee_amount - $discount_amount) + $fine_amount;
                                            @endphp

                                            @if(isset($setting->decimal_place))
                                            {{ number_format((float)$net_amount, $setting->decimal_place, '.', '') }} 
                                            @else
                                            {{ number_format((float)$net_amount, 2, '.', '') }} 
                                            @endif 
                                            {!! $setting->currency_symbol !!}
                                        </td>
                                        <td>
                                            @if(isset($setting->date_format))
                                            {{ date($setting->date_format, strtotime($row->due_date)) }}
                                            @else
                                            {{ date("Y-m-d", strtotime($row->due_date)) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->status == 1)
                                            <span class="badge badge-pill badge-success">{{ __('status_paid') }}</span>
                                            @elseif($row->status == 2)
                                            <span class="badge badge-pill badge-danger">{{ __('status_canceled') }}</span>
                                            @else
                                            <span class="badge badge-pill badge-primary">{{ __('status_pending') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->status == 0)
                                            <button type="button" class="btn btn-icon btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#payModal-{{ $row->id }}">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                            <!-- Include Pay modal -->
                                            @include($view.'.pay')

                                            @can($access.'-action')
                                            <button type="button" class="btn btn-icon btn-danger btn-sm" title="{{ __('status_canceled') }}" data-bs-toggle="modal" data-bs-target="#cancelModal-{{ $row->id }}">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <!-- Include Unpay modal -->
                                            @include($view.'.cancel')
                                            @endcan

                                            @elseif($row->status == 1)
                                            @can($access.'-print')
                                            @if(isset($print))
                                            <a href="{{ route($route.'.print', ['id' => $row->id]) }}" target="_blank" class="btn btn-icon btn-dark btn-sm">
                                                <i class="fas fa-print"></i>
                                            </a>
                                            @endif
                                            @endcan
                                            
                                            @can($access.'-action')
                                            <button type="button" class="btn btn-icon btn-danger btn-sm" title="{{ __('status_unpaid') }}" data-bs-toggle="modal" data-bs-target="#unpayModal-{{ $row->id }}">
                                                <i class="fas fa-undo"></i>
                                            </button>
                                            <!-- Include Unpay modal -->
                                            @include($view.'.unpay')
                                            @endcan
                                            @endif
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                    @endif

                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection

@section('page_js')
@isset($print)
@if (\Session::has('receipt'))
<script type="text/javascript">
    PopupWin('{{ route($route.'.print', ['id' => \Session::get('receipt')]) }}', '{{ $title }}', 1000, 600);
</script>
@endif
@endisset
@endsection