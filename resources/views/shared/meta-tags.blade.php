<meta charset="utf-8">

<!-- Facebook Open Graph Tags -->
<meta name="og:type" content="blog">
<meta name="og:site_name" content="{{ config('app.name') }}">
@yield('og-title')
@yield('og-image')
@yield('og-description')

<!-- SEO Tags -->
{{--<meta name="keywords" content="{{ config('app.seo') }}">--}}
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="{{ config('app.name') }}">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
{{--<meta name="description" content="{{ config('app.description') }}">--}}

<link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">