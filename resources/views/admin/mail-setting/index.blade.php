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

                            <div class="form-group col-md-6">
                                <label for="driver" class="form-label">{{ __('field_mail_driver') }} <span>*</span></label>
                                <select class="form-control" name="driver" id="driver" required>
                                    <option value="smtp" @if(isset($row->driver)) @if($row->driver == 'smtp') selected @endif @endif>{{ __('SMTP') }}</option>
                                    <option value="sendmail"@if(isset($row->driver))  @if($row->driver == 'sendmail') selected @endif @endif>{{ __('SendMail') }}</option>
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_mail_driver') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="host" class="form-label">{{ __('field_mail_host') }} <span>*</span></label>
                                <input type="text" class="form-control" name="host" id="host" value="{{ isset($row->host)?$row->host:'' }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_mail_host') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="port" class="form-label">{{ __('field_mail_port') }} <span>*</span></label>
                                <input type="text" class="form-control" name="port" id="port" value="{{ isset($row->port)?$row->port:'' }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_mail_port') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username" class="form-label">{{ __('field_mail_username') }} <span>*</span></label>
                                <input type="text" class="form-control" name="username" id="username" value="{{ isset($row->username)?$row->username:'' }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_mail_username') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password" class="form-label">{{ __('field_mail_password') }} <span>*</span></label>
                                <input type="password" class="form-control" name="password" id="password" value="{{ isset($row->password)?$row->password:'' }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_mail_password') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="encryption" class="form-label">{{ __('field_mail_encryption') }} <span>*</span></label>

                                <select class="form-control" name="encryption" id="encryption" required>
                                    <option value="">{{ __('select') }}</option>
                                    <option value="ssl" @if(isset($row->encryption)) @if($row->encryption == 'ssl') selected @endif @endif>{{ __('SSL') }}</option>
                                    <option value="tls"@if(isset($row->encryption))  @if($row->encryption == 'tls') selected @endif @endif>{{ __('TLS') }}</option>
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_mail_encryption') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="sender_email" class="form-label">{{ __('field_mail_sender_email') }} <span>*</span></label>
                                <input type="email" class="form-control" name="sender_email" id="sender_email" value="{{ isset($row->sender_email)?$row->sender_email:'' }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_mail_sender_email') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="sender_name" class="form-label">{{ __('field_mail_sender_name') }} <span>*</span></label>
                                <input type="text" class="form-control" name="sender_name" id="sender_name" value="{{ isset($row->sender_name)?$row->sender_name:'' }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_mail_sender_name') }}
                                </div>
                            </div>

                            {{-- <div class="form-group col-md-6">
                                <label for="reply_email" class="form-label">{{ __('field_mail_reply_email') }} <span>*</span></label>
                                <input type="email" class="form-control" name="reply_email" id="reply_email" value="{{ isset($row->reply_email)?$row->reply_email:'' }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_mail_reply_email') }}
                                </div>
                            </div> --}}
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