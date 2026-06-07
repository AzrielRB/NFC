<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Tampilkan daftar menu.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategori = $request->input('kategori');

        $query = Menu::query();

        if ($search) {
            $query->where('nama_menu', 'like', '%' . $search . '%');
        }

        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        $menus = $query->orderBy('created_at', 'desc')->paginate(10);
        $kategoriList = Menu::distinct()->pluck('kategori');

        return view('menu.index', compact('menus', 'kategoriList', 'search', 'kategori'));
    }

    /**
     * Tampilkan form tambah menu.
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Simpan menu baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_menu' => ['required', 'string', 'max:100'],
            'harga' => ['required', 'integer', 'min:0'],
            'kategori' => ['required', 'string', 'max:50'],
            'deskripsi' => ['nullable', 'string', 'max:500'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ], [
            'nama_menu.required' => 'Nama menu wajib diisi.',
            'nama_menu.max' => 'Nama menu maksimal 100 karakter.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.integer' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga tidak boleh negatif.',
            'kategori.required' => 'Kategori wajib diisi.',
            'kategori.max' => 'Kategori maksimal 50 karakter.',
            'deskripsi.max' => 'Deskripsi maksimal 500 karakter.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpeg, jpg, png, atau webp.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        if ($request->hasFile('gambar')) {
            if (env('CLOUDINARY_CLOUD_NAME')) {
                $validated['gambar'] = $this->uploadToCloudinary($request->file('gambar'));
            } else {
                $validated['gambar'] = $request->file('gambar')->store('menu', 'public');
            }
        }

        Menu::create($validated);

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit menu.
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    /**
     * Update menu di database.
     */
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'nama_menu' => ['required', 'string', 'max:100'],
            'harga' => ['required', 'integer', 'min:0'],
            'kategori' => ['required', 'string', 'max:50'],
            'deskripsi' => ['nullable', 'string', 'max:500'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ], [
            'nama_menu.required' => 'Nama menu wajib diisi.',
            'nama_menu.max' => 'Nama menu maksimal 100 karakter.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.integer' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga tidak boleh negatif.',
            'kategori.required' => 'Kategori wajib diisi.',
            'kategori.max' => 'Kategori maksimal 50 karakter.',
            'deskripsi.max' => 'Deskripsi maksimal 500 karakter.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpeg, jpg, png, atau webp.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada (hanya jika gambar disimpan di local storage)
            if ($menu->gambar && !\Illuminate\Support\Str::startsWith($menu->gambar, ['http://', 'https://'])) {
                if (Storage::disk('public')->exists($menu->gambar)) {
                    Storage::disk('public')->delete($menu->gambar);
                }
            }
            if (env('CLOUDINARY_CLOUD_NAME')) {
                $validated['gambar'] = $this->uploadToCloudinary($request->file('gambar'));
            } else {
                $validated['gambar'] = $request->file('gambar')->store('menu', 'public');
            }
        } else {
            // Cegah gambar terhapus menjadi null jika form disubmit tanpa file baru
            unset($validated['gambar']);
        }

        // Jika user ingin hapus gambar tanpa upload baru
        if ($request->input('hapus_gambar') == '1' && !$request->hasFile('gambar')) {
            if ($menu->gambar && !\Illuminate\Support\Str::startsWith($menu->gambar, ['http://', 'https://'])) {
                if (Storage::disk('public')->exists($menu->gambar)) {
                    Storage::disk('public')->delete($menu->gambar);
                }
            }
            $validated['gambar'] = null;
        }

        $menu->update($validated);

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil diperbarui!');
    }

    /**
     * Hapus menu dari database.
     */
    public function destroy(Menu $menu)
    {
        // Hapus gambar dari storage (hanya jika gambar disimpan di local storage)
        if ($menu->gambar && !\Illuminate\Support\Str::startsWith($menu->gambar, ['http://', 'https://'])) {
            if (Storage::disk('public')->exists($menu->gambar)) {
                Storage::disk('public')->delete($menu->gambar);
            }
        }

        $menu->delete();

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil dihapus!');
    }

    /**
     * Upload gambar ke Cloudinary secara aman (Signed Upload).
     */
    private function uploadToCloudinary($file)
    {
        $cloudName = env('CLOUDINARY_CLOUD_NAME');
        $apiKey = env('CLOUDINARY_API_KEY');
        $apiSecret = env('CLOUDINARY_API_SECRET');

        if (!$cloudName || !$apiKey || !$apiSecret) {
            throw new \Exception('Cloudinary credentials are not configured in environment variables.');
        }

        $timestamp = time();
        $params = [
            'timestamp' => $timestamp,
        ];
        ksort($params);
        $queryString = http_build_query($params);
        $signature = sha1($queryString . $apiSecret);

        $response = \Illuminate\Support\Facades\Http::attach(
            'file', 
            file_get_contents($file->getRealPath()), 
            $file->getClientOriginalName()
        )->post("https://api.cloudinary.com/v1_1/{$cloudName}/image/upload", [
            'api_key' => $apiKey,
            'timestamp' => $timestamp,
            'signature' => $signature,
        ]);

        if ($response->failed()) {
            throw new \Exception('Cloudinary upload failed: ' . $response->body());
        }

        $data = $response->json();
        return $data['secure_url'] ?? null;
    }
}
