<!DOCTYPE html>
<html lang="{{app()->currentLocale()}}">

<head>    
    
    @include('includes.head')


    @include('includes.preloder')
    

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js" defer></script>

    <script src="{{ asset('js/script.js') }}" defer></script>

</head>

<body>

    <div id="preloader" class="preloader">
        <span class="preloader-circle"></span>
        <span class="square"></span>
    </div>

    <div class="wrapper page-{{ $page }}">

        @include('includes.header')
    
    <main class="main">

        @yield('content')
        
    </main>
    
        @include('includes.footer')
    
    </div>

    

</body>

</html>