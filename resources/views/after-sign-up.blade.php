<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Mobile Web-app fullscreen -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">

  <!-- Meta tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="{{asset("colina/favicon.ico")}}">

  <!--Title-->
  <title>NextBeux - Hotel, Resort & Accommodation</title>

  <!--CSS styles-->
  <link rel="stylesheet" media="all" href="{{asset("colina/css/bootstrap.css")}}" />
  <link rel="stylesheet" media="all" href="{{asset("colina/css/animate.css")}}" />
  <link rel="stylesheet" media="all" href="{{asset("colina/css/font-awesome.css")}}" />
  <link rel="stylesheet" media="all" href="{{asset("colina/css/linear-icons.css")}}" />
  <link rel="stylesheet" media="all" href="{{asset("colina/css/hotel-icons.css")}}" />
  <link rel="stylesheet" media="all" href="{{asset("colina/css/magnific-popup.css")}}" />
  <link rel="stylesheet" media="all" href="{{asset("colina/css/owl.carousel.css")}}" />
  <link rel="stylesheet" media="all" href="{{asset("colina/css/datepicker.css")}}" />
  <link rel="stylesheet" media="all" href="{{asset("colina/css/theme.css")}}?version={{md5(date('Y-d-m H:i:s'))}}" />
  <link href="{{asset("portal/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css")}}" rel="stylesheet">
  <link href="{{asset("portal/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css")}}" rel="stylesheet">
  <link href="{{asset("portal/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css")}}" rel="stylesheet">
  <link href="{{asset("portal/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css")}}" rel="stylesheet">
  {{-- <link href="{{asset('css/sweetalert2.css')}}" rel="stylesheet" /> --}}

  <!--Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500&amp;subset=latin-ext" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&amp;subset=latin-ext" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<body>

  {{-- <div class="page-loader"></div> --}}

  <div class="wrapper">

    <header>

      <!-- ======================== Navigation ======================== -->

      <div class="container">

        <!-- === navigation-top === -->

        <nav class="navigation-top clearfix">

          <!-- navigation-top-left -->

{{--           <div class="navigation-top-left">
            <a class="box" href="https://www.facebook.com">
              <i class="fa fa-facebook"></i>
            </a>
            <a class="box" href="www.twitter.com">
              <i class="fa fa-twitter"></i>
            </a>
            <a class="box" href="www.youtube.com">
              <i class="fa fa-youtube"></i>
            </a>
          </div> --}}

          <!-- navigation-top-right -->

          <div class="navigation-top-right">
            <a class="box">
              &nbsp;
            </a>
            <a class="box">
             &nbsp;
           </a>
           <a class="box">
            <i class="fa fa-envelope"></i> 
            support@nextbeux.com
          </a>
        </div>
      </nav>

      <!-- === navigation-main === -->

      <nav class="navigation-main clearfix">

        <!-- logo -->

        <div class="logo animated fadeIn">
          <a href="/">
            <img class="logo-desktop" src="{{asset("colina/assets/images/logo.png")}}"  alt="Alternate Text" />
            <img class="logo-mobile" src="{{asset("colina/assets/images/logo-mobile.png")}}" alt="Alternate Text" />
          </a>
        </div>

        <!-- toggle-menu -->

        <div class="toggle-menu"><i class="icon icon-menu"></i></div>

        <!-- navigation-block -->

        <div class="navigation-block clearfix">

          <!-- navigation-left -->

          <ul class="navigation-left">
            @if(Auth::user())
            <li>
              <a href="/">Home</a>
            </li>
            <li>
              <a href="/my_transactions">Transactions</a>
            </li>
            @else
            <li>
              <a href="/">Home</a>
            </li>
            <li>
              <a href="/how-it-works">How It Works</a>
            </li>
            @endif
          </ul>

          <!-- navigation-right -->

          <ul class="navigation-right">
            @if(Auth::user())
            <li>
              <a href="{{ route('profile', ['user' => str_slug(auth()->user()->name)])}}">Profile</a> 
            </li>
            <li>
             <a href="{{ route('logout') }}"
             onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">Logout</a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
          @else
          <li>
            <a href="/register">Register</a>
          </li>
          <li>
            <a href="/login">Login</a>
          </li>
          @endif
          <li>
            <a href="{{ url('/contact')}}">Contact</a>
          </li>
        </ul>

      </div> <!--/navigation-block-->

    </nav>

  </div> <!--/container-->

</header>



