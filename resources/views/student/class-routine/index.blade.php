@extends('student.layouts.master')
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
                                            {{ $row->teacher->first_name ?? '' }} {{ $row->teacher->last_name ?? '' }}
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