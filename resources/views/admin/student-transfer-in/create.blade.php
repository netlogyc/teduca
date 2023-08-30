@extends('admin.layouts.master')
@section('title', $title)

@section('page_css')
    <!-- Wizard css -->
    <link rel="stylesheet" href="{{ asset('dashboard/css/pages/wizard.css') }}">
@endsection

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

                    <div class="wizard-sec-bg">
                    <form id="wizard-advanced-form" class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data" style="display: none;">
                      @csrf

                        <h3>{{ __('tab_basic_info') }}</h3>
                        <content class="form-step">
                            <!-- Form Start -->
                            <div class="row">
                            <div class="col-md-12">
                            <fieldset class="row scheduler-border">
                            <div class="form-group col-md-6">
                                <label for="first_name">{{ __('field_first_name') }} <span>*</span></label>
                                <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_first_name') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="last_name">{{ __('field_last_name') }} <span>*</span></label>
                                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_last_name') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="father_name">{{ __('field_father_name') }}</label>
                                <input type="text" class="form-control" name="father_name" id="father_name" value="{{ old('father_name') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_father_name') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="father_occupation">{{ __('field_father_occupation') }}</label>
                                <input type="text" class="form-control" name="father_occupation" id="father_occupation" value="{{ old('father_occupation') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_father_occupation') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="mother_name">{{ __('field_mother_name') }}</label>
                                <input type="text" class="form-control" name="mother_name" id="mother_name" value="{{ old('mother_name') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_mother_name') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="mother_occupation">{{ __('field_mother_occupation') }}</label>
                                <input type="text" class="form-control" name="mother_occupation" id="mother_occupation" value="{{ old('mother_occupation') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_mother_occupation') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="phone">{{ __('field_phone') }} <span>*</span></label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_phone') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">{{ __('field_email') }} <span>*</span></label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_email') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="gender">{{ __('field_gender') }} <span>*</span></label>
                                <select class="form-control" name="gender" id="gender" required>
                                    <option value="">{{ __('select') }}</option>
                                    <option value="1" @if( old('gender') == 1 ) selected @endif>{{ __('gender_male') }}</option>
                                    <option value="2" @if( old('gender') == 2 ) selected @endif>{{ __('gender_female') }}</option>
                                    <option value="3" @if( old('gender') == 3 ) selected @endif>{{ __('gender_other') }}</option>
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_gender') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="dob">{{ __('field_dob') }} <span>*</span></label>
                                <input type="date" class="form-control date" name="dob" id="dob" value="{{ old('dob') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_dob') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="marital_status">{{ __('field_marital_status') }}</label>
                                <select class="form-control" name="marital_status" id="marital_status">
                                    <option value="">{{ __('select') }}</option>
                                    <option value="1" @if( old('marital_status') == 1 ) selected @endif>{{ __('marital_status_single') }}</option>
                                    <option value="2" @if( old('marital_status') == 2 ) selected @endif>{{ __('marital_status_married') }}</option>
                                    <option value="3" @if( old('marital_status') == 3 ) selected @endif>{{ __('marital_status_widowed') }}</option>
                                    <option value="4" @if( old('marital_status') == 4 ) selected @endif>{{ __('marital_status_divorced') }}</option>
                                    <option value="5" @if( old('marital_status') == 5 ) selected @endif>{{ __('marital_status_other') }}</option>
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_marital_status') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="blood_group">{{ __('field_blood_group') }}</label>
                                <select class="form-control" name="blood_group" id="blood_group">
                                    <option value="">{{ __('select') }}</option>
                                    <option value="1" @if( old('blood_group') == 1 ) selected @endif>{{ __('A+') }}</option>
                                    <option value="2" @if( old('blood_group') == 2 ) selected @endif>{{ __('A-') }}</option>
                                    <option value="3" @if( old('blood_group') == 3 ) selected @endif>{{ __('B+') }}</option>
                                    <option value="4" @if( old('blood_group') == 4 ) selected @endif>{{ __('B-') }}</option>
                                    <option value="5" @if( old('blood_group') == 5 ) selected @endif>{{ __('AB+') }}</option>
                                    <option value="6" @if( old('blood_group') == 6 ) selected @endif>{{ __('AB-') }}</option>
                                    <option value="7" @if( old('blood_group') == 7 ) selected @endif>{{ __('O+') }}</option>
                                    <option value="8" @if( old('blood_group') == 8 ) selected @endif>{{ __('O-') }}</option>
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_blood_group') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="national_id">{{ __('field_national_id') }}</label>
                                <input type="text" class="form-control" name="national_id" id="national_id" value="{{ old('national_id') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_national_id') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="passport_no">{{ __('field_passport_no') }}</label>
                                <input type="text" class="form-control" name="passport_no" id="passport_no" value="{{ old('passport_no') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_passport_no') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="religion">{{ __('field_religion') }}</label>
                                <input type="text" class="form-control" name="religion" id="religion" value="{{ old('religion') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_religion') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="admission_date">{{ __('field_admission_date') }} <span>*</span></label>
                                <input type="date" class="form-control date" name="admission_date" id="admission_date" value="{{ date('Y-m-d') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_admission_date') }}
                                </div>
                            </div>
                            </fieldset>
                            </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <fieldset class="row scheduler-border">
                                  <legend>{{ __('field_present') }} {{ __('field_address') }}</legend>

                                  @include('common.inc.present_province')

                                  <div class="form-group col-md-12">
                                      <label for="present_address">{{ __('field_address') }}</label>
                                      <input type="text" class="form-control" name="present_address" id="present_address" value="{{ old('present_address') }}">

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
                                      <input type="text" class="form-control" name="permanent_address" id="permanent_address" value="{{ old('permanent_address') }}">

                                      <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('field_address') }}
                                      </div>
                                  </div>
                                </fieldset>
                              </div>
                            </div>
                            <!-- Form End -->
                        </content>

                        <h3>{{ __('tab_educational_info') }}</h3>
                        <content class="form-step">
                            <!-- Form Start--->
                            <fieldset class="row scheduler-border">
                            <legend>{{ __('tab_educational_info') }}</legend>
                            <div class="form-group col-md-3">
                                <label for="school_name">{{ __('field_school_name') }}</label>
                                <input type="text" class="form-control" name="school_name" id="school_name" value="{{ old('school_name') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_school_name') }}
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="school_exam_id">{{ __('field_exam_id') }}</label>
                                <input type="text" class="form-control" name="school_exam_id" id="school_exam_id" value="{{ old('school_exam_id') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_exam_id') }}
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="school_graduation_year">{{ __('field_graduation_year') }}</label>
                                <input type="text" class="form-control" name="school_graduation_year" id="school_graduation_year" value="{{ old('school_graduation_year') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_graduation_year') }}
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="school_graduation_point">{{ __('field_graduation_point') }}</label>
                                <input type="text" class="form-control" name="school_graduation_point" id="school_graduation_point" value="{{ old('school_graduation_point') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_graduation_point') }}
                                </div>
                            </div>
                            </fieldset>

                            <fieldset class="row scheduler-border">
                            <div class="form-group col-md-3">
                                <label for="collage_name">{{ __('field_collage_name') }}</label>
                                <input type="text" class="form-control" name="collage_name" id="collage_name" value="{{ old('collage_name') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_collage_name') }}
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="collage_exam_id">{{ __('field_exam_id') }}</label>
                                <input type="text" class="form-control" name="collage_exam_id" id="collage_exam_id" value="{{ old('collage_exam_id') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_exam_id') }}
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="collage_graduation_year">{{ __('field_graduation_year') }}</label>
                                <input type="text" class="form-control" name="collage_graduation_year" id="collage_graduation_year" value="{{ old('collage_graduation_year') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_graduation_year') }}
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="collage_graduation_point">{{ __('field_graduation_point') }}</label>
                                <input type="text" class="form-control" name="collage_graduation_point" id="collage_graduation_point" value="{{ old('collage_graduation_point') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_graduation_point') }}
                                </div>
                            </div>
                            </fieldset>

                            <fieldset class="row scheduler-border">
                            <legend>{{ __('field_academic_information') }}</legend>
                            <div class="form-group col-md-6">
                                <label for="student_id">{{ __('field_student_id') }} <span>*</span></label>
                                <input type="text" class="form-control" name="student_id" id="student_id" value="{{ old('student_id') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_student_id') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="batch">{{ __('field_batch') }} <span>*</span></label>
                                <select class="form-control batch" name="batch" id="batch" required>
                                    <option value="">{{ __('select') }}</option>
                                    @foreach( $batches as $batch )
                                    <option value="{{ $batch->id }}" @if(old('batch') == $batch->id) selected @endif>{{ $batch->title }}</option>
                                    @endforeach
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_batch') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                            <label for="program">{{ __('field_program') }} <span>*</span></label>
                                <select class="form-control program" name="program" id="program" required>
                                  <option value="">{{ __('select') }}</option>
                                </select>

                              <div class="invalid-feedback">
                                {{ __('required_field') }} {{ __('field_program') }}
                              </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="session">{{ __('field_session') }} <span>*</span></label>
                                <select class="form-control session" name="session" id="session" required>
                                  <option value="">{{ __('select') }}</option>
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_session') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="semester">{{ __('field_semester') }} <span>*</span></label>
                                <select class="form-control semester" name="semester" id="semester" required>
                                  <option value="">{{ __('select') }}</option>
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_semester') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="section">{{ __('field_section') }} <span>*</span></label>
                                <select class="form-control section" name="section" id="section" required>
                                  <option value="">{{ __('select') }}</option>
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_section') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="status">{{ __('field_status') }}</label>
                                <select class="form-control select2" name="statuses[]" id="status" multiple>
                                    @foreach( $statuses as $status )
                                    <option value="{{ $status->id }}" @if(old('status') == $status->id) selected @endif>{{ $status->title }}</option>
                                    @endforeach
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_status') }}
                                </div>
                            </div>
                            </fieldset>
                            
                            <fieldset class="row scheduler-border">
                            <legend>{{ __('field_guardians_information') }}</legend>
                            <div class="container-fluid">
                            <div id="inputFormField" class="row">

                            <div class="form-group col-md-4">
                                <label for="relation" class="form-label">{{ __('field_relation') }} <span>*</span></label>
                                <input type="text" class="form-control" name="relations[]" id="relation" value="{{ old('relation') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_relation') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="relative_name" class="form-label">{{ __('field_name') }} <span>*</span></label>
                                <input type="text" class="form-control" name="relative_names[]" id="relative_name" value="{{ old('relative_name') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_name') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="occupation" class="form-label">{{ __('field_occupation') }} <span>*</span></label>
                                <input type="text" class="form-control" name="occupations[]" id="occupation" value="{{ old('occupation') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_occupation') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="relative_phone" class="form-label">{{ __('field_phone') }} <span>*</span></label>
                                <input type="text" class="form-control" name="relative_phones[]" id="relative_phone" value="{{ old('relative_phone') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_phone') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="address" class="form-label">{{ __('field_address') }} <span>*</span></label>
                                <input type="text" class="form-control" name="addresses[]" id="address" value="{{ old('address') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_address') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <button id="removeField" type="button" class="btn btn-danger btn-filter"><i class="fas fa-trash-alt"></i> {{ __('btn_remove') }}</button>
                            </div>

                            </div>

                            <div id="newField" class="clearfix"></div>
                            <div class="form-group">
                                <button id="addField" type="button" class="btn btn-info"><i class="fas fa-plus"></i> {{ __('btn_add_new') }}</button>
                            </div>
                            </div>
                            </fieldset>
                            <!-- Form End--->
                        </content>

                        <h3>{{ __('tab_documents') }}</h3>
                        <content class="form-step">
                            <!-- Form Start--->
                            <fieldset class="row scheduler-border">
                            <div class="form-group col-md-6">
                                <label for="photo">{{ __('field_photo') }}: <span>{{ __('image_size', ['height' => 300, 'width' => 300]) }}</span></label>
                                <input type="file" class="form-control" name="photo" id="photo" value="{{ old('photo') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_photo') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="signature">{{ __('field_signature') }}: <span>{{ __('image_size', ['height' => 100, 'width' => 300]) }}</span></label>
                                <input type="file" class="form-control" name="signature" id="signature" value="{{ old('signature') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_signature') }}
                                </div>
                            </div>
                            </fieldset>

                            <fieldset class="row scheduler-border">
                            <legend>{{ __('field_upload') }} {{ __('field_document') }}</legend>

                            <div class="container-fluid">
                            <div id="newDocument" class="clearfix"></div>
                            <div class="form-group">
                                <button id="addDocument" type="button" class="btn btn-info"><i class="fas fa-plus"></i> {{ __('btn_add_new') }}</button>
                            </div>
                            </div>

                            </fieldset>
                            <!-- Form End--->
                        </content>
                        
                        <h3>{{ __('tab_transfer_info') }}</h3>
                        <content class="form-step">
                            <!-- Form Start--->
                            <fieldset class="row scheduler-border">
                              <div class="form-group col-md-4">
                                  <label for="transfer_id">{{ __('field_transfer_id') }} <span>*</span></label>
                                  <input type="text" class="form-control autonumber" name="transfer_id" id="transfer_id" value="{{ old('transfer_id') }}" required>

                                  <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_transfer_id') }}
                                  </div>
                              </div>

                              <div class="form-group col-md-4">
                                  <label for="university_name">{{ __('field_university_name') }} <span>*</span></label>
                                  <input type="text" class="form-control" name="university_name" id="university_name" value="{{ old('university_name') }}" required>

                                  <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_university_name') }}
                                  </div>
                              </div>

                              <div class="form-group col-md-4">
                                  <label for="date">{{ __('field_date') }} <span>*</span></label>
                                  <input type="date" class="form-control date" name="date" id="date" value="{{ date('Y-m-d') }}" required>

                                  <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_date') }}
                                  </div>
                              </div>

                              <div class="form-group col-md-12">
                                  <label for="note">{{ __('field_note') }}</label>
                                  <textarea class="form-control" name="note" id="note">{{ old('note') }}</textarea>

                                  <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_note') }}
                                  </div>
                              </div>
                            </fieldset>

                            <!-- Academic Info -->
                            <fieldset class="row scheduler-border">
                            <legend>{{ __('field_transfer_credits') }}</legend>
                            <div class="container-fluid">

                            <div id="newTField" class="clearfix"></div>
                            <div class="form-group">
                                <button id="addField" type="button" class="btn btn-info"><i class="fas fa-plus"></i> {{ __('btn_add_new') }}</button>
                            </div>
                            </div>
                            </fieldset>
                            <!-- Form End--->
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

