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
                        <!-- Form Start -->
                        <fieldset class="row scheduler-border">
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
                            <label for="isbn">{{ __('field_isbn') }} <span>*</span></label>
                            <input type="text" class="form-control" name="isbn" id="isbn" value="{{ old('isbn') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_isbn') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="author">{{ __('field_author') }} <span>*</span></label>
                            <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_author') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="publisher">{{ __('field_publisher') }}</label>
                            <input type="text" class="form-control" name="publisher" id="publisher" value="{{ old('publisher') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_publisher') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="edition">{{ __('field_edition') }}</label>
                            <input type="text" class="form-control" name="edition" id="edition" value="{{ old('edition') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_edition') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="publish_year">{{ __('field_publish_year') }}</label>
                            <input type="text" class="form-control" name="publish_year" id="publish_year" value="{{ old('publish_year') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_publish_year') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="language">{{ __('field_language') }}</label>
                            <input type="text" class="form-control" name="language" id="language" value="{{ old('language') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_language') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="price">{{ __('field_price') }} ({!! $setting->currency_symbol !!})</label>
                            <input type="text" class="form-control autonumber" name="price" id="price" value="{{ old('price') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_price') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="quantity">{{ __('field_quantity') }} <span>*</span></label>
                            <input type="text" class="form-control autonumber" name="quantity" id="quantity" value="{{ old('quantity') }}" required data-v-max="999999999" data-v-min="0">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_quantity') }}
                            </div>
                        </div>
                        </fieldset>

                        <fieldset class="row scheduler-border">
                        <legend>{{ __('field_location') }}</legend>
                        <div class="form-group col-md-4">
                            <label for="section">{{ __('field_rack') }}</label>
                            <input type="text" class="form-control" name="section" id="section" value="{{ old('section') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_rack') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="column">{{ __('field_column') }}</label>
                            <input type="text" class="form-control" name="column" id="column" value="{{ old('column') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_column') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="row">{{ __('field_row') }}</label>
                            <input type="text" class="form-control" name="row" id="row" value="{{ old('row') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_row') }}
                            </div>
                        </div>
                        </fieldset>

                        <fieldset class="row scheduler-border">
                        <div class="form-group col-md-6">
                            <label for="description">{{ __('field_description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_description') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="note">{{ __('field_note') }}</label>
                            <textarea class="form-control" name="note" id="note">{{ old('note') }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_note') }}
                            </div>
                        </div>
                        </fieldset>
                        <!-- Form End -->
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