@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Card ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }}</h5>
                    </div>
                    
                    @can($access.'-create')
                    <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-block">
                      <div class="row gx-2">
                        <!-- Form Start -->
                        @include('common.inc.notify_search_filter')

                        <div class="form-group col-md-12">
                            <label for="message" class="form-label">{{ __('field_message') }} <span>*</span></label>
                            <textarea class="form-control" name="message" id="message" rows="4" required>{{ old('message') }}</textarea>
                            <div class="alert alert-secondary" role="alert">
                                {{ __('field_shortcode') }}: 
                                [first_name] [last_name] [student_id] [batch] [faculty] [program] [session] [semester] [section] [father_name] [mother_name] [email] [phone]
                            </div>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_message') }}
                            </div>
                        </div>
                        <!-- Form End -->
                      </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> {{ __('btn_send') }}</button>
                    </div>
                    </form>
                    @endcan
                </div>
            </div>
            <!-- [ Card ] end -->
        </div>

        <div class="row">
            <!-- [ Card ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="basic-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('field_faculty') }}</th>
                                        <th>{{ __('field_program') }}</th>
                                        <th>{{ __('field_session') }}</th>
                                        <th>{{ __('field_semester') }}</th>
                                        <th>{{ __('field_section') }}</th>
                                        <th>{{ __('field_student') }}</th>
                                        <th>{{ __('field_date') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            @if($row->faculty_id == 0)
                                            {{ __('all') }}
                                            @endif
                                            @if(isset($row->faculty->title))
                                            {{ $row->faculty->shortcode ?? $row->faculty->title }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->program_id == 0)
                                            {{ __('all') }}
                                            @endif
                                            @if(isset($row->program->title))
                                            {{ $row->program->shortcode ?? $row->program->title }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->session_id == 0)
                                            {{ __('all') }}
                                            @endif
                                            @if(isset($row->session->title))
                                            {{ $row->session->title }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->semester_id == 0)
                                            {{ __('all') }}
                                            @endif
                                            @if(isset($row->semester->title))
                                            {{ $row->semester->title }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->section_id == 0)
                                            {{ __('all') }}
                                            @endif
                                            @if(isset($row->section->title))
                                            {{ $row->section->title }}
                                            @endif
                                        </td>
                                        <td>{{ $row->receive_count }}</td>
                                        <td>
                                            @if(isset($setting->date_format))
                                            {{ date($setting->date_format, strtotime($row->created_at)) }}
                                            @else
                                            {{ date("Y-m-d", strtotime($row->created_at)) }}
                                            @endif

                                            | 

                                            @if(isset($setting->time_format))
                                            {{ date($setting->time_format, strtotime($row->created_at)) }}
                                            @else
                                            {{ date("h:i A", strtotime($row->created_at)) }}
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#showModal-{{ $row->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <!-- Include Show modal -->
                                            @include($view.'.show')

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