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
                        </form>
                        @endif
                        @endcan
                    </div>

                    <div class="card-block">
                        <form class="needs-validation" novalidate method="get" action="{{ route($route .'.index') }}">
                            <div class="row gx-2">
                                @include('common.inc.common_search_filter')

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
                            <table class="table class-routine-table">
                                <thead>
                                    <tr>
                                        <th>{{ __('day_saturday') }}</th>
                                        <th>{{ __('day_sunday') }}</th>
                                        <th>{{ __('day_monday') }}</th>
                                        <th>{{ __('day_tuesday') }}</th>
                                        <th>{{ __('day_wednesday') }}</th>
                                        <th>{{ __('day_thursday') }}</th>
                                        <th>{{ __('day_friday') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $weekdays = array('1', '2', '3', '4', '5', '6', '7');
                                    @endphp
                                    <tr>
                                        @foreach($weekdays as $weekday)
                                        <td>
                                            @foreach($rows->where('day', $weekday) as $row)
                                            <div class="class-time">
                                            {{ $row->subject->code ?? '' }}<br>
                                            @if(isset($setting->time_format))
                                            {{ date($setting->time_format, strtotime($row->start_time)) }}
                                            @else
                                            {{ date("h:i A", strtotime($row->start_time)) }}
                                            @endif <br/> @if(isset($setting->time_format))
                                            {{ date($setting->time_format, strtotime($row->end_time)) }}
                                            @else
                                            {{ date("h:i A", strtotime($row->end_time)) }}
                                            @endif<br>
                                            {{ __('field_room') }}: {{ $row->room->title ?? '' }}<br>
                                            {{ $row->teacher->staff_id }} - {{ $row->teacher->first_name ?? '' }}
                                            </div>
                                            @endforeach
                                        </td>
                                        @endforeach
                                    </tr>
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