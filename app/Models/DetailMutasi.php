<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMutasi extends Model
{
    use HasFactory;

    protected $table = 'detail_mutasi';
    protected $fillable = [
        'id_mutasi',
        'kode_barang',
        'indikator',
        'quantity',
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    public function mutasi()
    {
        return $this->belongsTo(Mutasi::class);
    }
}
