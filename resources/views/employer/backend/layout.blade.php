<!DOCTYPE html>
<html lang="en">
    <head>
        @include('shared.meta-tags')
        @yield('title')
        @include('employer.backend.partials.backend-css')
    </head>
    <body @if(Auth::check()) class="toggled sw-toggled" @endif>
        @if (Auth::guest())
            @yield('login')
        @else
            @include('employer.backend.partials.header')
            @yield('content')
            @include('shared.page-loader')
            @include('employer.backend.partials.footer')
        @endif
        @include('employer.backend.partials.backend-js')
        {{--@include('employer.backend.partials.search-js')--}}
        @yield('unique-js')
    </body>
</html>
