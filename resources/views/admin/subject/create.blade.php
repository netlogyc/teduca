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
                            <a href="{{ route($route . '.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i>
                                {{ __('btn_back') }}</a>

                            <a href="{{ route($route . '.create') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i>
                                {{ __('btn_refresh') }}</a>
                        </div>

                        <form class="needs-validation" novalidate action="{{ route($route . '.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-block">
                                <div class="row">
                                    <!-- Form Start -->
                                    <div class="form-group col-md-4">
                                        <label for="title" class="form-label">{{ __('field_title') }}
                                            <span>*</span></label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            value="{{ old('title') }}" required>

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('field_title') }}
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="code">{{ __('field_code') }} <span>*</span></label>
                                        <input type="text" class="form-control" name="code" id="code"
                                            value="{{ old('code') }}" required>

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('field_code') }}
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="field_sufficiency">{{ __('field_sufficiency') }} <span>*</span></label>
                                        <select class="form-control" name="field_sufficiency" id="class_type" required>
                                            <option value="">{{ __('select') }}</option>
                                            <option value="SI">{{ __('SI') }}</option>
                                            <option value="NO">{{ __('NO') }}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('field_sufficiency') }}
                                        </div>
                                    </div>



                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('field_credit_hour') }} <span>*</span></label>
                                        <input type="text" class="form-control autonumber" name="credit_hour"
                                            id="credit_hour" value="{{ old('credit_hour') }}" required
                                            data-v-max="999999999" data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('field_credit_hour') }}
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('field_intensity') }} <span>*</span></label>
                                        <input type="text" class="form-control autonumber" name="field_intensity"
                                            id="field_intensity" value="{{ old('field_intensity') }}" required
                                            data-v-max="999999999" data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('field_intensity') }}
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('theoretical_unit') }} <span>*</span></label>
                                        <input type="text" class="form-control autonumber" name="theoretical_unit"
                                            id="theoretical_unit" value="{{ old('theoretical_unit') }}" required
                                            data-v-max="999999999" data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('theoretical_unit') }}
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('practical_unit') }} <span>*</span></label>
                                        <input type="text" class="form-control autonumber" name="practical_unit"
                                            id="practical_unit" value="{{ old('practical_unit') }}" required
                                            data-v-max="999999999" data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('practical_unit') }}
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('minimum_note') }} <span>*</span></label>
                                        <input type="text" class="form-control autonumber" name="minimum_note"
                                            id="minimum_note" value="{{ old('minimum_note') }}" required
                                            data-v-max="999999999" data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('minimum_note') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('maximum_note') }} <span>*</span></label>
                                        <input type="text" class="form-control autonumber" name="maximum_note"
                                            id="maximum_note" value="{{ old('maximum_note') }}" required
                                            data-v-max="999999999" data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('maximum_note') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('passing_grade') }} <span>*</span></label>
                                        <input type="text" class="form-control autonumber" name="passing_grade"
                                            id="passing_grade" value="{{ old('passing_grade') }}" required
                                            data-v-max="999999999" data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('passing_grade') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="homologable">{{ __('homologable') }} <span>*</span></label>
                                        <select class="form-control" name="homologable" id="homologable" required>
                                            <option value="">{{ __('select') }}</option>
                                            <option value="SI">{{ __('SI') }}</option>
                                            <option value="NO">{{ __('NO') }}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('homologable') }}
                                        </div>
                                    </div>

                                   
                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('minimum_grade_approved') }} <span>*</span></label>
                                        <select class="form-control" name="minimum_grade_approved" id="minimum_grade_approved" required>
                                            <option value="">{{ __('select') }}</option>
                                            <option value="Transferencia interna = 3.0 / Transferencia externa =3.4">{{ __('Transferencia interna = 3.0 / Transferencia externa =3.4') }}</option>
                                        </select>
{{--                                         
                                        <input type="text" class="form-control autonumber"
                                            name="minimum_grade_approved" id="minimum_grade_approved"
                                            value="{{ old('minimum_grade_approved') }}" required data-v-max="999999999"
                                            data-v-min="0"> --}}

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('minimum_grade_approved') }}
                                        </div>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label for="class_type">{{ __('field_class_type') }} <span>*</span></label>
                                        <select class="form-control" name="class_type" id="class_type" required>
                                            <option value="">{{ __('select') }}</option>
                                            <option value="1" @if (old('class_type') == 1) selected @endif>
                                                {{ __('class_type_theory') }}</option>
                                            <option value="2" @if (old('class_type') == 2) selected @endif>
                                                {{ __('class_type_practical') }}</option>
                                            <option value="3" @if (old('class_type') == 3) selected @endif>
                                                {{ __('class_type_both') }}</option>
                                        </select>

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('field_class_type') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="subject_type">{{ __('field_subject_type') }} <span>*</span></label>
                                        <select class="form-control" name="subject_type" id="subject_type" required>
                                            <option value="">{{ __('select') }}</option>
                                            <option value="1" @if (old('subject_type') == 1) selected @endif>
                                                {{ __('subject_type_compulsory') }}</option>
                                            <option value="0" @if (old('subject_type') == 0 && old('subject_type') != null) selected @endif>
                                                {{ __('subject_type_optional') }}</option>
                                        </select>

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('field_subject_type') }}
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('field_start') }} <span>*</span></label>
                                        <input type="date" class="form-control autonumber" name="field_start"
                                            id="field_start" value="{{ old('field_start') }}" required
                                            data-v-max="999999999" data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('field_start') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('field_ends') }} <span>*</span></label>
                                        <input type="date" class="form-control autonumber" name="field_ends"
                                            id="field_ends" value="{{ old('field_ends') }}" required
                                            data-v-max="999999999" data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('field_ends') }}
                                        </div>
                                    </div>

                                    {{-- <div class="form-group col-md-4">
                                        <label for="Qualification">{{ __('Qualification') }} <span>*</span></label>
                                        <select class="form-control" name="Qualification" id="class_type" required>
                                            <option value="">{{ __('select') }}</option>
                                            <option value="SI">{{ __('SI') }}</option>
                                            <option value="NO">{{ __('NO') }}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('Qualification') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="field_modality">{{ __('field_modality') }} <span>*</span></label>
                                        <select class="form-control" name="field_modality" id="class_type" required>
                                            <option value="">{{ __('select') }}</option>
                                            <option value="Catedra">{{ __('Catedra') }}</option>
                                            <option value="Investigación">{{ __('Investigación') }}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('field_modality') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('Qualifying_minimum_note') }}
                                            <span>*</span></label>
                                        <input type="text" class="form-control autonumber"
                                            name="Qualifying_minimum_note" id="Qualifying_minimum_note"
                                            value="{{ old('Qualifying_minimum_note') }}" required data-v-max="999999999"
                                            data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('Qualifying_minimum_note') }}
                                        </div>
                                    </div> --}}
                                    {{-- custom --}}

                                    <div class="form-group col-md-4"></div>
                                    <div class="form-group col-md-4"></div> 

                                    @foreach ($faculties as $index => $faculty)
                                        <div class="form-group col-md-6 col-lg-4 p-15">
                                            <span class="badge badge-primary">{{ $faculty->title }}</span><br />

                                            @foreach ($faculty->programs->where('status', 1)->sortBy('title') as $key => $program)
                                                <br />
                                                <div class="checkbox d-inline">
                                                    <input type="checkbox" name="programs[]"
                                                        id="program-{{ $key }}-{{ $index }}"
                                                        value="{{ $program->id }}"
                                                        @if (old('programs[]') == $program->id) checked @endif>
                                                    <label for="program-{{ $key }}-{{ $index }}"
                                                        class="cr">{{ $program->title }}</label>
                                                </div>
                                            @endforeach

                                            <div class="invalid-feedback">
                                                {{ __('required_field') }} {{ __('field_program') }}
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- Form End -->
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i>
                                    {{ __('btn_save') }}</button>
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
