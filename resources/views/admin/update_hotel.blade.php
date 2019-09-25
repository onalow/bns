@extends('layouts.admin.app')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">  
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="min-height: 530px">
          <div class="x_title">
            <h2><i class="fa fa-hotel"></i> Update Hotel Information</h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-9 col-sm-10 col-xs-12">
            <form method="POST" action="{{ route('hotel.update', $hotel->id)}}" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                <div class="item form-group" style="text-align: center">
                  <label class="col-md-11 col-sm-12 col-xs-12" for="name"><u>PLEASE NOTE:</u> ALL FIELDS MARKED <span class="star">( * )</span> ARE COMPULSORY.
                  </label>    <br/>&nbsp;                   
                </div>

                <div class="item form-group">
                  <label class="col-md-3 col-sm-2 col-xs-12" for="name">Hotel Name <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-6 col-xs-12 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                   <input id="name" type="text" class="form-control col-md-7 col-xs-12" name="name"  value="{{ old('name', $hotel->name)}}" placeholder=" Hotel Name" value="Benue Hotels" required>

                   @if ($errors->has('name'))
                   <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="col-md-3 col-sm-2 col-xs-12" for="name">Hotel Location <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-6 col-xs-12 form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                 <input id="location" type="text" class="form-control col-md-7 col-xs-12" name="location" value="{{ old('location', $hotel->location)}}" placeholder=" Hotel Location" value="No. 1 College Crescent, Makurdi, Benue State, Nigeria" required>

                 @if ($errors->has('location'))
                 <span class="help-block">
                  <strong>{{ $errors->first('location') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="item form-group">
              <label class="col-md-3 col-sm-2 col-xs-12" for="designation">Price <span class="required">*</span>
              </label>
              <div class="col-md-9 col-sm-6 col-xs-12 form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                <input id="price" type="text" class="form-control col-md-7 col-xs-12" name="price" min="0" onkeypress="return isNumber(event)" value="{{ old('price', $hotel->price)}}" placeholder=" Price" value="25000" required>
                @if ($errors->has('price'))
                <span class="help-block">
                  {{ $errors->first('price') }}
                </span>
                @endif
              </div>
            </div>
            <div class="item form-group">
              <label class="col-md-3 col-sm-2 col-xs-12" for="designation">Hotel Photo <span class="required">*</span>
              </label>
              <div class="col-md-9 col-sm-6 col-xs-12 form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                <input id="photo" type="file" class="form-control col-md-7 col-xs-12" name="photo" placeholder=" Hotel Photo">
                @if ($errors->has('photo'))
                <span class="help-block">
                  {{ $errors->first('photo') }}
                </span>
                @endif
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <button type="reset" class="btn btn-primary"><i class="fa fa-times"></i> Cancel</button>
                <button id="send" type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-3 col-sm-2 col-xs-12">
        <img src="{{ $hotel->picture_url ?: asset("images/user.png")}}" class="img-responsive" />
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- /page content -->
<script type="text/javascript">
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
    }
    return true;
  }
</script>

@endsection




