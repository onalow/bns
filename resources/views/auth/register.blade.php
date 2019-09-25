@extends('layouts.app')
@section('content')

<!-- ================== Page ================== -->

<section class="page">

  <!-- ===  Page header === -->

  <div class="page-header" style="background-image:url(colina/assets/images/header-1.jpg)">
    <div class="container">
      <h2 class="title">Register</h2>
      <p>Register and make checkout faster and easier</p>
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
              <form class="form-horizontal milf" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}<br/><br/>
                <div class="form-clear form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                  <label for="inputEmail1" class="col-lg-3 ">First Name</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ old('first_name') }}" required autofocus>

                    @if ($errors->has('first_name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-clear form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                  <label for="inputEmail1" class="col-lg-3 ">Last Name</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" required autofocus>

                    @if ($errors->has('last_name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-clear form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="inputEmail1" class="col-lg-3 ">Phone  ( <img src="{{ $data['flag']}}" height="40px" width="40px" alt=""> IP)</label>
                  <div class="col-lg-9">
                  <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" value="{{ old('phone', $data['callingCode']) }}" required autofocus>

                    @if ($errors->has('phone'))
                    <span class="help-block">
                      <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-clear form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="inputEmail1" class="col-lg-3 ">E-Mail Address</label>
                  <div class="col-lg-9">
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-clear form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="inputEmail1" class="col-lg-3">Password</label>
                  <div class="col-lg-9">
                    <input type="password" class="form-control" id="password" placeholder="Password"  name="password" required>

                    @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group form-clear">
                  <label for="inputPassword5" class="col-lg-3">Confirm Password</label>
                  <div class="col-lg-9">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-12" align="center">
                    <button type="submit" class="btn btn-main btn-reg">REGISTER</button>
                    </div>
                  </div>
                </form>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </section>


  @endsection