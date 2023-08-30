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
                            <label for="name">{{ __('field_name') }} <span>*</span></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $row->name }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_name') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="phone">{{ __('field_phone') }}</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ $row->phone }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_phone') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="email">{{ __('field_email') }}</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $row->email }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_email') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="date">{{ __('field_date') }} <span>*</span></label>
                            <input type="date" class="form-control date" name="date" id="date" value="{{ $row->date }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_date') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="follow_up_date">{{ __('field_next_follow_up_date') }}</label>
                            <input type="date" class="form-control date" name="follow_up_date" id="follow_up_date" value="{{ $row->follow_up_date }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_next_follow_up_date') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="assigned">{{ __('field_assigned') }}</label>
                            <select class="form-control select2" name="assigned" id="assigned">
                                <option value="">{{ __('select') }}</option>
                                @foreach( $users as $assigned )
                                <option value="{{ $assigned->id }}" @if($row->assigned == $assigned->id) selected @endif>{{ $assigned->staff_id }} - {{ $assigned->first_name }} {{ $assigned->last_name }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_assigned') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="address">{{ __('field_address') }}</label>
                            <textarea class="form-control" name="address" id="address">{{ $row->address }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_address') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="purpose">{{ __('field_purpose') }}</label>
                            <textarea class="form-control" name="purpose" id="purpose">{{ $row->purpose }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_purpose') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="note" class="form-label">{{ __('field_note') }}</label>
                            <textarea class="form-control" name="note" id="note">{{ $row->note }}</textarea>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="reference">{{ __('field_reference') }}</label>
                            <select class="form-control" name="reference" id="reference">
                                <option value="">{{ __('select') }}</option>
                                @foreach( $references as $reference )
                                <option value="{{ $reference->id }}" @if($row->reference_id == $reference->id) selected @endif>{{ $reference->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_reference') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="source">{{ __('field_source') }}</label>
                            <select class="form-control" name="source" id="source">
                                <option value="">{{ __('select') }}</option>
                                @foreach( $sources as $source )
                                <option value="{{ $source->id }}" @if($row->source_id == $source->id) selected @endif>{{ $source->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_source') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="program">{{ __('field_program') }} <span>*</span></label>
                            <select class="form-control" name="program" id="program" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach( $programs as $program )
                                <option value="{{ $program->id }}" @if($row->program_id == $program->id) selected @endif>{{ $program->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_program') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="status" class="form-label">{{ __('select_status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" @if( $row->status == 1 ) selected @endif>{{ __('status_pending') }}</option>
                                <option value="2" @if( $row->status == 2 ) selected @endif>{{ __('status_progress') }}</option>
                                <option value="3" @if( $row->status == 3 ) selected @endif>{{ __('status_resolved') }}</option>
                                <option value="0" @if( $row->status == 0 ) selected @endif>{{ __('status_closed') }}</option>
                            </select>
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