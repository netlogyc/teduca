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
                            <h5>{{ __('modal_edit') }} {{ $title }}</h5>
                        </div>
                        <div class="card-block">
                            <a href="{{ route($route . '.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i>
                                {{ __('btn_back') }}</a>

                            <a href="{{ route($route . '.edit', $row->id) }}" class="btn btn-info"><i
                                    class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                        </div>

                        <form class="needs-validation" novalidate action="{{ route($route . '.update', [$row->id]) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-block">
                                <div class="row">
                                    <!-- Form Start -->
                                    <div class="form-group col-md-4">
                                        <label for="title" class="form-label">{{ __('field_title') }}
                                            <span>*</span></label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            value="{{ $row->title }}" required>

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('field_title') }}
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="code">{{ __('field_code') }} <span>*</span></label>
                                        <input type="text" class="form-control" name="code" id="code"
                                            value="{{ $row->code }}" required>

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('field_code') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="field_sufficiency">{{ __('field_sufficiency') }}
                                            <span>*</span></label>
                                        <select class="form-control" name="field_sufficiency" id="class_type" required>
                                            <option value="">{{ __('select') }}</option>
                                            <option value="SI" @if ($row->field_sufficiency == 'SI') selected @endif>{{ __('SI') }}</option>
                                            <option value="NO" @if ($row->field_sufficiency == 'SI') selected @endif>{{ __('NO') }}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('field_sufficiency') }}
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('field_credit_hour') }} <span>*</span></label>
                                        <input type="text" class="form-control autonumber" name="credit_hour"
                                            id="credit_hour" value="{{ $row->credit_hour }}" required
                                            data-v-max="999999999" data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('field_credit_hour') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('field_intensity') }} <span>*</span></label>
                                        <input type="text" class="form-control autonumber" name="field_intensity"
                                            id="field_intensity" value="{{ $row->field_intensity }}" required
                                            data-v-max="999999999" data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('field_intensity') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('theoretical_unit') }} <span>*</span></label>
                                        <input type="text" class="form-control autonumber" name="theoretical_unit"
                                            id="theoretical_unit" value="{{ $row->theoretical_unit }}" required
                                            data-v-max="999999999" data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('theoretical_unit') }}
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('practical_unit') }} <span>*</span></label>
                                        <input type="text" class="form-control autonumber" name="practical_unit"
                                            id="practical_unit" value="{{ $row->practical_unit }}" required
                                            data-v-max="999999999" data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('practical_unit') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('minimum_note') }} <span>*</span></label>
                                        <input type="text" class="form-control autonumber" name="minimum_note"
                                            id="minimum_note" value="{{ $row->minimum_note }}" required
                                            data-v-max="999999999" data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('minimum_note') }}
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('maximum_note') }} <span>*</span></label>
                                        <input type="text" class="form-control autonumber" name="maximum_note"
                                            id="maximum_note" value="{{ $row->maximum_note }}" required
                                            data-v-max="999999999" data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('maximum_note') }}
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('passing_grade') }} <span>*</span></label>
                                        <input type="text" class="form-control autonumber" name="passing_grade"
                                            id="passing_grade" value="{{ $row->passing_grade }}" required
                                            data-v-max="999999999" data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('passing_grade') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="homologable">{{ __('homologable') }} <span>*</span></label>
                                        <select class="form-control" name="homologable" id="class_type" required>
                                            <option value="">{{ __('select') }}</option>
                                            <option value="SI" @if ($row->homologable == 'SI') selected @endif>{{ __('SI') }}</option>
                                            <option value="NO" @if ($row->homologable == 'NO') selected @endif>{{ __('NO') }}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('homologable') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('minimum_grade_approved') }} <span>*</span></label>
                                        <input type="text" class="form-control autonumber"
                                            name="minimum_grade_approved" id="minimum_grade_approved"
                                            value="{{ $row->minimum_grade_approved }}" required data-v-max="999999999"
                                            data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('minimum_grade_approved') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="class_type">{{ __('field_class_type') }} <span>*</span></label>
                                        <select class="form-control" name="class_type" id="class_type" required>
                                            <option value="">{{ __('select') }}</option>
                                            <option value="1" @if ($row->class_type == 1) selected @endif>
                                                {{ __('class_type_theory') }}</option>
                                            <option value="2" @if ($row->class_type == 2) selected @endif>
                                                {{ __('class_type_practical') }}</option>
                                            <option value="3" @if ($row->class_type == 3) selected @endif>
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
                                            <option value="1" @if ($row->subject_type == 1) selected @endif>
                                                {{ __('subject_type_compulsory') }}</option>
                                            <option value="0" @if ($row->subject_type == 0) selected @endif>
                                                {{ __('subject_type_optional') }}</option>
                                        </select>

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('field_subject_type') }}
                                        </div>
                                    </div>

                                    

                                    

                                    {{-- custom --}}

                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('field_start') }} <span>*</span></label>
                                        <input type="date" class="form-control autonumber" name="field_start"
                                            id="field_start" value="{{ $row->field_start }}" required
                                            data-v-max="999999999" data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('field_start') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="credit_hour">{{ __('field_ends') }} <span>*</span></label>
                                        <input type="date" class="form-control autonumber" name="field_ends"
                                            id="field_ends" value="{{ $row->field_ends }}" required
                                            data-v-max="999999999" data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('field_ends') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="status" class="form-label">{{ __('select_status') }}</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1" @if ($row->status == 1) selected @endif>
                                                {{ __('status_active') }}</option>
                                            <option value="0" @if ($row->status == 0) selected @endif>
                                                {{ __('status_inactive') }}</option>
                                        </select>
                                    </div>



                                    {{-- <div class="form-group col-md-4">
                                        <label for="Qualification">{{ __('Qualification') }} <span>*</span></label>
                                        <select class="form-control" name="Qualification" id="class_type" required>
                                            <option value="">{{ __('select') }}</option>
                                            <option value="SI" @if ($row->Qualification == 'SI') selected @endif>{{ __('SI') }}</option>
                                            <option value="NO" @if ($row->Qualification == 'SI') selected @endif>{{ __('NO') }}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('Qualification') }}
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label for="field_modality">{{ __('field_modality') }} <span>*</span></label>
                                        <select class="form-control" name="field_modality" id="class_type" required>
                                            <option value="">{{ __('select') }}</option>
                                            <option value="Catedra" @if ($row->field_modality == 'Catedra') selected @endif>{{ __('Catedra') }}</option>
                                            <option value="Investigación" @if ($row->field_modality == 'Investigación') selected @endif>{{ __('Investigación') }}</option>
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
                                            value="{{ $row->Qualifying_minimum_note }}" required data-v-max="999999999"
                                            data-v-min="0">

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('Qualifying_minimum_note') }}
                                        </div>
                                    </div> --}}
                                    {{-- custom --}}


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
                                                        @foreach ($row->programs as $selected_program)
                                    @if ($selected_program->id == $program->id) checked @endif @endforeach>
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
                                    {{ __('btn_update') }}</button>
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
