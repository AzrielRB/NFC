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
            ['nama_menu' => 'Ayam Goreng Original', 'harga' => 15000, 'kategori' => 'Makanan', 'deskripsi' => 'Ayam goreng dengan bumbu original khas NFC, digoreng hingga keemasan dan renyah.'],
            ['nama_menu' => 'Ayam Goreng Crispy', 'harga' => 18000, 'kategori' => 'Makanan', 'deskripsi' => 'Ayam goreng berlapis tepung crispy yang renyah di luar, juicy di dalam.'],
            ['nama_menu' => 'Ayam Goreng Pedas', 'harga' => 18000, 'kategori' => 'Makanan', 'deskripsi' => 'Ayam goreng dengan balutan sambal pedas spesial, cocok untuk pecinta pedas.'],
            ['nama_menu' => 'Paket Nasi + Ayam', 'harga' => 22000, 'kategori' => 'Paket', 'deskripsi' => 'Paket hemat nasi putih hangat dengan ayam goreng pilihan.'],
            ['nama_menu' => 'Paket Nasi + Ayam + Es Teh', 'harga' => 27000, 'kategori' => 'Paket', 'deskripsi' => 'Paket lengkap nasi, ayam goreng, dan es teh manis segar.'],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
