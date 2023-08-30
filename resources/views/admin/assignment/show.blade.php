@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $row->title }}</h5>
                    </div>
                    <div class="card-block">
                        <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                        <a href="{{ route($route.'.show', $row->id) }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>
                    <div class="card-block">
                    <!-- Details View Start -->
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_subject') }}:</mark> {{ $row->subject->code ?? '' }} - {{ $row->subject->title ?? '' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_faculty') }}:</mark> 
                                    @if($row->faculty_id == 0)
                                    {{ __('all') }}
                                    @endif
                                    @if(isset($row->faculty->title))
                                    {{ $row->faculty->title ?? '' }}
                                    @endif
                                </p><hr/>
                                <p><mark class="text-primary">{{ __('field_program') }}:</mark> 
                                    @if($row->program_id == 0)
                                    {{ __('all') }}
                                    @endif
                                    @if(isset($row->program->title))
                                    {{ $row->program->title ?? '' }}
                                    @endif
                                </p><hr/>
                                <p><mark class="text-primary">{{ __('field_session') }}:</mark> 
                                    @if($row->session_id == 0)
                                    {{ __('all') }}
                                    @endif
                                    @if(isset($row->session->title))
                                    {{ $row->session->title ?? '' }}
                                    @endif
                                </p><hr/>
                                <p><mark class="text-primary">{{ __('field_semester') }}:</mark> 
                                    @if($row->semester_id == 0)
                                    {{ __('all') }}
                                    @endif
                                    @if(isset($row->semester->title))
                                    {{ $row->semester->title ?? '' }}
                                    @endif
                                </p><hr/>
                                <p><mark class="text-primary">{{ __('field_section') }}:</mark> 
                                    @if($row->section_id == 0)
                                    {{ __('all') }}
                                    @endif
                                    @if(isset($row->section->title))
                                    {{ $row->section->title ?? '' }}
                                    @endif
                                </p><hr/>
                            </div>
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_total_marks') }}:</mark> {{ round($row->total_marks, 2) }}</p><hr/>
                                
                                <p><mark class="text-primary">{{ __('field_start_date') }}:</mark> 
                                    @if(isset($setting->date_format))
                                    {{ date($setting->date_format, strtotime($row->start_date)) }}
                                    @else
                                    {{ date("Y-m-d", strtotime($row->start_date)) }}
                                    @endif
                                </p><hr/>
                                <p><mark class="text-primary">{{ __('field_end_date') }}:</mark> 
                                    @if(isset($setting->date_format))
                                    {{ date($setting->date_format, strtotime($row->end_date)) }}
                                    @else
                                    {{ date("Y-m-d", strtotime($row->end_date)) }}
                                    @endif
                                </p><hr/>

                                <p><mark class="text-primary">{{ __('field_recorded_by') }}:</mark> #{{ $row->teacher->staff_id ?? '' }}</p><hr/>

                                @if(is_file('uploads/'.$path.'/'.$row->attach))
                                <a href="{{ asset('uploads/'.$path.'/'.$row->attach) }}" class="btn btn-dark" download><i class="fas fa-download"></i> {{ __('field_attach') }}</a>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><mark class="text-primary">{{ __('field_description') }}:</mark> {!! $row->description !!}</p><hr/>
                            </div>
                        </div>
                    </div>
                    <!-- Details View End -->
                    </div>
                </div>
            </div>
        </div>

        @can($access.'-marking')
        <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <form class="needs-validation" novalidate action="{{ route($route.'.marking') }}" method="post" enctype="multipart/form-data">
                @csrf

                @if(count($row->students) > 0)
                <div class="card-block">
                    <div class="form-group d-inline">
                        <button type="button" class="btn btn-dark btn-print">
                            <i class="fas fa-print"></i> {{ __('btn_print') }}
                        </button>
                    </div>

                    <!-- [ Data table ] start -->
                    <div class="table-responsive">
                        <table class="display table nowrap table-striped table-hover printable">
                            <thead>
                                <tr>
                                    <th>{{ __('field_student_id') }}</th>
                                    <th>{{ __('field_name') }}</th>
                                    <th>{{ __('field_status') }}</th>
                                    <th>{{ __('field_submission') }} {{ __('field_date') }}</th>
                                    <th>{{ __('field_attach') }}</th>
                                    <th>
                                        {{ __('field_max_marks') }}
                                        @if(isset($row->total_marks))
                                         ({{ round($row->total_marks, 2) }})
                                        @endif
                                     </th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach( $row->students->sortBy('student_id') as $key => $stuAss )
                                <input type="hidden" name="assignments[]" value="{{ $stuAss->id }}">
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.student.show', $stuAss->studentEnroll->student->id) }}">
                                        #{{ $stuAss->studentEnroll->student->student_id }}
                                        </a>
                                    </td>
                                    <td>{{ $stuAss->studentEnroll->student->first_name ?? '' }} {{ $stuAss->studentEnroll->student->last_name ?? '' }}</td>
                                    <td>
                                        @if( $stuAss->attendance == 1 )
                                        <span class="badge badge-pill badge-success">{{ __('status_submitted') }}</span>
                                        @else
                                        <span class="badge badge-pill badge-danger">{{ __('status_pending') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($stuAss->attendance == 1 && !empty($stuAss->date))
                                        @if(isset($setting->date_format))
                                        {{ date($setting->date_format, strtotime($stuAss->date)) }}
                                        @else
                                        {{ date("Y-m-d", strtotime($stuAss->date)) }}
                                        @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if(is_file('uploads/'.$path.'/'.$stuAss->attach))
                                        <a href="https://docs.google.com/viewer?url={{ asset('uploads/'.$path.'/'.$stuAss->attach) }}" target="_blank" class="btn btn-icon btn-sm btn-success"><i class="fas fa-eye"></i></a>

                                        <a href="{{ asset('uploads/'.$path.'/'.$stuAss->attach) }}" target="_blank" class="btn btn-icon btn-sm btn-dark" download><i class="fas fa-download"></i></a>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="marks[]" id="marks" value="{{ $stuAss->marks ? round($stuAss->marks, 2) : '' }}" style="width: 100px;" data-v-max="{{ $row->total_marks ?? 0 }}" data-v-min="0" required>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- [ Data table ] end -->
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success update"><i class="fas fa-check"></i> {{ __('btn_update') }}</button>
                </div>
                @endif
                </form>
              </div>
            </div>
        </div>
        @endcan
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection