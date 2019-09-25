<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('layouts.head')
<meta name="csrf-token" content="{{ csrf_token() }}">
<body>

  {{-- <div class="page-loader"></div> --}}

  <div class="wrapper">

    <header>

      <!-- ======================== Navigation ======================== -->

      <div class="container">

       @include('layouts.menu')
       
     </div> <!--/container-->

   </header>

   @yield('content')

   @include('layouts.footer')

   <!-- ================== Footer  ================== -->


 </body>

 </html>