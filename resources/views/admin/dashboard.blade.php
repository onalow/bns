@extends('layouts.admin.app')

@section('content')
<link rel="stylesheet" href="{{asset("css/AdminLTE.min.css")}}">
<!-- page content -->
<div class="right_col" role="main">
	<div class="">  
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel" style="min-height: 530px">
					<div class="x_title">
						<h2><i class="fa fa-question-circle"></i> What Will You Like To Do?</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<div class="col-md-6 col-sm-6 col-xs-12">
							<a href="{{ route('add-hotel')}}">
								<div class="info-box bg-red"> <span class="info-box-icon"><i class="fa fa-hotel"></i></span>
									<div class="info-box-content"> <span class="info-box-text" style="margin-top: 10px"><b>Add Hotel</b></span> <span class="info-box-number"></span>
										<div class="progress">
											<div class="" style="width: 0%"></div>
										</div>
										<span class="progress-description"><b>Click To Add Hotel</b></span> </div>
									</div>
								</a>
							</div>

							<div class="col-md-6 col-sm-6 col-xs-12">
								<a href="/manage_hotels">
									<div class="info-box bg-aqua"> <span class="info-box-icon"><i class="fa fa-hotel"></i></span>
										<div class="info-box-content"> <span class="info-box-text" style="margin-top: 10px"><b>Manage Hotels</b></span> <span class="info-box-number"></span>
											<div class="progress">
												<div class="" style="width: 0%"></div>
											</div>
											<span class="progress-description"><b>Click To Manage Hotels</b></span> </div>
										</div>
									</a>
								</div>
								<div style="margin-top: 100px">&nbsp;<br/></div>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<a href="/add_deal">
										<div class="info-box bg-green"> <span class="info-box-icon"><i class="fa fa-tags"></i></span>
											<div class="info-box-content"> <span class="info-box-text" style="margin-top: 10px"><b>Add Deals</b></span> <span class="info-box-number"></span>
												<div class="progress">
													<div class="" style="width: 0%"></div>
												</div>
												<span class="progress-description"><b>Click To Add Deals</b></span> </div>
											</div>
										</a>
									</div>

									<div class="col-md-6 col-sm-6 col-xs-12">
										<a href="/manage_deals">
											<div class="info-box bg-yellow"> <span class="info-box-icon"><i class="fa fa-tags"></i></span>
												<div class="info-box-content"> <span class="info-box-text" style="margin-top: 10px"><b>Manage Deals</b></span> <span class="info-box-number"></span>
													<div class="progress">
														<div class="" style="width: 0%"></div>
													</div>
													<span class="progress-description"><b>Click To Manage Deals</b></span> </div>
												</div>
											</a>
										</div>
										<div style="margin-top: 100px">&nbsp;<br/></div>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<a href="/users">
												<div class="info-box bg-teal"> <span class="info-box-icon"><i class="fa fa-users"></i></span>
													<div class="info-box-content"> <span class="info-box-text" style="margin-top: 10px"><b>View Users</b></span> <span class="info-box-number"></span>
														<div class="progress">
															<div class="" style="width: 0%"></div>
														</div>
														<span class="progress-description"><b>Click To View Users</b></span> </div>
													</div>
												</a>
											</div>

											<div class="col-md-6 col-sm-6 col-xs-12">
												<a href="/transactions">
													<div class="info-box bg-maroon"> <span class="info-box-icon"><i class="fa fa-briefcase"></i></span>
														<div class="info-box-content"> <span class="info-box-text" style="margin-top: 10px"><b>View Transactions</b></span> <span class="info-box-number"></span>
															<div class="progress">
																<div class="" style="width: 0%"></div>
															</div>
															<span class="progress-description"><b>Click To View Transactions</b></span> </div>
														</div>
													</a>
												</div>
												<div style="margin-top: 100px">&nbsp;<br/></div>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<a href="/pending_payouts">
														<div class="info-box bg-orange"> <span class="info-box-icon"><i class="fa fa-exclamation-triangle"></i></span>
															<div class="info-box-content"> <span class="info-box-text" style="margin-top: 10px"><b>View Pending Payout Requests</b></span> <span class="info-box-number"></span>
																<div class="progress">
																	<div class="" style="width: 0%"></div>
																</div>
																<span class="progress-description"><b>Click To View Pending Payout Requests</b></span> </div>
															</div>
														</a>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12">
													<a href="/change_password">
														<div class="info-box bg-blue"> <span class="info-box-icon"><i class="fa fa-lock"></i></span>
															<div class="info-box-content"> <span class="info-box-text" style="margin-top: 10px"><b>Change Password</b></span> <span class="info-box-number"></span>
																<div class="progress">
																	<div class="" style="width: 0%"></div>
																</div>
																<span class="progress-description"><b>Click To Change Password</b></span> </div>
															</div>
														</a>
													</div>



												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /page content -->
							@endsection




