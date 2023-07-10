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
                                <label for="name">{{ __('field_name') }} <span>*</span></label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_name') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="code">{{ __('field_code') }} <span>*</span></label>
                                <input type="text" class="form-control" name="code" id="code" value="{{ old('code') }}" required>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_code') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="direction">{{ __('field_direction') }} <span>*</span></label>
                                <select class="form-control" name="direction" id="direction" required>
                                    <option value="0" @if(old('direction') == 0) selected @endif>{{ __('direction_ltr') }}</option>
                                    <option value="1" @if(old('direction') == 1) selected @endif>{{ __('direction_rtl') }}</option>
                                </select>

                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_direction') }}
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
                                        <th>{{ __('field_title') }}</th>
                                        <th>{{ __('field_code') }}</th>
                                        <th>{{ __('field_direction') }}</th>
                                        <th>{{ __('field_status') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->code }}</td>
                                        <td>
                                            @if($row->direction == 0)
                                            {{ __('direction_ltr') }}
                                            @elseif($row->direction == 1)
                                            {{ __('direction_rtl') }}
                                            @endif
                                        </td>
                                        <td>
                                            @if( $row->default == 1 )
                                            <span class="btn btn-primary btn-sm">{{ __('status_default') }}</span>
                                            @else
                                            <a href="{{ route($route.'.default', $row->id) }}" class="btn btn-secondary btn-sm">{{ __('status_not_default') }}</a>
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

                                            @if( $row->id != 1 && $row->default != 1 )
                                            @can($access.'-delete')
                                            <button type="button" class="btn btn-icon btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $row->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <!-- Include Delete modal -->
                                            @include('admin.layouts.inc.delete')
                                            @endcan
                                            @endif
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