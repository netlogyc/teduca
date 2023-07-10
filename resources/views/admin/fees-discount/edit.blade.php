@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            @can($access.'-edit')
            <div class="col-md-4">
                <form class="needs-validation" novalidate action="{{ route($route.'.update', $row->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('btn_update') }} {{ $title }}</h5>
                        </div>
                        <div class="card-block">
                            <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                            <a href="{{ route($route.'.edit', $row->id) }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                        </div>
                        <div class="card-block">
                            <!-- Form Start -->
                            <div class="form-group">
                                <label for="title" class="form-label">{{ __('field_title') }} <span>*</span></label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $row->title }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_title') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="start_date" class="form-label">{{ __('field_start_date') }} <span>*</span></label>
                                <input type="date" class="form-control date" name="start_date" id="start_date" value="{{ $row->start_date }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_start_date') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="end_date" class="form-label">{{ __('field_end_date') }} <span>*</span></label>
                                <input type="date" class="form-control date" name="end_date" id="end_date" value="{{ $row->end_date }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_end_date') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="amount" class="form-label">{{ __('field_amount') }} ({!! $setting->currency_symbol !!} / %) <span>*</span></label>
                                <input type="text" class="form-control autonumber" name="amount" id="amount" value="{{ round($row->amount, 2) }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_amount') }}
                                </div>
                            </div>

                            <div class="form-group d-inline">
                                <div class="radio d-inline">
                                    <input type="radio" name="type" id="type_fixed-{{ $row->id }}" value="1" @if( $row->type == 1 ) checked @endif>
                                    <label for="type_fixed-{{ $row->id }}" class="cr">{{ __('amount_type_fixed') }}</label>
                                </div>
                            </div>
                            <div class="form-group d-inline">
                                <div class="radio d-inline">
                                    <input type="radio" name="type" id="type_percentage-{{ $row->id }}" value="2" @if( $row->type == 2 ) checked @endif>
                                    <label for="type_percentage-{{ $row->id }}" class="cr">{{ __('amount_type_percentage') }}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <br/>
                                <label for="categories" class="form-label">{{ __('field_fees_type') }} <span>* ({{ __('select_multiple') }})</span></label>
                                <select class="form-control select2" name="categories[]" id="categories" multiple required>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @foreach($row->feesCategories as $selected_category) {{ $selected_category->id == $category->id ? 'selected' : '' }} @endforeach>{{ $category->title }}</option>
                                    @endforeach
                                </select>

                                <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('field_fees_type') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <br/>
                                <label for="statuses" class="form-label">{{ __('field_student') }} {{ __('field_status') }} <span>* ({{ __('select_multiple') }})</span></label>
                                <select class="form-control select2" name="statuses[]" id="statuses" multiple required>
                                    @foreach($statusTypes as $statusType)
                                    <option value="{{ $statusType->id }}" @foreach($row->statusTypes as $selected_status) {{ $selected_status->id == $statusType->id ? 'selected' : '' }} @endforeach>{{ $statusType->title }}</option>
                                    @endforeach
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_student') }} {{ __('field_status') }}
                                </div>
                            </div>
                            <!-- Form End -->
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_update') }}</button>
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
                                        <th>#</th>
                                        <th>{{ __('field_title') }}</th>
                                        <th>{{ __('field_date') }}</th>
                                        <th>{{ __('field_amount') }}</th>
                                        <th>{{ __('field_fees_type') }}</th>
                                        <th>{{ __('field_student') }} {{ __('field_status') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>
                                            @if(isset($setting->date_format))
                                            {{ date($setting->date_format, strtotime($row->start_date)) }}
                                            @else
                                            {{ date("Y-m-d", strtotime($row->start_date)) }}
                                            @endif
                                            <br>
                                            @if(isset($setting->date_format))
                                            {{ date($setting->date_format, strtotime($row->end_date)) }}
                                            @else
                                            {{ date("Y-m-d", strtotime($row->end_date)) }}
                                            @endif
                                        </td>
                                        <td>
                                          @if(isset($setting->decimal_place))
                                          {{ number_format((float)$row->amount, $setting->decimal_place, '.', '') }} 
                                          @else
                                          {{ number_format((float)$row->amount, 2, '.', '') }} 
                                          @endif
                                          @if($row->type == 1)
                                          {!! $setting->currency_symbol !!}
                                          @elseif($row->type == 2)
                                          %
                                          @endif
                                        </td>
                                        <td>
                                            @foreach($row->feesCategories as $key => $category)
                                            <span class="badge badge-primary">{{ $category->title }}</span><br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($row->statusTypes as $key => $statusType)
                                            <span class="badge badge-primary">{{ $statusType->title }}</span><br>
                                            @endforeach
                                        </td>
                                        <td>
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