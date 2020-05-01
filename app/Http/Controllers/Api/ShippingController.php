<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\PaymentModel;
use App\Models\ShippingModel;
use App\User;

class ShippingController extends Controller{
    public function create(Request $request){
        $shipping = new ShippingModel;
        $user = User::where(['id'=>Auth::user()->id])->get();
        $estimate = rand(1,10);
        $shipping->shipping_time = $estimate;
        $shipping->payment_id = $request->id;
        $pick_cour = rand(1,3);
        $kurir = '';
        if($pick_cour == 1){
            $kurir = 'jne';
        }elseif($pick_cour == 2){
            $kurir = 'sicepat';
        }elseif($pick_cour == 3){
            $kurir = 'tiki';
        }
        $shipping->shipping_kurir = $kurir;
        $shipping->shipping_status = 'kemas';
        $shipping->payment;
        $shipping->save();
        return response()->json([
            'success' => true,
            'shipping' => $shipping,
            'user' => $user
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
        $user = User::where(['id'=>Auth::user()->id])->get();
        foreach($shipping as $s){
            $s->payment;
        }
        return response()->json([
            'success' => true,
            'shipping' => $shipping,
            'user' => $user
        ]);
    }
}
