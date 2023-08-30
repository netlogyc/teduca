@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }}</h5>
                    </div>
                    <div class="card-block row">
                        
                        <!-- Form Start -->
                        <input name="id" type="hidden" value="{{ (isset($row)) ? $row->id : '' }}">
                        <input name="slug" type="hidden" value="student-card">

                        <div class="form-group col-md-6">
                            <label for="title">{{ __('field_title') }} <span>*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ isset($row->title)?$row->title:'' }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_title') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="subtitle">{{ __('field_subtitle') }} <span>*</span></label>
                            <input type="text" class="form-control" name="subtitle" id="subtitle" value="{{ isset($row->subtitle)?$row->subtitle:'' }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_subtitle') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="validity">{{ __('field_validity') }} <span>*</span></label>
                            <input type="text" class="form-control autonumber" name="validity" id="validity" value="{{ isset($row->validity)?$row->validity:'' }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_validity') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="address">{{ __('field_address') }} <span>*</span></label>
                            <input type="text" class="form-control" name="address" id="address" value="{{ isset($row->address)?$row->address:'' }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_address') }}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">@isset($row) <i class="fas fa-check"></i> {{ __('btn_update') }} @else <i class="fas fa-check"></i> {{ __('btn_save') }} @endif</button>
                    </div>

                </div>
                </form>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection