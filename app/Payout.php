<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function tx()
    {
        return $this->belongsTo(Transaction::class, 'tx_id');
    }
}
