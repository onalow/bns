@extends('layouts.app')
@section('content')

<!-- ================== Page ================== -->

<section class="page">

  <!-- ===  Page header === -->

  <div class="page-header" style="background-image:url(../colina/assets/images/header-1.jpg)">
    <div class="container">
      <h2 class="title">Login</h2>
      {{-- <p>Register and make checkout faster and easier</p> --}}
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
              <form class="form-horizontal milf" method="POST" action="{{ route('admin') }}">
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
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="inputEmail1" class="col-lg-3 ">Password</label>
                  <div class="col-lg-9">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>

                    @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword5" class="col-lg-3">&nbsp</label>
                  <div class="col-lg-9">
                    <span class="checkbox">
                      <input type="checkbox" id="chechid2" name="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label for="chechid2">Remember me?</label>
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-12" align="center">
                    <button type="submit" class="btn btn-main btn-reg">LOGIN</button>
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