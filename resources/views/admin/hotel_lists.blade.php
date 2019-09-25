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
						<h2><i class="fa fa-hotel"></i> List Of Registered Hotels</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						
						<ul class="list-unstyled">
                            @isset($hotels)
                            @foreach($hotels as $hotel)
							<li class="col-md-12 hotel_list">								
								<div class="block_content">
									<div class="col-md-3">
                                    <img src="{{ $hotel->picture_url}}" width="200px" height="100px">
									</div>
									<div class="col-md-9">
										<h2>{{ title_case($hotel->name) }} </h2>										
										<p class="excerpt">{{  title_case($hotel->location) .' ,'. title_case($hotel->country  )}}</p>
									<p class="">$ {{ number_format( (int) $hotel->price) }}</p>
                                    <a href="{{ route('create.deal', ['hotel_id' => $hotel->id])}}"><label class="btn btn-success">Create Deal</label></a>
									</div>
								</div>
								<div class="timeline"></div>
                            </li>
							@endforeach
							@else
							 <p>No Hotel available</p>
                            @endisset
							
						</ul>
						<div class="clearfix"></div>


					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->

@endsection




