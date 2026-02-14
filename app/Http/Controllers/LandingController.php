<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Menu;

class LandingController extends Controller
{
    /**
     * Tampilkan halaman landing page publik.
     */
    public function index()
    {
        $menus = Menu::all()->groupBy('kategori');
        $totalMenu = Menu::count();
        $cabangs = Cabang::all();

        return view('landing', compact('menus', 'totalMenu', 'cabangs'));
    }
}
