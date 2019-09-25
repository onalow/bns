<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hexters\CoinPayment\Entities\cointpayment_log_trx as Logs;

class Transaction extends Model
{
    protected $guarded = [];
    protected $appends = ['coinpayment_trx'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function deal()
    {
        return $this->belongsTo(Deal::class, 'deal_id');
    }

    public function payout()
    {
        return $this->hasOne(Payout::class, 'tx_id');
    }

    public function getCoinpaymentTrxAttribute()
    {
        return Logs::where('payment_id', $this->payment_id)->orderBy('created_at', 'desc')->first();
    }
}
