@extends('layouts.app')

@section('title', 'Kelola Cabang')
@section('page-title', 'Kelola Cabang')

@section('content')
<div class="card">
    <div class="card-header">
        <h3><i class="fas fa-store"></i> Daftar Cabang</h3>
        <a href="{{ route('cabang.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Cabang
        </a>
    </div>

    {{-- Search --}}
    <div class="card-filter">
        <form action="{{ route('cabang.index') }}" method="GET" class="filter-form">
            <div class="filter-group">
                <div class="input-icon">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama cabang atau alamat...">
                </div>
            </div>

            @if($search)
                <a href="{{ route('cabang.index') }}" class="btn btn-outline">
                    <i class="fas fa-times"></i> Reset
                </a>
            @endif
        </form>
    </div>

    {{-- Table --}}
    <div class="card-body table-responsive">
        @if($cabangs->count() > 0)
        <table class="table table-responsive-stack">
            <thead>
                <tr>
                    <th width="60">No</th>
                    <th>Nama Cabang</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Jam Operasional</th>
                    <th width="160">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cabangs as $index => $cabang)
                <tr>
                    <td data-label="No">{{ $cabangs->firstItem() + $index }}</td>
                    <td data-label="Nama Cabang">
                        <span class="menu-name">{{ $cabang->nama_cabang }}</span>
                    </td>
                    <td data-label="Alamat">{{ $cabang->alamat }}</td>
                    <td data-label="Telepon">{{ $cabang->telepon }}</td>
                    <td data-label="Jam Operasional">
                        <span class="kategori-badge kategori-makanan">
                            {{ $cabang->jam_buka }} - {{ $cabang->jam_tutup }} WIB
                        </span>
                    </td>
                    <td data-label="Aksi">
                        <div class="action-buttons">
                            <a href="{{ route('cabang.edit', $cabang) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('cabang.destroy', $cabang) }}" method="POST" class="delete-form" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger btn-delete" title="Hapus" data-name="{{ $cabang->nama_cabang }}">
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
            {{ $cabangs->appends(request()->query())->links() }}
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-store-slash"></i>
            <h3>Belum ada data cabang</h3>
            <p>Klik tombol "Tambah Cabang" untuk menambahkan cabang baru.</p>
            <a href="{{ route('cabang.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Cabang
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
