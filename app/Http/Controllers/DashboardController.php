<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Menu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard admin.
     */
    public function index()
    {
        $totalMenu = Menu::count();
        $totalCabang = Cabang::count();
        $kategoriCount = Menu::selectRaw('kategori, count(*) as total')
            ->groupBy('kategori')
            ->pluck('total', 'kategori');
        $totalKategori = count($kategoriCount);

        // Ambil 5 menu terbaru
        $recentMenus = Menu::orderBy('created_at', 'desc')->take(5)->get();

        return view('dashboard.index', compact('totalMenu', 'totalCabang', 'kategoriCount', 'totalKategori', 'recentMenus'));
    }
}
