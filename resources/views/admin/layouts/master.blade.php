<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
     @include('admin.layouts.common.header_script')

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
                <a href="{{ route('admin.dashboard.index') }}" class="b-brand">
                    <img src="{{ asset('uploads/setting/'.$setting->logo_path) }}" alt="logo">
                </a>
                @endif
                @endif
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            </div>


            @if(Request::is('admin*'))
            <!--- Sidemenu -->
            @include('admin.layouts.inc.sidebar')
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
            <a href="{{ route('admin.dashboard.index') }}" class="b-brand">
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
                {{-- @can('student-attendance-create')
                <li><span class="top-icon"><a href="{{ route('admin.student-attendance.index') }}"><i class="fas fa-user-check"></i></a></span></li>
                @endcan

                @can('fees-student-due')
                <li><span class="top-icon"><a href="{{ route('admin.fees-student.index') }}"><i class="fas fa-money-bill-wave"></i></a></span></li>
                @endcan

                @canany(['book-issue-return-create', 'book-issue-return-view'])
                <li><span class="top-icon"><a href="{{ route('admin.issue-return.index') }}"><i class="fas fa-book-open"></i></a></span></li>
                @endcanany

                @canany(['visitor-create', 'visitor-view'])
                <li><span class="top-icon"><a href="{{ route('admin.visitor.create') }}"><i class="fas fa-calendar-check"></i></a></span></li>
                @endcanany

                @canany(['phone-log-create', 'phone-log-view'])
                <li><span class="top-icon"><a href="{{ route('admin.phone-log.index') }}"><i class="fas fa-phone"></i></a></span></li>
                @endcanany

                @can('setting-view')
                <li><span class="top-icon"><a href="{{ route('admin.setting.index') }}"><i class="fas fa-cog"></i></a></span></li>
                @endcan --}}

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

                <!-- Notification -->
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="icon feather icon-bell">
                            @if(!empty(Auth::guard('web')->user()->unreadNotifications))
                            @if(Auth::guard('web')->user()->unreadNotifications->count() > 0)
                            <span class="notification-active"></span>
                            @endif
                            @endif
                            </i>
                        </a>
                        @if(!empty(Auth::guard('web')->user()->unreadNotifications))
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">{{ trans_choice('module_notification', 2) }}</h6>
                            </div>
                            <ul class="noti-body">
                                @forelse(Auth::guard('web')->user()->unreadNotifications as $key => $notification)
                                @if($key < 10)
                                @php
                                    $notification_link = 'admin.dashboard.index';
                                    $notification_type = '';
                                    if($notification->data['type'] == 'content') {
                                    $notification_link = 'admin.content.index';
                                    $notification_type = trans_choice('module_content', 1);
                                    }
                                    elseif( $notification->data['type'] == 'notice') {
                                    $notification_link = 'admin.notice.index';
                                    $notification_type = trans_choice('module_notice', 1);
                                    }
                                @endphp
                                <li class="notification">
                                    <a class="media" href="{{ route($notification_link) }}">
                                        <div class="media-body">
                                            <p><strong>{{ $notification->data['title'] }}</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>{{ $notification->created_at->diffForHumans() }}</span></p>
                                            <p><i class="fas fa-arrow-circle-right"></i> {{ $notification_type }}</p>
                                        </div>
                                    </a>
                                </li>
                                @endif
                                @empty
                                <li class="notification">{{ __('status_no_notification') }}</li>
                                @endforelse
                            </ul>
                        </div>
                        @endif
                    </div>
                </li>

                <!-- Profile -->
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="far fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="{{ asset('uploads/user/'.Auth::user()->photo) }}" class="img-radius" alt="User Profile" @if(Auth::user()->gender == 1) onerror="this.src='{{ asset('dashboard/images/user/avatar-2.jpg') }}';" @else  onerror="this.src='{{ asset('dashboard/images/user/avatar-1.jpg') }}';" @endif>
                                <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>

                                <a href="javascript:void(0);" class="dud-logout" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    
                                    <i class="feather icon-log-out"></i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>

                            </div>
                            <ul class="pro-body">
                                @can('profile-view')
                                <li><a href="{{ route('admin.profile.index') }}" class="dropdown-item"><i class="feather icon-user"></i> {{ trans_choice('module_profile', 2) }}</a></li>
                                @endcan
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


    <!-- [ chat user list ] start -->
    <section class="header-user-list">
        <div class="h-list-header">
            <div class="input-group">
                <input type="text" id="search-friends" class="form-control" placeholder="Search Friend . . .">
            </div>
        </div>
        <div class="h-list-body">
            <a href="#!" class="h-close-text"><i class="feather icon-chevrons-right"></i></a>
            <div class="main-friend-cont scroll-div">
                <div class="main-friend-list">

                </div>
            </div>
        </div>
    </section>
    <!-- [ chat user list ] end -->

    <!-- [ chat message ] start -->
    <section class="header-chat">
        <div class="h-list-header">
            <h6></h6>
            <a href="#!" class="h-back-user-list"><i class="feather icon-chevron-left"></i></a>
        </div>
        <div class="h-list-body">
            <div class="main-chat-cont scroll-div">
                <div class="main-friend-chat">
                    <div class="media chat-messages">
                        
                        <div class="media-body chat-menu-content">
                            
                        </div>
                    </div>
                    <div class="media chat-messages">
                        <div class="media-body chat-menu-reply">
                            
                        </div>
                    </div>
                    <div class="media chat-messages">
                        
                        <div class="media-body chat-menu-content">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ chat message ] end -->


    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    
                    <!-- start page title -->
                    <!-- Include page breadcrumb -->
                    @include('admin.layouts.inc.breadcrumb')
                    <!-- end page title -->
                    

                    <!-- Start Content-->
                    @yield('content')
                    <!-- End Content-->

                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->


    @include('admin.layouts.common.footer_script')

</body>
</html>