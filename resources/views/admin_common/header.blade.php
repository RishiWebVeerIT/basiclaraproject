  <?php $notification =App\Models\Notification::where('status',1)->get(); ?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('frontend_assets/img/Cactus_logo.png')}}" alt="">
        <span class="d-none d-lg-block">Cactus Fitness {{Session::get('UserName');}}</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

      <li class="nav-item dropdown" id='notificationdiv'>

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            @if(count($notification))
            <span class="badge bg-primary badge-number">{{count($notification)}}</span>
            @endif
          </a><!-- End Notification Icon -->
        @if(count($notification))
  
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have {{count($notification)}} new notifications
              <a href="{{Route('admin.enquiry')}}"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
@foreach($notification as $n)
            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>{{$n->heading}}</h4>
                <p>{{$n->message}}</p>
                <p>
                @if($n->created_at->diff(date('d-m-Y h:i:s'))->format('%H') != 0)
                  {{$n->created_at->diff(date('d-m-Y h:i:s'))->format('%H')}} hr ago
                @elseif($n->created_at->diff(date('d-m-Y h:i:s'))->format('%I') != 0)
                  {{$n->created_at->diff(date('d-m-Y h:i:s'))->format('%I')}} min ago
                @elseif($n->created_at->diff(date('d-m-Y h:i:s'))->format('%S') != 0)
                  {{$n->created_at->diff(date('d-m-Y h:i:s'))->format('%S')}} s ago
                @endif
                </p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
@endforeach
            <li class="dropdown-footer" >
              <span><button class="btn btn-info" onclick="clear_notification()">Clear all notifications</button></span>
            </li>

          </ul><!-- End Notification Dropdown Items -->
        @endif
        </li><!-- End Notification Nav -->


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth()->user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{Auth()->user()->name}}</h6>
              <span>{{Auth()->user()->designation}}</span>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('admin.profile')}}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="logout_confirmation(event)">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->