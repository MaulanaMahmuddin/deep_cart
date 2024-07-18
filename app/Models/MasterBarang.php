<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    use HasFactory;

    protected $table = 'masterBarang';
    protected $primaryKey = 'idBarang';
    public $incrementing = false; 
    protected $fillable = [
        'idBarang',
        'gBarang',
        'nBarang',
        'qtyBarang',
        'hrgBarang'
    ];

    public function viewKeranjangs()
    {
        return $this->hasMany(ViewKeranjang::class, 'idBarang', 'idBarang');
    }
}
