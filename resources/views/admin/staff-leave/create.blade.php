@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Card ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }}</h5>
                    </div>
                    <div class="card-block">
                        <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                        <a href="{{ route($route.'.create') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-block">
                      <div class="row">
                        <!-- Form Start -->
                        <div class="form-group col-md-6">
                            <label for="apply_date">{{ __('field_apply_date') }} <span>*</span></label>
                            <input type="date" class="form-control" name="apply_date" id="apply_date" value="{{ date('Y-m-d') }}" readonly required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_apply_date') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="type">{{ __('field_leave_type') }} <span>*</span></label>
                            <select class="form-control" name="type" id="type" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach( $types as $type )
                                <option value="{{ $type->id }}" @if(old('type') == $type->id) selected @endif>{{ $type->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_leave_type') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="from_date">{{ __('field_start_date') }} <span>*</span></label>
                            <input type="date" class="form-control date" name="from_date" id="from_date" value="{{ old('from_date') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_start_date') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="to_date">{{ __('field_end_date') }} <span>*</span></label>
                            <input type="date" class="form-control date" name="to_date" id="to_date" value="{{ old('to_date') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_end_date') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="pay_type">{{ __('field_pay_type') }} <span>*</span></label>
                            <select class="form-control" name="pay_type" id="pay_type" required>
                                <option value="">{{ __('select') }}</option>
                                <option value="1" @if(old('pay_type') == 1) selected @endif>{{ __('field_paid_leave') }}</option>
                                <option value="2" @if(old('pay_type') == 2) selected @endif>{{ __('field_unpaid_leave') }}</option>
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_pay_type') }}
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="reason">{{ __('field_reason') }}</label>
                            <textarea class="form-control" name="reason" id="reason">{{ old('reason') }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_reason') }}
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="attach">{{ __('field_attach') }}</label>
                            <input type="file" class="form-control" name="attach" id="attach" value="{{ old('attach') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_attach') }}
                            </div>
                        </div>
                        <!-- Form End -->
                      </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_save') }}</button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- [ Card ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection