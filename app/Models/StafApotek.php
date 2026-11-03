<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StafApotek extends Model
{
    use HasFactory;

    protected $table = 'staf_apoteks';

    protected $fillable = [
        'id_staff',
        'nama',
        'alamat',
        'tanggal_lahir',
        'tempat_lahir',
        'no_hp',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date:Y-m-d',
    ];
}
