<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CR Console</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('CR/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('CR/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('Student/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('Student/assets/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('Student/assets/vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" href="{{asset('Student/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('Student/assets/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{asset('Student/assets/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="{{asset('CR/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('CR/assets/images/favicon.ico')}}">
  <style type="text/css">/* Chart.js */

@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style></head>
  <body class="" style="background-color: rgba(240, 239, 239, 0.31);">
    <div class="container-scroller">

      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"  style="background-color:#00203FFF;">
          <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('css/crconsole.jpg')}}" alt="logo"></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('css/crconsole.jpg')}}" alt="logo"></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch"  style="background-color:#00203FFF;">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">

            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown show">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="true">

                <div class="nav-profile-text">
                  <p class="mb-1 text-black" style="color:#ADEFD1FF;">{{ Auth::user()->name }}</p><span class="availability-status online"></span>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown show" aria-labelledby="profileDropdown">

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>

            <li class="nav-item dropdown">

                <a href="{{route('notifications')}}"><i class="fas fa-bell fa-2x"></i></a>
                <span class="count-symbol bg-danger"></span>


            </li>


          </ul>

        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color:#00203FFF;">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">

                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column" style="color:#ADEFD1FF;">
                  Logged In As :   {{ Auth::user()->name }}
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item active" style="background-color:#00203FFF;">
              <a class="nav-link"  href="{{route('RegisteredCourses')}}" style="color:#ADEFD1FF;"><i class="fa fa-fw fa-user-circle" style="color:#ADEFD1FF;"></i>
                <span class="menu-title" style="color:#ADEFD1FF;">&nbsp;Dashboard</span>

              </a>
            </li>
            <li class="nav-item active" style="background-color:#00203FFF;" >
                <a class="nav-link" href="{{route('Course_Registration')}}" style="color:#ADEFD1FF;"><i style="color:#ADEFD1FF;" class="fas fa-address-book"></i>
                  <span class="menu-title" style="color:#ADEFD1FF;">&nbsp;Course Registration</span>

                </a>
              </li>
              <li class="nav-item active" style="background-color:#00203FFF;" >
                <a class="nav-link" href="{{route('notifications')}}" style="color:#ADEFD1FF;"><i class="fas fa-bell" style="color:#ADEFD1FF;"> </i>
                  <span class="menu-title" style="color:#ADEFD1FF;">&nbsp;Notifications</span>

                </a>
              </li>
              <li class="nav-item active" style="background-color:#00203FFF;">
                <a class="nav-link" href="{{route('ViewClassNotification')}}" style="color:#ADEFD1FF;"><i class="fas fa-envelope" style="color:#ADEFD1FF;"></i>
                  <span class="menu-title" style="color:#ADEFD1FF;">&nbsp;Send Notifications to Class</span>

                </a>
              </li>
              <li class="nav-item active" style="background-color:#00203FFF;" >
                <a class="nav-link" href="{{route('ViewCrToCoordinator')}}" style="color:#ADEFD1FF;"><i class="fas fa-envelope" style="color:#ADEFD1FF;"></i>
                  <span class="menu-title" style="color:#ADEFD1FF;">&nbsp;Send Message to Coordinator</span>

                </a>
              </li>
              <li class="nav-item active" style="background-color:#00203FFF;">
                <a class="nav-link" href="{{route('ViewCoordinatorToCr')}}" style="color:#ADEFD1FF;"><i class="fas fa-inbox" style="color:#ADEFD1FF;"></i>
                  <span class="menu-title" style="color:#ADEFD1FF;">&nbsp;View Message From Coordinator</span>

                </a>
              </li>
              <li class="nav-item active" style="background-color:#00203FFF;">
                <a class="nav-link" href="{{route('getStudentMessage')}}" style="color:#ADEFD1FF;"><i class="fas fa-inbox" style="color:#ADEFD1FF;"></i>
                  <span class="menu-title" style="color:#ADEFD1FF;">&nbsp;View Message From Students</span>

                </a>
              </li>
              <li class="nav-item active" style="background-color:#00203FFF;">
                <a class="nav-link" href="{{route('getClassSchedule')}}" ><i class="fas fa-address-book" style="color:#ADEFD1FF;"></i>
                  <span class="menu-title" style="color:#ADEFD1FF;">&nbsp;Book Class Room</span>

                </a>
              </li>
            <li class="nav-item">

              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                </ul>
              </div>
            </li>






          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            @yield('content')

          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer fixed-bottom mt-5">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">COMSATS UNIVERSITY WAH CAMPUS © Copyrights</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('CR/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('CR/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('CR/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('CR/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('CR/assets/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('CR/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('CR/assets/js/todolist.js')}}"></script>
    <!-- End custom js for this page -->

    <script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
      </script>

</body></html>
