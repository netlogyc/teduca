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
                        <form class="needs-validation" novalidate method="get" action="{{ route($route.'.index') }}">
                            <div class="row gx-2">
                                @include('common.inc.student_search_filter')

                                <div class="form-group col-md-3">
                                    <label for="student_id">{{ __('field_student_id') }}</label>
                                    <input type="text" class="form-control" name="student_id" id="student_id" value="{{ $selected_student_id }}">

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_student_id') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-info btn-filter"><i class="fas fa-search"></i> {{ __('btn_search') }}</button>
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
                            <table id="basic-table" class="display table nowrap table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('field_route') }}</th>
                                        <th>{{ __('field_vehicle') }}</th>
                                        <th>{{ __('field_student_id') }}</th>
                                        <th>{{ __('field_name') }}</th>
                                        <th>{{ __('field_gender') }}</th>
                                        <th>{{ __('field_batch') }}</th>
                                        <th>{{ __('field_program') }}</th>
                                        <th>{{ __('field_phone') }}</th>
                                        <th>{{ __('field_status') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->transport->transportRoute->title ?? '' }}</td>
                                        <td>{{ $row->transport->transportVehicle->number ?? '' }}</td>
                                        <td>
                                            @isset($row->student_id)
                                            <a href="{{ route('admin.student.show', $row->id) }}">
                                            #{{ $row->student_id ?? '' }}
                                            </a>
                                            @endisset
                                        </td>
                                        <td>{{ $row->first_name }} {{ $row->last_name }}</td>
                                        <td>
                                            @if( $row->gender == 1 )
                                            {{ __('gender_male') }}
                                            @elseif( $row->gender == 2 )
                                            {{ __('gender_female') }}
                                            @elseif( $row->gender == 3 )
                                            {{ __('gender_other') }}
                                            @endif
                                        </td>
                                        <td>{{ $row->batch->title ?? '' }}</td>
                                        <td>{{ $row->program->shortcode ?? '' }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>
                                            @if(isset($row->transport))
                                            @if( $row->transport->status == 1 )
                                            <span class="badge badge-pill badge-success">{{ __('status_active') }}</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">{{ __('status_canceled') }}</span>
                                            @endif
                                            @else
                                            <span class="badge badge-pill badge-primary">{{ __('status_pending') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                        @can($access.'-create')
                                        @if(isset($row->transport))
                                        @if($row->transport->status == 1)
                                            <button class="btn btn-sm btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal-{{ $row->id }}"><i class="fas fa-times"></i></button>
                                            @include($view.'.cancel')
                                        @else
                                            <button class="btn btn-sm btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#addModal-{{ $row->id }}"><i class="fas fa-plus"></i></button>
                                            @include($view.'.create')
                                        @endif
                                        @else
                                            <button class="btn btn-sm btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#addModal-{{ $row->id }}"><i class="fas fa-plus"></i></button>
                                            @include($view.'.create')
                                        @endif
                                        @endcan
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