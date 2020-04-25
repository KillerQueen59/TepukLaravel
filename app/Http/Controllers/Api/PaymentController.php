<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderModel;


class PaymentController extends Controller{
    public function create(Request $request){
        $payment = new PaymentModel;
        $payment->order_id = $request->order_id;
        $sum = 0;
        $orders = OrderModel::where(['status'=>'pending','user_id'=> $request->id])->get();
        foreach($orders as $o){
            $sum = $sum + $o->total;
        }
        $payment->payment_ammount = $sum;
        $payment->order;
        $payment->save();

        return response()->json([
            'success'=>true,
            'payments' => $payment
        ]);


    }
}
