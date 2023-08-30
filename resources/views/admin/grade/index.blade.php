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
                                <label for="title" class="form-label">{{ __('field_grade') }} <span>*</span></label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_grade') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="point" class="form-label">{{ __('field_point') }} <span>*</span></label>
                                <input type="text" class="form-control" name="point" id="point" value="{{ old('point') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_point') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="min_mark" class="form-label">{{ __('field_min_mark') }}(%) <span>*</span></label>
                                <input type="text" class="form-control" name="min_mark" id="min_mark" value="{{ old('min_mark') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_min_mark') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="max_mark" class="form-label">{{ __('field_max_mark') }}(%) <span>*</span></label>
                                <input type="text" class="form-control" name="max_mark" id="max_mark" value="{{ old('max_mark') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_max_mark') }}
                                </div>
                            </div>
                            <!-- Form End -->
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
                                        <th>{{ __('field_grade') }}</th>
                                        <th>{{ __('field_point') }}</th>
                                        <th>{{ __('field_min_mark') }}</th>
                                        <th>{{ __('field_max_mark') }}</th>
                                        <th>{{ __('field_status') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ number_format((float)$row->point, 2, '.', '') }}</td>
                                        <td>{{ number_format((float)$row->min_mark, 2, '.', '') }} %</td>
                                        <td>{{ number_format((float)$row->max_mark, 2, '.', '') }} %</td>
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