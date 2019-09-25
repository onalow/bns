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
            <h2><i class="fa fa-hotel"></i> Add New Hotel</h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

          <form method="POST" action="{{ route('add-hotel') }}" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
              {{ csrf_field() }}
              <div class="item form-group" style="text-align: center">
                <label class="col-md-11 col-sm-12 col-xs-12" for="name"><u>PLEASE NOTE:</u> ALL FIELDS MARKED <span class="star">( * )</span> ARE COMPULSORY.
                </label>    <br/>&nbsp;                   
              </div>

              <div class="item form-group">
                <label class="col-md-3 col-sm-2 col-xs-12" for="name">Hotel Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <input id="name" type="text" class="form-control col-md-7 col-xs-12" name="name" value="{{ old('name')}}"placeholder=" Hotel Name" required>

                 @if ($errors->has('name'))
                 <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="item form-group">
              <label class="col-md-3 col-sm-2 col-xs-12" for="location">Hotel Location <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group{{ $errors->has('location') ? ' has-error' : '' }}">
              <input id="location" type="text" class="form-control col-md-7 col-xs-12" name="location" value="{{old('location')}}" placeholder=" Hotel Location" required>

               @if ($errors->has('location'))
               <span class="help-block">
                <strong>{{ $errors->first('location') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="col-md-3 col-sm-2 col-xs-12" for="location">Address <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            <input id="address" type="text" class="form-control col-md-7 col-xs-12" name="address" value="{{old('address')}}" placeholder=" Hotel address" required>

             @if ($errors->has('address'))
             <span class="help-block">
              <strong>{{ $errors->first('address') }}</strong>
            </span>
            @endif
          </div>
          </div>
          <div class="item form-group">
            <label class="col-md-3 col-sm-2 col-xs-12" for="location">Country<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group{{ $errors->has('country') ? ' has-error' : '' }}">
            <input id="country" type="text" class="form-control col-md-7 col-xs-12" name="country" value="{{old('country')}}" placeholder=" Hotel country" required>

             @if ($errors->has('country'))
             <span class="help-block">
              <strong>{{ $errors->first('country') }}</strong>
            </span>
            @endif
          </div>
          </div>
          <div class="item form-group">
            <label class="col-md-3 col-sm-2 col-xs-12" for="price">Price <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group{{ $errors->has('price') ? ' has-error' : '' }}">
            <input id="price" type="text" class="form-control col-md-7 col-xs-12" name="price" value="{{ old('price')}}" min="0" onkeypress="return isNumber(event)" placeholder=" Price" required>
              @if ($errors->has('price'))
              <span class="help-block">
                {{ $errors->first('price') }}
              </span>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="col-md-3 col-sm-2 col-xs-12" for="photo">Hotel Photo <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
            <input id="photo" type="file" class="form-control col-md-7 col-xs-12" name="photo" value="{{ old('photo')}}" placeholder=" Hotel Photo" required>
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




