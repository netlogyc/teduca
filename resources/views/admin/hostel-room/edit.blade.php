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
                            <label for="name" class="form-label">{{ __('field_room') }} {{ __('field_no') }} <span>*</span></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $row->name }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_room') }} {{ __('field_no') }}
                            </div>
                        </div>
                    
                        <div class="form-group col-md-4">
                            <label for="hostel">{{ __('field_hostel') }} <span>*</span></label>
                            <select class="form-control" name="hostel" id="hostel" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach( $hostels as $hostel )
                                <option value="{{ $hostel->id }}" @if($row->hostel_id == $hostel->id) selected @endif>{{ $hostel->name }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_hostel') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="room_type">{{ __('field_type') }} <span>*</span></label>
                            <select class="form-control" name="room_type" id="room_type" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach( $room_types as $room_type )
                                <option value="{{ $room_type->id }}" @if($row->room_type_id == $room_type->id) selected @endif>{{ $room_type->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_type') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="bed">{{ __('field_bed') }} <span>*</span></label>
                            <input type="text" class="form-control autonumber" name="bed" id="bed" value="{{ $row->bed }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_bed') }}
                            </div>
                        </div>

                        {{-- <div class="form-group col-md-4">
                            <label for="fee">{{ __('field_fee') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                            <input type="text" class="form-control" name="fee" id="fee" value="{{ round($row->fee) }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_fee') }}
                            </div>
                        </div> --}}

                        <div class="form-group col-md-4">
                            <label for="status" class="form-label">{{ __('select_status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" @if( $row->status == 1 ) selected @endif>{{ __('status_active') }}</option>
                                <option value="0" @if( $row->status == 0 ) selected @endif>{{ __('status_inactive') }}</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">{{ __('field_description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ $row->description }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_description') }}
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