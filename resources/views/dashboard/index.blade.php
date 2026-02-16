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

    {{-- Card per Kategori --}}
    @foreach($kategoriCount as $kategori => $total)
    <div class="stat-card stat-card-{{ $loop->index % 3 == 0 ? 'success' : ($loop->index % 3 == 1 ? 'warning' : 'info') }}">
        <div class="stat-card-body">
            <div class="stat-info">
                <span class="stat-label">{{ $kategori }}</span>
                <h2 class="stat-value">{{ $total }}</h2>
            </div>
            <div class="stat-icon">
                @if(strtolower($kategori) === 'makanan')
                    <i class="fas fa-hamburger"></i>
                @elseif(strtolower($kategori) === 'paket')
                    <i class="fas fa-box-open"></i>
                @else
                    <i class="fas fa-tag"></i>
                @endif
            </div>
        </div>
        <div class="stat-card-footer">
            <a href="{{ route('menu.index', ['kategori' => $kategori]) }}">
                Lihat {{ $kategori }} <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
    @endforeach
</div>

{{-- Quick Actions --}}
<div class="card mt-4">
    <div class="card-header">
        <h3><i class="fas fa-bolt"></i> Aksi Cepat</h3>
    </div>
    <div class="card-body">
        <div class="quick-actions">
            <a href="{{ route('menu.create') }}" class="quick-action-btn">
                <i class="fas fa-plus-circle"></i>
                <span>Tambah Menu Baru</span>
            </a>
            <a href="{{ route('menu.index') }}" class="quick-action-btn">
                <i class="fas fa-list"></i>
                <span>Lihat Daftar Menu</span>
            </a>
            <a href="{{ route('cabang.create') }}" class="quick-action-btn">
                <i class="fas fa-store"></i>
                <span>Tambah Cabang Baru</span>
            </a>
            <a href="{{ route('cabang.index') }}" class="quick-action-btn">
                <i class="fas fa-map-marker-alt"></i>
                <span>Lihat Daftar Cabang</span>
            </a>
        </div>
    </div>
</div>
@endsection
