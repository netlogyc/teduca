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
                                    <label for="hostel">{{ __('field_hostel') }}</label>
                                    <select class="form-control" name="hostel" id="hostel">
                                        <option value="">{{ __('all') }}</option>
                                        @foreach( $hostels as $hostel )
                                        <option value="{{ $hostel->id }}" @if($selected_hostel == $hostel->id) selected @endif>{{ $hostel->name }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_hostel') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="room_type">{{ __('field_type') }}</label>
                                    <select class="form-control" name="room_type" id="room_type">
                                        <option value="">{{ __('all') }}</option>
                                        @foreach( $room_types as $room_type )
                                        <option value="{{ $room_type->id }}" @if($selected_room_type == $room_type->id) selected @endif>{{ $room_type->title }}</option>
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
                    
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="export-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('field_room') }} {{ __('field_no') }}</th>
                                        <th>{{ __('field_hostel') }}</th>
                                        <th>{{ __('field_type') }}</th>
                                        <th>{{ __('field_total') }} {{ __('field_bed') }}</th>
                                        <th>{{ __('status_available') }}</th>
                                        {{-- <th>{{ __('field_fee') }}</th> --}}
                                        <th>{{ __('field_status') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->hostel->name ?? '' }}</td>
                                        <td>{{ $row->roomType->title ?? '' }}</td>
                                        <td>{{ $row->bed }}</td>
                                        <td>{{ $row->bed - $row->hostelMembers->where('status', '1')->count() }}</td>
                                        {{-- <td>{{ round($row->fee, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</td> --}}
                                        <td>
                                            @if( $row->status == 1 )
                                            <span class="badge badge-pill badge-success">{{ __('status_active') }}</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">{{ __('status_inactive') }}</span>
                                            @endif
                                        </td>
                                        <td>
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