<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(isset($setting))
    <!-- App Title -->
    <title>{{ $title }} | {{ $setting->meta_title ?? '' }}</title>

    @if(is_file('uploads/setting/'.$setting->favicon_path))
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('uploads/setting/'.$setting->favicon_path) }}" type="image/x-icon">
    @endif
    @endif

    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('dashboard/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- toastr css -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/toastr/css/toastr.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}" type="text/css" media="screen, print">

    @php 
    $version = App\Models\Language::version(); 
    @endphp
    @if($version->direction == 1)
    <!-- RTL css -->
    <link rel="stylesheet" href="{{ asset('dashboard/css/layouts/rtl.css') }}" type="text/css" media="screen, print">
    @endif

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

    <style type="text/css">
        a, a:hover, a:focus, a:active {
            text-decoration: none !important;
            background: transparent !important;
        }
        .btn-info, .btn-info:hover, .btn-info:focus, .btn-info:active {
            background: #3ebfea !important;
            border-color: #3ebfea !important;
        }
        .btn-success, .btn-success:hover, .btn-success:focus, .btn-success:active {
            background: #1de9b6 !important;
            border-color: #1de9b6 !important;
        }
        .btn-danger, .btn-danger:hover, .btn-danger:focus, .btn-danger:active {
            background: #f44236 !important;
            border-color: #f44236 !important;
        }
        .pcoded-header .navbar-nav > li span.top-icon, 
        .pcoded-header .main-search .input-group {
            margin-top: 20px;
        }
    </style>

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
    <nav class="pcoded-navbar drp-icon-style3 active-lightblue title-lightblue navbar-lightblue brand-lightblue navbar-image-4 menu-item-icon-style5 {{\Cookie::get('sidebar')}}">
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
                <!-- Language -->
                <li>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
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
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="far fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="{{ asset('uploads/user/'.Auth::user()->photo) }}" class="img-radius" alt="User Profile" onerror="this.src='{{ asset('dashboard/images/user/avatar-2.jpg') }}';">
                                <span>{{ Auth::user()->name }}</span>

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
                                        
                    <!-- Start Content-->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ Data table ] start -->
                                <div class="col-sm-12">
                                    <div class="card">
                                        @can($access.'-create')
                                        <div class="card-header">
                                            <form class="needs-validation" novalidate method="POST" action="{{ route('admin.translations.create') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col">
                                                        <a href="{{ route($route.'.index') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                                                    </div>
                                                    <div class="form-group col">
                                                        <input type="text" name="key" class="form-control" placeholder="{{ __('field_key') }}..." required>

                                                        <div class="invalid-feedback">
                                                          {{ __('required_field') }} {{ __('field_key') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col">
                                                        <input type="text" name="value" class="form-control" placeholder="{{ __('field_value') }}..." required>

                                                        <div class="invalid-feedback">
                                                          {{ __('required_field') }} {{ __('field_value') }}
                                                        </div>

                                                    </div>
                                                    <div class="form-group col">
                                                        <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> {{ __('btn_add_new') }}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        @endcan
                                        <div class="card-block">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('field_key') }}</th>

                                                            @if($languages->count() > 0)
                                                                @foreach($languages as $language)
                                                                    <th>{{ $language->name }}({{ $language->code }})</th>
                                                                @endforeach
                                                            @endif

                                                            @can($access.'-delete')
                                                            <th>{{ __('field_action') }}</th>
                                                            @endcan
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @if($columnsCount > 0)
                                                        @foreach($columns[0] as $columnKey => $columnValue)
                                                            <tr>
                                                                <td><a href="#" class="translate-key" data-title="Enter Key" data-type="text" data-pk="{{ $columnKey }}" data-url="{{ route('admin.translation.update.json.key') }}">{{ $columnKey }}</a></td>

                                                                @for($i=1; $i<=$columnsCount; ++$i)

                                                                <td><a href="#" data-title="Enter Translate" class="translate" data-code="{{ $columns[$i]['lang'] }}" data-type="textarea" data-pk="{{ $columnKey }}" data-url="{{ route('admin.translation.update.json') }}">{{ isset($columns[$i]['data'][$columnKey]) ? $columns[$i]['data'][$columnKey] : '' }}</a></td>

                                                                @endfor

                                                                @can($access.'-delete')
                                                                <td><button data-action="{{ route('admin.translations.destroy', $columnKey) }}" class="btn btn-icon btn-danger btn-sm remove-key"><i class="fas fa-trash-alt"></i></button></td>
                                                                @endcan
                                                            </tr>
                                                        @endforeach
                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ Data table ] end -->
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


<!-- Required Js -->
<script src="{{ asset('dashboard/plugins/jquery/js/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/popper/js/popper.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/jquery-scrollbar/js/perfect-scrollbar.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<script src="{{ asset('dashboard/js/pcoded.min.js') }}"></script>

<!-- toastr Js -->
<script src="{{ asset('dashboard/plugins/toastr/js/toastr.min.js') }}"></script>
<!-- Toastr message display -->
@toastr_render

<script type="text/javascript">
    @if($errors->any())
        @foreach($errors->all() as $error)
            toastr["error"]("{{ $error }}");
        @endforeach
    @endif
</script>

<script type="text/javascript">
    "use strict";
    $.ajaxSetup({
        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.translate').editable({
        params: function(params) {

            params.code = $(this).editable().data('code');
            return params;
        }
    });

    $('.translate-key').editable({
        validate: function(value) {

            if($.trim(value) == '') {

                return 'Key is required';
            }
        }
    });

    $('body').on('click', '.remove-key', function(){
        var cObj = $(this);

        if (confirm("Are you sure want to remove this item?")) {
            $.ajax({
                url: cObj.data('action'),
                method: 'DELETE',
                success: function(data) {

                    cObj.parents("tr").remove();
                    // alert("Your imaginary file has been deleted.");
                }
            });
        }
    });
</script>

</body>
</html>