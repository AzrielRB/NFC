@extends('layouts.app')

@section('title', 'Tambah Cabang')
@section('page-title', 'Tambah Cabang Baru')

@section('content')
<div class="card">
    <div class="card-header">
        <h3><i class="fas fa-plus-circle"></i> Tambah Cabang Baru</h3>
        <a href="{{ route('cabang.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card-body">
        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i>
                <div>
                    <strong>Terjadi kesalahan:</strong>
                    <ul style="margin: 5px 0 0 0; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form action="{{ route('cabang.store') }}" method="POST" id="cabangForm">
            @csrf

            <div class="form-group">
                <label for="nama_cabang">Nama Cabang <span class="required">*</span></label>
                <input type="text" id="nama_cabang" name="nama_cabang" value="{{ old('nama_cabang') }}"
                       class="form-control @error('nama_cabang') is-invalid @enderror"
                       placeholder="Contoh: NFC Cabang Pusat" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat Lengkap <span class="required">*</span></label>
                <textarea id="alamat" name="alamat" rows="3"
                          class="form-control @error('alamat') is-invalid @enderror"
                          placeholder="Contoh: Jl. Merdeka No. 123, Kota" required>{{ old('alamat') }}</textarea>
            </div>

            <div class="form-group">
                <label for="telepon">Nomor Telepon <span class="required">*</span></label>
                <input type="text" id="telepon" name="telepon" value="{{ old('telepon') }}"
                       class="form-control @error('telepon') is-invalid @enderror"
                       placeholder="Contoh: 0812-3456-7890" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="jam_buka">Jam Buka <span class="required">*</span></label>
                    <input type="time" id="jam_buka" name="jam_buka" value="{{ old('jam_buka', '10:00') }}"
                           class="form-control @error('jam_buka') is-invalid @enderror" required>
                </div>
                <div class="form-group">
                    <label for="jam_tutup">Jam Tutup <span class="required">*</span></label>
                    <input type="time" id="jam_tutup" name="jam_tutup" value="{{ old('jam_tutup', '22:00') }}"
                           class="form-control @error('jam_tutup') is-invalid @enderror" required>
                </div>
            </div>

            <div class="form-group">
                <label for="link_maps">Link Google Maps <small class="text-muted">(Opsional)</small></label>
                <input type="url" id="link_maps" name="link_maps" value="{{ old('link_maps') }}"
                       class="form-control @error('link_maps') is-invalid @enderror"
                       placeholder="Contoh: https://maps.app.goo.gl/...">
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-primary btn-submit-confirm" data-action="menyimpan cabang baru">
                    <i class="fas fa-save"></i> Simpan Cabang
                </button>
                <a href="{{ route('cabang.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
