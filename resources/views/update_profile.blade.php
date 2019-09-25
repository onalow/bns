@extends('layouts.app')
@section('content')

<!-- ================== Page ================== -->

<section class="page">

  <!-- ===  Page header === -->

  <div class="page-header" style="background-image:url(colina/assets/images/header-1.jpg)">
    <div class="container">
      <h2 class="title">Edit Profile</h2>
      <p>Edit your profile Information</p>
    </div>
  </div>

  <!-- === Shorcodes === -->

  <div class="shortcodes">
    <div class="container">

      <div class="row">



        <div class="col-md-8 col-md-offset-2">

          <!--======= Forms -->

          <div class="panel panel-default" id="forms">
            <div class="panel-body" align="center">

              <br/><br/>
              <div class="form-clear col-lg-12">
                <img class="img-circle" src="{{asset("images/user.png")}}" width="150px" />
              </div>
              <div class="form-clear col-lg-12">
                <strong>Name: {{Auth::user()->name}}</strong>
              </div>
              <div class="form-clear col-lg-12">
                <strong>{{Auth::user()->email}}</strong>
              </div>
              <div class="form-clear col-lg-12">
                <strong>{{Auth::user()->phone}}</strong>
              </div>
              <div class="form-clear col-lg-12">
                <strong><img src="{{ $data['flag']}}" height="40px" width="40px" alt=""> {{Auth::user()->country}}</strong>
              </div>
              <br/><br/>&nbsp;
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</section>


@endsection