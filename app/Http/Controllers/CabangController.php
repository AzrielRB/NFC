<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    /**
     * Tampilkan daftar semua cabang.
     */
    public function index(Request $request)
    {
        $search = $request->input('search', '');

        $cabangs = Cabang::when($search, function ($query, $search) {
                $query->where('nama_cabang', 'like', "%{$search}%")
                      ->orWhere('alamat', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('cabang.index', compact('cabangs', 'search'));
    }

    /**
     * Tampilkan form tambah cabang baru.
     */
    public function create()
    {
        return view('cabang.create');
    }

    /**
     * Simpan cabang baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_cabang' => 'required|string|max:255',
            'alamat'      => 'required|string',
            'telepon'     => 'required|string|max:20',
            'jam_buka'    => 'required|string|max:50',
            'jam_tutup'   => 'required|string|max:50',
            'link_maps'   => 'nullable|string|url',
        ], [
            'nama_cabang.required' => 'Nama cabang wajib diisi.',
            'nama_cabang.max'      => 'Nama cabang maksimal 255 karakter.',
            'alamat.required'      => 'Alamat wajib diisi.',
            'telepon.required'     => 'Nomor telepon wajib diisi.',
            'telepon.max'          => 'Nomor telepon maksimal 20 karakter.',
            'jam_buka.required'    => 'Jam buka wajib diisi.',
            'jam_tutup.required'   => 'Jam tutup wajib diisi.',
            'link_maps.url'        => 'Link Google Maps harus berupa URL yang valid.',
        ]);

        Cabang::create($validated);

        return redirect()->route('cabang.index')->with('success', 'Cabang berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit cabang.
     */
    public function edit(Cabang $cabang)
    {
        return view('cabang.edit', compact('cabang'));
    }

    /**
     * Perbarui data cabang.
     */
    public function update(Request $request, Cabang $cabang)
    {
        $validated = $request->validate([
            'nama_cabang' => 'required|string|max:255',
            'alamat'      => 'required|string',
            'telepon'     => 'required|string|max:20',
            'jam_buka'    => 'required|string|max:50',
            'jam_tutup'   => 'required|string|max:50',
            'link_maps'   => 'nullable|string|url',
        ], [
            'nama_cabang.required' => 'Nama cabang wajib diisi.',
            'nama_cabang.max'      => 'Nama cabang maksimal 255 karakter.',
            'alamat.required'      => 'Alamat wajib diisi.',
            'telepon.required'     => 'Nomor telepon wajib diisi.',
            'telepon.max'          => 'Nomor telepon maksimal 20 karakter.',
            'jam_buka.required'    => 'Jam buka wajib diisi.',
            'jam_tutup.required'   => 'Jam tutup wajib diisi.',
            'link_maps.url'        => 'Link Google Maps harus berupa URL yang valid.',
        ]);

        $cabang->update($validated);

        return redirect()->route('cabang.index')->with('success', 'Cabang berhasil diperbarui!');
    }

    /**
     * Hapus cabang dari database.
     */
    public function destroy(Cabang $cabang)
    {
        $cabang->delete();

        return redirect()->route('cabang.index')->with('success', 'Cabang berhasil dihapus!');
    }
}
