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
						<h2><i class="fa fa-exclamation-triangle"></i> Pending Payouts</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>S/No</th>
									<th>User</th>
									<th>Amount</th>
									<th>Payment Due Date</th>
									<th>Status</th>
									<th>Withdrawal ID</th>
									<th>Widthdrawal Status</th>
									<th><i class="fa fa-cog"></i> Action</th>
									<th><i class="fa fa-cog"></i></th>
								</tr>
							</thead>
							<tbody>
								@isset($payouts)
								@foreach ($payouts as $p)
								<tr>
										<td>{{ $loop->index + 1}}</td>
										<td>{{ $p->user->name}}</td>
										<td>$ {{number_format($p->amount, 2)}}</td>
										<td>{{ $p->due_at}}</td>
										<td>{{ $p->status}}</td>
										<td>{{ $p->withdrawal_id}}</td>
										<td>{{ $p->pay_status}}</td>
										@if ($p->status == 'paid')
										<td><i class="fa fa-check"></i></td>
										@else
										<td><a href="{{route('pay.user', $p->id)}}" class="btn btn-xs btn-success">Pay Now</a></td>
										@endif
										@if ($p->withdrawal_id && $p->status != 'paid')
										<td><a href="{{route('confirm.withdrawal', $p->id)}}" class="btn btn-xs btn-success">Confirm</a></td>
										@else
										<td></td>
										@endif

										
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




