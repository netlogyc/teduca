@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            @can($access.'-create')
            <div class="col-md-4">
                <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('btn_create') }} {{ $title }}</h5>
                        </div>
                        <div class="card-block">
                            <!-- Form Start -->
                            <div class="form-group">
                                <label for="faculty">{{ __('field_faculty') }} <span>*</span></label>
                                <select class="form-control" name="faculty" id="faculty" required>
                                    <option value="">{{ __('select') }}</option>
                                    @foreach( $faculties as $faculty )
                                    <option value="{{ $faculty->id }}" @if(old('faculty') == $faculty->id) selected @endif>{{ $faculty->title }}</option>
                                    @endforeach
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_faculty') }}
                                </div>
                            </div>

                            <div class="form-group">
                                {{-- <label for="title" class="form-label">Programa<span>*</span></label> --}}
                                <label for="title" class="form-label">{{ __('field_program') }} <span>*</span></label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_program') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="shortcode" class="form-label">{{ __('field_plan_estudios') }} <span>*</span></label>
                                <input type="text" class="form-control" name="shortcode" id="shortcode" value="{{ old('shortcode') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_plan_estudios') }}
                                </div>
                            </div>


                            {{-- custom --}}
                            <div class="form-group">
                                <label for="title_get" class="form-label">{{ __('field_title_get') }} <span>*</span></label>
                                <input type="text" class="form-control" name="title_get" id="title_get" value="{{ old('title_get') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_title_get') }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="code_snies" class="form-label">{{ __('field_code_snies') }} <span>*</span></label>
                                <input type="number" class="form-control" name="code_snies" id="code_snies" value="{{ old('code_snies') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_code_snies') }}
                                </div>
                            </div>
                            <div class="form-group">
                            {{-- <div class="form-group col-md-6"> --}}
                                <label for="validity_init" class="form-label">{{ __('validity_init') }} <span>*</span></label>
                                <input type="date" class="form-control date" name="validity_init" id="validity_init" value="{{ date('Y-m-d') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('validity_init') }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validity_end" class="form-label">{{ __('validity_end') }} <span>*</span></label>
                                <input type="date" class="form-control date" name="validity_end" id="validity_end" value="{{ date('Y-m-d') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('validity_end') }}
                                </div>
                            </div>
                            {{-- fin custom --}}
                                            


                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            @endcan
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }} {{ __('list') }}</h5>
                    </div>
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="basic-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('field_program') }}</th>
                                        <th>{{ __('field_plan_estudios') }}</th>
                                        <th>{{ __('field_faculty') }}</th>
                                        <th>{{ __('field_title_get') }}</th>
                                        <th>{{ __('field_code_snies') }}</th>
                                        <th>{{ __('validity_init') }}</th>
                                        <th>{{ __('validity_end') }}</th>
                                        {{-- <th>{{ __('field_registration') }}</th> --}}
                                        <th>{{ __('field_status') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->shortcode }}</td>
                                        <td>{{ $row->faculty->title ?? '' }}</td>
                                        <td>{{ $row->title_get }}</td>
                                        <td>{{ $row->code_snies }}</td>
                                        <td>{{ $row->validity_init }}</td>
                                        <td>{{ $row->validity_end }}</td>
                                        {{-- <td>
                                            @if( $row->registration == 1 )
                                            <span class="badge badge-primary">{{ __('status_open') }}</span>
                                            @else
                                            <span class="badge badge-warning">{{ __('status_close') }}</span>
                                            @endif
                                        </td> --}}
                                        <td>
                                            @if( $row->status == 1 )
                                            <span class="badge badge-pill badge-success">{{ __('status_active') }}</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">{{ __('status_inactive') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can($access.'-edit')
                                            <button type="button" class="btn btn-icon btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{ $row->id }}">
                                                <i class="far fa-edit"></i>
                                            </button>
                                            <!-- Include Edit modal -->
                                            @include($view.'.edit')
                                            @endcan

                                            @can($access.'-delete')
                                            <button type="button" class="btn btn-icon btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $row->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <!-- Include Delete modal -->
                                            @include('admin.layouts.inc.delete')
                                            @endcan
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection