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
                                    <th>Payer</th>
                                    <th>Address Paid To</th>
								     <th>Amount</th>                                    
									<th>Coin</th>
									<th>Fiat</th>
								     <th>Status Text</th>
								     <th>Status</th>
								     <th>Createt At</th>
								     <th>Expires At</th>
								     <th>Confirmed At</th>
								     <th>Confirms Needed</th>	
								     <th>Action</th>	
								</tr>
							</thead>
							<tbody>
								@isset($txs)
								@foreach ($txs as $tx)
								
								<tr>
									<td>{{$loop->index+1}}</td>
								    <td>{{ $tx->user->name}}</td>
								    <td>{{ $tx->payment_address}}</td>
									<td>{{$tx->amount}}</td>
									<td>{{$tx->coin}}</td>
									<td>{{$tx->fiat}}</td>								
									<td>{{$tx->status_text}}</td>								
									<td>{{$tx->status}}</td>								
									<td>{{$tx->payment_created_at}}</td>								
									<td>{{$tx->payment_created_at}}</td>								
									<td>{{$tx->confirmation_at}}</td>								
									<td>{{$tx->confirms_needed}}</td>
									@if ($tx->status !==100 && $tx->status !==200)								
                                		<td>
                                			<a class="btn btn-primary" href="{{ route('confirm.manually', $tx->id)}}" title="Confirm Transaction">Confrim
                                			</a>
                                		</td>
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




