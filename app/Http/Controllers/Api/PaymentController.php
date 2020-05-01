<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderModel;
use App\Models\PaymentModel;

class PaymentController extends Controller{
    public function create(Request $request){
        $payment = new PaymentModel;
        $sum = 0;
        $orders = OrderModel::where(['status'=>'pending','user_id'=> Auth::user()->id])->get();
        foreach($orders as $o){
            $o->status = 'lunas';
            $o->update();
            $sum = $sum + $o->total;
            $payment->order;
        }
        $payment->payment_ammount = $sum;
        if($sum==0){
            return response()->json([
                'success'=>false,
                'payments' => 'cart kosong'
            ]);
        }else{
            $payment->payment_code = '#'.str_random(6);
            $payment->save();

            return response()->json([
                'success'=>true,
                'payments' => $payment
            ]);
        }
    }
    public function payments(Request $request){
        $orders = OrderModel::where(['status'=>'lunas','user_id'=> Auth::user()->id])->get();
        $payments = PaymentModel::get();
        foreach($orders as $order){
            $order->user;
            $order->pupuk;
        }
        return response()->json([
            'success'=>true,
            'payments' => $payments,
            'orders' => $orders
        ]);

    }
}
