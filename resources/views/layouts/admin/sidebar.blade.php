
<div class="col-md-3 left_col menu_fixed">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="/dashboard" class="site_title"><img src="{{asset("colina/assets/images/logo.png")}}" height="60px" /> <span> NextBeux</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="../images/user.png" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span><b>Welcome,</b></span>
        <h2><b>{{ Auth::user()->name }}</b></h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu For Gamint Staff-->    
    
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>Dashboard</h3>
        <ul class="nav side-menu">
          <li><a href="/home"><i class="fa fa-home"></i> Home </a></li>
          <li><a href="/change_password"><i class="fa fa-lock"></i> Change Password </a></li>
          <li><a><i class="fa fa-hotel"></i> Hotels <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
            <li><a href="{{ route('add-hotel')}}"><i class="fa fa-edit"></i> Add Hotel</a></li>
            <li><a href="{{ route('manage-hotel') }}"><i class="fa fa-wrench"></i> Manage Hotel</a></li>  
           </ul>
         </li>
         <li><a><i class="fa fa-tags"></i> Deals <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
            <li><a href="{{ route('show.hotels')}}"><i class="fa fa-edit"></i> Create Deals</a></li>
            <li><a href="{{ route('manage.deal')}}"><i class="fa fa-wrench"></i> Manage Deals </a></li>  
           </ul>
         </li>  
        <li><a href="{{ route('admin.users')}}"><i class="fa fa-users"></i> View Users </a></li>
        <li><a href="{{ route('txn')}}"><i class="fa fa-briefcase"></i> View Transactions </a></li>
        <li><a href="{{ route('payments')}}"><i class="fa fa-briefcase"></i> View Payments </a></li>
        <li><a href="{{ route('payouts')}}"><i class="fa fa-exclamation-triangle"></i> Pending Payout Requests </a></li>




          {{-- <li><a><i class="fa fa-user"></i> Student Registration <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
             <li><a href="/stud_registration">New Registration </a></li>
              <li><a href="/continue_registration">Continue Registration </a></li>  
              <li><a href="/edit_stud-reg">Edit Registration Details</a></li>
              <li><a href="/stud_registrations">List Of Registered Students </a></li>  
              <li><a href="/print_stud_slip">Print Registration Slip </a></li>                        
            </ul>
          </li>  --}}     
        </ul>
      </div>     
    </div>
    <!-- /sidebar menu -->
    
    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>

    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
    </form>
  </div>
  <!-- /menu footer buttons -->
</div>
</div>