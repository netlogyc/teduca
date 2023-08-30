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
                        <div class="form-group col-md-12">
                            <label for="title" class="form-label">{{ __('field_title') }} <span>*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_title') }}
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="body" class="form-label">{{ __('field_body') }} <span>*</span></label>
                            <textarea class="form-control" name="body" id="body" rows="8" required>{{ old('body') }}</textarea>
                            <div class="alert alert-secondary" role="alert">
                                {{ __('field_shortcode') }}: 
                                [first_name] [last_name] [dob] [gender] [student_id] [batch] [program] [faculty] [father_name] [mother_name] [starting_year] [ending_year] [credits] [cgpa] [grade] [email] [phone]
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="footer_left" class="form-label">{{ __('field_footer_left') }}</label>
                            <textarea class="form-control" name="footer_left" id="footer_left">{{ old('footer_left') }}</textarea>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="footer_center" class="form-label">{{ __('field_footer_center') }}</label>
                            <textarea class="form-control" name="footer_center" id="footer_center">{{ old('footer_center') }}</textarea>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="footer_right" class="form-label">{{ __('field_footer_right') }}</label>
                            <textarea class="form-control" name="footer_right" id="footer_right">{{ old('footer_right') }}</textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="logo_left">{{ __('field_logo_left') }}: <span>{{ __('image_size', ['height' => 200, 'width' => 'Any']) }}</span></label>
                            <input type="file" class="form-control" name="logo_left" id="logo_left" value="{{ old('logo_left') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_logo_left') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="background">{{ __('field_border_background') }}: <span>{{ __('image_size', ['height' => 'Any', 'width' =>800]) }}</span></label>
                            <input type="file" class="form-control" name="background" id="background" value="{{ old('background') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_border_background') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="width" class="form-label">{{ __('field_width') }} <span>*</span></label>
                            <input type="text" class="form-control" name="width" id="width" value="800px" placeholder="800px" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_width') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="height" class="form-label">{{ __('field_height') }} <span>*</span></label>
                            <input type="text" class="form-control" name="height" id="height" value="auto" placeholder="auto" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_height') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6 mt-4">
                            <div class="switch d-inline m-r-10">
                                <input type="checkbox" id="student_photo" name="student_photo" value="1" checked>
                                <label for="student_photo" class="cr"></label>
                            </div>
                            <label>{{ __('field_student_photo') }}</label>
                        </div>

                        <div class="form-group col-md-6 mt-4">
                            <div class="switch d-inline m-r-10">
                                <input type="checkbox" id="barcode" name="barcode" value="1" checked>
                                <label for="barcode" class="cr"></label>
                            </div>
                            <label>{{ __('field_barcode') }}</label>
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