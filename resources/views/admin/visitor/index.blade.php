@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }} {{ __('list') }}</h5>
                    </div>
                    <div class="card-block">
                        @can($access.'-create')
                        <a href="{{ route($route.'.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('btn_add_new') }}</a>
                        @endcan

                        <a href="{{ route($route.'.index') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    <div class="card-block">
                        <form class="needs-validation" novalidate method="get" action="{{ route($route.'.index') }}">
                            <div class="row gx-2">
                                <div class="form-group col-md-2">
                                    <label for="purpose">{{ __('field_purpose') }}</label>
                                    <select class="form-control" name="purpose" id="purpose">
                                        <option value="">{{ __('all') }}</option>
                                        @foreach( $purposes as $purpose )
                                        <option value="{{ $purpose->id }}" @if($selected_purpose == $purpose->id) selected @endif>{{ $purpose->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_purpose') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="department">{{ __('field_department') }}</label>
                                    <select class="form-control" name="department" id="department">
                                        <option value="">{{ __('all') }}</option>
                                        @foreach( $departments as $department )
                                        <option value="{{ $department->id }}" @if($selected_department == $department->id) selected @endif>{{ $department->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_department') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="token">{{ __('field_token') }}</label>
                                    <input type="text" class="form-control" name="token" id="token" value="{{ $selected_token }}">

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_token') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="start_date">{{ __('field_from_date') }}</label>
                                    <input type="date" class="form-control date" name="start_date" id="start_date" value="{{ $selected_start_date }}" required>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_from_date') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="end_date">{{ __('field_to_date') }}</label>
                                    <input type="date" class="form-control date" name="end_date" id="end_date" value="{{ $selected_end_date }}" required>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_to_date') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-info btn-filter"><i class="fas fa-search"></i> {{ __('btn_filter') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="export-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('field_name') }}</th>
                                        <th>{{ __('field_purpose') }}</th>
                                        <th>{{ __('field_department') }}</th>
                                        <th>{{ __('field_token') }}</th>
                                        <th>{{ __('field_date') }}</th>
                                        <th>{{ __('field_in_time') }}</th>
                                        <th>{{ __('field_out_time') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->purpose->title ?? '' }}</td>
                                        <td>{{ $row->department->title ?? '' }}</td>
                                        <td>{{ $row->token }}</td>
                                        <td>
                                            @if(isset($setting->date_format))
                                            {{ date($setting->date_format, strtotime($row->date)) }}
                                            @else
                                            {{ date("Y-m-d", strtotime($row->date)) }}
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge badge-pill badge-success">
                                            @if(isset($setting->time_format))
                                            {{ date($setting->time_format, strtotime($row->in_time)) }}
                                            @else
                                            {{ date("h:i A", strtotime($row->in_time)) }}
                                            @endif
                                            </span>
                                        </td>
                                        <td>
                                            @if(isset($row->out_time))
                                            <span class="badge badge-pill badge-danger">
                                            @if(isset($setting->time_format))
                                            {{ date($setting->time_format, strtotime($row->out_time)) }}
                                            @else
                                            {{ date("h:i A", strtotime($row->out_time)) }}
                                            @endif
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(empty($row->out_time))
                                            @can($access.'-print')
                                            @if(isset($print))
                                            <a href="#" class="btn btn-dark btn-sm" onclick="PopupWin('{{ route($route.'.token.print', $row->id) }}', '{{ $title }}', 800, 500);">
                                                <i class="fas fa-print"></i> {{ __('field_token') }}
                                            </a>
                                            @endif
                                            @endcan

                                            <button type="button" class="btn btn-icon btn-secondary btn-sm" title="Visitor Exit" data-bs-toggle="modal" data-bs-target="#confirmModal-{{ $row->id }}">
                                                <i class="fas fa-sign-out-alt"></i>
                                            </button>
                                            <!-- Include Confirm modal -->
                                            @include($view.'.confirm')
                                            <br/>
                                            @endif

                                            <button type="button" class="btn btn-icon btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#showModal-{{ $row->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <!-- Include Show modal -->
                                            @include($view.'.show')

                                            @if(is_file('uploads/'.$path.'/'.$row->attach))
                                            <a href="{{ asset('uploads/'.$path.'/'.$row->attach) }}" class="btn btn-icon btn-dark btn-sm" download><i class="fas fa-download"></i></a>
                                            @endif

                                            @can($access.'-edit')
                                            <a href="{{ route($route.'.edit', $row->id) }}" class="btn btn-icon btn-primary btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
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