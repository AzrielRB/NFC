@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="dashboard-grid">
    {{-- Card Total Menu --}}
    <div class="stat-card stat-card-primary">
        <div class="stat-card-body">
            <div class="stat-info">
                <span class="stat-label">Total Menu</span>
                <h2 class="stat-value">{{ $totalMenu }}</h2>
            </div>
            <div class="stat-icon">
                <i class="fas fa-utensils"></i>
            </div>
        </div>
        <div class="stat-card-footer">
            <a href="{{ route('menu.index') }}">
                Lihat Semua Menu <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    {{-- Card Total Cabang --}}
    <div class="stat-card stat-card-info">
        <div class="stat-card-body">
            <div class="stat-info">
                <span class="stat-label">Total Cabang</span>
                <h2 class="stat-value">{{ $totalCabang }}</h2>
            </div>
            <div class="stat-icon">
                <i class="fas fa-store"></i>
            </div>
        </div>
        <div class="stat-card-footer">
            <a href="{{ route('cabang.index') }}">
                Lihat Semua Cabang <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    {{-- Card Total Kategori --}}
    <div class="stat-card stat-card-success">
        <div class="stat-card-body">
            <div class="stat-info">
                <span class="stat-label">Total Kategori</span>
                <h2 class="stat-value">{{ $totalKategori }}</h2>
            </div>
            <div class="stat-icon">
                <i class="fas fa-tags"></i>
            </div>
        </div>
        <div class="stat-card-footer">
            <a href="{{ route('menu.index') }}">
                Kelola Kategori <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

{{-- Quick Actions --}}
<div class="card mt-4">
    <div class="card-header">
        <h3><i class="fas fa-bolt"></i> Aksi Cepat</h3>
    </div>
    <div class="card-body">
        <div class="quick-actions" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
            <a href="{{ route('menu.create') }}" class="quick-action-btn">
                <i class="fas fa-plus-circle"></i>
                <span>Tambah Menu Baru</span>
            </a>
            <a href="{{ route('cabang.create') }}" class="quick-action-btn">
                <i class="fas fa-store"></i>
                <span>Tambah Cabang Baru</span>
            </a>
        </div>
    </div>
</div>

{{-- Aktivitas Terbaru --}}
<div class="card mt-4">
    <div class="card-header">
        <h3><i class="fas fa-clock"></i> Menu Baru Ditambahkan</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0 table-responsive-stack">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Menu</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Tanggal Ditambahkan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentMenus as $index => $menu)
                        <tr>
                            <td data-label="No">{{ $index + 1 }}</td>
                            <td data-label="Nama Menu">{{ $menu->nama_menu }}</td>
                            <td data-label="Kategori"><span class="badge bg-secondary">{{ $menu->kategori }}</span></td>
                            <td data-label="Harga">Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                            <td data-label="Tanggal">{{ $menu->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada menu yang ditambahkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
