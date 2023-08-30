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
                        <div class="card-block">
                          <div class="row">
                            <!-- Form Start -->
                            <input name="id" type="hidden" value="{{ (isset($row->id))?$row->id:-1 }}">
                            <input name="slug" type="hidden" value="pay-slip">

                            <div class="form-group col-md-12">
                                <label for="title" class="form-label">{{ __('field_title') }} <span>*</span></label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ isset($row->title)?$row->title:'' }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_title') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="footer_left" class="form-label">{{ __('field_footer_left') }}</label>
                                <textarea class="form-control" name="footer_left" id="footer_left">{{ isset($row->footer_left)?$row->footer_left:'' }}</textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="footer_right" class="form-label">{{ __('field_footer_right') }}</label>
                                <textarea class="form-control" name="footer_right" id="footer_right">{{ isset($row->footer_right)?$row->footer_right:'' }}</textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="logo_right">{{ __('field_logo_right') }}: <span>{{ __('image_size', ['height' => 200, 'width' => 'Any']) }}</span></label>

                                @if(isset($row->logo_right) && is_file('uploads/'.$path.'/'.$row->logo_right))
                                <img src="{{ asset('uploads/'.$path.'/'.$row->logo_right) }}" class="img-fluid" style="max-width: 80px; max-height: 80px;">
                                @endif
                                
                                <input type="file" class="form-control" name="logo_right" id="logo_right" value="{{ old('logo_right') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_logo_right') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="width" class="form-label">{{ __('field_width') }} <span>*</span></label>
                                <input type="text" class="form-control" name="width" id="width" value="{{ isset($row->width)?$row->width:'600px' }}" placeholder="600px" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_width') }}
                                </div>
                            </div>
                            <!-- Form End -->
                          </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_update') }}</button>
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