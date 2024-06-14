<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Admin panel') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('images/admin/favicon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css"> --}}
    
    <link rel="stylesheet" href=" {{ asset('css/admin/admin.css') }}  ">

</head>

<body>
  <div class="wrapper">

    <div class="main">

        <section class="auth-login">
    
            @yield('auth-content')
    
        </section>
        
    </div>


  

    
    
  </div>





</body>

</html>