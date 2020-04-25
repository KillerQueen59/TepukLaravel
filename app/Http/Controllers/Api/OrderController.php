<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderModel;
use App\Models\PupukModel;
use Illuminate\Database\Eloquent\Collection;


class OrderController extends Controller{

    public function create(Request $request){
        
        $order = new OrderModel;
        $order->user_id = Auth::user()->id;
        $order->pupuk_id = $request->pupuk_id;
        $order->order_qty = $request->order_qty;
        $order->total =  $request->order_qty*$request->harga;
        $order->status = $request->status;
        $order->user;
        $order->pupuk;
        $order->save();
        return response()->json([
            'success'=> true,
            'order' => $order
        ],);
    }

    public function update(Request $request){
        $order = OrderModel::find($request->id);
        $order->status = $request->status;
        $order->update();
        return response()->json([
            'success' => true,
            'message' => 'order updated'
        ]);
    }

    public function delete(Request $request){
        $order = OrderModel::find($request->id);
        $order->delete();
        return response()->json([
            'success' => true,
            'message' => 'order deleted'
        ]);
    }
    public function orders(Request $request){
        $orders = OrderModel::where(['status'=>'pending','user_id'=> $request->id])->get();
        foreach($orders as $order){
            $order->user;
            $order->pupuk;
        }
        return response()->json([
            'success'=>true,
            'orders' => $orders
        ]);
    }
}
