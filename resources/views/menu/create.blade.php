@extends('layouts.app')

@section('title', 'Tambah Menu')
@section('page-title', 'Tambah Menu Baru')

@section('content')
<div class="card">
    <div class="card-header">
        <h3><i class="fas fa-plus-circle"></i> Form Tambah Menu</h3>
        <a href="{{ route('menu.index') }}" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card-body">
        <form action="{{ route('menu.store') }}" method="POST" id="menuForm" class="form-menu" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nama_menu">
                    <i class="fas fa-tag"></i> Nama Menu <span class="required">*</span>
                </label>
                <input 
                    type="text" 
                    id="nama_menu" 
                    name="nama_menu" 
                    value="{{ old('nama_menu') }}" 
                    placeholder="Contoh: Ayam Goreng Crispy"
                    maxlength="100"
                    required
                >
                @error('nama_menu')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="harga">
                    <i class="fas fa-money-bill-wave"></i> Harga (Rp) <span class="required">*</span>
                </label>
                <input 
                    type="number" 
                    id="harga" 
                    name="harga" 
                    value="{{ old('harga') }}" 
                    placeholder="Contoh: 15000"
                    min="0"
                    required
                >
                @error('harga')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="kategori">
                    <i class="fas fa-folder"></i> Kategori <span class="required">*</span>
                </label>
                <select id="kategori" name="kategori" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Makanan" {{ old('kategori') == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                    <option value="Minuman" {{ old('kategori') == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                    <option value="Paket" {{ old('kategori') == 'Paket' ? 'selected' : '' }}>Paket</option>
                    <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                @error('kategori')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="gambar">
                    <i class="fas fa-image"></i> Gambar Menu
                </label>
                <input 
                    type="file" 
                    id="gambar" 
                    name="gambar" 
                    accept="image/jpeg,image/jpg,image/png,image/webp"
                    class="form-control-file"
                    onchange="previewImage(event)"
                >
                <small class="form-hint">Format: JPG, PNG, WEBP. Maks 2MB.</small>
                @error('gambar')
                    <span class="error-text">{{ $message }}</span>
                @enderror
                <div id="imagePreview" class="image-preview" style="display:none;">
                    <img id="previewImg" src="" alt="Preview">
                </div>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-primary btn-submit-confirm" data-action="menambahkan menu baru">
                    <i class="fas fa-save"></i> Simpan Menu
                </button>
                <a href="{{ route('menu.index') }}" class="btn btn-outline">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function previewImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
    }
}
</script>
@endpush
@endsection
