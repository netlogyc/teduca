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
                        <h5>{{ __('modal_add') }} / {{ __('modal_edit') }} {{ $title }}</h5>
                    </div>
                    <div class="card-block">
                        <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                        <a href="{{ route($route.'.create') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    <div class="card-block">
                        <form class="needs-validation" novalidate method="get" action="{{ route($route.'.create') }}">
                            <div class="row gx-2">
                                @include('common.inc.common_search_filter')

                                <div class="form-group col-md-3">
                                    <label for="type">{{ __('field_type') }} <span>*</span></label>
                                    <select class="form-control" name="type" id="type" required>
                                        <option value="">{{ __('select') }}</option>
                                        @foreach( $types as $type )
                                        <option value="{{ $type->id }}" @if( $selected_type == $type->id) selected @endif>{{ $type->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('field_type') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-info btn-filter"><i class="fas fa-search"></i> {{ __('btn_filter') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    @isset($rows)
                    <div class="card-block">
                        
                        @isset($rows)
                        @foreach($rows as $row)

                        <form class="needs-validation mt-5" novalidate action="{{ route($route.'.update', $row->id) }}" method="post" id="fields" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="row">

                                @include('admin.exam-routine.form_edit')

                                <input type="text" name="program" value="{{ $selected_program }}" hidden>
                                <input type="text" name="session" value="{{ $selected_session }}" hidden>
                                <input type="text" name="semester" value="{{ $selected_semester }}" hidden>
                                <input type="text" name="section" value="{{ $selected_section }}" hidden>
                                <input type="text" name="type" value="{{ $selected_type }}" hidden>

                                <div class="form-group col-6 col-md-3">
                                    <button type="submit" class="btn btn-success btn-filter"><i class="fas fa-check"></i> {{ __('btn_update') }}</button>
                                </div>

                                @can($access.'-delete')
                                <div class="form-group col-6 col-md-3">
                                    <button type="button" class="btn btn-danger btn-filter" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $row->id }}">
                                        <i class="fas fa-trash-alt"></i> {{ __('btn_remove') }}
                                    </button>
                                </div>
                                @endcan

                            </div>
                        </form>

                        @can($access.'-delete')
                        <!-- Include Delete modal -->
                        @include('admin.layouts.inc.delete')
                        @endcan
                        @endforeach
                        @endisset

                        <form action="{{ route($route.'.store') }}" class="needs-validation mt-5 btn-submit" novalidate method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            
                            @include('admin.exam-routine.form_field')

                            <input type="text" name="program" value="{{ $selected_program }}" hidden>
                            <input type="text" name="session" value="{{ $selected_session }}" hidden>
                            <input type="text" name="semester" value="{{ $selected_semester }}" hidden>
                            <input type="text" name="section" value="{{ $selected_section }}" hidden>
                            <input type="text" name="type" value="{{ $selected_type }}" hidden>

                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-success btn-filter"><i class="fas fa-check"></i> {{ __('btn_save') }}</button>
                            </div>
                        </div>
                        </form>
                   </div>
                   @endisset
                </div>
                
            </div>
            <!-- [ Card ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection
