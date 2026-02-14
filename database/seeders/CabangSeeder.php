<?php

namespace Database\Seeders;

use App\Models\Cabang;
use Illuminate\Database\Seeder;

class CabangSeeder extends Seeder
{
    public function run(): void
    {
        $cabangs = [
            [
                'nama_cabang' => 'NFC Cabang Pusat',
                'alamat'      => 'Jl. Contoh Alamat No. 123, Kota',
                'telepon'     => '0812-3456-7890',
                'jam_buka'    => '10:00',
                'jam_tutup'   => '22:00',
            ],
            [
                'nama_cabang' => 'NFC Cabang 2',
                'alamat'      => 'Jl. Contoh Alamat No. 456, Kota',
                'telepon'     => '0812-9876-5432',
                'jam_buka'    => '10:00',
                'jam_tutup'   => '22:00',
            ],
        ];

        foreach ($cabangs as $cabang) {
            Cabang::create($cabang);
        }
    }
}
