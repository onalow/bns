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
						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>S/No</th>
									<th>Hotel Name</th>
									<th>Hotel Location</th>
									<th>Address</th>
									<th>Country</th>
									<th>Hotel Price</th>
									<th><i class="fa fa-eye"></i></th>
									<th><i class="fa fa-edit"></i></th>
									<th><i class="fa fa-trash"></i></th>
								</tr>
							</thead>
							<tbody>
								
								@isset($hotels)
									@foreach($hotels as $hotel)
									<tr>
									   <td>{{ $loop->index +1}}</td>
									   <td>{{ $hotel->name}}</td>
									   <td>{{ $hotel->location}}</td>
									   <td>{{ $hotel->address}}</td>
									   <td>{{ $hotel->country}}</td>
									   <td>{{ $hotel->price}}</td>
									   <td><a href="{{ route('view-hotel', $hotel->id)}}" title="View More Details"><i class="fa fa-eye"></i></a></td>
									   <td><a href="{{route('update.hotel', $hotel->id)}}" title="Edit Details"><i class="fa fa-edit"></i></a></td>
									<td><a href="{{ route('delete.hotel', $hotel->id)}}" title="Delete This Record"><i class="fa fa-trash" onclick="return confirm('Are You Sure You Want To Delete This Record?')"></i></a></td>
										
									</tr>
									@endforeach
								@endisset
								
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->

@endsection




