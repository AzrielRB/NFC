<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;

    protected $table = 'cabangs';

    protected $fillable = [
        'nama_cabang',
        'alamat',
        'telepon',
        'jam_buka',
        'jam_tutup',
        'link_maps',
    ];
}
