<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class PaymentModel extends Model{

    protected $table = "payments";

    protected $fillable = [
        'user_id', 'pupuk_id', 'status','order_qty','total'
    ];

    protected $casts = [
        'pupuk_id' => 'int',
        'order_qty' => 'int',
        'total' => 'int'
    ];
    public function order(){
        return $this->belongsToMany(OrderModel::class);
    }

    public function shipping(){
        return $this->hasOne(Shipping::class);
    }
}
