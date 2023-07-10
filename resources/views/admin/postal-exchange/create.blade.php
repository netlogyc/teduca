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
                        <div class="form-group d-inline col-md-4">
                            <label for="type">{{ __('field_type') }} <span>*</span></label>
                            <br/>

                            <div class="radio radio-success d-inline">
                                <input type="radio" name="type" value="1" id="import" checked required>
                                <label for="import" class="cr">{{ __('exchange_type_import') }}</label>
                            </div>

                            <div class="radio radio-danger d-inline">
                                <input type="radio" name="type" value="2" id="export" required>
                                <label for="export" class="cr">{{ __('exchange_type_export') }}</label>
                            </div>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_type') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="category">{{ __('field_category') }} <span>*</span></label>
                            <select class="form-control" name="category" id="category" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach( $categories as $category )
                                <option value="{{ $category->id }}" @if(old('category') == $category->id) selected @endif>{{ $category->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_category') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="title">{{ __('field_title') }} <span>*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_title') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="reference">{{ __('field_reference') }}</label>
                            <input type="text" class="form-control" name="reference" id="reference" value="{{ old('reference') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_reference') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="from">{{ __('field_from') }}</label>
                            <input type="text" class="form-control" name="from" id="from" value="{{ old('from') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_from') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="to">{{ __('field_to') }}</label>
                            <input type="text" class="form-control" name="to" id="to" value="{{ old('to') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_to') }}
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
                            <label for="attach">{{ __('field_attach') }}</label>
                            <input type="file" class="form-control" name="attach" id="attach" value="{{ old('attach') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_attach') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="status" class="form-label">{{ __('select_status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" @if( old('status') == 1 ) selected @endif>{{ __('status_on_hold') }}</option>
                                <option value="2" @if( old('status') == 2 ) selected @endif>{{ __('status_progress') }}</option>
                                <option value="3" @if( old('status') == 3 ) selected @endif>{{ __('status_received') }}</option>
                                <option value="4" @if( old('status') == 4 ) selected @endif>{{ __('status_delivered') }}</option>
                            </select>
                        </div>

                        <div class="form-group col-md-8">
                            <label for="note">{{ __('field_note') }}</label>
                            <textarea class="form-control" name="note" id="note">{{ old('note') }}</textarea>

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