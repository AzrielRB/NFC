<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — NFC Admin Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-page">
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="login-logo" style="background: none; box-shadow: none;">
                    <img src="{{ asset('images/logo2.png') }}" alt="NFC Logo" style="width: 70px; height: 70px; object-fit: contain;">
                </div>
                <h1>Admin Nurul Fried Chicken</h1>
                <p>Sistem Informasi Kelola Menu</p>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST" class="login-form">
                @csrf
                <div class="form-group">
                    <label for="email">
                        <i class="fas fa-envelope"></i> Email
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        placeholder="Masukkan email admin"
                        required
                        autofocus
                        autocomplete="username"
                    >
                </div>

                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-lock"></i> Password
                    </label>
                    <div class="password-wrapper">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            placeholder="Masukkan password"
                            required
                            autocomplete="current-password"
                        >
                        <button type="button" class="toggle-password" onclick="togglePassword()">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group remember-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="remember">
                        <span>Ingat saya</span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-block" style="margin-bottom: 12px;">
                    <i class="fas fa-sign-in-alt"></i> Masuk
                </button>

                <a href="{{ route('landing') }}" class="btn btn-outline btn-block">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </form>

            <div class="login-footer">
                <p>&copy; {{ date('Y') }} <a href="https://github.com/AzrielRB" target="_blank" rel="noopener noreferrer" style="color:inherit; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='inherit'">Azriel Rakhan Bilal</a> — Sistem Kelola Menu</p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