<section class="page" style="background: #eee">

  <!-- ===  Page header === -->

  <div  class="page-header" style="background-image:url(../colina/assets/images/header-1.jpg); padding-bottom: 80px;" >
  </div>

  <!-- ===  Checkout steps === -->

  <div class="step-wrapper" style="padding-top:  10px ">
    <div class="container">
      <div class="stepper" style="color: black;">
        <div class="jumbotron" style="background: #fff;">
          <div class="row text-center">
            <img  class="img-circle" style="margin: 0 auto;" src="{{asset("colina/assets/images/al.jpg")}}" alt="Registration Successful" />
            {{-- <img src="{{ $deal->hotel->picture_url}}" alt=" {{$deal->hotel->address}}" /> --}}
          </div>
          <div class="text-center">
            <p style="font-weight: bold;margin-top: 30px;">Registration Successful</p>      
            <p style="font-size: 20px;" style="color: black; font-weight: 400;">An email verification link has been sent to  <b>{{ $user->email}}.</b> Use the link to verify your email.</p>
            <p style="font-size: 15px;">Thank you!</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ===  Checkout === -->

  <div class="checkout">

    <div class="container">

      <div class="clearfix">

        <!-- ========================  Cart wrapper ======================== -->

        <div class="cart-wrapper">

         <!--cart items-->

         <div class="clearfix">

          <div class="cart-block cart-block-item clearfix">
            <div class="image">
              {{-- <img src="{{ $deal->hotel->picture_url}}" alt=" {{$deal->hotel->name}}" /> --}}
              {{-- <img src="{{ $deal->hotel->picture_url}}" alt=" {{$deal->hotel->address}}" /> --}}
            </div>

          </div>

        </div>
      </div>

    </div> <!--/container-->
  </div> <!--/checkout-->

</section>





<footer style="padding: 10px;">
  <div class="container">

    <!--footer links-->
    {{-- <div class="footer-links">
      <div class="row">
        <div class="col-sm-6 footer-left">
          <a href="#">Sitemap</a> &nbsp; | &nbsp; <a href="#">Privacy policy</a> | &nbsp; <a href="#">Guest book</a>
        </div>
        <div class="col-sm-6 footer-right">
          <a href="#">Gallery</a> &nbsp; | &nbsp; <a href="#">Reservations</a> | &nbsp; <a href="#">Help center</a>
        </div>
      </div>
    </div> --}}

    <!--footer social-->

    <div class="footer-social">
      <div class="row">
{{--         <div class="col-sm-12 icons">
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div> --}}
        <div class="col-sm-12 copyright">
          <small>Copyright &copy; 2018 &nbsp; | &nbsp; NextBeux</small>
        </div>

{{--         <div class="col-sm-12 text-center ">
          <a href="" class="footer-logo"><img src="{{asset("colina/assets/images/logo-mobile.png")}}" alt="Alternate Text" /></a>
        </div> --}}

      </div>
    </div>
  </div>
</footer>

</div> <!--/wrapper-->

<!--JS files-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset("colina/js/jquery.min.js")}}"></script>
<script src="{{asset("colina/js/jquery-ui.js")}}"></script>
<script src="{{asset("colina/js/jquery.bootstrap.js")}}"></script>
<script src="{{asset("colina/js/jquery.magnific-popup.js")}}"></script>
<script src="{{asset("colina/js/jquery.owl.carousel.js")}}"></script>
<script src="{{asset("colina/js/main.js")}}"></script>
<!-- jQuery -->
<!-- Bootstrap -->
<script src="{{asset("portal/vendors/bootstrap/dist/js/bootstrap.min.js")}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset("portal/build/js/custom.min.js")}}"></script>

<!-- Datatables -->
<script src="{{asset("portal/vendors/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("portal/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
<script src="{{asset("portal/vendors/datatables.net-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{asset("portal/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js")}}"></script>
 {{-- <script src="{{asset("portal/vendors/datatables.net-buttons/js/buttons.flash.min.js")}}"></script>
 --}}<script src="{{asset("portal/vendors/datatables.net-buttons/js/buttons.html5.min.js")}}"></script>
 <script src="{{asset("portal/vendors/datatables.net-buttons/js/buttons.print.min.js")}}"></script>
 <script src="{{asset("portal/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js")}}"></script>
 <script src="{{asset("portal/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js")}}"></script>
 <script src="{{asset("portal/vendors/datatables.net-responsive/js/dataTables.responsive.min.js")}}"></script>
 <script src="{{asset("portal/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js")}}"></script>
 <script src="{{asset("portal/vendors/datatables.net-scroller/js/dataTables.scroller.min.js")}}"></script>
 <!-- Include this after the sweet alert js file -->
 @include('sweet::alert')
 @stack('scripts')

 <!-- ================== Footer  ================== -->


</body>

</html>