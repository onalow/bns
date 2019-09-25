<!-- === navigation-top === -->

<nav class="navigation-top clearfix">

    <!-- navigation-top-left -->

{{--     <div class="navigation-top-left">
        <a class="box" href="#">
            <i class="fa fa-facebook"></i>
        </a>
        <a class="box" href="#">
            <i class="fa fa-twitter"></i>
        </a>
        <a class="box" href="#">
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
     <a class="box" href="/contact">
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
                @php
                $user_id = encrypt(auth()->id());
                @endphp
                <a href="{{ route('my_trxns', $user_id )}}">Transactions</a>
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
                <a href="{{ route('profile', ['user' => str_slug(auth()->user()->name)])}}">Add Wallet</a> 
            </li>
            <li>
                <a href="{{ url('/contact')}}">Contact</a>
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
        <li>
            <a href="{{ url('/contact')}}">Contact</a>
        </li>
        @endif
    </ul>

</div> <!--/navigation-block-->

</nav>