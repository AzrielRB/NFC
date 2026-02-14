<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
     * Nama tabel di database.
     */
    protected $table = 'menus';

    /**
     * Kolom yang boleh diisi secara mass assignment.
     */
    protected $fillable = [
        'nama_menu',
        'harga',
        'kategori',
        'gambar',
    ];

    /**
     * Casting tipe data.
     */
    protected function casts(): array
    {
        return [
            'harga' => 'integer',
        ];
    }
}
