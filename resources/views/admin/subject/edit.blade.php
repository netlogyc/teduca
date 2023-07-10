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
                        <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                        <a href="{{ route($route.'.edit', $row->id) }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    <form class="needs-validation" novalidate action="{{ route($route.'.update', [$row->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-block">
                      <div class="row">
                        <!-- Form Start -->
                        <div class="form-group col-md-4">
                            <label for="title" class="form-label">{{ __('field_title') }} <span>*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $row->title }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_title') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="code">{{ __('field_code') }} <span>*</span></label>
                            <input type="text" class="form-control" name="code" id="code" value="{{ $row->code }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_code') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="credit_hour">{{ __('field_credit_hour') }} <span>*</span></label>
                            <input type="text" class="form-control autonumber" name="credit_hour" id="credit_hour" value="{{ $row->credit_hour }}" required data-v-max="999999999" data-v-min="0">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_credit_hour') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="subject_type">{{ __('field_subject_type') }} <span>*</span></label>
                            <select class="form-control" name="subject_type" id="subject_type" required>
                                <option value="">{{ __('select') }}</option>
                                <option value="1" @if( $row->subject_type == 1 ) selected @endif>{{ __('subject_type_compulsory') }}</option>
                                <option value="0" @if( $row->subject_type == 0 ) selected @endif>{{ __('subject_type_optional') }}</option>
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_subject_type') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="class_type">{{ __('field_class_type') }} <span>*</span></label>
                            <select class="form-control" name="class_type" id="class_type" required>
                                <option value="">{{ __('select') }}</option>
                                <option value="1" @if( $row->class_type == 1 ) selected @endif>{{ __('class_type_theory') }}</option>
                                <option value="2" @if( $row->class_type == 2 ) selected @endif>{{ __('class_type_practical') }}</option>
                                <option value="3" @if( $row->class_type == 3 ) selected @endif>{{ __('class_type_both') }}</option>
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_class_type') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="status" class="form-label">{{ __('select_status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" @if( $row->status == 1 ) selected @endif>{{ __('status_active') }}</option>
                                <option value="0" @if( $row->status == 0 ) selected @endif>{{ __('status_inactive') }}</option>
                            </select>
                        </div>

                        @foreach($faculties as $index => $faculty)
                        <div class="form-group col-md-6 col-lg-4 p-15">
                            <span class="badge badge-primary">{{ $faculty->title }}</span><br/>

                            @foreach($faculty->programs->where('status', 1)->sortBy('title') as $key => $program)
                            <br/>
                            <div class="checkbox d-inline">
                                <input type="checkbox" name="programs[]" id="program-{{ $key }}-{{ $index }}" value="{{ $program->id }}" 
                                @foreach($row->programs as $selected_program)
                                    @if($selected_program->id == $program->id) checked @endif 
                                @endforeach>
                                <label for="program-{{ $key }}-{{ $index }}" class="cr">{{ $program->title }}</label>
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
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_update') }}</button>
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