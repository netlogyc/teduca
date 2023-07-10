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
                        <a href="{{ route($route.'.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('btn_add_new') }}</a>
                        @endcan

                        <a href="{{ route($route.'.index') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="basic-table" class="display table nowrap table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('field_library_id') }}</th>
                                        <th>{{ __('field_name') }}</th>
                                        <th>{{ __('field_occupation') }}</th>
                                        <th>{{ __('field_phone') }}</th>
                                        <th>{{ __('field_status') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>#{{ $row->member->library_id ?? '' }}</td>
                                        <td>{{ $row->first_name }} {{ $row->last_name }}</td>
                                        <td>{{ $row->occupation }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>
                                            @if(isset($row->member))
                                            @if( $row->member->status == 1 )
                                            <span class="badge badge-pill badge-success">{{ __('status_active') }}</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">{{ __('status_inactive') }}</span>
                                            @endif
                                            @else
                                            <span class="badge badge-pill badge-primary">{{ __('status_pending') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                        @if(isset($row->member))
                                        @if($row->member->status == 1)

                                            @can($access.'-card')
                                            @if(isset($print))
                                            <a href="#" class="btn btn-sm btn-icon btn-warning" onclick="PopupWin('{{ route($route.'.card', $row->member->id) }}', '{{ $title }}', 800, 500);">
                                                <i class="fas fa-address-card"></i>
                                            </a>
                                            @endif
                                            @endcan
                                            
                                            <button class="btn btn-sm btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal-{{ $row->id }}"><i class="fas fa-times"></i></button>
                                            @include($view.'.cancel')
                                        @else
                                            <button class="btn btn-sm btn-icon btn-success" data-bs-toggle="modal" data-bs-target="#approveModal-{{ $row->id }}"><i class="fas fa-check"></i></button>
                                            @include($view.'.approve')
                                        @endif
                                        @endif

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