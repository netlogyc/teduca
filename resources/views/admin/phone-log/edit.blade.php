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
                        <div class="form-group d-inline col-md-4">
                            <label for="field_call_type">{{ __('field_call_type') }} <span>*</span></label>
                            <br/>

                            <div class="radio radio-success d-inline">
                                <input type="radio" name="call_type" value="1" id="incoming-{{ $row->id }}" @if($row->call_type == 1) checked @endif required>
                                <label for="incoming-{{ $row->id }}" class="cr">{{ __('call_type_incoming') }}</label>
                            </div>

                            <div class="radio radio-danger d-inline">
                                <input type="radio" name="call_type" value="2" id="outgoing-{{ $row->id }}" @if($row->call_type == 2) checked @endif required>
                                <label for="outgoing-{{ $row->id }}" class="cr">{{ __('call_type_outgoing') }}</label>
                            </div>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_call_type') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="name" class="form-label">{{ __('field_name') }} <span>*</span></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $row->name }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_name') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="phone" class="form-label">{{ __('field_phone') }} <span>*</span></label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ $row->phone }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_phone') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="date" class="form-label">{{ __('field_date') }} <span>*</span></label>
                            <input type="date" class="form-control date" name="date" id="date" value="{{ $row->date }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_date') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="follow_up_date" class="form-label">{{ __('field_next_follow_up_date') }}</label>
                            <input type="date" class="form-control date" name="follow_up_date" id="follow_up_date" value="{{ $row->follow_up_date }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_next_follow_up_date') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="start_time" class="form-label">{{ __('field_start_time') }} <span>*</span></label>
                            <input type="time" class="form-control time" name="start_time" id="start_time" value="{{ $row->start_time }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_start_time') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="call_duration" class="form-label">{{ __('field_call_duration') }}</label>
                            <input type="text" class="form-control" name="call_duration" id="call_duration" value="{{ $row->call_duration }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_call_duration') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="purpose" class="form-label">{{ __('field_purpose') }} <span>*</span></label>
                            <input type="text" class="form-control" name="purpose" id="purpose" value="{{ $row->purpose }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_purpose') }}
                            </div>
                        </div>

                        <div class="form-group col-md-8">
                            <label for="note" class="form-label">{{ __('field_note') }}</label>
                            <textarea class="form-control" name="note" id="note">{{ $row->note }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_note') }}
                            </div>
                        </div>
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