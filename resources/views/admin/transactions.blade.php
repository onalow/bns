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
						<h2><i class="fa fa-briefcase"></i> Transactions</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>S/No</th>
									<th>User</th>
									<th>Details</th>
									<th>Amount</th>
									<th>Payment ID</th>
									<th>Payment Due Date</th>
									<th>Transaction Date</th>
									<th>Status</th>
									
									<th><i class="fa fa-cog"></i></th>
								</tr>
							</thead>
							<tbody>
								@isset($txs)
								@foreach ($txs as $tx)
									<tr>
										<td>{{ $loop->index + 1}}</td>
										<td>{{ optional($tx->user)->name}}</td>
										<td>{{ $tx->rooms}} Room For {{ optional($tx->deal)->nights}} Night{{ optional($tx->deal)->nights > 1 ? 's' : ''}}</td>
										<td>$ {{ number_format($tx->amount, 2)}}</td>
										<td>{{ $tx->payment_id}}</td>

											@if($tx->status != 'pending')
										<td>{{ $tx->due_at}}</td>

										@else
										<td></td>
										@endif

										<td>{{ $tx->created_at}}</td>
										<td>{{ $tx->status}}</td>
										<td><a href="" title="Action Required" onclick="alert('What Action Is Required?');"><i class="fa fa-cog"></i></a></td>
										
										
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




