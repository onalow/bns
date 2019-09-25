<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Mobile Web-app fullscreen -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">

  <!-- Meta tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="{{asset("colina/favicon.ico")}}">

  <!--Title-->
  <title>NextBeux - Hotel, Resort & Accommodation</title>

  <!--CSS styles-->
  <link rel="stylesheet" media="all" href="{{asset("colina/css/bootstrap.css")}}" />
  <link rel="stylesheet" media="all" href="{{asset("colina/css/animate.css")}}" />
  <link rel="stylesheet" media="all" href="{{asset("colina/css/font-awesome.css")}}" />
  <link rel="stylesheet" media="all" href="{{asset("colina/css/linear-icons.css")}}" />
  <link rel="stylesheet" media="all" href="{{asset("colina/css/hotel-icons.css")}}" />
  <link rel="stylesheet" media="all" href="{{asset("colina/css/magnific-popup.css")}}" />
  <link rel="stylesheet" media="all" href="{{asset("colina/css/owl.carousel.css")}}" />
  <link rel="stylesheet" media="all" href="{{asset("colina/css/datepicker.css")}}" />
  <link rel="stylesheet" media="all" href="{{asset("colina/css/theme.css")}}?version={{md5(date('Y-d-m H:i:s'))}}" />
  <link href="{{asset("portal/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css")}}" rel="stylesheet">
  <link href="{{asset("portal/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css")}}" rel="stylesheet">
  <link href="{{asset("portal/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css")}}" rel="stylesheet">
  <link href="{{asset("portal/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css")}}" rel="stylesheet">
  {{-- <link href="{{asset('css/sweetalert2.css')}}" rel="stylesheet" /> --}}

  <!--Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500&amp;subset=latin-ext" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&amp;subset=latin-ext" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<body>

  {{-- <div class="page-loader"></div> --}}

  <div class="wrapper">

    <header>

      <!-- ======================== Navigation ======================== -->

      <div class="container">

        <!-- === navigation-top === -->

        <nav class="navigation-top clearfix">

          <!-- navigation-top-left -->

    {{--       <div class="navigation-top-left">
            <a class="box" href="#">
              <i class="fa fa-facebook"></i>
            </a>
            <a class="box" href="#">
              <i class="fa fa-twitter"></i>
            </a>
            <a class="box" href="#">
              <i class="fa fa-youtube"></i>
            </a>
          </div> --}}

          <!-- navigation-top-right -->

          <div class="navigation-top-right">
            <a class="box">
              &nbsp;
            </a>
            <a class="box">
             &nbsp;
           </a>
           <a class="box">
            <i class="fa fa-envelope"></i> 
            support@nextbeux.com
          </a>
        </div>
      </nav>

      <!-- === navigation-main === -->

      <nav class="navigation-main clearfix">

        <!-- logo -->

        <div class="logo animated fadeIn">
          <a href="/">
            <img class="logo-desktop" src="{{asset("colina/assets/images/logo.png")}}"  alt="Alternate Text" />
            <img class="logo-mobile" src="{{asset("colina/assets/images/logo-mobile.png")}}" alt="Alternate Text" />
          </a>
        </div>

        <!-- toggle-menu -->

        <div class="toggle-menu"><i class="icon icon-menu"></i></div>

        <!-- navigation-block -->

        <div class="navigation-block clearfix">

          <!-- navigation-left -->

          <ul class="navigation-left">
            @if(Auth::user())
            <li>
              <a href="/">Home</a>
            </li>
            <li>
              <a href="{{ route('my_trxns', encrypt(auth()->id()))}}">Transactions</a>
            </li>
            @else
            <li>
              <a href="/">Home</a>
            </li>
            <li>
              <a href="/how-it-works">How It Works</a>
            </li>
            @endif
          </ul>

          <!-- navigation-right -->

          <ul class="navigation-right">
            @if(Auth::user())
            <li>
              <a href="{{ route('profile', ['user' => str_slug(auth()->user()->name)])}}">Profile</a> 
            </li>
            <li>
             <a href="{{ route('logout') }}"
             onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">Logout</a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
          @else
          <li>
            <a href="/register">Register</a>
          </li>
          <li>
            <a href="/login">Login</a>
          </li>
          @endif
          <li>
            <a href="{{ url('/contact')}}">Contact</a>
          </li>
        </ul>

      </div> <!--/navigation-block-->

    </nav>

  </div> <!--/container-->

