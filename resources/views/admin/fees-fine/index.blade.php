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
                                <label for="start_day" class="form-label">{{ __('field_from') }} {{ __('field_day') }} <span>* ({{ __('field_after_due_date') }})</span></label>
                                <input type="text" class="form-control" name="start_day" id="start_day" value="{{ old('start_day') }}" required data-v-max="999999999" data-v-min="0">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_from') }} {{ __('field_day') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="end_day" class="form-label">{{ __('field_to') }} {{ __('field_day') }} <span>* ({{ __('field_after_due_date') }})</span></label>
                                <input type="text" class="form-control" name="end_day" id="end_day" value="{{ old('end_day') }}" required data-v-max="999999999" data-v-min="0">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_to') }} {{ __('field_day') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="amount" class="form-label">{{ __('field_amount') }} ({!! $setting->currency_symbol !!} / %) <span>*</span></label>
                                <input type="text" class="form-control autonumber" name="amount" id="amount" value="{{ old('amount') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_amount') }}
                                </div>
                            </div>

                            <div class="form-group d-inline">
                                <div class="radio d-inline">
                                    <input type="radio" name="type" id="type_fixed" value="1" @if( old('type') == null ) checked @elseif( old('type') == 1 )  checked @endif>
                                    <label for="type_fixed" class="cr">{{ __('amount_type_fixed') }}</label>
                                </div>
                            </div>
                            <div class="form-group d-inline">
                                <div class="radio d-inline">
                                    <input type="radio" name="type" id="type_percentage" value="2" @if( old('type') == 2 ) checked @endif>
                                    <label for="type_percentage" class="cr">{{ __('amount_type_percentage') }}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <br/>
                                <label for="categories" class="form-label">{{ __('field_fees_type') }} <span>* ({{ __('select_multiple') }})</span></label>
                                <select class="form-control select2" name="categories[]" id="categories" multiple required>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_fees_type') }}
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
                                        <th>#</th>
                                        <th>{{ __('field_from') }} {{ __('field_day') }}</th>
                                        <th>{{ __('field_to') }} {{ __('field_day') }}</th>
                                        <th>{{ __('field_amount') }}</th>
                                        <th>{{ __('field_fees_type') }}</th>
                                        <th>{{ __('field_status') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ __('field_day') }} {{ $row->start_day }}</td>
                                        <td>{{ __('field_day') }} {{ $row->end_day }}</td>
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
                                            @if( $row->status == 1 )
                                            <span class="badge badge-pill badge-success">{{ __('status_active') }}</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">{{ __('status_inactive') }}</span>
                                            @endif
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