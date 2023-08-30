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
                        <h5>{{ $title }} {{ __('list') }}</h5>
                    </div>
                    <div class="card-block">
                        <form class="needs-validation" novalidate method="get" action="{{ route($route .'.index') }}">
                            <div class="row gx-2">
                                <div class="form-group col-md-3">
                                    <label for="session">{{ __('field_session') }}</label>
                                    <select class="form-control" name="session" id="session">
                                        <option value="0">{{ __('all') }}</option>
                                        @foreach( $sessions as $session )
                                        <option value="{{ $session->session_id }}" @if( $selected_session == $session->session_id) selected @endif>{{ $session->session->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('field_session') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="semester">{{ __('field_semester') }}</label>
                                    <select class="form-control" name="semester" id="semester">
                                        <option value="0">{{ __('all') }}</option>
                                        @foreach( $semesters as $semester )
                                        <option value="{{ $semester->semester_id }}" @if( $selected_semester == $semester->semester_id) selected @endif>{{ $semester->semester->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('field_semester') }}
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
                                        <th>{{ __('field_session') }}</th>
                                        <th>{{ __('field_semester') }}</th>
                                        <th>{{ __('field_start_date') }}</th>
                                        <th>{{ __('field_end_date') }}</th>
                                        <th>{{ __('field_status') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                  @if($row->assignment->status == 1)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        @php
                                        $unread = 0;
                                        $user = Auth::guard('student')->user();
                                        foreach ($user->unreadNotifications as $notification) {
                                            if($notification->data['type'] == 'assignment' && $notification->data['id'] == $row->assignment->id) {
                                                $unread = 1;
                                            }
                                        }
                                        @endphp
                                        <td>
                                            @if($unread == 1)
                                            <a href="{{ route($route.'.show', $row->id) }}"><b>{!! str_limit($row->assignment->title ?? '', 50, ' ...') !!}</b></a>
                                            @else
                                            <a href="{{ route($route.'.show', $row->id) }}">{!! str_limit($row->assignment->title ?? '', 50, ' ...') !!}</a>
                                            @endif
                                        </td>
                                        <td>{{ $row->assignment->subject->code ?? '' }}</td>
                                        <td>{{ $row->studentEnroll->session->title ?? '' }}</td>
                                        <td>{{ $row->studentEnroll->semester->title ?? '' }}</td>
                                        <td>
                                            @if(isset($setting->date_format))
                                            {{ date($setting->date_format, strtotime($row->assignment->start_date)) }}
                                            @else
                                            {{ date("Y-m-d", strtotime($row->assignment->start_date)) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($setting->date_format))
                                            {{ date($setting->date_format, strtotime($row->assignment->end_date)) }}
                                            @else
                                            {{ date("Y-m-d", strtotime($row->assignment->end_date)) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if( $row->attendance == 1 )
                                            <span class="badge badge-pill badge-success">{{ __('status_submitted') }}</span>
                                            @else
                                            <span class="badge badge-pill badge-primary">{{ __('status_pending') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                  @endif
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