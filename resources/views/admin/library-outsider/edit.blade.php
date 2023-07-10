@extends('admin.layouts.master')
@section('title', $title)

@section('page_css')
<script src="{{ asset('dashboard/plugins/jquery/js/jquery.min.js') }}"></script>
@endsection

@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">

            <!-- [ Card ] start -->
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                    <h5>{{ $title }}</h5>
                </div>
                <div class="card-block">
                    <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                    <a href="{{ route($route.'.edit', $row->id) }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                </div>
                
                <div class="card-block">
                    <form class="needs-validation" novalidate action="{{ route($route.'.update', [$row->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                        <content class="form-step">
                            <!-- Form Start -->
                            <fieldset class="row scheduler-border">
                            <div class="form-group col-md-6">
                                <label for="first_name">{{ __('field_first_name') }} <span>*</span></label>
                                <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $row->first_name }}" required>

                                <div class="invalid-feedback">
                                {{ __('required_field') }} {{ __('field_first_name') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="last_name">{{ __('field_last_name') }} <span>*</span></label>
                                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $row->last_name }}" required>

                                <div class="invalid-feedback">
                                {{ __('required_field') }} {{ __('field_last_name') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="father_name">{{ __('field_father_name') }}</label>
                                <input type="text" class="form-control" name="father_name" id="father_name" value="{{ $row->father_name }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_father_name') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="father_occupation">{{ __('field_father_occupation') }}</label>
                                <input type="text" class="form-control" name="father_occupation" id="father_occupation" value="{{ $row->father_occupation }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_father_occupation') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="mother_name">{{ __('field_mother_name') }}</label>
                                <input type="text" class="form-control" name="mother_name" id="mother_name" value="{{ $row->mother_name }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_mother_name') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="mother_occupation">{{ __('field_mother_occupation') }}</label>
                                <input type="text" class="form-control" name="mother_occupation" id="mother_occupation" value="{{ $row->mother_occupation }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_mother_occupation') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="occupation">{{ __('field_occupation') }}</label>
                                <input type="text" class="form-control" name="occupation" id="occupation" value="{{ $row->occupation }}">

                                <div class="invalid-feedback">
                                {{ __('required_field') }} {{ __('field_occupation') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="religion">{{ __('field_religion') }}</label>
                                <input type="text" class="form-control" name="religion" id="religion" value="{{ $row->religion }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_religion') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="gender">{{ __('field_gender') }} <span>*</span></label>
                                <select class="form-control" name="gender" id="gender" required>
                                    <option value="">{{ __('select') }}</option>
                                    <option value="1" @if( $row->gender == 1 ) selected @endif>{{ __('gender_male') }}</option>
                                    <option value="2" @if( $row->gender == 2 ) selected @endif>{{ __('gender_female') }}</option>
                                    <option value="3" @if( $row->gender == 3 ) selected @endif>{{ __('gender_other') }}</option>
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_gender') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="dob">{{ __('field_dob') }} <span>*</span></label>
                                <input type="date" class="form-control date" name="dob" id="dob" value="{{ $row->dob }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_dob') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="marital_status">{{ __('field_marital_status') }}</label>
                                <select class="form-control" name="marital_status" id="marital_status">
                                    <option value="">{{ __('select') }}</option>
                                    <option value="1" @if( $row->marital_status == 1 ) selected @endif>{{ __('marital_status_single') }}</option>
                                    <option value="2" @if( $row->marital_status == 2 ) selected @endif>{{ __('marital_status_married') }}</option>
                                    <option value="3" @if( $row->marital_status == 3 ) selected @endif>{{ __('marital_status_widowed') }}</option>
                                    <option value="4" @if( $row->marital_status == 4 ) selected @endif>{{ __('marital_status_divorced') }}</option>
                                    <option value="5" @if( $row->marital_status == 5 ) selected @endif>{{ __('marital_status_other') }}</option>
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_marital_status') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="blood_group">{{ __('field_blood_group') }}</label>
                                <select class="form-control" name="blood_group" id="blood_group">
                                    <option value="">{{ __('select') }}</option>
                                    <option value="1" @if( $row->blood_group == 1 ) selected @endif>{{ __('A+') }}</option>
                                    <option value="2" @if( $row->blood_group == 2 ) selected @endif>{{ __('A-') }}</option>
                                    <option value="3" @if( $row->blood_group == 3 ) selected @endif>{{ __('B+') }}</option>
                                    <option value="4" @if( $row->blood_group == 4 ) selected @endif>{{ __('B-') }}</option>
                                    <option value="5" @if( $row->blood_group == 5 ) selected @endif>{{ __('AB+') }}</option>
                                    <option value="6" @if( $row->blood_group == 6 ) selected @endif>{{ __('AB-') }}</option>
                                    <option value="7" @if( $row->blood_group == 7 ) selected @endif>{{ __('O+') }}</option>
                                    <option value="8" @if( $row->blood_group == 8 ) selected @endif>{{ __('O-') }}</option>
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_blood_group') }}
                                </div>
                            </div>
                            </fieldset>
                            

                            <fieldset class="row scheduler-border">
                            <div class="form-group col-md-6">
                                <label for="phone">{{ __('field_phone') }} <span>*</span></label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ $row->phone }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_phone') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">{{ __('field_email') }}</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ $row->email }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_email') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="national_id">{{ __('field_national_id') }}</label>
                                <input type="text" class="form-control" name="national_id" id="national_id" value="{{ $row->national_id }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_national_id') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="passport_no">{{ __('field_passport_no') }}</label>
                                <input type="text" class="form-control" name="passport_no" id="passport_no" value="{{ $row->passport_no }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_passport_no') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="photo">{{ __('field_photo') }}: <span>{{ __('image_size', ['height' => 300, 'width' => 300]) }}</span></label>
                                <input type="file" class="form-control" name="photo" id="photo" value="{{ old('photo') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_photo') }}
                                </div>

                                @if(is_file('uploads/'.$path.'/'.$row->photo))
                                    <img src="{{ asset('uploads/'.$path.'/'.$row->photo) }}" class="img-fluid" style="max-width: 80px; max-height: 80px;" onerror="this.src='{{ asset('dashboard/images/user/avatar-2.jpg') }}';">
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="signature">{{ __('field_signature') }}: <span>{{ __('image_size', ['height' => 100, 'width' => 300]) }}</span></label>
                                <input type="file" class="form-control" name="signature" id="signature" value="{{ old('signature') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_signature') }}
                                </div>

                                @if(is_file('uploads/'.$path.'/'.$row->signature))
                                    <img src="{{ asset('uploads/'.$path.'/'.$row->signature) }}" class="img-fluid" style="max-width: 80px; max-height: 80px;" onerror="this.src='{{ asset('dashboard/images/user/avatar-2.jpg') }}';">
                                @endif
                            </div>
                            </fieldset>

                            <div class="row">
                              <div class="col-md-6">
                                <fieldset class="row scheduler-border">
                                <legend>{{ __('field_present') }} {{ __('field_address') }}</legend>

                                @include('common.inc.present_province')

                                <div class="form-group col-md-12">
                                    <label for="present_address">{{ __('field_address') }}</label>
                                    <input type="text" class="form-control" name="present_address" id="present_address" value="{{ $row->present_address }}">

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_address') }}
                                    </div>
                                </div>
                                </fieldset>
                              </div>

                              <div class="col-md-6">
                                <fieldset class="row scheduler-border">
                                <legend>{{ __('field_permanent') }} {{ __('field_address') }}</legend>

                                @include('common.inc.permanent_province')

                                <div class="form-group col-md-12">
                                    <label for="permanent_address">{{ __('field_address') }}</label>
                                    <input type="text" class="form-control" name="permanent_address" id="permanent_address" value="{{ $row->permanent_address }}">

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_address') }}
                                    </div>
                                </div>
                                </fieldset>
                              </div>
                            </div>

                            <div class="form-group col-md-2">
                                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_update') }}</button>
                            </div>
                            <!-- Form End -->
                        </content>
                    </form>         
                </div>

              </div>
            </div>
            <!-- [ Card ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection