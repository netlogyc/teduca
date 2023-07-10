@extends('student.layouts.master')
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
                        <div class="form-group col-md-4">
                            <label for="apply_date">{{ __('field_apply_date') }} <span>*</span></label>
                            <input type="date" class="form-control" name="apply_date" id="apply_date" value="{{ date('Y-m-d') }}" readonly required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_apply_date') }}
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

                        <div class="form-group col-md-12">
                            <label for="subject">{{ __('field_leave_subject') }} <span>*</span></label>
                            <input type="text" class="form-control" name="subject" id="subject" value="{{ old('subject') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_leave_subject') }}
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