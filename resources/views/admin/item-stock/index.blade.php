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
                        <h5>{{ $title }} {{ __('list') }}</h5>
                    </div>
                    <div class="card-block">
                        @can($access.'-create')
                        <a href="{{ route($route.'.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('btn_add_new') }}</a>
                        @endcan

                        <a href="{{ route($route.'.index') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    <div class="card-block">
                        <form class="needs-validation" novalidate method="get" action="{{ route($route.'.index') }}">
                            <div class="row gx-2">
                                <div class="form-group col-md-2">
                                    <label for="item">{{ __('field_item') }}</label>
                                    <select class="form-control" name="item" id="item">
                                        <option value="">{{ __('all') }}</option>
                                        @foreach( $items as $item )
                                        <option value="{{ $item->id }}" @if($selected_item == $item->id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_item') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="supplier">{{ __('field_supplier') }}</label>
                                    <select class="form-control" name="supplier" id="supplier">
                                        <option value="">{{ __('all') }}</option>
                                        @foreach( $suppliers as $supplier )
                                        <option value="{{ $supplier->id }}" @if($selected_supplier == $supplier->id) selected @endif>{{ $supplier->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_supplier') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="store">{{ __('field_store') }}</label>
                                    <select class="form-control" name="store" id="store">
                                        <option value="">{{ __('all') }}</option>
                                        @foreach( $stores as $store )
                                        <option value="{{ $store->id }}" @if($selected_store == $store->id) selected @endif>{{ $store->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_store') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="start_date">{{ __('field_from_date') }}</label>
                                    <input type="date" class="form-control date" name="start_date" id="start_date" value="{{ $selected_start_date }}" required>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_from_date') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="end_date">{{ __('field_to_date') }}</label>
                                    <input type="date" class="form-control date" name="end_date" id="end_date" value="{{ $selected_end_date }}" required>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_to_date') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-info btn-filter"><i class="fas fa-search"></i> {{ __('btn_search') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="export-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('field_item') }}</th>
                                        <th>{{ __('field_supplier') }}</th>
                                        <th>{{ __('field_store') }}</th>
                                        <th>{{ __('field_quantity') }}</th>
                                        <th>{{ __('field_price') }}</th>
                                        <th>{{ __('field_date') }}</th>
                                        <th>{{ __('field_payment_method') }}</th>
                                        <th>{{ __('field_status') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->item->name ?? '' }}</td>
                                        <td>{{ $row->supplier->title ?? '' }}</td>
                                        <td>{{ $row->store->title ?? '' }}</td>
                                        <td>{{ $row->quantity }}</td>
                                        <td>{{ round($row->price, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</td>
                                        <td>
                                            @if(isset($setting->date_format))
                                            {{ date($setting->date_format, strtotime($row->date)) }}
                                            @else
                                            {{ date("Y-m-d", strtotime($row->date)) }}
                                            @endif
                                        </td>
                                        <td>
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
                                        <td>
                                            @if( $row->status == 1 )
                                            <span class="badge badge-pill badge-success">{{ __('status_received') }}</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">{{ __('status_returned') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#showModal-{{ $row->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <!-- Include Show modal -->
                                            @include($view.'.show')

                                            @if(is_file('uploads/'.$path.'/'.$row->attach))
                                            <a href="{{ asset('uploads/'.$path.'/'.$row->attach) }}" class="btn btn-icon btn-dark btn-sm" download><i class="fas fa-download"></i></a>
                                            @endif

                                            @can($access.'-edit')
                                            <a href="{{ route($route.'.edit', $row->id) }}" class="btn btn-icon btn-primary btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            @endcan

                                            @can($access.'-delete')
                                            <button type="button" class="btn btn-icon btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $row->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <!-- Include Delete modal -->
                                            @include('admin.layouts.inc.delete')
                                            @endcan
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection