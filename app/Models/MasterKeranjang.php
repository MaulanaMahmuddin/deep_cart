<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKeranjang extends Model
{
    use HasFactory;

    protected $table = 'masterKeranjang';
    protected $primaryKey = 'idKeranjang';
    public $incrementing = false;
    protected $fillable = ['namaKeranjang'];

    
    public function viewKeranjangs()
    {
        return $this->hasMany(ViewKeranjang::class, 'idKeranjang', 'idKeranjang');
    }
}
