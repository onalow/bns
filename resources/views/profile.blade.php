@extends('layouts.app')
@section('content')

<!-- ================== Page ================== -->

<section class="page">

  <!-- ===  Page header === -->

  <div class="page-header" style="background-image:url(colina/assets/images/header-1.jpg)">
    <div class="container">
      <h2 class="title">Your Profile</h2>
      <p>Have a look at your profile</p>
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
                @isset(auth()->user()->picture_url)
                <img class="img-circle" src="{{ auth()->user()->picture_url}}" width="150px" height="150px"/>
                @else
                <img class="img-circle" src="{{asset("images/user.png")}}" width="150px" />
                @endisset
              </div>
              <div class="form-clear col-lg-12">
                <strong>{{Auth::user()->name}}</strong>
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
              @if(auth()->user()->wallet)
              <div class="form-clear col-lg-12">
                <strong>Wallet Address: {{auth()->user()->wallet}}</strong>
              </div>
              @else
              <div class="form-clear col-lg-12">
               <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myWallet">
                Add Wallet Address
              </button>
            </div>
            @endif
            <div class="form-clear col-lg-12">
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
               Edit Profile
             </button>
           </div>
           <br/><br/>&nbsp;
         </div>
       </div>


       <!-- The Modal -->
       <div class="modal fade" id="myModal">
         <br/><br/><br/>
         <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title" style="text-align: center">Edit Profile</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form action="{{ route('profile.update')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field()}}
                <div class="form-clear form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                  <label for="inputEmail1" class="col-lg-3 ">First Name</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ old('first_name', Auth::user()->first_name) }}" required autofocus>

                    @if ($errors->has('first_name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <br/>&nbsp;
                <div class="form-clear form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                  <label for="inputEmail1" class="col-lg-3 ">Last Name</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" value="{{ old('last_name',Auth::user()->last_name) }}" required autofocus>

                    @if ($errors->has('last_name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <br/>&nbsp;
                <div class="form-clear form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                  <label for="inputEmail1" class="col-lg-3 ">Phone   <img src="{{ $data['flag']}}" height="40px" width="40px" alt=""> </label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" value="{{ old('phone',Auth::user()->phone) }}" required autofocus>

                    @if ($errors->has('phone'))
                    <span class="help-block">
                      <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <br/>&nbsp;
                <div class="form-clear form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                  <label for="inputEmail1" class="col-lg-3 ">Photo </label>
                  <div class="col-lg-9">
                    <input type="file" class="form-control" id="photo" placeholder="Photo" name="photo" autofocus>

                    @if ($errors->has('photo'))
                    <span class="help-block">
                      <strong>{{ $errors->first('photo') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <br/>&nbsp;
                <div align="center" class="form-clear form-group col-lg-12">
                 <button type="submit" class="btn btn-main" data-toggle="modal" data-target="#myModal">
                  Save Changes
                </button>
              </div>
            </form>
            <br/>&nbsp;
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

    {{-- //////////////////////// --}}

    <!-- The Modal -->
    <div class="modal fade" id="myWallet">
     <br/><br/><br/>
     <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="text-align: center">Add Bitcoin Wallet</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="{{ route('add.address')}}" method="post">
            {{ csrf_field()}}
            <div class="form-clear form-group{{ $errors->has('wallet') ? ' has-error' : '' }}">
              <label for="inputEmail1" class="col-lg-3 ">Bitcoin Address</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="wallet" id="wallet" placeholder="Wallet AAddress" value="{{old('wallet')}}" required autofocus>

                @if ($errors->has('wallet'))
                <span class="help-block">
                  <strong>{{ $errors->first('wallet') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <br/>&nbsp;
            
            <div align="center" class="form-clear form-group col-lg-12">
             <button type="submit" class="btn btn-main" data-toggle="modal" data-target="#myWallet">
              Save Changes
            </button>
          </div>
        </form>
        <br/>&nbsp;
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
{{-- /////////////////// --}}



</div>
</div>
</div>
</div>


{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> --}}

</section>


@endsection