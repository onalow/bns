@extends('layouts.app')
@section('content')

<!-- ================== Page ================== -->

<section class="page">

  <!-- ===  Page header === -->

  <div class="page-header" style="background-image:url(colina/assets/images/header-1.jpg)">
    <div class="container">
      <h2 class="title">Transactions</h2>
      <p>We have displayed for you, your recent transactions</p>
    </div>
  </div>

 {{--  <!-- === Shorcodes === -->
  <section class="blog">
    <div class="shortcodes">
     <div class="container">
      <div class="row">

        <!-- === article item === -->
        @php
        $trxns = auth()->user()->transactions;
        @endphp
        @isset($trxns)
        @foreach ($trxns as $trx)
        <div class="col-sm-4">
          <article>
           @isset($trx->coinpayment_trx)
           <div class="image" align="center">
            <img src="{{ $trx->coinpayment_trx['qrcode_url']}}" alt="" style="height: 150px; width: 150px" />
            <p>{{$trx->coinpayment_trx->payment_address}}</p>
          </div>
          @endisset
          <div align="center">
            <div >
              <p ><i class=""></i> 
                Status: {{$trx->coinpayment_trx['status_text']}}
              </p>
            </div>
            <div><br/></div>
            <div class="book">
             <div class="stfu">
                <span class="mypricespan">Amount</span>
               <span class="price rundown">${{$trx->coinpayment_trx['amount']}} {{$trx->coinpayment_trx['coin']}}</span>
              
             </div>
             {{-- @if ($trx->coinpayment_trx['confirmation_at'])
             <div>
                <span class="mypricespan">Confrimed</span>
              <span class="price rundown">{{ $trx->coinpayment_trx['confirmation_at']->diffForHumans()}}</span>
              
            </div>
            @elseif ( $trx->coinpayment_trx['updated_at'])
            <div>
                <span class="mypricespan">Confrimed </span>
              <span class="price rundown h4">{{ $trx->coinpayment_trx['updated_at']->diffForHumans()}}</span>
              
            </div>
            @endif --}}
          </div>
          <div><br/></div>
            {{-- <div class="book">
              <div align="center">
                <a href="{{ $trx->coinpayment_trx['status_url']}}" class="btn btn-main" title="Confirm Manually">Check Status manually</a>
              </div>

            </div> --}}
       {{--  </div>
      </article>
    </div>
    @endforeach
    @endisset


  </div> <!--/row-->
</div> <!--/container-->
</div> --}}

{{-- </section> --}} 
<div class="row" style="margin-left: 10px; margin-right: 10px">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel" style="min-height: 530px">
      <div class="x_title">
        <h2><i class="fa fa-briefcase"></i> Transactions</h2>

        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>S/No</th>
                {{-- <th>User</th> --}}
                <th>Payment ID</th>
                <th>Details</th>
                <th>Amount (Paid)</th>
                <th>Selling Price</th>
                <th>Transaction Date</th>
                <th>Due Date</th>
                <th>Transaction Status</th>
                <th>Status</th>
                
                {{-- <th><i class="fa fa-cog"></i></th> --}}
              </tr>
            </thead>
            <tbody>
              @isset($payouts)
              @foreach ($payouts as $p)
              <tr>
                <td>{{ $loop->index + 1}}</td>
                <td>{{ $p->tx->payment_id}}</td>
                <td>{{optional($p->tx)->rooms}} Room{{optional($p->tx)->rooms >1 ? 's': ''}} for {{optional($p->tx->deal)->nights}} Night{{optional($p->tx->deal)->nights >1 ? 's': ''}}</td>
                <td>USD {{ number_format($p->tx->amount, 2)}}</td>
                <td>USD {{ number_format($p->amount, 2)}}</td>
                <td>{{$p->tx->created_at}}</td>
                <td>{{$p->due_at}}</td>
                
                <td>{{$p->tx->status =='completed'? 'Confirmed': 'Pending Confirmation'}}</td>
                <td>
                  @if($p->status == 'pending')
                  {{'Not Sold'}}
                  @else
                  <img src="{{asset("images/confirmed.jpeg")}}" width="20px" height="20px">
                  @endif 
                </td>
                {{-- <td>{{$p->status}}</td> --}}
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
</section>


@endsection
          <!-- === rooms item === -->