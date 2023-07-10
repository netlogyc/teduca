@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('modal_edit') }} {{ $title }}</h5>
                    </div>
                    <div class="card-block">
                        <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                        <a href="{{ route($route.'.edit', $row->id) }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    <form class="needs-validation" novalidate action="{{ route($route.'.update', $row->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-block">
                    <fieldset class="row scheduler-border">
                    <div class="row">
                        <input type="text" name="student_id" value="{{ $row->student->id }}" hidden>

                        <div class="form-group col-md-6">
                            <label for="student">{{ __('field_student_id') }} <span>*</span></label>
                            <input type="text" class="form-control" name="student" id="student" value="{{ $row->student->student_id }}" readonly>

                            <div class="invalid-feedback">
                            {{ __('required_field') }} {{ __('field_student_id') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="transfer_id">{{ __('field_transfer_id') }} <span>*</span></label>
                            <input type="text" class="form-control" name="transfer_id" id="transfer_id" value="{{ $row->transfer_id }}" required>

                            <div class="invalid-feedback">
                            {{ __('required_field') }} {{ __('field_transfer_id') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="university_name">{{ __('field_university_name') }} <span>*</span></label>
                            <input type="text" class="form-control" name="university_name" id="university_name" value="{{ $row->university_name }}" required>

                            <div class="invalid-feedback">
                            {{ __('required_field') }} {{ __('field_university_name') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="date">{{ __('field_date') }} <span>*</span></label>
                            <input type="date" class="form-control date" name="date" id="date" value="{{ $row->date }}" required>

                            <div class="invalid-feedback">
                            {{ __('required_field') }} {{ __('field_date') }}
                            </div>
                        </div>
  
                        <div class="form-group col-md-12">
                            <label for="note">{{ __('field_note') }}</label>
                            <textarea class="form-control" name="note" id="note">{{ $row->note }}</textarea>

                            <div class="invalid-feedback">
                            {{ __('required_field') }} {{ __('field_note') }}
                            </div>
                        </div>
                    </div>
                    </fieldset>

                    <fieldset class="row scheduler-border">
                    <legend>{{ __('field_transfer_credits') }}</legend>
                    <div class="container-fluid">

                    @foreach($row->student->transferCreadits as $creadit)
                    <input type="text" name="t_creadit_id[]" value="{{ $creadit->id }}" hidden>
                    <input type="text" name="t_programs[]" value="{{ $row->student->program_id }}" hidden>
                    <div class="row">
                        <!-- Form End -->
                        <div class="form-group col-md-4">
                            <label for="t_sessions" class="form-label">{{ __('field_session') }} <span>*</span></label>
                            <select class="form-control select2" name="t_sessions[]" id="t_sessions" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach($sessions as $session)
                                <option value="{{ $session->id }}" {{ $creadit->session_id == $session->id ? 'selected' : '' }}>{{ $session->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                            {{ __('required_field') }} {{ __('field_session') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="t_semesters" class="form-label">{{ __('field_semester') }} <span>*</span></label>
                            <select class="form-control select2" name="t_semesters[]" id="t_semesters" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach($semesters as $semester)
                                <option value="{{ $semester->id }}" {{ $creadit->semester_id == $semester->id ? 'selected' : '' }}>{{ $semester->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                            {{ __('required_field') }} {{ __('field_semester') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                          <label for="t_subjects" class="form-label">{{ __('field_subject') }} <span>*</span></label>
                            <select class="form-control select2" name="t_subjects[]" id="t_subjects" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ $creadit->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_subject') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="marks" class="form-label">{{ __('field_mark') }} <span>*</span></label>
                            <input type="text" class="form-control autonumber" name="marks[]" id="marks" value="{{ round($creadit->marks, 2) }}" data-v-max="999" data-v-min="0" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_mark') }}
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div id="newTField" class="clearfix"></div>
                    <div class="form-group">
                        <button id="addField" type="button" class="btn btn-info"><i class="fas fa-plus"></i> {{ __('btn_add_new') }}</button>
                    </div>

                    </div>
                    </fieldset>
                    <!-- Form End -->
                    </div>
                    <div class="card-footer float-right">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_update') }}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection

@section('page_js')
<script type="text/javascript">
    (function ($) {
        "use strict";
        // add Field
        $(document).on('click', '#addField', function () {
            var html = '';
            html += '<hr/>';
            html += '<div id="inputTFormField" class="row">';
            html += '<input type="text" name="t_programs[]" value="{{ $row->student->program_id }}" hidden>';
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
@endsection