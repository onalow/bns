@extends('layouts.app')
@section('content')
<section class="frontpage-slider">
    <div class="owl-slider owl-slider-header">

        <!-- === slide item === -->

        <div class="item" style="background-image:url(colina/assets/images/slide-1.jpg)">
            <div class="box box-bottom text-right">
                <div class="container">
                    <h2 class="title animated h1" data-animation="fadeInDown">
                        The privacy and <br />
                        <span>individuality of a custom</span>
                    </h2>
                    <div class="desc animated" data-animation="fadeInUp">
                        The Residences have their own dedicated private entrance as well <br />
                        as an anonymous "celebrity" entrance, for ultimate privacy.
                    </div>
                    <div class="animated" data-animation="fadeInUp">
                        <a href="#" class="btn btn-clean">Virtual tour</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- === slide item === -->

        <div class="item" style="background-image:url(colina/assets/images/slide-3.jpg)">
            <div class="box box-bottom text-center">
                <div class="container">
                    <h2 class="title animated h1" data-animation="fadeInDown">
                        A moment of <br /> <span>pure prestige</span>
                    </h2>
                    <div class="desc animated" data-animation="fadeInUp">
                        Lavish social and business events
                    </div>
                    <div class="desc animated" data-animation="fadeInUp">
                        and unforgettable weddings.
                    </div>
                    <div class="animated" data-animation="fadeInUp">
                        <a href="#" class="btn btn-clean">Buy this template</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- === slide item === -->

        <div class="item" style="background-image:url(colina/assets/images/slide-2.jpg)">
            <div class="box box-bottom text-center">
                <div class="container">
                    <h2 class="title animated h1" data-animation="fadeInDown">Fairmont managed!</h2>
                    <div class="desc animated" data-animation="fadeInUp">The elegant Champagne Bar, the stylish Colina Club.</div>
                    <div class="desc animated" data-animation="fadeInUp">Guestrooms and luxurious suites</div>
                    <div class="animated" data-animation="fadeInUp">
                        <a href="#" class="btn btn-clean">Get insipred</a>
                    </div>
                </div>
            </div>
        </div>

    </div> <!--/owl-slider-->
</section>



<!-- ========================  Rooms ======================== -->

<section class="rooms rooms-widget">

  <!-- TradingView Widget END -->
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
                    <img src="{{ optional($deal->hotel)->picture_url}}" alt="{{$deal->hotel->name}}" style="height: 240px" />
                </div>
                <div class="details " align="center">
                    <div class="text">
                        <div class="time">
                          <span>Min</span>
                          <span>{{ $deal->nights}}</span>
                          <span>Night{{ $deal->nights > 1 ? 's' : ''}}</span>
                      </div>
                      {{-- <h3 class="title"><a>{{ $deal->hotel->name}}</a></h3> --}}
                      <div><br/></div>
                      <div style="min-height: 50px">
                          <p ><i class="fa fa-map-marker"></i> 
                            {{-- {{ title_case($deal->hotel->location)}}  --}}
                            {{ title_case($deal->hotel->address)}} 
                            {{-- {{ title_case($deal->hotel->country)}}  --}}
                        </p>
                    </div>
                </div>
                <div class="book">
                    <div class="stfu">
                        <span class="price h4">${{number_format($deal->buying, 2)}}</span>
                        <span class="mypricespan">Buying Price</span>
                    </div>
                    <div>
                        <span class="price h4">${{ number_format($deal->selling, 2)}}</span>
                        <span class="mypricespan">Selling Price</span>
                    </div>
                </div>
                <br/>
                <div class="book">
                    <div align="center">
                        <a href="{{ route('deal', [ $deal->id, 'id' => str_random(60), 'action' => 'buy', 'category' => 'major'])}}" class="btn btn-main" title="{{ $deal->closed ? 'Deal Closed': 'Buy'}}" {{$deal->closed ? 'disabled': ''}}>Buy now</a>
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
                    <img src="{{ optional($hot->hotel)->picture_url}}" alt="{{ $hot->hotel->name}}" style="height: 240px" />
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
                            {{-- {{ title_case($hot->hotel->location)}}  --}}
                            {{ title_case($hot->hotel->address)}} 
                            {{-- {{ title_case($hot->hotel->country)}} --}}
                        </p>
                    </div>
                </div>
                <div class="book">
                    <div class="stfu">
                        <span class="price h4">${{ number_format($hot->buying, 2)}}</span>
                        <span class="mypricespan">Buying Price</span>
                    </div>
                    <div>
                        <span class="price h4">${{ number_format($hot->selling, 2)}}</span>
                        <span class="mypricespan">Selling Price</span>
                    </div>
                </div>
                <br/>
                <div class="book">
                    <div align="center">
                        <a href="{{ route('deal', [ $hot->id, 'id' => str_random(60), 'action' => 'buy', 'category' => 'hot'])}}" class="btn btn-main" title="{{ $hot->closed ? 'Deal Closed': 'Buy'}}" {{$hot->closed ? 'disabled': ''}}>Buy now</a>
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

{{-- <!-- ========================  Subscribe ======================== -->

<section class="subscribe">
    <div class="container">
        <div class="box">
            <h2 class="title">Subscribe</h2>
            <div class="text">
                <p>& receive free premium gifts</p>
            </div>
            <div class="form-group">
                <input type="text" value="" placeholder="Subscribe" class="form-control" />
                <button class="btn btn-sm btn-main">Go</button>
            </div>
        </div>
    </div>
</section> 

<!-- ================== Footer  ================== --> --}}


@endsection