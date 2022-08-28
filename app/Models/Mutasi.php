<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;

    protected $table = 'mutasi';
    protected $fillable = [
        'nomor_bukti',
        'tanggal',
    ];

    public function detail_mutasi()
    {
        return $this->hasMany(DetailMutasi::class);
    }
}
