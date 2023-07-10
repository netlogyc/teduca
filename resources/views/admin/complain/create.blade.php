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
                            <label for="type">{{ __('field_type') }} <span>*</span></label>
                            <select class="form-control" name="type" id="type" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach( $types as $type )
                                <option value="{{ $type->id }}" @if(old('type') == $type->id) selected @endif>{{ $type->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_type') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="source">{{ __('field_source') }}</label>
                            <select class="form-control" name="source" id="source">
                                <option value="">{{ __('select') }}</option>
                                @foreach( $sources as $source )
                                <option value="{{ $source->id }}" @if(old('source') == $source->id) selected @endif>{{ $source->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_source') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="name">{{ __('field_complain_by') }} <span>*</span></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_complain_by') }}
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
                            <label for="date">{{ __('field_date') }} <span>*</span></label>
                            <input type="date" class="form-control date" name="date" id="date" value="{{ date('Y-m-d') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_date') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="action_taken">{{ __('field_action_taken') }}</label>
                            <input type="text" class="form-control" name="action_taken" id="action_taken" value="{{ old('action_taken') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_action_taken') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="assigned">{{ __('field_assigned') }}</label>
                            <select class="form-control select2" name="assigned" id="assigned">
                                <option value="">{{ __('select') }}</option>
                                @foreach( $users as $assigned )
                                <option value="{{ $assigned->id }}" @if(old('assigned') == $assigned->id) selected @endif>{{ $assigned->staff_id }} - {{ $assigned->first_name }} {{ $assigned->last_name }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_assigned') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="issue">{{ __('field_issue') }}</label>
                            <textarea class="form-control" name="issue" id="issue">{{ old('issue') }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_issue') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="note" class="form-label">{{ __('field_note') }}</label>
                            <textarea class="form-control" name="note" id="note">{{ old('note') }}</textarea>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="attach">{{ __('field_attach') }}</label>
                            <input type="file" class="form-control" name="attach" id="attach" value="{{ old('attach') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_attach') }}
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