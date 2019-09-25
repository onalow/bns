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
						<h2><i class="fa fa-hotel"></i> Create Deal</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						
						
							<div class="col-md-12 hotel_list">								
								<div class="block_content">
									<div class="col-md-3">
										<img src="{{ $hotel->picture_url}}" width="200px" height="100px">
									</div>
									<div class="col-md-9">
									<h2>{{ title_case($hotel->name)}}</h2>										
									<p class="excerpt">{{ $hotel->location.' ,'. $hotel->Address. ' ,'. $hotel->country}}</p>
									<p class="">${{ $hotel->price}}</p>
										{{-- <a href="{{url("create_deal")}}/{{"1"}}"><label class="btn btn-success">Create Deal</label></a> --}}
									</div>
								</div>
								<div class="timeline"></div>
							</div>

							
							<form method="POST" action="{{ route('add-deal') }}" class="form-horizontal form-label-left"  novalidate>
								{{ csrf_field() }}
								<div class="item form-group" style="text-align: center">
								  <label class="col-md-11 col-sm-12 col-xs-12" for="name"><u>PLEASE NOTE:</u> ALL FIELDS MARKED <span class="star">( * )</span> ARE COMPULSORY.
								  </label>    <br/>&nbsp;                   
								</div>
				  
								<div class="item form-group">
								  <label class="col-md-3 col-sm-2 col-xs-12" for="rooms">Number Of Rooms <span class="required">*</span>
								  </label>
								  <div class="col-md-6 col-sm-6 col-xs-12 form-group{{ $errors->has('rooms') ? ' has-error' : '' }}">
								  <input id="rooms" type="text" class="form-control col-md-7 col-xs-12" name="rooms" value="{{ old('rooms')}}"placeholder=" Hotel rooms">
				  
								   @if ($errors->has('rooms'))
								   <span class="help-block">
									<strong>{{ $errors->first('rooms') }}</strong>
								  </span>
								  @endif
								</div>
							  </div>
							  <div class="item form-group">
								<label class="col-md-3 col-sm-2 col-xs-12" for="nights">Nights <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12 form-group{{ $errors->has('nights') ? ' has-error' : '' }}">
								<input id="nights" type="text" class="form-control col-md-7 col-xs-12" name="nights" value="{{old('nights')}}" placeholder=" Hotel nights" required>
				  
								 @if ($errors->has('nights'))
								 <span class="help-block">
								  <strong>{{ $errors->first('nights') }}</strong>
								</span>
								@endif
							  </div>
							</div>
							<div class="item form-group">
								<label class="col-md-3 col-sm-2 col-xs-12" for="discount">Discount % <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12 form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
								<input id="discount" type="number" class="form-control col-md-7 col-xs-12" name="discount" value="{{old('discount')}}" placeholder=" Hotel discount" required>
				  
								 @if ($errors->has('discount'))
								 <span class="help-block">
								  <strong>{{ $errors->first('discount') }}</strong>
								</span>
								@endif
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
							<input type="hidden" name="hotel_id" value="{{ $hotel->id}}">
							<div class="ln_solid"></div>
							<div class="form-group">
							  <div class="col-md-6 col-md-offset-3">
								<button type="reset" class="btn btn-primary"><i class="fa fa-times"></i> Cancel</button>
								<button id="send" type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
							  </div>
							</div>
						  </form>
							
						
						<div class="clearfix"></div>


					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->

@endsection




