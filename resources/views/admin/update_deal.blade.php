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
            <h2><i class="fa fa-tags"></i> Update Deal</h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

          <form method="POST" action="{{ route('update.deal', $deal->id)}}" class="form-horizontal form-label-left" novalidate>
              {{ csrf_field() }}
              <div class="item form-group" style="text-align: center">
                <label class="col-md-11 col-sm-12 col-xs-12" for="name"><u>PLEASE NOTE:</u> ALL FIELDS MARKED <span class="star">( * )</span> ARE COMPULSORY.
                </label>    <br/>&nbsp;                   
              </div>

              <div class="item form-group">
                  <label class="col-md-3 col-sm-2 col-xs-12" for="name">Hotel Name 
                  </label>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                    <p>{{ $deal->hotel->name}}</p>
              </div>
            </div>
            <div class="item form-group">
              <label class="col-md-3 col-sm-2 col-xs-12" for="name">Number Of Rooms <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group{{ $errors->has('rooms') ? ' has-error' : '' }}">
              <input id="rooms" type="number" class="form-control col-md-7 col-xs-12" name="total_rooms"  value="{{ old('rooms', $deal->total_rooms)}}" placeholder=" Number Of Rooms" min="0" value="2" onkeypress="return isNumber(event)" required>

               @if ($errors->has('rooms'))
               <span class="help-block">
                <strong>{{ $errors->first('rooms') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="col-md-3 col-sm-2 col-xs-12" for="designation">Number Of Nights <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group{{ $errors->has('nights') ? ' has-error' : '' }}">
            <input id="nights" type="number" class="form-control col-md-7 col-xs-12" name="nights" value="{{ old('nights', $deal->nights)}}" min="0" onkeypress="return isNumber(event)" value="3" placeholder=" Number Of Nights" required>
              @if ($errors->has('nights'))
              <span class="help-block">
                {{ $errors->first('nights') }}
              </span>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="col-md-3 col-sm-2 col-xs-12" for="designation">Discount (%) <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
            <input id="discount" type="number" class="form-control col-md-7 col-xs-12" name="discount" value="{{ old('discount', $deal->discount)}}" min="0" onkeypress="return isNumber(event)" value="10" placeholder=" Discount In Percentage" required>
              @if ($errors->has('discount'))
              <span class="help-block">
                {{ $errors->first('discount') }}
              </span>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="col-md-3 col-sm-2 col-xs-12" for="major">Major Deal <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group{{ $errors->has('major') ? ' has-error' : '' }}">
              <select name="major" class="form-control col-md-7 col-xs-12"  id="major">
                  <option value="1" selected>No</option>
                  <option value="0">Yes</option>
              </select>
             @if ($errors->has('major'))
             <span class="help-block">
              <strong>{{ $errors->first('major') }}</strong>
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




