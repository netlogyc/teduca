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
                    <div class="card-body">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-info-tab" data-bs-toggle="pill" href="#pills-info" role="tab" aria-controls="pills-info" aria-selected="true">{{ __('tab_profile_info') }}</a>
                            </li>
                            @can($access.'-edit')
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">{{ __('tab_profile_update') }}</a>
                            </li>
                            @endcan
                            @can($access.'-account')
                            <li class="nav-item">
                                <a class="nav-link" id="pills-account-tab" data-bs-toggle="pill" href="#pills-account" role="tab" aria-controls="pills-account" aria-selected="false">{{ __('tab_account_update') }}</a>
                            </li>
                            @endcan
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                                @include('admin.profile.show')
                            </div>
                            @can($access.'-edit')
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                @include('admin.profile.edit')
                            </div>
                            @endcan
                            @can($access.'-account')
                            <div class="tab-pane fade" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
                                @include('admin.profile.account')
                            </div>
                            @endcan
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