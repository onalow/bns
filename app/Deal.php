<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $guarded = [];
    protected $appends = ['buying', 'selling'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'deal_id');
    }

    public function active_tansactions()
    {
        return $this->hasMay(Transaction::class, 'deal_id')->where('status', 'paid');
    }

    public function getBuyingAttribute()
    {
        $price = intval($this->hotel->price);
        $discount = ($price / (1 + floatval($this->discount)/100));
        // $amount =  $price - $discount;
        $amount =   $discount;

        // dd($amount);
        return $amount;
    }

    public function getSellingAttribute()
    {     
        // dd($this->hotel->price);
        return $this->hotel->price;
    }
}
