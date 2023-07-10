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
                        <form class="needs-validation" novalidate method="get" action="{{ route($route.'.index') }}">
                            <div class="row gx-2">
                                <div class="form-group col-md-3">
                                    <label for="batch">{{ __('field_batch') }}</label>
                                    <select class="form-control" name="batch" id="batch">
                                        <option value="">{{ __('all') }}</option>
                                        @foreach( $batches as $batch )
                                        <option value="{{ $batch->id }}" @if($selected_batch == $batch->id) selected @endif>{{ $batch->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('field_batch') }}
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="program">{{ __('field_program') }}</label>
                                    <select class="form-control" name="program" id="program">
                                        <option value="">{{ __('all') }}</option>
                                        @foreach( $programs as $program )
                                        <option value="{{ $program->id }}" @if($selected_program == $program->id) selected @endif>{{ $program->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('field_program') }}
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
                    @isset($rows)
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="export-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('field_student_id') }}</th>
                                        <th>{{ __('field_name') }}</th>
                                        <th>{{ __('field_phone') }}</th>
                                        <th>{{ __('field_email') }}</th>
                                        <th>{{ __('field_batch') }}</th>
                                        <th>{{ __('field_program') }}</th>
                                        <th>{{ __('field_status') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.student.show', $row->id) }}">
                                            #{{ $row->student_id }}
                                            </a>
                                        </td>
                                        <td>{{ $row->first_name }} {{ $row->last_name }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->batch->title ?? '' }}</td>
                                        <td>{{ $row->program->shortcode ?? '' }}</td>
                                        <td>
                                            @foreach($row->statuses as $key => $status)
                                            <span class="badge badge-primary">{{ $status->title }}</span><br>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.student.show', $row->id) }}" class="btn btn-icon btn-success btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endisset
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection