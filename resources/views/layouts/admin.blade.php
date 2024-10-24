<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cactus Fitness - Admin - {{$pageTitle}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="{{ asset('frontend_assets/img/Cactus_logo.png')}}" rel="icon">
  <link href="{{ asset('frontend_assets/img/Cactus_logo.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">

  
  @stack('style')
</head>

<body>


  @include('admin_common.header')
  @include('admin_common.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>{{$pageTitle}}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">{{$pageTitle}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    @yield('section')

  </main><!-- End #main -->

 @include('admin_common.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
 
 
    <!-- jQuery (necessary for Toastr) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Toastr JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <!-- Vendor JS Files -->

  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js')}}"></script>
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

<script>
  function logout_confirmation(e){
    e.preventDefault();

    var url = e.currentTarget.getAttribute('href');

    Swal.fire({
  title: "Are you sure?",
  text: "Are you sure to Logout ?",
  icon: "question",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, Logout!"
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href=url;
  }
});

  }
</script>

<script>
  setInterval(function() { 
    $("#notificationdiv").load(location.href + " #notificationdiv");
    $("#example").load(location.href + " #example");
  }, 30000);

  $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

function clear_notification(){
    console.log('Clicked');
    $.ajax({
        type: "POST",
        url: '/admin/console/clear-notification',

        data: { status:1}, 
        success: function( msg ) {
          $(document).ready(function() {
            Swal.fire('Success','Clear all Notifications','success',{
            button:true,
            button:'OK',
            })
            $("#notificationdiv").load(location.href + " #notificationdiv"); 
            $("#example").load(location.href + " #example");
        });
        }
    });
}



</script>
</body>

</html> 