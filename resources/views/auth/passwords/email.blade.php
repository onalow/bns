@extends('layouts.app')
@section('content')

<!-- ================== Page ================== -->

<section class="page">

  <!-- ===  Page header === -->

  <div class="page-header" style="background-image:url(../colina/assets/images/header-1.jpg)">
    <div class="container">
      <h2 class="title">Reset Password</h2>
      <p>Provide Your Registered Email to receive a password reset link</p>
    </div>
  </div>

  <!-- === Shorcodes === -->

  <div class="shortcodes">
    <div class="container">

      <div class="row">



        <div class="col-md-8 col-md-offset-2">

          <!--======= Forms -->

          <div class="panel panel-default" id="forms">
            <div class="panel-body">
              <form class="form-horizontal milf" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}<br/><br/><br/>
                <div class="form-clear form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="inputEmail1" class="col-lg-3 ">E-Mail Address</label>
                  <div class="col-lg-9">
                    <input type="email" class="form-control" name="email" id="email" placeholder="E-Mail Address" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-12" align="center">
                    <button type="submit" class="btn btn-main btn-reg">Send Password Reset Link</button>
                  </div>
                </div>
                <br/><br/>
              </form>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</section>


@endsection