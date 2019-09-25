@extends('layouts.app')
@section('content')
<section class="page">

    <!-- ===  Page header === -->

    <div class="page-header" style="background-image:url(colina/assets/images/header-1.jpg)">
        <div class="container">
            <h2 class="title">Mart Page</h2>
            <p>Oya Na Choose Major/Hot Deals</p>
        </div>
    </div>


    <!-- ========================  Rooms ======================== -->

    <section class="rooms rooms-widget">

        <!-- === rooms header === -->

        <div class="section-header">
            <div class="container">
                <h2 class="title">Major Deals 
                {{-- <a href="" class="btn btn-sm btn-clean-dark">View all</a> --}}
                </h2>
                <p>Designed as a privileged almost private place where you'll feel right at home</p>
            </div>
        </div>

        <!-- === rooms content === -->

        <div class="container">

            <div class="owl-rooms owl-theme">

                <!-- === rooms item === -->
                @isset($deals)
                @foreach ($deals as $deal)
                <div class="item">
                    <article>
                        <div class="image">
                            <img src="{{ $deal->hotel->picture_url}}" alt="{{$deal->hotel->name}}" style="height: 240px" />
                        </div>
                        <div class="details" align="center">
                            <div class="text">
                                <div class="time">
                                  <span>Min</span>
                                  <span>{{ $deal->nights}}</span>
                                  <span>Nights</span>
                              </div>
                              {{-- <h3 class="title"><a>{{ $deal->hotel->name}}</a></h3> --}}
                              <div><br/></div>
                              <div style="min-height: 50px">
                                  <p><i class="fa fa-map-marker"></i> 
                                    {{ title_case($deal->hotel->location)}}
                                    {{ title_case($deal->hotel->address)}} 
                                    {{ title_case($deal->hotel->country)}}
                                </p>
                            </div>
                        </div>
                        <div class="book">
                            <div class="stfu">
                                <span class="price h4">${{number_format($deal->buying)}}</span>
                                <span class="mypricespan">Reserve Price</span>
                            </div>
                            <div>
                                <span class="price h4">${{ number_format($deal->selling)}}</span>
                                <span class="mypricespan">Selling Price</span>
                            </div>
                        </div>
                        <br/>
                        <div class="book">
                            <div align="center">
                                <a href="{{ route('deal', [ $deal->id, 'id' => str_random(60), 'action' => 'buy', 'category' => 'major'])}}" class="btn btn-main">Reserve now</a>
                            </div>

                        </div>
                    </div>
                </article>
            </div>
            @endforeach
            @endisset


        </div><!--/owl-rooms-->

    </div> <!--/container-->

</section>


<!-- ========================  Blog ======================== -->

<section class="rooms rooms-widget">

  <!-- TradingView Widget END -->
  <!-- === rooms header === -->

  <div class="section-header">
    <div class="container">
       <h2 class="title">Hot Deals 
       {{-- <a href="" class="btn btn-sm btn-clean-dark">Explore more</a> --}}
       </h2>
       <p>
        Events, place to go, tour info & more
    </p>
</div>
</div>

<!-- === rooms content === -->

<div class="container">

    <div class="owl-rooms owl-theme">

        <!-- === rooms item === -->
        @isset($hot_deals)
        @foreach ($hot_deals as $hot)
        <div class="item">
            <article>
                <div class="image">
                    <img src="{{ $hot->hotel->picture_url}}" alt="{{ $hot->hotel->name}}" style="height: 240px" />
                </div>
                <div class="details" align="center">
                    <div class="text">
                        <div class="time">
                           <span>Min</span>
                           <span>{{ $hot->nights}}</span>
                           <span>Night{{ $hot->nights > 1 ? 's' : ''}}</span>
                       </div>
                       {{-- <h3 class="title"><a>{{ $deal->hotel->name}}</a></h3> --}}
                       <div><br/></div>
                       <div style="min-height: 50px">
                           <p><i class="fa fa-map-marker"></i> 
                            {{ title_case($hot->hotel->location)}} 
                            {{ title_case($hot->hotel->address)}} 
                            {{ title_case($hot->hotel->country)}}
                        </p>
                    </div>
                </div>
                <div class="book">
                    <div class="stfu">
                        <span class="price h4">${{ number_format($hot->buying, 2)}}</span>
                        <span class="mypricespan">Reserve Price</span>
                    </div>
                    <div>
                        <span class="price h4">${{ number_format($hot->selling, 2)}}</span>
                        <span class="mypricespan">Selling Price</span>
                    </div>
                </div>
                <br/>
                <div class="book">
                    <div align="center">
                        <a href="{{ route('deal', [ $hot->id, 'id' => str_random(60), 'action' => 'buy', 'category' => 'hot'])}}" class="btn btn-main" title="{{ $hot->closed ? 'Deal Closed': 'Buy'}}" {{$hot->closed ? 'disabled': ''}}>Reserve now</a>
                    </div>

                </div>
            </div>
        </article>
    </div>
    @endforeach
    @endisset


</div><!--/owl-rooms-->

</div> <!--/container-->

</section>





@include('layouts.testimonial')


</section>

@endsection
