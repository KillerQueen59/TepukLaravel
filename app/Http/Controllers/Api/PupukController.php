<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\PupukModel;

class PupukController extends Controller
{
    public function pupuk(){
        return response()->json(PupukModel::get(),200);
    }
    public function pupukByID ($pupuk_id){
        return response()->json(PupukModel::find($pupuk_id),200);
    }
    public function pupukSave(Request $request){
        $pupuk = PupukModel::create($request->all());
        return response()->json($pupuk,201);
    }
    public function pupukUpdate(Request $request,PupukModel $pupuk){
        $pupuk->update($request->all());
        return response()->json($pupuk,200);
    }
    public function pupukDelete(Request $request,PupukModel $pupuk){
        $pupuk->delete();
        return response()->json(null,204);
    }}
