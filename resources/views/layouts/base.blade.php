<!DOCTYPE html>
<html lang="{{app()->currentLocale()}}">

<head>

    @include('includes.head')


    @include('includes.preloder')


    <style>
        @font-face {
            font-family: "Fixel Display";
            src: url("/fonts/FixelDisplay-Regular.woff2") format("woff2"),
                url("/fonts/FixelDisplay-Regular.woff") format("woff");
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: "Fixel Display";
            src: url("/fonts/FixelDisplay-Medium.woff2") format("woff2"),
                url("/fonts/FixelDisplay-Medium.woff") format("woff");
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: "Fixel Display";
            src: url("/fonts/FixelDisplay-Bold.woff2") format("woff2"),
                url("/fonts/FixelDisplay-Bold.woff") format("woff");
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }
    </style>

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