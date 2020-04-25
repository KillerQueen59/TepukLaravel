<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class PaymentModel extends Model{

    protected $table = "payments";

    protected $fillable = [
        'payment_ammount'
    ];

    protected $casts = [
        'payment_ammount' => 'int'
    ];
    public function order(){
        return $this->belongsToMany(OrderModel::class);
    }

    public function shipping(){
        return $this->hasOne(ShippingModel::class);
    }
}
