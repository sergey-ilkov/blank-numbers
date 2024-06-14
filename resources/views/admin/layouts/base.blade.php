<!DOCTYPE html>
<html lang="uk">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{__('Admin panel')}}</title>

    <link rel="icon" type="image/png" href="{{ asset('images/admin/favicon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">


    @stack('css')
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">


    @stack('js')
    <script src="{{ asset('js/admin/admin.js') }}" defer></script>

</head>

<body>


    <div class="wrapper">


        <x-admin.alert-page></x-admin.alert-page>





        <div class="admin-panel">

            @include('admin.includes.aside')

            <div class="admin-panel-content">

                @include('admin.includes.header')


                @yield('content')
            </div>



        </div>




    </div>


</body>

</html>