@extends('student.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $row->assignment->title ?? '' }}</h5>
                    </div>
                    <div class="card-block">
                        <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>
                    </div>
                    <div class="card-block">
                    <!-- Details View Start -->
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_subject') }}:</mark> {{ $row->assignment->subject->code ?? '' }} - {{ $row->assignment->subject->title ?? '' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_session') }}:</mark> {{ $row->studentEnroll->session->title ?? '' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_semester') }}:</mark> {{ $row->studentEnroll->semester->title ?? '' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_section') }}:</mark> {{ $row->studentEnroll->section->title ?? '' }}</p><hr/>
                            </div>
                            <div class="col-md-6">
                                @if(!empty($row->marks))
                                <p><mark class="text-primary">{{ __('field_marks_obtained') }}:</mark> {{ round($row->marks, 2) }}</p><hr/>
                                @endif

                                <p><mark class="text-primary">{{ __('field_max_marks') }}:</mark> {{ round($row->assignment->total_marks ?? 0, 2) }}</p><hr/>
                                
                                <p><mark class="text-primary">{{ __('field_start_date') }}:</mark> 
                                    @if(isset($setting->date_format))
                                    {{ date($setting->date_format, strtotime($row->assignment->start_date)) }}
                                    @else
                                    {{ date("Y-m-d", strtotime($row->assignment->start_date)) }}
                                    @endif
                                </p><hr/>
                                <p><mark class="text-primary">{{ __('field_end_date') }}:</mark> 
                                    @if(isset($setting->date_format))
                                    {{ date($setting->date_format, strtotime($row->assignment->end_date)) }}
                                    @else
                                    {{ date("Y-m-d", strtotime($row->assignment->end_date)) }}
                                    @endif
                                </p><hr/>

                                @if(!empty($row->date))
                                <p><mark class="text-primary">{{ __('field_submission') }} {{ __('field_date') }}:</mark> 
                                    @if(isset($setting->date_format))
                                    {{ date($setting->date_format, strtotime($row->date)) }}
                                    @else
                                    {{ date("Y-m-d", strtotime($row->date)) }}
                                    @endif
                                </p><hr/>
                                @endif

                                <p><mark class="text-primary">{{ __('field_status') }}:</mark> 

                                    @if( $row->attendance == 1 )
                                    <span class="badge badge-pill badge-success">{{ __('status_submitted') }}</span>
                                    @else
                                    <span class="badge badge-pill badge-primary">{{ __('status_pending') }}</span>
                                    @endif
                                </p><hr/>

                                @if(is_file('uploads/'.$path.'/'.$row->assignment->attach))
                                <a href="{{ asset('uploads/'.$path.'/'.$row->assignment->attach) }}" class="btn btn-dark" download><i class="fas fa-download"></i> {{ __('field_attach') }}</a>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><mark class="text-primary">{{ __('field_description') }}:</mark> {!! $row->assignment->description !!}</p><hr/>
                            </div>
                        </div>
                    </div>
                    <!-- Details View End -->
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        @if(is_file('uploads/'.$path.'/'.$row->attach))
                        {{ __('field_your_file') }} : 
                        <a href="{{ asset('uploads/'.$path.'/'.$row->attach) }}" class="btn btn-dark" download><i class="fas fa-download"></i> {{ __('btn_download') }}</a>
                        @endif
                    </div>
                    @if($row->assignment->end_date >= date("Y-m-d"))
                    <div class="card-block">
                        <form class="needs-validation" novalidate action="{{ route($route.'.update', $row->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="attach">{{ __('field_upload_pdf') }}</label>
                            <input type="file" class="form-control" name="attach" id="attach" value="{{ old('attach') }}" accept=".pdf" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_upload_pdf') }}
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success"><i class="fas fa-upload"></i> {{ __('btn_upload') }}</button>
                        </form>
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