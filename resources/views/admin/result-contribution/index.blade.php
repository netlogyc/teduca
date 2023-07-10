@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }}</h5>
                        <span>Total contribution of final result must be equal to 100%</span>
                    </div>
                    <div class="card-block row">
                        
                        <!-- Form Start -->
                        <input name="id" type="hidden" value="{{ (isset($row)) ? $row->id : '-1' }}">

                        @foreach($exams as $key => $exam)
                        <input type="text" name="exams[]" value="{{ $exam->id }}" hidden>

                        <div class="form-group col-md-4">
                            <label for="exam-{{ $key }}">{{ $exam->title }} (%) <span>*</span></label>
                            <input type="text" class="form-control" name="contributions[]" id="exam-{{ $key }}" value="{{ round($exam->contribution, 2) }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ $exam->title }}
                            </div>
                        </div>
                        @endforeach

                        <div class="form-group col-md-4">
                            <label for="attendances">{{ __('field_attendance') }} (%) <span>*</span></label>
                            <input type="text" class="form-control" name="attendances" id="attendances" value="{{ isset($row->attendances)?round($row->attendances, 2):'' }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_attendance') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="assignments">{{ __('field_assignment') }} (%) <span>*</span></label>
                            <input type="text" class="form-control" name="assignments" id="assignments" value="{{ isset($row->assignments)?round($row->assignments, 2):'' }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_assignment') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="activities">{{ __('field_activities') }} (%) <span>*</span></label>
                            <input type="text" class="form-control" name="activities" id="activities" value="{{ isset($row->activities)?round($row->activities, 2):'' }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_activities') }}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">@isset($row) <i class="fas fa-check"></i> {{ __('btn_update') }} @else <i class="fas fa-check"></i> {{ __('btn_save') }} @endif</button>
                    </div>

                </div>
                </form>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection