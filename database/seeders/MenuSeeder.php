<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Seed data menu contoh.
     */
    public function run(): void
    {
        $menus = [
            ['nama_menu' => 'Ayam Goreng Original', 'harga' => 15000, 'kategori' => 'Makanan'],
            ['nama_menu' => 'Ayam Goreng Crispy', 'harga' => 18000, 'kategori' => 'Makanan'],
            ['nama_menu' => 'Ayam Goreng Pedas', 'harga' => 18000, 'kategori' => 'Makanan'],
            ['nama_menu' => 'Paket Nasi + Ayam', 'harga' => 22000, 'kategori' => 'Paket'],
            ['nama_menu' => 'Paket Nasi + Ayam + Es Teh', 'harga' => 27000, 'kategori' => 'Paket'],
            ['nama_menu' => 'Es Teh Manis', 'harga' => 5000, 'kategori' => 'Minuman'],
            ['nama_menu' => 'Es Jeruk', 'harga' => 7000, 'kategori' => 'Minuman'],
            ['nama_menu' => 'Air Mineral', 'harga' => 4000, 'kategori' => 'Minuman'],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
