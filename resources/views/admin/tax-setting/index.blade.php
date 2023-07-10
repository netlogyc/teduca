@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            @can($access.'-create')
            <div class="col-md-4">
                <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('btn_create') }} {{ $title }}</h5>
                        </div>
                        <div class="card-block">
                            <!-- Form Start -->
                            <div class="form-group">
                                <label for="min_amount" class="form-label">{{ __('field_min_amount') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                                <input type="text" class="form-control" name="min_amount" id="min_amount" value="{{ old('min_amount') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_min_amount') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="max_amount" class="form-label">{{ __('field_max_amount') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                                <input type="text" class="form-control" name="max_amount" id="max_amount" value="{{ old('max_amount') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_max_amount') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="percentange" class="form-label">{{ __('field_percentage') }} (%) <span>*</span></label>
                                <input type="text" class="form-control" name="percentange" id="percentange" value="{{ old('percentange') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_percentage') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="max_no_taxable_amount" class="form-label">{{ __('field_max_no_taxable_amount') }} ({!! $setting->currency_symbol !!})</label>
                                <input type="text" class="form-control" name="max_no_taxable_amount" id="max_no_taxable_amount" value="{{ old('max_no_taxable_amount') }}">

                                <div class="invalid-feedback">
                                {{ __('field_max_no_taxable_amount') }}
                                </div>
                            </div>
                            <!-- Form End -->
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            @endcan
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }} {{ __('list') }}</h5>
                    </div>
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="basic-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('field_min_amount') }}</th>
                                        <th>{{ __('field_max_amount') }}</th>
                                        <th>{{ __('field_percentage') }}</th>
                                        <th>{{ __('field_max_no_taxable_amount') }}</th>
                                        <th>{{ __('field_status') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>
                                          @if(isset($setting->decimal_place))
                                          {{ number_format((float)$row->min_amount, $setting->decimal_place, '.', '') }} 
                                          @else
                                          {{ number_format((float)$row->min_amount, 2, '.', '') }} 
                                          @endif
                                          {!! $setting->currency_symbol !!}
                                        </td>
                                        <td>
                                          @if(isset($setting->decimal_place))
                                          {{ number_format((float)$row->max_amount, $setting->decimal_place, '.', '') }} 
                                          @else
                                          {{ number_format((float)$row->max_amount, 2, '.', '') }} 
                                          @endif
                                          {!! $setting->currency_symbol !!}
                                        </td>
                                        <td>
                                          @if(isset($setting->decimal_place))
                                          {{ number_format((float)$row->percentange, $setting->decimal_place, '.', '') }} 
                                          @else
                                          {{ number_format((float)$row->percentange, 2, '.', '') }} 
                                          @endif
                                          %
                                        </td>
                                        <td>
                                            @isset($row->max_no_taxable_amount)
                                            @if(isset($setting->decimal_place))
                                                {{ number_format((float)$row->max_no_taxable_amount, $setting->decimal_place, '.', '') }} 
                                                @else
                                                {{ number_format((float)$row->max_no_taxable_amount, 2, '.', '') }} 
                                                @endif
                                                {!! $setting->currency_symbol !!}
                                            @endisset
                                        </td>
                                        <td>
                                            @if( $row->status == 1 )
                                            <span class="badge badge-pill badge-success">{{ __('status_active') }}</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">{{ __('status_inactive') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can($access.'-edit')
                                            <button type="button" class="btn btn-icon btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{ $row->id }}">
                                                <i class="far fa-edit"></i>
                                            </button>
                                            <!-- Include Edit modal -->
                                            @include($view.'.edit')
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