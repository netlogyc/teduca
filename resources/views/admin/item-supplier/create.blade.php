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
                        <div class="form-group col-md-4">
                            <label for="title" class="form-label">{{ __('field_supplier') }} <span>*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_supplier') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="phone">{{ __('field_phone') }}</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_phone') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="email">{{ __('field_email') }}</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_email') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="address">{{ __('field_address') }}</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_address') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="contact_person" class="form-label">{{ __('field_contact_person') }} <span>*</span></label>
                            <input type="text" class="form-control" name="contact_person" id="contact_person" value="{{ old('contact_person') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_contact_person') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="designation" class="form-label">{{ __('field_designation') }}</label>
                            <input type="text" class="form-control" name="designation" id="designation" value="{{ old('designation') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_designation') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="contact_person_phone">{{ __('field_contact_person') }} {{ __('field_phone') }}</label>
                            <input type="text" class="form-control" name="contact_person_phone" id="contact_person_phone" value="{{ old('contact_person_phone') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_contact_person') }} {{ __('field_phone') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="contact_person_email">{{ __('field_contact_person') }} {{ __('field_email') }}</label>
                            <input type="email" class="form-control" name="contact_person_email" id="contact_person_email" value="{{ old('contact_person_email') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_contact_person') }} {{ __('field_email') }}
                            </div>
                        </div>

                        <div class="form-group col-md-8">
                            <label for="description" class="form-label">{{ __('field_description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>

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