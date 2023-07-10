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
                                <div class="form-group col-md-3">
                                    <label for="subject">{{ __('field_subject') }}</label>
                                    <select class="form-control select2" name="subject" id="subject">
                                        <option value="">{{ __('all') }}</option>
                                        @foreach( $subjects as $subject )
                                        <option value="{{ $subject->id }}" @if($selected_subject == $subject->id) selected @endif>{{ $subject->code }} - {{ $subject->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_subject') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="start_date">{{ __('field_from_date') }}</label>
                                    <input type="date" class="form-control date" name="start_date" id="start_date" value="{{ $selected_start_date }}" required>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_from_date') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="end_date">{{ __('field_to_date') }}</label>
                                    <input type="date" class="form-control date" name="end_date" id="end_date" value="{{ $selected_end_date }}" required>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_to_date') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-info btn-filter"><i class="fas fa-search"></i> {{ __('btn_filter') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="basic-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('field_title') }}</th>
                                        <th>{{ __('field_subject') }}</th>
                                        <th>{{ __('field_total_marks') }}</th>
                                        <th>{{ __('field_start_date') }}</th>
                                        <th>{{ __('field_end_date') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <a href="{{ route($route.'.show', $row->id) }}">{!! str_limit($row->title, 50, ' ...') !!}</a>
                                        </td>
                                        <td>{{ $row->subject->code ?? '' }}</td>
                                        <td>{{ round($row->total_marks, 2) }}</td>
                                        <td>
                                            @if(isset($setting->date_format))
                                            {{ date($setting->date_format, strtotime($row->start_date)) }}
                                            @else
                                            {{ date("Y-m-d", strtotime($row->start_date)) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($setting->date_format))
                                            {{ date($setting->date_format, strtotime($row->end_date)) }}
                                            @else
                                            {{ date("Y-m-d", strtotime($row->end_date)) }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route($route.'.show', $row->id) }}" class="btn btn-icon btn-success btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>

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