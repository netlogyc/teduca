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
                        <h5>{{ __('modal_edit') }} {{ $title }}</h5>
                    </div>
                    <div class="card-block">
                        <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                        <a href="{{ route($route.'.edit', $row->id) }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    <div class="wizard-sec-bg">
                    <form id="wizard-advanced-form" class="needs-validation" novalidate action="{{ route($route.'.update', [$row->id]) }}" method="post" enctype="multipart/form-data" style="display: none;">
                    @csrf
                    @method('PUT')

                        <h3>{{ __('tab_profile_info') }}</h3>
                        <content class="form-step">
                            <!-- Form Start -->
                            <div class="row">
                            <div class="col-md-12">
                            <fieldset class="row scheduler-border">

                            {{-- 1 --}}
                            <div class="form-group col-md-4">
                                <label for="type_ide ">{{ __('type_ide  ') }} <span>*</span></label>
                                <select class="form-control" name="type_ide " id="type_ide " required>
                                    <option value="">{{ __('select') }}</option>
                                    <option value="1"
                                        @if( $row->type_ide == 1 ) selected @endif>
                                        Cédula de Ciudadania</option>
                                    <option value="2"
                                        @if( $row->type_ide == 2 ) selected @endif>
                                        Cédula de extranjería</option>
                                    <option value="3"
                                        @if( $row->type_ide == 3 ) selected @endif>
                                        Pasaporte</option>
                                    <option value="3"
                                        @if( $row->type_ide == 4 ) selected @endif>
                                        Tarjeta de identidad</option>
                                </select>

                                <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('type_ide') }}
                                </div>
                            </div>
                            
                            {{-- 2--}}
                            <div class="form-group col-md-4">
                                <label for="staff_id">{{ __('field_staff_id') }} <span>*</span></label>
                                <input type="text" class="form-control" name="staff_id" id="staff_id" value="{{ $row->staff_id }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_staff_id') }}
                                </div>
                            </div>

                            {{-- 3 --}}
                            <div class="form-group col-md-4">
                                <label for="last_name">{{ __('field_last_name') }} <span>*</span></label>
                                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $row->last_name }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_last_name') }}
                                </div>
                            </div>

                            {{-- 4 --}}
                            <div class="form-group col-md-4">
                                <label for="second_last_name ">{{ __('second_last_name ') }}
                                    <span>*</span></label>
                                <input type="text" class="form-control" name="second_last_name "
                                    id="second_last_name " value="{{ $row->second_last_name }}"
                                    required>

                                <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('second_last_name ') }}
                                </div>
                            </div>

                            {{-- 5 --}}
                            <div class="form-group col-md-4">
                                <label for="first_name">{{ __('field_first_name') }} <span>*</span></label>
                                <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $row->first_name }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_first_name') }}
                                </div>
                            </div>

                            {{-- 6 --}}
                            <div class="form-group col-md-4">
                                <label for="second_first_name ">{{ __('second_first_name ') }}
                                    <span>*</span></label>
                                <input type="text" class="form-control" name="second_first_name "
                                    id="second_first_name " value="{{ $row->second_first_name }}"
                                    required>

                                <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('second_first_name ') }}
                                </div>
                            </div>

                            {{-- 7 --}}
                            <div class="form-group col-md-4">
                                <label for="expedition_date ">{{ __('expedition_date ') }}
                                    <span>*</span></label>
                                <input type="date" class="form-control date" name="expedition_date "
                                    id="expedition_date " value="{{ $row->expedition_date }}"
                                    required>

                                <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('expedition_date ') }}
                                </div>
                            </div>

                            {{-- 8 --}}
                            <div class="form-group col-md-4">
                                <label for="dob">{{ __('field_dob') }} <span>*</span></label>
                                <input type="date" class="form-control date" name="dob" id="dob" value="{{ $row->dob }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_dob') }}
                                </div>
                            </div>

                            {{-- 9 --}}
                            <div class="form-group col-md-4">
                                <label for="place_of_birth  ">{{ __('place_of_birth') }}
                                    <span>*</span></label>
                                <input type="text" class="form-control" name="place_of_birth"
                                    id="place_of_birth " value="{{ $row->place_of_birth }}"
                                    required>

                                <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('place_of_birth  ') }}
                                </div>
                            </div>

                            {{-- 10 --}}
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

                            {{-- 11 --}}
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

                            {{-- 12 --}}
                            <div class="form-group col-md-6">
                                <label for="nationality">{{ __('field_nationality') }}
                                    <span>*</span></label>
                                <input type="text" class="form-control" name="nationality"
                                    id="nationality" value="{{ $row->nationality }}" required>

                                <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('field_nationality') }}
                                </div>
                            </div>

                            {{-- 13 --}}
                            <div class="form-group col-md-6">
                                <label for="passport_no">{{ __('field_passport_no') }}</label>
                                <input type="text" class="form-control" name="passport_no" id="passport_no" value="{{ $row->passport_no }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_passport_no') }}
                                </div>
                            </div>

                            {{-- 14 --}}
                            <div class="form-group col-md-4">
                                <label for="expiration_date">{{ __('expiration_date') }}
                                    <span>*</span></label>
                                <input type="date" class="form-control date"
                                    name="expiration_date" id="expiration_date"
                                    value="{{ $row->expiration_date }}" required>

                                <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('expiration_date') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="role">{{ __('field_role') }} <span>*</span></label>
                                <select class="form-control" name="roles[]" id="role" required>
                                    <option value="">{{ __('select') }}</option>
                                    @foreach( $roles as $role )
                                    <option value="{{ $role->id }}"
                                        @foreach($userRoles as $userRole)
                                            @if($userRole->id == $role->id) selected @endif
                                        @endforeach
                                    >{{ $role->name }}</option>
                                    @endforeach
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_role') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="department">{{ __('field_department') }} <span>*</span></label>
                                <select class="form-control" name="department" id="department" required>
                                    <option value="">{{ __('select') }}</option>
                                    @foreach( $departments as $department )
                                    <option value="{{ $department->id }}" @if($row->department_id == $department->id) selected @endif>{{ $department->title }}</option>
                                    @endforeach
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_department') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="designation">{{ __('field_designation') }} <span>*</span></label>
                                <select class="form-control" name="designation" id="designation" required>
                                    <option value="">{{ __('select') }}</option>
                                    @foreach( $designations as $designation )
                                    <option value="{{ $designation->id }}" @if($row->designation_id == $designation->id) selected @endif>{{ $designation->title }}</option>
                                    @endforeach
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_designation') }}
                                </div>
                            </div>

                            {{-- 20 --}}
                            <div class="form-group col-md-4">
                                <label for="phone">{{ __('field_phone') }} <span>*</span></label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ $row->phone }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_phone') }}
                                </div>
                            </div>

                            {{-- 21 --}}
                            <div class="form-group col-md-4">
                                <label for="economic_stratum ">{{ __('economic_stratum ') }}</label>
                                <select class="form-control" name="economic_stratum "
                                    id="economic_stratum ">
                                    <option value="">{{ __('select') }}</option>
                                    <option value="1"
                                        @if( $row->economic_stratum == 1 ) selected @endif>
                                        {{ __('1') }}</option>
                                    <option value="2"
                                        @if( $row->economic_stratum == 2 ) selected @endif>
                                        {{ __('2') }}</option>
                                    <option value="3"
                                        @if( $row->economic_stratum == 3 ) selected @endif>
                                        {{ __('3') }}</option>
                                    <option value="4"
                                        @if( $row->economic_stratum == 4 ) selected @endif>
                                        {{ __('4') }}</option>
                                    <option value="5"
                                        @if( $row->economic_stratum == 5 ) selected @endif>
                                        {{ __('5') }}</option>
                                    <option value="6"
                                        @if( $row->economic_stratum == 6 ) selected @endif>
                                        {{ __('6') }}</option>
                                    <option value="7"
                                        @if( $row->economic_stratum == 7 ) selected @endif>
                                        {{ __('No aplica') }}</option>

                                </select>

                                <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('economic_stratum ') }}
                                </div>
                            </div>

                            {{-- 22 --}}
                            <div class="form-group col-md-6">
                                <label for="institutional_e_mail">{{ __('institutional_e_mail') }}
                                    <span>*</span></label>
                                <input type="email" class="form-control"
                                    name="institutional_e_mail " id="institutional_e_mail"
                                    value="{{ $row->institutional_e_mail }}" required>

                                <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('institutional_e_mail ') }}
                                </div>
                            </div>

                            {{-- 23 --}}
                            <div class="form-group col-md-6">
                                <label for="email">{{ __('field_email') }} <span>*</span></label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ $row->email }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_email') }}
                                </div>
                            </div>


                            {{-- 24 --}}
                            <div class="form-group col-md-6">
                                <label for="eps">{{ __('eps') }} <span>*</span></label>
                                <input type="text" class="form-control" name="eps"
                                    id="eps" value="{{ $row->eps }}" required>

                                <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('eps') }}
                                </div>
                            </div>

                            
                            {{-- 25 --}}
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

                            {{-- <div class="form-group col-md-6">
                                <label for="national_id">{{ __('field_national_id') }}</label>
                                <input type="text" class="form-control" name="national_id" id="national_id" value="{{ $row->national_id }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_national_id') }}
                                </div>
                            </div> --}}

                            
                            </fieldset>
                            </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
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
                            </div>
                            <!-- Form End -->
                        </content>

                        <h3>{{ __('tab_educational_info') }}</h3>
                        <content class="form-step">
                            <!-- Form Start--->
                            <fieldset class="row scheduler-border">
                            <div class="form-group col-md-6">
                                <label for="education_level">{{ __('field_education_level') }}</label>
                                <input type="text" class="form-control" name="education_level" id="education_level" value="{{ $row->education_level }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_education_level') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="graduation_academy">{{ __('field_graduation_academy') }}</label>
                                <input type="text" class="form-control" name="graduation_academy" id="graduation_academy" value="{{ $row->graduation_academy }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_graduation_academy') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="year_of_graduation">{{ __('field_year_of_graduation') }}</label>
                                <input type="text" class="form-control autonumber" name="year_of_graduation" id="year_of_graduation" value="{{ $row->year_of_graduation }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_year_of_graduation') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="graduation_field">{{ __('field_graduation_field') }}</label>
                                <input type="text" class="form-control" name="graduation_field" id="graduation_field" value="{{ $row->graduation_field }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_graduation_field') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="experience">{{ __('field_experience') }}</label>
                                <textarea class="form-control" name="experience" id="experience">{{ $row->experience }}</textarea>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_experience') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="note">{{ __('field_note') }}</label>
                                <textarea class="form-control" name="note" id="note">{{ $row->note }}</textarea>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_note') }}
                                </div>
                            </div>

                            {{-- <div class="form-group col-md-12">
                                <label for="program">{{ __('field_assign') }} {{ __('field_program') }}</label>

                                @foreach($programs as $key => $program)
                                <br/>
                                <div class="checkbox d-inline">
                                    <input type="checkbox" name="programs[]" id="program-{{ $key }}" value="{{ $program->id }}" 
                                        @foreach($row->programs as $selected_program)
                                            @if($selected_program->id == $program->id) checked @endif 
                                        @endforeach
                                    >
                                    <label for="program-{{ $key }}" class="cr">{{ $program->title }}</label>
                                </div>
                                @endforeach

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_program') }}
                                </div>
                            </div> --}}
                            </fieldset>
                            <!-- Form End--->
                        </content>

                        <h3>{{ __('tab_payroll_details') }}</h3>
                        <content class="form-step">
                            <!-- Form Start--->
                            <fieldset class="row scheduler-border">
                            <div class="form-group col-md-4">
                                <label for="contract_type">{{ __('field_contract_type') }} <span>*</span></label>
                                <select class="form-control" name="contract_type" id="contract_type" required>
                                    <option value="">{{ __('select') }}</option>
                                    <option value="1" @if( $row->contract_type == 1 ) selected @endif>{{ __('contract_type_full_time') }}</option>
                                    <option value="2" @if( $row->contract_type == 2 ) selected @endif>{{ __('contract_type_part_time') }}</option>
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_contract_type') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="work_shift">{{ __('field_work_shift') }} <span>*</span></label>
                                <select class="form-control" name="work_shift" id="work_shift" required>
                                    <option value="">{{ __('select') }}</option>
                                    @foreach($work_shifts as $shift )
                                    <option value="{{ $shift->id }}" {{ $row->work_shift == $shift->id ? 'selected' : '' }}>{{ $shift->title }}</option>
                                    @endforeach
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_work_shift') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="salary_type">{{ __('field_salary_type') }} <span>*</span></label>
                                <select class="form-control" name="salary_type" id="salary_type" required>
                                    <option value="">{{ __('select') }}</option>
                                    <option value="1" @if( $row->salary_type == 1 ) selected @endif>{{ __('salary_type_fixed') }}</option>
                                    <option value="2" @if( $row->salary_type == 2 ) selected @endif>{{ __('salary_type_hourly') }}</option>
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_salary_type') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="basic_salary">{{ __('salary_type_hourly') }} / {{ __('salary_type_fixed') }} {{ __('field_salary') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                                <input type="text" class="form-control autonumber" name="basic_salary" id="basic_salary" value="{{ $row->basic_salary }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('salary_type_hourly') }} / {{ __('salary_type_fixed') }} {{ __('field_salary') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="epf_no">{{ __('field_epf_no') }}</label>
                                <input type="text" class="form-control" name="epf_no" id="epf_no" value="{{ $row->epf_no }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_epf_no') }}
                                </div>
                            </div>
                            </fieldset>
                            <!-- Form End--->
                        </content>

                        <h3>{{ __('tab_bank_info') }}</h3>
                        <content class="form-step">
                            <!-- Form Start--->
                            <fieldset class="row scheduler-border">
                            <div class="form-group col-md-4">
                                <label for="bank_account_name">{{ __('field_bank_account_name') }}</label>
                                <input type="text" class="form-control" name="bank_account_name" id="bank_account_name" value="{{ $row->bank_account_name }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_bank_account_name') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="bank_account_no">{{ __('field_bank_account_no') }}</label>
                                <input type="text" class="form-control autonumber" name="bank_account_no" id="bank_account_no" value="{{ $row->bank_account_no }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_bank_account_no') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="bank_name">{{ __('field_bank_name') }}</label>
                                <input type="text" class="form-control" name="bank_name" id="bank_name" value="{{ $row->bank_name }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_bank_name') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="ifsc_code">{{ __('field_ifsc_code') }}</label>
                                <input type="text" class="form-control" name="ifsc_code" id="ifsc_code" value="{{ $row->ifsc_code }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_ifsc_code') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="bank_brach">{{ __('field_bank_brach') }}</label>
                                <input type="text" class="form-control" name="bank_brach" id="bank_brach" value="{{ $row->bank_brach }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_bank_brach') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="tin_no">{{ __('field_tin_no') }}</label>
                                <input type="text" class="form-control" name="tin_no" id="tin_no" value="{{ $row->tin_no }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_tin_no') }}
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

                            <div class="form-group col-md-6">
                                <label for="resume">{{ __('field_resume') }}</label>
                                <input type="file" class="form-control" name="resume" id="resume" value="{{ old('resume') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_resume') }}
                                </div>

                                @if(is_file('uploads/'.$path.'/'.$row->resume))
                                    <a href="{{ asset('uploads/'.$path.'/'.$row->resume) }}" class="btn btn-sm btn-icon btn-dark" download><i class="fas fa-download"></i></a>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="joining_letter">{{ __('field_joining_letter') }}</label>
                                <input type="file" class="form-control" name="joining_letter" id="joining_letter" value="{{ old('joining_letter') }}">

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_joining_letter') }}
                                </div>

                                @if(is_file('uploads/'.$path.'/'.$row->joining_letter))
                                    <a href="{{ asset('uploads/'.$path.'/'.$row->joining_letter) }}" class="btn btn-sm btn-icon btn-dark" download><i class="fas fa-download"></i></a>
                                @endif
                            </div>
                            </fieldset>
                            
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('field_title') }}</th>
                                        <th>{{ __('field_document') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($documents as $document)
                                    @foreach($document->users as $user)
                                    @if($user->id == $row->id)
                                    <tr>
                                        <td>{{ $document->title }}</td>
                                        <td>
                                        @if(is_file('uploads/'.$path.'/'.$document->attach))
                                        <a href="{{ asset('uploads/'.$path.'/'.$document->attach) }}" class="btn btn-sm btn-icon btn-dark" download><i class="fas fa-download"></i></a>
                                        @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
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
        $(document).on('click', '#addDocument', function () {
            var html = '';
            html += '<hr/>';
            html += '<div id="documentFormField" class="row">';
            html += '<div class="form-group col-md-4"><label for="title" class="form-label">{{ __('field_title') }} <span>*</span></label><input type="text" class="form-control" name="titles[]" id="title" value="{{ old('title') }}" required><div class="invalid-feedback">{{ __('required_field') }} {{ __('field_title') }}</div></div>';
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
@endsection