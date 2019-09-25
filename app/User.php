<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hexters\CoinPayment\Entities\CoinPaymentuserRelation;

class User extends Authenticatable
{
    use Notifiable, CoinPaymentuserRelation;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password', 'first'
    // ];
    protected $guarded = ['verified', 'id'];
    protected $appends = ['name', 'pending_tx', 'completed_tx', 'latest_transaction'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id')->orderBy('created_at', 'desc');
    }

    public function payouts()
    {
        return $this->hasMany(Payout::class, 'recipient_id')->orderBy('created_at', 'DESC');
    }

    public function getNameAttribute()
    {
        return $this->first_name. ' '. $this->last_name;
    }
    public function getCompletedTxAttribute()
    {
        return $this->transactions->where('status', 'completed');
    }
    public function getPendingTxAttribute()
    {
        return $this->transactions->where('status', 'pending');

    }
    public function getLatestTransactionAttribute()
    {
        return $this->transactions->where('status', 'pending')->first();
    }


}