@section('page_js')
    <!-- validate Js -->
    <script src="{{ asset('dashboard/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>

    <!-- Wizard Js -->
    <script src="{{ asset('dashboard/js/pages/jquery.steps.js') }}"></script>

    <script type="text/javascript">
        "use strict";
        var form = $("#wizard-advanced-form").show();

        form.steps({
            headerTag: "h3",
            bodyTag: "content",
            transitionEffect: "slideLeft",
            labels: 
            {
                finish: "{{ __('btn_finish') }}",
                next: "{{ __('btn_next') }}",
                previous: "{{ __('btn_previous') }}",
            },
            onStepChanging: function (event, currentIndex, newIndex)
            {
                // Allways allow previous action even if the current form is not valid!
                if (currentIndex > newIndex)
                {
                    return true;
                }
                // Needed in some cases if the user went back (clean up)
                if (currentIndex < newIndex)
                {
                    // To remove error styles
                    form.find(".body:eq(" + newIndex + ") label.error").remove();
                    form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                }
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex)
            {
                
            },
            onFinishing: function (event, currentIndex)
            {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function (event, currentIndex)
            {
                $("#wizard-advanced-form").submit();
            }
        }).validate({
            errorPlacement: function errorPlacement(error, element) { element.before(error); },
            rules: {

            }
        });
    </script>

    <script type="text/javascript">
    (function ($) {
        "use strict";
        // add Field
        $(document).on('click', '#addField', function () {
            var html = '';
            html += '<hr/>';
            html += '<div id="inputTFormField" class="row">';
            html += '<div class="form-group col-md-4"><label for="t_sessions" class="form-label">{{ __('field_session') }} <span>*</span></label><select class="form-control select2" name="t_sessions[]" id="t_sessions" required><option value="">{{ __('select') }}</option> @foreach($sessions as $session) <option value="{{ $session->id }}">{{ $session->title }}</option> @endforeach </select> <div class="invalid-feedback"> {{ __('required_field') }} {{ __('field_session') }} </div> </div>';
            html += '<div class="form-group col-md-4"> <label for="t_semesters" class="form-label">{{ __('field_semester') }} <span>*</span></label> <select class="form-control select2" name="t_semesters[]" id="t_semesters" required> <option value="">{{ __('select') }}</option> @foreach($semesters as $semester) <option value="{{ $semester->id }}">{{ $semester->title }}</option> @endforeach </select> <div class="invalid-feedback"> {{ __('required_field') }} {{ __('field_semester') }} </div> </div>';
            html += '<div class="form-group col-md-4"> <label for="t_subjects" class="form-label">{{ __('field_subject') }} <span>*</span></label> <select class="form-control select2" name="t_subjects[]" id="t_subjects" required> <option value="">{{ __('select') }}</option> @foreach($subjects as $subject) <option value="{{ $subject->id }}">{{ $subject->title }}</option> @endforeach </select> <div class="invalid-feedback"> {{ __('required_field') }} {{ __('field_subject') }}</div></div>';
            html += '<div class="form-group col-md-4"> <label for="marks" class="form-label">{{ __('field_mark') }} <span>*</span></label><input type="text" class="form-control autonumber" name="marks[]" id="marks" value="{{ old('marks') }}" data-v-max="999" data-v-min="0" required> <div class="invalid-feedback"> {{ __('required_field') }} {{ __('field_mark') }} </div> </div>';
            html += '<div class="form-group col-md-4"><button id="removeTField" type="button" class="btn btn-danger btn-filter"><i class="fas fa-trash-alt"></i> {{ __('btn_remove') }}</button></div>';
            html += '</div>';

            $('#newTField').append(html);

            // [ Single Select ] start
            $(".select2").select2();
        });

        // remove Field
        $(document).on('click', '#removeTField', function () {
            $(this).closest('#inputTFormField').remove();

            // [ Single Select ] start
            $(".select2").select2();
        });
    }(jQuery));
    </script>


    <script type="text/javascript">
    (function ($) {
        "use strict";
        // add Field
        $(document).on('click', '#addField', function () {
            var html = '';
            html += '<hr/>';
            html += '<div id="inputFormField" class="row">';
            html += '<div class="form-group col-md-4"><label for="relation" class="form-label">{{ __('field_relation') }} <span>*</span></label><input type="text" class="form-control" name="relations[]" id="relation" value="{{ old('relation') }}" required><div class="invalid-feedback">{{ __('required_field') }} {{ __('field_relation') }}</div></div>';
            html += '<div class="form-group col-md-4"><label for="relative_name" class="form-label">{{ __('field_name') }} <span>*</span></label><input type="text" class="form-control" name="relative_names[]" id="relative_name" value="{{ old('relative_name') }}" required><div class="invalid-feedback">{{ __('required_field') }} {{ __('field_name') }}</div></div>';
            html += '<div class="form-group col-md-4"><label for="occupation" class="form-label">{{ __('field_occupation') }} <span>*</span></label><input type="text" class="form-control" name="occupations[]" id="occupation" value="{{ old('occupation') }}" required><div class="invalid-feedback">{{ __('required_field') }} {{ __('field_occupation') }}</div></div>';
            html += '<div class="form-group col-md-4"><label for="relative_phone" class="form-label">{{ __('field_phone') }} <span>*</span></label><input type="text" class="form-control" name="relative_phones[]" id="relative_phone" value="{{ old('relative_phone') }}" required><div class="invalid-feedback">{{ __('required_field') }} {{ __('field_phone') }}</div></div>';
            html += '<div class="form-group col-md-4"><label for="address" class="form-label">{{ __('field_address') }} <span>*</span></label><input type="text" class="form-control" name="addresses[]" id="address" value="{{ old('address') }}" required><div class="invalid-feedback">{{ __('required_field') }} {{ __('field_address') }}</div></div>';
            html += '<div class="form-group col-md-4"><button id="removeField" type="button" class="btn btn-danger btn-filter"><i class="fas fa-trash-alt"></i> {{ __('btn_remove') }}</button></div>';
            html += '</div>';

            $('#newField').append(html);
        });

        // remove Field
        $(document).on('click', '#removeField', function () {
            $(this).closest('#inputFormField').remove();
        });
    }(jQuery));
    </script>
    <script type="text/javascript">
    (function ($) {
        "use strict";
        // add Field
        $(document).on('click', '#addDocument', function () {
            var html = '';
            html += '<hr/>';
            html += '<div id="documentFormField" class="row">';
            html += '<div class="form-group col-md-4"><label for="t_titles" class="form-label">{{ __('field_title') }} <span>*</span></label><input type="text" class="form-control" name="titles[]" id="t_titles" value="{{ old('titles') }}" required><div class="invalid-feedback">{{ __('required_field') }} {{ __('field_title') }}</div></div>';
            html += '<div class="form-group col-md-4"><label for="document" class="form-label">{{ __('field_document') }} <span>*</span></label><input type="file" class="form-control" name="documents[]" id="document" value="{{ old('document') }}" required><div class="invalid-feedback">{{ __('required_field') }} {{ __('field_document') }}</div></div>';
            html += '<div class="form-group col-md-4"><button id="removeDocument" type="button" class="btn btn-danger btn-filter"><i class="fas fa-trash-alt"></i> {{ __('btn_remove') }}</button></div>';
            html += '</div>';

            $('#newDocument').append(html);
        });

        // remove Field
        $(document).on('click', '#removeDocument', function () {
            $(this).closest('#documentFormField').remove();
        });
    }(jQuery));
    </script>

@include('common.js.batch_filter')

@endsection