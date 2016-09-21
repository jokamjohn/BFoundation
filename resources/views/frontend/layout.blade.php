<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.partials.links')
    @include('employer.backend.partials.backend-css')

    <title>{{ config('app.name') }}@yield('title')</title>

</head>
<body>

@include('frontend.partials.nav')

@yield('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="/js/sweetalert-dev.js"></script>
{{--<script src="js/javascript.js"></script>--}}
</body>
</html>
