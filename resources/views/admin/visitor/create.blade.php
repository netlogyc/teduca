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
                        <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                        <a href="{{ route($route.'.create') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-block">
                      <div class="row">
                        <!-- Form Start -->
                        <div class="form-group col-md-4">
                            <label for="purpose">{{ __('field_purpose') }} <span>*</span></label>
                            <select class="form-control" name="purpose" id="purpose" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach( $purposes as $purpose )
                                <option value="{{ $purpose->id }}" @if(old('purpose') == $purpose->id) selected @endif>{{ $purpose->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_purpose') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="department">{{ __('field_department') }}</label>
                            <select class="form-control" name="department" id="department">
                                <option value="">{{ __('select') }}</option>
                                @foreach( $departments as $department )
                                <option value="{{ $department->id }}" @if(old('department') == $department->id) selected @endif>{{ $department->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_department') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="name">{{ __('field_name') }} <span>*</span></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_name') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="father_name">{{ __('field_father_name') }}</label>
                            <input type="text" class="form-control" name="father_name" id="father_name" value="{{ old('father_name') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_father_name') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="phone">{{ __('field_phone') }}</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_phone') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="email">{{ __('field_email') }}</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_email') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="visit_from">{{ __('field_visit_from') }}</label>
                            <input type="text" class="form-control" name="visit_from" id="visit_from" value="{{ old('visit_from') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_visit_from') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="persons">{{ __('field_persons') }} <span>*</span></label>
                            <input type="text" class="form-control autonumber" name="persons" id="persons" value="{{ old('persons') != null ? old('persons') : '1' }}" required data-v-max="9999" data-v-min="0">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_persons') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="date">{{ __('field_date') }} <span>*</span></label>
                            <input type="date" class="form-control date" name="date" id="date" value="{{ date('Y-m-d') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_date') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="in_time">{{ __('field_in_time') }} <span>*</span></label>
                            <input type="text" class="form-control time" name="in_time" id="in_time" value="{{ date('h:i A') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_in_time') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="out_time">{{ __('field_out_time') }}</label>
                            <input type="time" class="form-control time" name="out_time" id="out_time" value="{{ old('out_time') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_out_time') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="attach">{{ __('field_attach') }}</label>
                            <input type="file" class="form-control" name="attach" id="attach" value="{{ old('attach') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_attach') }}
                            </div>
                        </div>

                        <div class="form-group col-md-8">
                            <label for="note">{{ __('field_note') }}</label>
                            <textarea  class="form-control" name="note" id="note">{{ old('note') }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_note') }}
                            </div>
                        </div>
                        <!-- Form End -->
                      </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_save') }}</button>
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