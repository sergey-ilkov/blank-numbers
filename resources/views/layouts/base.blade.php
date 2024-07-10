<!DOCTYPE html>
<html lang="{{app()->currentLocale()}}">

<head>

    @include('includes.head')


    @include('includes.preloder')



    <link rel="stylesheet" href="{{ asset('css/style.css') . '?v=' . rand(10, 1000) }}">


    <script src="{{ asset('libs/gsap.min.js') }}" defer></script>
    <script src="{{ asset('libs/ScrollTrigger.min.js') }}" defer></script>

    <script src="{{ asset('js/script.js') . '?v=' . rand(10, 1000)  }}" defer></script>

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