<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewKeranjang extends Model
{
    use HasFactory;

    protected $table = 'viewKeranjang';
    protected $primaryKey = 'idVKeranjang';
    public $incrementing = false; 
    protected $fillable = [
        'idKeranjang',
        'idBarang',
        'qtyVKeranjang'
    ];

    public function keranjang()
    {
        return $this->belongsTo(MasterKeranjang::class, 'idKeranjang', 'idKeranjang');
    }

    public function barang()
    {
        return $this->belongsTo(MasterBarang::class, 'idBarang', 'idBarang');
    }
    
}
