<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Pusat Studi STEM</title>

    <!-- Integrasi Tailwind & Font -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white text-slate-800 antialiased h-screen flex overflow-hidden">

    <!-- BAGIAN KIRI: Visual Branding (Sembunyi di layar HP, muncul di Laptop/PC) -->
    <div class="hidden lg:flex lg:w-1/2 relative bg-slate-900 items-center justify-center overflow-hidden">
        <!-- Background Image -->
        <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?q=80&w=1000&auto=format&fit=crop" alt="Background STEM" class="absolute inset-0 w-full h-full object-cover opacity-40 mix-blend-overlay">

        <!-- Gradient Overlay Maroon -->
        <div class="absolute inset-0 bg-gradient-to-br from-[#800000]/95 via-[#5a0000]/95 to-slate-900/95"></div>

        <!-- Ornamen Lingkaran -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full border border-white/10"></div>
            <div class="absolute top-1/4 -right-24 w-72 h-72 rounded-full border border-white/10 opacity-50"></div>
        </div>

        <div class="relative z-10 px-16 max-w-2xl text-center">
            <div class="bg-white p-3 rounded-2xl inline-block shadow-2xl mb-8">
                <img src="{{ asset('image/logo.webp') }}" alt="Logo STEM" class="h-20 w-20 object-contain">
            </div>
            <h1 class="text-4xl font-extrabold text-white tracking-tight mb-4 leading-tight">
                Portal Administrator <br> <span class="text-amber-400">Pusat Studi STEM</span>
            </h1>
            <p class="text-lg text-slate-300 font-light leading-relaxed">
                Manajemen data riset, pengabdian masyarakat, publikasi, dan mitra strategis dalam satu kendali terpusat.
            </p>
        </div>

        <!-- Footer Kiri -->
        <div class="absolute bottom-8 left-0 w-full text-center text-sm text-slate-400">
            &copy; {{ date('Y') }} Pusat Studi STEM. Hak Cipta Dilindungi.
        </div>
    </div>

    <!-- BAGIAN KANAN: Form Login -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-24 bg-white relative">

        <!-- Tombol Kembali ke Landing Page -->
        <a href="{{ route('landing') }}" class="absolute top-8 left-8 sm:top-12 sm:left-12 text-sm font-semibold text-slate-400 hover:text-[#800000] transition flex items-center group">
            <div class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center mr-2 group-hover:bg-red-50 transition">
                <i class="fa-solid fa-arrow-left text-xs"></i>
            </div>
            Kembali ke Beranda
        </a>

        <div class="w-full max-w-md mt-12 lg:mt-0">
            <!-- Header Form -->
            <div class="mb-10">
                <h2 class="text-3xl font-extrabold text-slate-900 mb-2">Selamat Datang 👋</h2>
                <p class="text-slate-500 text-sm">Silakan masukkan kredensial Anda untuk mengakses panel kontrol.</p>
            </div>

            <!-- Form Otentikasi Bawaan Breeze -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Input Email -->
                <div>
                    <label for="email" class="block text-sm font-bold text-slate-700 mb-2">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-envelope text-slate-400"></i>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                            class="block w-full pl-11 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] focus:bg-white outline-none transition-all @error('email') border-red-500 bg-red-50 @enderror"
                            placeholder="admin@stem.com">
                    </div>
                    @error('email')
                        <p class="mt-2 text-xs text-red-600 font-medium"><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Password -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-sm font-bold text-slate-700">Kata Sandi</label>
                        <!-- Jika Anda mengaktifkan fitur lupa password Breeze, link ini akan berguna -->
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs font-semibold text-[#800000] hover:text-[#5a0000] transition">Lupa sandi?</a>
                        @endif
                    </div>
                    <div class="relative border-slate-200">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-slate-400"></i>
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="block w-full pl-11 pr-12 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] focus:bg-white outline-none transition-all @error('password') border-red-500 bg-red-50 @enderror"
                            placeholder="••••••••">

                        <!-- Tombol Show/Hide Password -->
                        <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 transition">
                            <i id="eye-icon" class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-2 text-xs text-red-600 font-medium"><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="w-4 h-4 text-[#800000] bg-slate-100 border-slate-300 rounded focus:ring-[#800000] focus:ring-2 cursor-pointer">
                    <label for="remember_me" class="ml-2 block text-sm text-slate-600 cursor-pointer select-none">
                        Ingat sesi saya
                    </label>
                </div>

                <!-- Tombol Login -->
                <button type="submit" class="w-full flex justify-center items-center py-4 px-4 border border-transparent rounded-xl shadow-lg shadow-red-900/20 text-sm font-bold text-white bg-gradient-to-r from-[#800000] to-[#5a0000] hover:from-[#6a0000] hover:to-[#4a0000] transform hover:-translate-y-0.5 transition-all duration-300">
                    Masuk ke Sistem <i class="fa-solid fa-right-to-bracket ml-2"></i>
                </button>
            </form>

            <!-- Elemen dekoratif mobile -->
            <div class="mt-12 text-center lg:hidden">
                <img src="{{ asset('image/logo.webp') }}" alt="Logo STEM" class="h-12 w-12 object-contain mx-auto opacity-50 grayscale">
            </div>
        </div>
    </div>

    <!-- Script Sederhana untuk Show/Hide Password -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
