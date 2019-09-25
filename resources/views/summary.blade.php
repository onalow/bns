@extends('layouts.app')
@section('content')

<section class="page">

    <!-- ===  Page header === -->

    <div class="page-header" style="background-image:url(../../colina/assets/images/header-1.jpg)">
        <div class="container">
            <h2 class="title">Transaction Summary</h2>
            <p>Proceed to checkout</p>
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
                    <li class="col-md-4">
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
                        <div class="image">
                            <img src="{{ $tx->deal->hotel->picture_url}}" alt="" />
                            <div class="h2"><a>{{ $tx->deal->hotel->address}}</a></div>

                        </div>
                        <div class="title text-center" >
                            <div>


                            <p>
                                <strong>Number Of Nights:  {{ $tx->deal->nights}}</strong>
                            </p>

                            <p>
                                <strong>Number Of Rooms:  {{ $tx->rooms}}</strong>
                            </p>

                           {{--  <p>
                            <strong>Discount:  {{ $tx->deal->discount}}%</strong>
                            </p> --}}
                            <p>&nbsp;</p>
                            {{-- <p><a href="{{ route('deal.checkout', [$tx->id, 'id' => str_random(60), 'action' => 'checkout'])}}" class="btn btn-main">CHECKOUT<span class="icon icon-chevron-right"></span></a></p> --}}
                            
                        </div>
                        <div class="price text-center">
                        <span class="final h3" style="font-size: 15px;" > Cost: $ {{ number_format($tx->amount, 2)}}</span>
                        <span style="font-size: 20px;"> <strong>Sell at <span class="final">$ {{ number_format($tx->roi, 2)}}</strong></span><br/>Within 48 - 72 Hrs</span>
                        </div>

                        <p class="text-center" style="margin-top: 15px;"><a href="{{$link_transaction }}" class="btn btn-main">CHECKOUT<span class="icon icon-chevron-right"></span></a></p>
                    </div>


                </div>

            </div>
        </div>

    </div> <!--/container-->
</div> <!--/checkout-->

</section>




@endsection