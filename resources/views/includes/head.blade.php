<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ __('seo.' . $page . '.title') }}</title>


@if ($page === 'offer' || $page === 'privacy')

<meta name="robots" content="noindex, nofollow">

@endif

 
<meta name="description" content="{{ __('seo.' . $page . '.desc') }}">
<meta name="keywords" content="{{ __('seo.' . $page . '.keywords') }}">
<meta name="image" content="{{ asset('images/logo.png') }}">
<meta property="og:type" content="website">
<meta property="og:title" content="{{ __('seo.' . $page . '.title') }}">
<meta property="og:description" content="{{ __('seo.' . $page . '.desc') }}">
<meta property="og:image" content="{{ asset('images/logo.png') }}">
<meta property="og:url" content="{{ route($page) }}">
<link rel="canonical" href="{{ route($page) }}">

<link hreflang="uk" href="{{ getUrlLanguage( 'uk' ) }}" rel="alternate">
<link hreflang="ru" href="{{ getUrlLanguage( 'ru' ) }}" rel="alternate">



<link rel="icon" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/favicons/apple-icon-60x60.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/favicons/apple-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/favicons/apple-icon-76x76.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/favicons/apple-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/favicons/apple-icon-120x120.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/favicons/apple-icon-144x144.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/favicons/apple-icon-152x152.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicons/apple-icon-180x180.png') }}">
<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicons/android-icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicons/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicons/favicon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicons/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('images/favicons/manifest.json') }}">
<meta name="msapplication-TileColor" content="#F9F7E8">
<meta name="msapplication-TileImage" content="{{ asset('images/favicons/ms-icon-144x144.png"') }}">
<meta name="theme-color" content="#F9F7E8">
<meta name="apple-mobile-web-app-title" content="{{ __('seo.' . $page . '.title') }}">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="address=no">

    