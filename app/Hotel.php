<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $guarded = [];

    public function deals()
    {
        return $this->hasMany(Deal::class, 'hotel_id');
    }
}
