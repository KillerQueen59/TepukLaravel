<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaymentModel;
use App\Models\ShippingModel;

class ShippingController extends Controller{
    public function create(Request $request){
        $shipping = new ShippingModel;
        $estimate = rand(1,10);
        $shipping->shipping_time = $estimate;
        $shipping->payment_id = $request->id;
        $shipping->shipping_status = 'kemas';
        $shipping->payment;
        $shipping->save();
        return response()->json([
            'success' => true,
            'shipping' => $shipping
        ]);
    }
    public function update(Request $request){
        $shipping = ShippingModel::find($request->id);
        $shipping->shipping_status = $request->status;
        $shipping->update();
        return response()->json([
            'success' => true,
            'message' => 'shipping updated'
        ]);
    }
    public function shippings(Request $request){
        $shipping = ShippingModel::get();
        foreach($shipping as $s){
            $s->payment;
        }
        return response()->json([
            'success' => true,
            'shipping' => $shipping
        ]);
    }
}
