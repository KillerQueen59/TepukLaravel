<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\PupukModel;

class PupukController extends Controller
{
    public function pupuk(){
        return response()->json(PupukModel::get(),200);
    }
    public function pupukByOrganik(){
        $pupuk = PupukModel::where(['jenis_pupuk'=>'organik'])->get();
        foreach($pupuk as $p){
        }
        return response()->json([
            'success'=>true,
            'pupuk'=>$pupuk
        ]);
    }
    public function pupukByAnorganik(){
        $pupuk = PupukModel::where(['jenis_pupuk'=>'anorganik'])->get();
        return response()->json([
            'success'=>true,
            'pupuk'=>$pupuk
        ]);
    }
    public function pupukByID ($pupuk_id){
        return response()->json(PupukModel::find($pupuk_id),200);
    }
    public function pupukUpdate(Request $request){
        $pupuk = PupukModel::find($request->id);
        $pupuk->harga_pupuk = $request->harga_pupuk;
        $pupuk->update();
        return response()->json([
            'success' => true,
            'message' => 'pupuk updated'
        ]);    }
    public function pupukSave(Request $request){
        $pupuk = PupukModel::create($request->all());
        return response()->json($pupuk,201);
    }
    public function pupukDelete(Request $request){
        $pupuk = PupukModel::find($request->id);
        $pupuk->delete();
        return response()->json([
            'success' => true,
            'message' => 'pupuk deleted'
        ]);
    }}
