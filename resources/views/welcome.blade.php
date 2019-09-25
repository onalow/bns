@extends('layouts.app')
@section('content')



    
<section class="frontpage-slider">
    <div class="owl-slider owl-slider-header">

        <!-- === slide item === -->

        <div class="item" style="background-image:url(colina/assets/images/slide-1.jpg)">
            <div class="box box-bottom text-right">
                <div class="container">
                    <h2 class="title animated h1" data-animation="fadeInDown">
                        Reserve <br />
                        <span>Resell and Gain</span>
                    </h2>
                    <div class="desc animated" data-animation="fadeInUp">
                        Reserve hotel rooms anywhere in the world at discounted rates <br />
                        Resell these rooms at better rates and make gain.
                    </div>
                    <div class="animated " data-animation="fadeInUp">
                        <a href="#hotdeals" class="scrollLink btn btn-clean">Hot Deals</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- === slide item === -->

        <div class="item" style="background-image:url(colina/assets/images/slide-3.jpg)">
            <div class="box box-bottom text-center">
                <div class="container">
                    <h2 class="title animated h1" data-animation="fadeInDown">
                        Reserve  Resorts <br/> Anywhere!
                    </h2>
                    <div class="desc animated" data-animation="fadeInUp">
                        Resell at Better Rates
                    </div>
                    <div class="desc animated" data-animation="fadeInUp">
                        For Vacations and Weddings
                    </div>
                    <div class="animated" data-animation="fadeInUp">
                        <a href="#hotdeals" class="scrollLink btn btn-clean">Hot Deals</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- === slide item === -->

        <div class="item" style="background-image:url(colina/assets/images/slide-2.jpg)">
            <div class="box box-bottom text-center">
                <div class="container">
                    <h2 class="title animated h1" data-animation="fadeInDown">Planning a Personal Travel?</h2>
                    <div class="desc animated" data-animation="fadeInUp">We've got the best Discounts for you!</div>
                    <div class="desc animated" data-animation="fadeInUp">Guestrooms and luxurious suites</div>
                    <div class="animated" data-animation="fadeInUp">
                        <a href="#hotdeals" class="scrollLink btn btn-clean">Hot Deals</a>
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
        <p>Find some of our most profitable deals here.</p>
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
                      @if($deal->closed)
                      <div class="time2" id="gre">
                          <span>&nbsp;</span>
                          <span><i class="fa fa-check fa-1x"></i></span>
                          <span><strong>Closed</strong></span>
                      </div>
                      @else
                      <div class="time">
                          <span>Min</span>
                          <span>{{ $deal->nights}}</span>
                          <span>Night{{ $deal->nights > 1 ? 's' : ''}}</span>
                      </div>
                      @endif
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
                        <span class="mypricespan">Reserve Price</span>
                    </div>
                    <div>
                        <span class="price h4">${{ number_format($deal->selling, 2)}}</span>
                        <span class="mypricespan">Selling Price</span>
                    </div>
                </div>
                <br/>
                <div class="book">
                    <div align="center">
                        @if($deal->closed)
                        <a class="btn btn-main" title="{{ $deal->closed ? 'Deal Closed': 'Buy'}}" {{$deal->closed ? 'disabled': ''}}>Deal Closed</a> 
                        @else
                        <a href="{{ route('deal', [ $deal->id, 'id' => str_random(60), 'action' => 'buy', 'category' => 'major'])}}" class="btn btn-main" title="{{ $deal->closed ? 'Deal Closed': 'Buy'}}" {{$deal->closed ? 'disabled': ''}}>Reserve now</a>
                        @endif
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

<section class="blog blog-widget"  id="hotdeals">

    <!-- === stretcher header === -->

    <div class="section-header">
        <div class="container">
         <h2 class="title">Hot Deals 
             {{-- <a href="" class="btn btn-sm btn-clean-dark">Explore more</a> --}}
         </h2>
         <p>
            Find the hottest available deals here.
        </p>
    </div>
</div>

<div class="container">
  <div class="row">

    <!-- === article item === -->
    @isset($hot_deals)
    @foreach ($hot_deals as $hot)
    <div class="col-sm-4">
        <article>
          <div class="image">
            <img src="{{ optional($hot->hotel)->picture_url}}" alt="{{ $hot->hotel->name}}" style="height: 240px" />
        </div>
        <div align="center" {{-- style="background: #eeeeee" --}}>
            <div class="text" {{-- style="background: #eeeeee" --}}>
                @if($hot->closed)
                <div class="time2">
                  <span>&nbsp;</span>
                  <span><i class="fa fa-check fa-1x"></i></span>
                  <span><strong>Closed</strong></span>
              </div>
              @else
              <div class="time">
                  <span>Min</span>
                  <span>{{ $hot->nights}}</span>
                  <span>Night{{ $hot->nights > 1 ? 's' : ''}}</span>
              </div>
              @endif
              <div><br/></div>
              <div style="min-height: 50px">
                 <p class="oya"><i class="fa fa-map-marker"></i> 
                    {{-- {{ title_case($hot->hotel->location)}}  --}}
                    {{ title_case($hot->hotel->address)}} 
                    {{-- {{ title_case($hot->hotel->country)}} --}}
                </p>
            </div>
            <div><br/></div>
            <div class="book">
                <div class="stfu">
                    <span class="price oya ayo">${{ number_format($hot->buying, 2)}}</span>
                    <span class="mypricespan">Reserve Price</span>
                </div>
                <div class="">
                    <span class="price oya ayo">${{ number_format($hot->selling, 2)}}</span>
                    <span class="mypricespan">Selling Price</span>
                </div>
            </div>
            <div><br/></div>
            <div>
                <div align="center">
                    @if($hot->closed)
                    <a class="btn btn-main" title="{{ $hot->closed ? 'Deal Closed': 'Buy'}}" {{$hot->closed ? 'disabled': ''}}>Deal Closed</a> 
                    @else
                    <a href="{{ route('deal', [ $hot->id, 'id' => str_random(60), 'action' => 'buy', 'category' => 'hot'])}}" class="btn btn-main" title="{{ $hot->closed ? 'Deal Closed': 'Buy'}}" {{$hot->closed ? 'disabled': ''}}>Reserve now</a>
                    @endif
                </div>

            </div>
        </div>
    </div>
</article>
</div>
@endforeach
@endisset


</div> <!--/row-->
</div> <!--/container-->
</section>

@include('layouts.testimonial')




@endsection