<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingModel extends Model{
    protected $table = "shippings";

    protected $fillable = [
        'shipping_time','shipping_status'
    ];

    protected $casts = [
        'shipping_time' => 'int'
    ];

    public function payment(){
        return $this->belongsTo(PaymentModel::class);
    }
}
