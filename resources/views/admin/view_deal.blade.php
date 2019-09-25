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
            <h2><i class="fa fa-tags"></i> View Hotel Information</h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-12 col-sm-10 col-xs-12">
              <form method="POST" action="" class="form-horizontal form-label-left" novalidate>
                {{ csrf_field() }}
                <div class="item form-group">
                  <label class="col-md-3 col-sm-2 col-xs-12" for="name">Hotel Name </label>
                  <div class="col-md-9 col-sm-6 col-xs-12 form-group"> Benue Hotels </div>
                </div>
                <div class="item form-group">
                  <label class="col-md-3 col-sm-2 col-xs-12" for="name">Hotel Location </label>
                  <div class="col-md-9 col-sm-6 col-xs-12 form-group"> No. 1 College Crescent, Makurdi, Benue State, Nigeria
                </div>
              </div>
              <div class="item form-group">
                <label class="col-md-3 col-sm-2 col-xs-12" for="designation">Price </label>
                <div class="col-md-9 col-sm-6 col-xs-12 form-group"> $25,000.00 </div>
              </div>
              <div class="item form-group">
                <label class="col-md-3 col-sm-2 col-xs-12" for="designation">Hotel Photo </label>
                
              </div>
            </form>
          </div>
          <div class="col-md-3 col-sm-2 col-xs-12">
            <img src="{{asset("images/user.png")}}" class="img-responsive" />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /page content -->

@endsection




