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
                        <h5>{{ $title }}</h5>
                    </div>
                    <div class="card-block">
                        @can($access.'-create')
                        <a href="{{ route($route.'.create') }}" class="btn btn-primary"><i class="far fa-edit"></i> {{ __('modal_add') }} / {{ __('modal_edit') }}</a>
                        @endcan

                        <a href="{{ route($route.'.index') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>

                        @can($access.'-print')
                        @if(isset($print) && isset($rows))

                        <button type="button" class="btn btn-dark" onclick="document.getElementById('print-routine').submit()">
                            <i class="fas fa-print"></i> {{ __('btn_print') }}
                        </button>

                        <form id="print-routine" target="_blank" method="post" action="{{ route($route.'.print') }}" hidden>
                            @csrf
                            <input type="hidden" name="program" value="{{ $selected_program }}">
                            <input type="hidden" name="session" value="{{ $selected_session }}">
                            <input type="hidden" name="semester" value="{{ $selected_semester }}">
                            <input type="hidden" name="section" value="{{ $selected_section }}">
                            <input type="hidden" name="type" value="{{ $selected_type }}">
                        </form>
                        @endif
                        @endcan
                    </div>

                    <div class="card-block">
                        <form class="needs-validation" novalidate method="get" action="{{ route($route.'.index') }}">
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
                    @if(isset($rows))
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="basic-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('field_subject') }}</th>
                                        <th>{{ __('field_teacher') }}</th>
                                        <th>{{ __('field_room') }}</th>
                                        <th>{{ __('field_date') }}</th>
                                        <th>{{ __('field_start_time') }}</th>
                                        <th>{{ __('field_end_time') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rows as $key => $row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->subject->code ?? '' }} - {{ $row->subject->title ?? '' }}</td>
                                        <td>
                                            @foreach($row->users as $teacher)
                                            {{ $teacher->staff_id }} - {{ $teacher->first_name }} {{ $teacher->last_name }}@if($loop->last) @else , @endif<br/>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($row->rooms as $room)
                                            {{ $room->title }}@if($loop->last) @else , @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @if(isset($setting->date_format))
                                            {{ date($setting->date_format, strtotime($row->date)) }}
                                            @else
                                            {{ date("Y-m-d", strtotime($row->date)) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($setting->time_format))
                                            {{ date($setting->time_format, strtotime($row->start_time)) }}
                                            @else
                                            {{ date("h:i A", strtotime($row->start_time)) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($setting->time_format))
                                            {{ date($setting->time_format, strtotime($row->end_time)) }}
                                            @else
                                            {{ date("h:i A", strtotime($row->end_time)) }}
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                    @endif

                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection