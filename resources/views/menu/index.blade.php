@extends('layouts.app')

@section('title', 'Kelola Menu')
@section('page-title', 'Kelola Menu')

@section('content')
<div class="card">
    <div class="card-header">
        <h3><i class="fas fa-utensils"></i> Daftar Menu</h3>
        <a href="{{ route('menu.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Menu
        </a>
    </div>

    {{-- Search & Filter --}}
    <div class="card-filter">
        <form action="{{ route('menu.index') }}" method="GET" class="filter-form">
            <div class="filter-group">
                <div class="input-icon">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama menu...">
                </div>
            </div>
            <div class="filter-group">
                <select name="kategori">
                    <option value="">Semua Kategori</option>
                    @foreach($kategoriList as $kat)
                        <option value="{{ $kat }}" {{ $kategori == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-secondary">
                <i class="fas fa-filter"></i> Filter
            </button>
            @if($search || $kategori)
                <a href="{{ route('menu.index') }}" class="btn btn-outline">
                    <i class="fas fa-times"></i> Reset
                </a>
            @endif
        </form>
    </div>

    {{-- Table --}}
    <div class="card-body table-responsive">
        @if($menus->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th width="60">No</th>
                    <th width="80">Gambar</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Dibuat</th>
                    <th>Diperbarui</th>
                    <th width="160">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $index => $menu)
                <tr>
                    <td>{{ $menus->firstItem() + $index }}</td>
                    <td>
                        @if($menu->gambar)
                            <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama_menu }}" class="table-img">
                        @else
                            <span style="color:#aaa;">—</span>
                        @endif
                    </td>
                    <td>
                        <span class="menu-name">{{ $menu->nama_menu }}</span>
                    </td>
                    <td>
                        <span class="price-badge">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                    </td>
                    <td>
                        <span class="kategori-badge kategori-{{ strtolower($menu->kategori) }}">
                            {{ $menu->kategori }}
                        </span>
                    </td>
                    <td>{{ $menu->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $menu->updated_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('menu.edit', $menu) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('menu.destroy', $menu) }}" method="POST" class="delete-form" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger btn-delete" title="Hapus" data-name="{{ $menu->nama_menu }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="pagination-wrapper">
            {{ $menus->appends(request()->query())->links() }}
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <h3>Belum ada data menu</h3>
            <p>Klik tombol "Tambah Menu" untuk menambahkan menu baru.</p>
            <a href="{{ route('menu.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Menu
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
