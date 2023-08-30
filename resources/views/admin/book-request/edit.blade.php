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
                        <!-- Form Start -->
                        <fieldset class="row scheduler-border">
                        <div class="form-group col-md-4">
                            <label for="category">{{ __('field_category') }} <span>*</span></label>
                            <select class="form-control" name="category" id="category" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach( $categories as $category )
                                <option value="{{ $category->id }}" @if( $category->id == $row->category_id ) selected @endif>{{ $category->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_category') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="title">{{ __('field_title') }} <span>*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $row->title }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_title') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="isbn">{{ __('field_isbn') }}</label>
                            <input type="text" class="form-control" name="isbn" id="isbn" value="{{ $row->isbn }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_isbn') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="author">{{ __('field_author') }}</label>
                            <input type="text" class="form-control" name="author" id="author" value="{{ $row->author }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_author') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="publisher">{{ __('field_publisher') }}</label>
                            <input type="text" class="form-control" name="publisher" id="publisher" value="{{ $row->publisher }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_publisher') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="edition">{{ __('field_edition') }}</label>
                            <input type="text" class="form-control" name="edition" id="edition" value="{{ $row->edition }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_edition') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="publish_year">{{ __('field_publish_year') }}</label>
                            <input type="text" class="form-control" name="publish_year" id="publish_year" value="{{ $row->publish_year }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_publish_year') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="language">{{ __('field_language') }}</label>
                            <input type="text" class="form-control" name="language" id="language" value="{{ $row->language }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_language') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="price">{{ __('field_price') }} ({!! $setting->currency_symbol !!})</label>
                            <input type="text" class="form-control autonumber" name="price" id="price" value="{{ round($row->price) }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_price') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="quantity">{{ __('field_quantity') }}</label>
                            <input type="text" class="form-control autonumber" name="quantity" id="quantity" value="{{ $row->quantity }}" data-v-max="999999999" data-v-min="0">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_quantity') }}
                            </div>
                        </div>
                        </fieldset>

                        <fieldset class="row scheduler-border">
                        <legend>{{ __('field_request_by') }}</legend>
                        <div class="form-group col-md-4">
                            <label for="request_by">{{ __('field_name') }} <span>*</span></label>
                            <input type="text" class="form-control" name="request_by" id="request_by" value="{{ $row->request_by }}" required>

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
                        </fieldset>

                        <fieldset class="row scheduler-border">
                        <div class="form-group col-md-6">
                            <label for="description">{{ __('field_description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ $row->description }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_description') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="note">{{ __('field_note') }}</label>
                            <textarea class="form-control" name="note" id="note">{{ $row->note }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_note') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="status" class="form-label">{{ __('select_status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" @if( $row->status == 1 ) selected @endif>{{ __('status_pending') }}</option>
                                <option value="2" @if( $row->status == 2 ) selected @endif>{{ __('status_progress') }}</option>
                                <option value="3" @if( $row->status == 3 ) selected @endif>{{ __('status_approved') }}</option>
                                <option value="0" @if( $row->status == 0 ) selected @endif>{{ __('status_rejected') }}</option>
                            </select>
                        </div>
                        </fieldset>
                        <!-- Form End -->
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