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
                        <a href="{{ route($route.'.create') }}" class="btn btn-primary"><i class="fas fa-exchange"></i> {{ __('btn_transfer') }}</a>
                        @endcan

                        <a href="{{ route($route.'.index') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="basic-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('field_student_id') }}</th>
                                        <th>{{ __('field_transfer_id') }}</th>
                                        <th>{{ __('field_university_name') }}</th>
                                        <th>{{ __('field_date') }}</th>
                                        <th>{{ __('field_note') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>
                                            @isset($row->student->student_id)
                                            <a href="{{ route('admin.student.show', $row->student->id) }}">
                                            #{{ $row->student->student_id ?? '' }}
                                            </a>
                                            @endisset
                                        </td>
                                        <td>{{ $row->transfer_id }}</td>
                                        <td>{{ $row->university_name }}</td>
                                        <td>
                                            @if(isset($setting->date_format))
                                            {{ date($setting->date_format, strtotime($row->date)) }}
                                            @else
                                            {{ date("Y-m-d", strtotime($row->date)) }}
                                            @endif
                                        </td>
                                        <td>{{ $row->note }}</td>
                                        <td>
                                            @can($access.'-edit')
                                            <button type="button" class="btn btn-icon btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{ $row->id }}">
                                                <i class="far fa-edit"></i>
                                            </button>
                                            @include($view.'.edit')
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