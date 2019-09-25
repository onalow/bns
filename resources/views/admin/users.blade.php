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
						<h2><i class="fa fa-users"></i> List Of Users</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>S/No</th>
									<th>User</th>
									<th>Email</th>
									<th>Wallet</th>
									<th>Phone</th>
									<th>Country</th>
									<th>Transactions</th>
									<th>Pending Transactions</th>
								</tr>
							</thead>
							<tbody>
								@isset($users)
									@foreach($users as $user)
										<tr>
										<td>{{ $loop->index +1}}</td>
										<td>{{$user->name}}</td>
										<td>{{$user->email}}</td>
										<td>{{$user->wallet}}</td>
										<td>{{$user->phone}}</td>
										<td>{{$user->country}}</td>
											
										<td>{{ $user->completed_tx->count()}} <a href="" title="View Transaction History"><i class="fa fa-external-link"></i></a></td>
										<td>{{ $user->pending_tx->count()}}<a href="" title="View Pending Transaction History"><i class="fa fa-external-link"></i></a></td>
											
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




