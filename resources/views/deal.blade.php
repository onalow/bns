@extends('layouts.app')
@section('content')

<section class="page">

    <!-- ===  Page header === -->

    <div class="page-header" style="background-image:url(../colina/assets/images/header-1.jpg)">
        <div class="container">
            <h2 class="title">Make a reservation</h2>
            <p>Proceed to booking step 2</p>
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
                    <li class="col-md-4">
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
                        {{-- <img src="{{ $deal->hotel->picture_url}}" alt=" {{$deal->hotel->name}}" /> --}}
                        <img src="{{ $deal->hotel->picture_url}}" alt=" {{$deal->hotel->address}}" />
                        </div>
                        <div class="title" >

                        <div class="h2"><a>{{$deal->hotel->address}}</a></div>
                            <p>
                                <strong>Number Of Nights:</strong>  {{ $deal->nights}}
                            </p>
                            <p>
                                <strong>Number Of Rooms Available:</strong> {{ $deal->remaining_rooms}} 
                            </p> 
                            <form action="{{ route('process.deal', [$deal->id, 'id' => str_random(60)])}}" method="post">
                                    {{ csrf_field()}}
                            <div class="form-clear form-group{{ $errors->has('rooms') ? ' has-error' : '' }}">
                            <label>Number Of Rooms To Buy:</label>
                            <input type="number" name="rooms" class="form-control" style="text-align: left;" value="{{ old('rooms')}}" required autofocus /><br>
                            @if ($errors->has('rooms'))
                            <span class="help-block">
                              <strong>{{ $errors->first('rooms') }}</strong>
                            </span>
                            @endif
                            </div>

                                <button  type="submit" class="btn btn-main">RESERVE NOW<span class="icon icon-chevron-right"></span></button>
                            </form>
                        </div>
                        <div class="price">
                        </div>
                    </div>


                </div>

            </div>
        </div>

    </div> <!--/container-->
</div> <!--/checkout-->

</section>




@endsection