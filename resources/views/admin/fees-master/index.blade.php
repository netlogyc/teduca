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
                        <a href="{{ route($route.'.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('field_assign') }}</a>
                        @endcan

                        <a href="{{ route($route.'.index') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    <div class="card-block">
                        <form class="needs-validation" novalidate method="get" action="{{ route($route.'.index') }}">
                            <div class="row gx-2">
                                @include('common.inc.fees_search_filter')

                                <div class="form-group col-md-3">
                                    <label for="category">{{ __('field_fees_type') }}</label>
                                    <select class="form-control" name="category" id="category" required>
                                        <option value="0">{{ __('all') }}</option>
                                        @foreach( $categories as $category )
                                        <option value="{{ $category->id }}" @if( $selected_category == $category->id) selected @endif>{{ $category->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_fees_type') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-info btn-filter"><i class="fas fa-search"></i> {{ __('btn_filter') }}</button>
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
                            <table id="basic-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('field_fees_type') }}</th>
                                        <th>{{ __('field_amount') }}</th>
                                        <th>{{ __('field_assign') }} {{ __('field_date') }}</th>
                                        <th>{{ __('field_due_date') }}</th>
                                        <th>{{ __('field_student') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->category->title ?? '' }}</td>
                                        <td>
                                            @if(isset($setting->decimal_place))
                                            {{ number_format((float)$row->amount, $setting->decimal_place, '.', '') }} 
                                            @else
                                            {{ number_format((float)$row->amount, 2, '.', '') }} 
                                            @endif 
                                            {!! $setting->currency_symbol !!}

                                            @if($row->type == 1)
                                            <span class="badge badge-pill badge-primary">{{ __('amount_type_fixed') }}</span>
                                            @elseif($row->type == 2)
                                            <span class="badge badge-pill badge-dark">{{ __('amount_type_per_credit') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($setting->date_format))
                                            {{ date($setting->date_format, strtotime($row->assign_date)) }}
                                            @else
                                            {{ date("Y-m-d", strtotime($row->assign_date)) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($setting->date_format))
                                            {{ date($setting->date_format, strtotime($row->due_date)) }}
                                            @else
                                            {{ date("Y-m-d", strtotime($row->due_date)) }}
                                            @endif
                                        </td>
                                        <td>{{ $row->studentEnrolls->count() }}</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#showModal-{{ $row->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <!-- Include Show modal -->
                                            @include($view.'.show')
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