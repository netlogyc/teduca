@extends('student.layouts.master')
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
                    <div class="card-body">
                        {{-- <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-info-tab" data-bs-toggle="pill" href="#pills-info" role="tab" aria-controls="pills-info" aria-selected="true">{{ __('tab_profile_info') }}</a>
                            </li>
                        </ul> --}}
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                                @include('student.profile.show')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Card ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection