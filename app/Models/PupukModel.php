<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PupukModel extends Model
{
    protected $table = "pupuks";
    public $timestamps = false;

    protected $fillable = [
        'nama_pupuk',
        'jenis_pupuk',
        'deskripsi_pupuk',
        'komposisi_pupuk',
        'harga_pupuk',
        'foto_pupuk'
    ];

    protected $casts = [
        'harga_pupuk' => 'int'
    ];
    
    public function orders(){
        return $this->hasMany(OrderModel::class);
    }

}
