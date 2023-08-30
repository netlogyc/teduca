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
                        <h5>{{ __('modal_add') }} {{ $title }}</h5>
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
                        <div class="form-group col-md-8">
                            <label for="title">{{ __('field_title') }} <span>*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_title') }}
                            </div>
                        </div>

                        @include('common.inc.assignment_search_filter')

                        <div class="form-group col-md-4">
                            <label for="total_marks" class="form-label">{{ __('field_total_marks') }} <span>*</span></label>
                            <input type="text" class="form-control autonumber" name="total_marks" id="total_marks" value="{{ old('total_marks') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_total_marks') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="start_date">{{ __('field_submission') }} {{ __('field_start_date') }} <span>*</span></label>
                            <input type="date" class="form-control" name="start_date" id="start_date" value="{{ date('Y-m-d') }}" readonly required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_start_date') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="end_date">{{ __('field_submission') }} {{ __('field_end_date') }} <span>*</span></label>
                            <input type="date" class="form-control date" name="end_date" id="end_date" value="{{ date('Y-m-d') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_end_date') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="attach">{{ __('field_attach') }}</label>
                            <input type="file" class="form-control" name="attach" id="attach" value="{{ old('attach') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_attach') }}
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">{{ __('field_description') }}</label>
                            <textarea class="form-control texteditor" name="description" id="description">{{ old('description') }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_description') }}
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