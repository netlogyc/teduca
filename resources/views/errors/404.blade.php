<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
     @include('student.layouts.common.header_script')

</head>

<body>

    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar active-lightblue title-lightblue navbar-lightblue brand-lightblue navbar-image-4 menu-item-icon-style2 {{\Cookie::get('sidebar')}}">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                @if(isset($setting))
                @if(is_file('uploads/setting/'.$setting->logo_path))
                <a href="{{ route('student.dashboard.index') }}" class="b-brand">
                    <img src="{{ asset('uploads/setting/'.$setting->logo_path) }}" alt="logo">
                </a>
                @endif
                @endif
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            </div>


            @if(Request::is('student*'))
            <!--- Sidemenu -->
            @include('student.layouts.inc.sidebar')
            <!-- End Sidebar -->
            @endif

        </div>
    </nav>
    <!-- [ navigation menu ] end -->


    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed header-lightblue">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
            @if(isset($setting))
            @if(is_file('uploads/setting/'.$setting->logo_path))
            <a href="{{ route('student.dashboard.index') }}" class="b-brand">
                <div class="b-bg">
                    <img src="{{ asset('uploads/setting/'.$setting->logo_path) }}" alt="logo" height="20">
                </div>
            </a>
            @endif
            @endif
        </div>
        <a class="mobile-menu" id="mobile-header" href="#!">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li><a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
                <li>
                    <h4 class="topbar-title">{{ $setting->title }}</h4>
                </li>
            </ul>

            <!-- [ Auth Nav ] start -->
            @auth
            <ul class="navbar-nav ms-auto">
                <!-- Language -->
                <li>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            @php 
                            $version = App\Models\Language::version(); 
                            @endphp
                            <i class="fas fa-language"></i> {{ $version->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">{{ trans_choice('module_language', 2) }}</h6>
                            </div>
                            <ul class="noti-body">
                                @foreach($user_languages as $user_language)
                                <li class="notification @if(\Session()->get('locale') == $user_language->code) active @endif">
                                    <a class="language" href="{{ route('version', $user_language->code) }}">{{ $user_language->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
            @endauth
            <!-- [ Auth Nav ] end -->

        </div>
    </header>
    <!-- [ Header ] end -->


    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    
                    <!-- start page title -->
                    <!-- Include page breadcrumb -->
                    @include('student.layouts.inc.breadcrumb')
                    <!-- end page title -->
                    

                    <!-- Start Content-->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>{{ __('error_404_title') }}</h5>
                                        </div>
                                        <div class="card-block">
                                            {{-- <a href="{{ route('home') }}" class="btn btn-info">{{ __('btn_home') }}</a> --}}
                                        </div>
                                        <div class="card-block">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                    <!-- End Content-->

                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->


    @include('student.layouts.common.footer_script')

</body>
</html>