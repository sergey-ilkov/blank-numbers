<!DOCTYPE html>
<html lang="{{app()->currentLocale()}}">

<head>

    @include('includes.head')


    @include('includes.preloder')


    <link rel="stylesheet" href="{{ asset('css/style.css') . '?v=' . rand(10, 1000) }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"
        integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"
        integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg==" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>

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