@extends('student.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }}</h5>
                    </div>
                    <div class="card-block">
                        <a href="{{ route($route.'.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('btn_add_new') }}</a>

                        <a href="{{ route($route.'.index') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="basic-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('field_leave_subject') }}</th>
                                        <th>{{ __('field_leave_date') }}</th>
                                        <th>{{ __('field_days') }}</th>
                                        <th>{{ __('field_apply_date') }}</th>
                                        <th>{{ __('field_status') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{!! str_limit(strip_tags($row->subject), 50, ' ...') !!}</td>
                                        <td>
                                            @if(isset($setting->date_format))
                                                {{ date($setting->date_format, strtotime($row->from_date)) }}
                                            @else
                                                {{ date("Y-m-d", strtotime($row->from_date)) }}
                                            @endif
                                            -
                                            @if(isset($setting->date_format))
                                                {{ date($setting->date_format, strtotime($row->to_date)) }}
                                            @else
                                                {{ date("Y-m-d", strtotime($row->to_date)) }}
                                            @endif
                                        </td>
                                        <td>{{ (int)((strtotime($row->to_date) - strtotime($row->from_date))/86400) + 1 }}</td>
                                        <td>
                                            @if(isset($setting->date_format))
                                                {{ date($setting->date_format, strtotime($row->apply_date)) }}
                                            @else
                                                {{ date("Y-m-d", strtotime($row->apply_date)) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if( $row->status == 1 )
                                            <span class="badge badge-pill badge-success">{{ __('status_approved') }}</span>
                                            @elseif( $row->status == 2 )
                                            <span class="badge badge-pill badge-danger">{{ __('status_rejected') }}</span>
                                            @else
                                            <span class="badge badge-pill badge-primary">{{ __('status_pending') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#showModal-{{ $row->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <!-- Include Show modal -->
                                            @include($view.'.show')

                                            @if(is_file('uploads/'.$path.'/'.$row->attach))
                                            <a href="{{ asset('uploads/'.$path.'/'.$row->attach) }}" class="btn btn-icon btn-dark btn-sm" download><i class="fas fa-download"></i></a>
                                            @endif
                                            
                                            @if($row->status == 0)
                                            <button type="button" class="btn btn-icon btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $row->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <!-- Include Delete modal -->
                                            @include('admin.layouts.inc.delete')
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