@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-8">
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
                            <input name="slug" type="hidden" value="fees-schedule">

                            <div class="form-group col-md-6">
                                <label for="day" class="form-label">{{ __('field_days_before') }} <span>*</span></label>
                                <input type="text" class="form-control autonumber" name="day" id="day" value="{{ isset($row->day)?$row->day:'' }}"  required data-v-max="999999999" data-v-min="0">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_days_before') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="time" class="form-label">{{ __('field_time') }} <span>*</span></label>
                                <input type="time" class="form-control time" name="time" id="time" value="{{ isset($row->time)?$row->time:'' }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_time') }}
                                </div>
                            </div>

                            <div class="form-group-inline col-md-6">
                                <div class="switch d-inline m-r-10">
                                    <input type="checkbox" id="switch" name="email" value="1"  @isset($row->email) {{ $row->email == 1 ? 'checked' : '' }} @endisset>
                                    <label for="switch" class="cr"></label>
                                </div>
                                <label>{{ __('field_email_notify') }}</label>
                            </div>

                            <div class="form-group-inline col-md-6">
                                <div class="switch d-inline m-r-10">
                                    <input type="checkbox" id="switch-1" name="sms" value="1"  @isset($row->sms) {{ $row->sms == 1 ? 'checked' : '' }} @endisset>
                                    <label for="switch-1" class="cr"></label>
                                </div>
                                <label>{{ __('field_sms_notify') }}</label>
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