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
                            <h5>{{ __('btn_update') }} {{ $title }}</h5>
                        </div>
                        <div class="card-block">
                          <div class="row">
                            <!-- Form Start -->
                            <input name="id" type="hidden" value="{{ (isset($row->id))?$row->id:-1 }}">

                            <div class="container">
                            <div class="row">
                            <div class="form-group col-md-12">
                                <label for="status" class="form-label">{{ __('field_sms_driver') }}</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="0" @if(isset($row->status)) @if($row->status == '0') selected @endif @endif>{{ __('select') }}</option>
                                    <option value="1" @if(isset($row->status)) @if($row->status == '1') selected @endif @endif>{{ __('Twilio') }}</option>
                                    <option value="2"@if(isset($row->status))  @if($row->status == '2') selected @endif @endif>{{ __('Nexmo') }}</option>
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_sms_driver') }}
                                </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="twilio_sid" class="form-label">{{ __('field_twilio_sid') }}</label>
                                <input type="text" class="form-control" name="twilio_sid" id="twilio_sid" value="{{ isset($row->twilio_sid)?$row->twilio_sid:'' }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_twilio_sid') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="twilio_auth_token" class="form-label">{{ __('field_twilio_auth_token') }}</label>
                                <input type="password" class="form-control" name="twilio_auth_token" id="twilio_auth_token" value="{{ isset($row->twilio_auth_token)?$row->twilio_auth_token:'' }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_twilio_auth_token') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="twilio_number" class="form-label">{{ __('field_twilio_number') }}</label>
                                <input type="text" class="form-control" name="twilio_number" id="twilio_number" value="{{ isset($row->twilio_number)?$row->twilio_number:'' }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_twilio_number') }}
                                </div>
                            </div>
                            </div>
                            
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="nexmo_key" class="form-label">{{ __('field_nexmo_key') }}</label>
                                <input type="text" class="form-control" name="nexmo_key" id="nexmo_key" value="{{ isset($row->nexmo_key)?$row->nexmo_key:'' }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_nexmo_key') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nexmo_secret" class="form-label">{{ __('field_nexmo_secret') }}</label>
                                <input type="password" class="form-control" name="nexmo_secret" id="nexmo_secret" value="{{ isset($row->nexmo_secret)?$row->nexmo_secret:'' }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_nexmo_secret') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nexmo_sender_name" class="form-label">{{ __('field_nexmo_sender_name') }}</label>
                                <input type="text" class="form-control" name="nexmo_sender_name" id="nexmo_sender_name" value="{{ isset($row->nexmo_sender_name)?$row->nexmo_sender_name:'' }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_nexmo_sender_name') }}
                                </div>
                            </div>
                            </div>
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