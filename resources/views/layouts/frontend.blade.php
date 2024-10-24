<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cactus Fitness | {{$pageTitle}}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend_assets/img/Cactus_logo.png')}}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/flaticon.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/barfiller.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
    @stack('style')
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

@include('user_common.header')

 

    @yield('section')

  
    @include('user_common.footer')
    
    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->


    <!-- BMI model Begin -->
    <div class="BMI-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="BMI-close-switch">+</div>
            <form class="BMI-model-form">
                <div id="bmi_result"></div>
            </form>
        </div>
    </div>
    <!-- Search model end -->

    

    <!-- Js Plugins -->
    <script src="{{ asset('frontend_assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/masonry.pkgd.min.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/jquery.barfiller.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@stack('script')

@if (Session::has('success'))
<script>
  Swal.fire('Success','{{Session::get('success')}}','success',{
    button:true,
    button:'OK',
  })
</script>
@endif

@if (Session::has('error'))
<script>
  Swal.fire('Error','{{Session::get('error')}}','error',{
    button:true,
    button:'OK',
  })
</script>
@endif

@if (Session::has('info'))
<script>
  Swal.fire('Info','{{Session::get('info')}}','info',{
    button:true,
    button:'OK',
  })
</script>
@endif

@if (Session::has('warning'))
<script>
  Swal.fire('Warning','{{Session::get('warning')}}','warning',{
    button:true,
    button:'OK',
  })
</script>
@endif

</body>

</html>