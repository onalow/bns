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
						<h2><i class="fa fa-tags"></i> List Of Deals</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>S/No</th>
									<th>Hotel Name</th>
									<th>Hotel Location</th>
									<th>Deal Details</th>
									<th>ID</th>
									<th>Price</th>
									<th>Discount (%)</th>
									{{-- <th>Gain</th> --}}
									<th>Status</th>
									<th><i class="fa fa-edit"></i></th>
									<th><i class="fa fa-trash"></i></th>
								</tr>
							</thead>
							<tbody>

								@isset($deals)
								@foreach($deals as $deal)
								<tr>
								<td>{{ $loop->index +1}}</td>
								<td>{{ $deal->hotel->name}}</td>
								<td>{{ $deal->hotel->address}}</td>
								<td>{{ $deal->total_rooms}} for {{ $deal->nights}} Nights</td>
								<td>{{ $deal->hotel->id}}</td>
								<td>{{ $deal->hotel->price}}</td>
								<td>{{ $deal->discount}}%</td>

								 @if ($deal->closed) 
								<td>{{ 'Closed'}} <a class="btn btn-xs btn-info" href="{{ route('open.deal', $deal->id)}}" title="Open Deal">Open</a></td>
								@else
								<td>{{ 'Open'}} <a class="btn btn-xs btn-info" href="{{ route('close.deal', $deal->id)}}" title="Close Deal">Close</a></td>
								{{-- <td>{{ $deal->closed ? 'Closed' : 'Open'}}</td> --}}
								@endif

								<td><a href="{{ route('update_deal', $deal->id)}}" title="Edit Details"><i class="fa fa-edit"></i></a></td>
								<td><a class="btn btn-xs btn-info" href="{{ route('hide.deal', $deal->id)}}" title="Hide">Hide</a></td>
								<td><a href="{{ route('delete.deal', $deal->id)}}" title="Delete This Record"><i class="fa fa-trash" onclick="return confirm('Are You Sure You Want To Delete This Record?')"></i></a></td>
									
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




