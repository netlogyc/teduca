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
                                    <label for="program">{{ __('field_program') }}</label>
                                    <select class="form-control" name="program" id="program">
                                        <option value="">{{ __('all') }}</option>
                                        @foreach( $programs as $program )
                                        <option value="{{ $program->id }}" @if($selected_program == $program->id) selected @endif>{{ $program->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_program') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="reference">{{ __('field_reference') }}</label>
                                    <select class="form-control" name="reference" id="reference">
                                        <option value="">{{ __('all') }}</option>
                                        @foreach( $references as $reference )
                                        <option value="{{ $reference->id }}" @if($selected_reference == $reference->id) selected @endif>{{ $reference->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_reference') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="source">{{ __('field_source') }}</label>
                                    <select class="form-control" name="source" id="source">
                                        <option value="">{{ __('all') }}</option>
                                        @foreach( $sources as $source )
                                        <option value="{{ $source->id }}" @if($selected_source == $source->id) selected @endif>{{ $source->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_source') }}
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
                                        <th>{{ __('field_phone') }}</th>
                                        <th>{{ __('field_program') }}</th>
                                        <th>{{ __('field_source') }}</th>
                                        <th>{{ __('field_date') }}</th>
                                        <th>{{ __('field_next_follow_up_date') }}</th>
                                        <th>{{ __('field_assigned') }}</th>
                                        <th>{{ __('field_status') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{ $row->program->shortcode ?? '' }}</td>
                                        <td>{{ $row->source->title ?? '' }}</td>
                                        <td>
                                            @if(isset($setting->date_format))
                                                {{ date($setting->date_format, strtotime($row->date)) }}
                                            @else
                                                {{ date("Y-m-d", strtotime($row->date)) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($row->follow_up_date))
                                            @if(isset($setting->date_format))
                                                {{ date($setting->date_format, strtotime($row->follow_up_date)) }}
                                            @else
                                                {{ date("Y-m-d", strtotime($row->follow_up_date)) }}
                                            @endif
                                            @endif
                                        </td>
                                        <td>
                                            @isset($row->assign)
                                            <a href="{{ route('admin.user.show', $row->assign->id) }}">#{{ $row->assign->staff_id ?? '' }}</a>
                                            @endisset
                                        </td>
                                        <td>
                                            @if( $row->status == 1 )
                                            <span class="badge badge-pill badge-primary">{{ __('status_pending') }}</span>
                                            @elseif( $row->status == 2 )
                                            <span class="badge badge-pill badge-info">{{ __('status_progress') }}</span>
                                            @elseif( $row->status == 3 )
                                            <span class="badge badge-pill badge-success">{{ __('status_resolved') }}</span>
                                            @elseif( $row->status == 0 )
                                            <span class="badge badge-pill badge-danger">{{ __('status_closed') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown show d-inline-block">
                                                <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="statusMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-question"></i>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="statusMenuLink">
                                                    <a class="dropdown-item" href="#" onclick="document.getElementById('status_pending_{{ $row->id }}').submit();">{{ __('status_pending') }}</a>
                                                    <a class="dropdown-item" href="#" onclick="document.getElementById('status_progress_{{ $row->id }}').submit();">{{ __('status_progress') }}</a>
                                                    <a class="dropdown-item" href="#" onclick="document.getElementById('status_resolved_{{ $row->id }}').submit();">{{ __('status_resolved') }}</a>
                                                    <a class="dropdown-item" href="#" onclick="document.getElementById('status_closed_{{ $row->id }}').submit();">{{ __('status_closed') }}</a>
                                                </div>

                                                <form action="{{ route($route.'.status', $row->id) }}" method="post" id="status_pending_{{ $row->id }}">
                                                    @csrf
                                                    <input type="hidden" name="status" value="1">
                                                </form>
                                                <form action="{{ route($route.'.status', $row->id) }}" method="post" id="status_progress_{{ $row->id }}">
                                                    @csrf
                                                    <input type="hidden" name="status" value="2">
                                                </form>
                                                <form action="{{ route($route.'.status', $row->id) }}" method="post" id="status_resolved_{{ $row->id }}">
                                                    @csrf
                                                    <input type="hidden" name="status" value="3">
                                                </form>
                                                <form action="{{ route($route.'.status', $row->id) }}" method="post" id="status_closed_{{ $row->id }}">
                                                    @csrf
                                                    <input type="hidden" name="status" value="0">
                                                </form>
                                            </div>

                                            <button type="button" class="btn btn-icon btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#showModal-{{ $row->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <!-- Include Show modal -->
                                            @include($view.'.show')

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