</header>



<section class="page" style="background: #eee">

  <!-- ===  Page header === -->

  <div  class="page-header" style="background-image:url(../colina/assets/images/header-1.jpg); " >
  </div>

  <!-- ===  Checkout steps === -->
  <div id="app">
    <div id="coinpayment-vue">
      <div class="step-wrapper" style="padding-top:  10px ">
        <div class="container">
          <div class="stepper" style="color: black;">
            <div class="jumbotron" style="background: #fff;">
              <div class="row text-center">
                <p>Payment Details</p>

                <div class="col-md-8 col-md-offset-2">  
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Description</th>
                        <th class="text-right">Amount</th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <td>
                          <p class="text-right">Reservation </p>
                          <div class="text-right">
                            <small class="text-muted text-right">Item Price:  {{ $data['items'][0]['priceItem'] }} {{ config('coinpayment.default_currency') }}</small><br>
                            <small class="text-muted text-right">Quantity: {{ $data['items'][0]['qtyItem'] }} * {{ $data['items'][0]['nights'] }}</small>
                          </div>
                        </td>
                        {{-- <td class="text-right">0.50 USD</td> --}}
                      </tr>
                    </tbody>
                  </table>


                  <table class="table">
                    <tfoot>
                      <tr>
                        <th>Item Total</th>
                        <th class="text-right">{{ number_format($data['items'][0]['subtotalItem'], 2) }} {{ config('coinpayment.default_currency') }}</th>
                      </tr>
                      <tr>
                        <td class="text-right">Total Amount USD</td>
                        <td class="text-right"> {{ $data['amountTotal'] }} USD</td>
                      </tr>
                      <tr>
                        <td class="text-right">Payment Method</td>
                        <td class="text-right">BTC</td>
                      </tr>
                      <tr>
                        <td class="text-right">Total Amount in BTC</td>
                        <td class="text-right">@{{ total_amount_coin }}</td>
                      </tr>
                    </tfoot>
                  </table>
                  <button type="button" class="btn btn-primary" type="button" v-bind:disabled="!(coins.length > 0)" class="btn btn-block btn-danger mt-3 mb-4" @click="confirmation">
                   Pay Now
                 </button>
               </div>

             </div>
           </div>
         </div>
       </div>
     </div>


     <div class="modal fade" id="paynow" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <br/><br/><br/>
       <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: #eee;">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel" style="text-align: center">Reservation Invoice</h4>
            {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
          </div>

          <!-- Modal body -->
          <div class="modal-body" >
            <div class="row text-center">
             <p><span style="font-weight: bold;">Notice</span> <br> Payment should be received within 5 minutes of completion.</p>
           </div>

           <div class=" row text-center" >
             <qrcode v-bind:value="payment.first.address" :options="{ size: 200 }"></qrcode>
          </div>
          <p class="text-center" style="margin: 20px 0;">@{{ payment.first.address }}</p>
          
          <div class="table-responsive col-sm-">
            <table class="table">
              <tr style="font-weight: bold;">
                <td class="text-right">Total Amount To Send:</td>
                <td>@{{ payment.first.amount }} @{{ payment.last.coin }}</td>
              </tr>
              <tr>
                <td class="text-right">Total confirms needed:</td>
                <td>@{{ payment.first.confirms_needed }}</td>
              </tr>
              <tr>
                <td class="text-right">Status:</td>
                <td>Waiting for Payment</td>
              </tr>
              <tr style="font-weight: bold;">
                <td class="text-right" >Time Left For Us to Confirm Funds:</td>
                <td>
                 <div class="time-remaining bold">.../.../... ...:...:...</div>
                </td>
              </tr>
              <tr>
                <td class="text-center" colspan="2">
                 
                  <div class="text-danger">
                    <small style="color: red;">Do not send value to us if address status is expired!</small> <br>
                    <small style="color: red;">Kindly note that any payment less than @{{ payment.first.amount }} @{{ payment.last.coin }} will not be processed.</small>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="text-right">Received So Far:</td>
                <td>@{{ payment.last.receivedf }} @{{ payment.last.coin }}</td>
              </tr>
              <tr>
                <td class="text-right">Balance Remaining:</td>
                <td>
                    @{{ payment.first.amount }} @{{ payment.last.coin }}
                </td>
              </tr>

              <tr>
                <td class="text-right">Payment ID:</td>
                {{-- <td>CPRDJJEDTFYTFTDRDCFCRDXCTFCD</td> --}}
                 <td>@{{ payment.first.txn_id }}</td>
              </tr>
    {{--           <tr>
                <td class="text-center text-muted" colspan="2">
                  <a class="text-muted" v-bind:href="payment.first.status_url" target="_blank">Alternative Link</a> | <a class="text-muted" href="{{ route('coinpayment.transaction.histories') }}">Transaction Histories</a>
                </td>
              </tr> --}}
            </table>
          </div>

        </div>

        <!-- Modal footer -->
    {{--     <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"></button>
        </div> --}}

      </div>
    </div>
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
            {{-- <img src="{{ $deal->hotel->picture_url}}" alt=" {{$deal->hotel->address}}" /> --}}
          </div>

        </div>

      </div>
    </div>

  </div> <!--/container-->
</div> <!--/checkout-->

</section>





<footer style="padding: 10px;">
  <div class="container">

    <!--footer links-->
    {{-- <div class="footer-links">
      <div class="row">
        <div class="col-sm-6 footer-left">
          <a href="#">Sitemap</a> &nbsp; | &nbsp; <a href="#">Privacy policy</a> | &nbsp; <a href="#">Guest book</a>
        </div>
        <div class="col-sm-6 footer-right">
          <a href="#">Gallery</a> &nbsp; | &nbsp; <a href="#">Reservations</a> | &nbsp; <a href="#">Help center</a>
        </div>
      </div>
    </div> --}}

    <!--footer social-->

    <div class="footer-social">
      <div class="row">
{{--         <div class="col-sm-12 icons">
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div> --}}
        <div class="col-sm-12 copyright">
          <small>Copyright &copy; 2018 &nbsp; | &nbsp; NextBeux</small>
        </div>

{{--         <div class="col-sm-12 text-center ">
          <a href="" class="footer-logo"><img src="{{asset("colina/assets/images/logo-mobile.png")}}" alt="Alternate Text" /></a>
        </div> --}}

      </div>
    </div>
  </div>
</footer>

</div> <!--/wrapper-->

<!--JS files-->
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
<script src="{{asset("colina/js/jquery.min.js")}}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.2.0/dist/jquery.countdown.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- <script src="{{asset("colina/js/jquery.min.js")}}"></script> --}}
<script src="{{asset("colina/js/jquery-ui.js")}}"></script>
<script src="{{asset("colina/js/jquery.bootstrap.js")}}"></script>
<script src="{{asset("colina/js/jquery.magnific-popup.js")}}"></script>
<script src="{{asset("colina/js/jquery.owl.carousel.js")}}"></script>
<script src="{{asset("colina/js/main.js")}}"></script>
<!-- jQuery -->
<!-- Bootstrap -->
<script src="{{asset("portal/vendors/bootstrap/dist/js/bootstrap.min.js")}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset("portal/build/js/custom.min.js")}}"></script>

<!-- Datatables -->
<script src="{{asset("portal/vendors/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("portal/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
<script src="{{asset("portal/vendors/datatables.net-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{asset("portal/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js")}}"></script>
 {{-- <script src="{{asset("portal/vendors/datatables.net-buttons/js/buttons.flash.min.js")}}"></script>
 --}}<script src="{{asset("portal/vendors/datatables.net-buttons/js/buttons.html5.min.js")}}"></script>
 <script src="{{asset("portal/vendors/datatables.net-buttons/js/buttons.print.min.js")}}"></script>
 <script src="{{asset("portal/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js")}}"></script>
 <script src="{{asset("portal/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js")}}"></script>
 <script src="{{asset("portal/vendors/datatables.net-responsive/js/dataTables.responsive.min.js")}}"></script>
 <script src="{{asset("portal/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js")}}"></script>
 <script src="{{asset("portal/vendors/datatables.net-scroller/js/dataTables.scroller.min.js")}}"></script>
 <!-- Include this after the sweet alert js file -->
 @include('sweet::alert')
 @stack('scripts')
<script src="https://cdn.jsdelivr.net/npm/@xkeshi/vue-qrcode@0.3.0/dist/vue-qrcode.min.js"></script>
  <script type="text/javascript">
  Vue.component('qrcode', VueQrcode);
  var vue = new Vue({
    el: '#coinpayment-vue',
    data: {
      paymentMethod: '-',
      total_amount_coin: 0,
      searchCoin: '',
      amountTotalUsd: {{ $data['amountTotal'] }},
      coins: [],
      errors: [],
      isError: false,
      coinAliases:[],
      payment: {
        first: {},
        last: {}
      }
    },
    created(){
      this.getMethods();
      //$('#paynow').modal('show');
    },
    methods:{
      getMethods(){
        var self = this;
        axios.get('{{ route('coinpayment.ajax.rate.usd', $data['amountTotal']) }}')
          .then(function(json){
            self.paymentMethod = json.data.coins[0].iso;
            self.total_amount_coin = json.data.coins[0].rate;
            self.coins = json.data.coins_accept;
            self.coinAliases = json.data.aliases;

            $('.coin-items').slimScroll({
                height: '500px'
            });
          });
      },
      selectMethod(item){

        this.coins.forEach(function(coin){
          coin.selected = false;
        });

        item.selected = true;
        this.paymentMethod = item.iso;
        this.total_amount_coin = item.rate;
        this.searchCoin = '';
      },
      filterCoin: function() {
        var self = this;
        return this.coins.filter(function(coin) {
          let regex = new RegExp('(' + self.searchCoin + ')', 'i');
          return coin.name.match(regex);
        })
      },
      confirmation(){
        var self = this;
        swal('Confirmation', 'Are you sure ?',{
          buttons: true
        }).then(function(event){
          if(event){
            self.makeTransaction();
          }
        });
      },
      makeTransaction(){
        var self = this;
        swal('Please Wait','Creating Transactoin...', {
          closeOnClickOutside: false,
          closeOnEsc: false,
          buttons:false,
          timer: 10000
        });

        var params = {
          amount: this.amountTotalUsd,
          payment_method: this.paymentMethod
        };

        axios.post(`{{ route('coinpayment.ajax.store.transaction') }}`, params)
          .then(function(json){
            self.payment.first = json.data.result;
            // console.log(Echo);
                  Echo.channel('transaction-'+json.data.result.txn_id)
                    .listen('SendTransactionCompletedSignal', (e) => {
                        location.href = '/payment/success';
                    });
            var _self = self;

            if(json.data.error == 'ok'){
              var result = json.data.result;
              var parameters = {
                result,
                params: {!! $params !!},
                payload: {!! $payload !!}
              };
              axios.post(`{{ route('coinpayment.ajax.trxinfo') }}`, parameters)
                .then(function(json){
                  _self.payment.last = json.data.result;
                  
                   var date = new Date(json.data.result.time_expires * 1000);
                   var time_exp = `${date.getFullYear()}/${date.getMonth()+1}/${date.getDate()} ${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`;
                  $('.time-remaining').countdown(time_exp, function(event){
                    $(this).html(event.strftime('%D days %H:%M:%S'));
                  });
                  swal.close();
                  $('#paynow').modal('show');
                  
                })
                .catch(function(error){
                  swal('Danger!', 'Look like something wrong!');
                });

            }else{
              swal('Danger!', 'Look like something wrong!');
            }
          })
          .catch(function(err){
            if(err !== undefined)
              if(err.response !== undefined)
                if(err.response.status == 422){
                  swal('Danger!', err.response.data.message,{
                    dangerMode: true,
                    icon: "error",
                  });
                  self.errors = err.response.data.errors;
                  self.isError = true;
                }
          });

      }
    }
  });
  </script>
 <!-- ================== Footer  ================== -->


</body>

</html>