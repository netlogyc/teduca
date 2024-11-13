<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
         @include('registration.layouts.common.header_script')

    </head>
    <body>

        <div class="">
            @yield('content')
        </div>

        @include('registration.layouts.common.footer_script')
    </body>
</html>