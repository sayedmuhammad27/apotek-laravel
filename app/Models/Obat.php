<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obats';

    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'stock_obat',
        'tanggal_kadaluarsa',
    ];

    protected $casts = [
        'stock_obat' => 'integer',
        'tanggal_kadaluarsa' => 'date:Y-m-d',
    ];
}
