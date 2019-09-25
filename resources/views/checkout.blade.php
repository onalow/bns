@extends('layouts.app')
@section('content')

<section class="page">

	<!-- ===  Page header === -->

	<div class="page-header" style="background-image:url(colina/assets/images/header-1.jpg)">
		<div class="container">
			<h2 class="title">CHECKOUT</h2>
			<p>Make Payment and checkout</p>
		</div>
	</div>

	<!-- ===  Checkout steps === -->

	<div class="step-wrapper">
		<div class="container">
			<div class="stepper">
				<ul class="row">
					<li class="col-md-4 active">
						<a href="/deal"><span data-text="Room & rates"></span></a>
					</li>
					<li class="col-md-4 active">
						<a href="/summary"><span data-text="Summary"></span></a>
					</li>
					<li class="col-md-4 active">
						<a href="/checkout"><span data-text="Checkout"></span></a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<!-- ===  Checkout === -->

	<div class="checkout">

		<div class="container">

			<div class="clearfix">

				<!-- ========================  Cart wrapper ======================== -->

				<div class="cart-wrapper">

					<!--cart items-->

					<div class="clearfix">

						<div class="cart-block cart-block-item clearfix">
							<br/><br/>
							<h2 align="center">GFUNS IS STILL AT WORK</h2>
							<br/><br/>
						</div>


					</div>

				</div>
			</div>

		</div> <!--/container-->
	</div> <!--/checkout-->

</section>




@endsection