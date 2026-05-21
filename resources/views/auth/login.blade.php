<x-guest-layout>
    <div class="container-fluid p-0 min-vh-100 d-flex bg-light" style="background-color: #f8fafc !important;">
        <div class="row g-0 w-100 min-vh-100">
            
            <!-- Sisi Kiri: Branding & Fitur (Hanya tampil di desktop) -->
            <div class="col-lg-6 d-none d-lg-flex flex-column position-relative overflow-hidden align-items-center justify-content-center px-4" style="background-color: #f8fafc;">
                <!-- Efek gelombang halus di latar belakang -->
                <div class="bg-waves"></div>
                
                <!-- SVG Waves (Opsional untuk menambah tekstur) -->
                <svg class="position-absolute" style="top: 0; left: 0; width: 100%; height: 100%; z-index: 0; opacity: 0.05; pointer-events: none;" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <path d="M0,50 C20,60 40,40 60,50 C80,60 100,40 100,50 L100,100 L0,100 Z" fill="#2563eb"></path>
                    <path d="M0,70 C30,80 50,60 80,70 C100,80 100,70 100,70 L100,100 L0,100 Z" fill="#3b82f6"></path>
                </svg>
                
                <div class="position-relative z-1 text-center" style="margin-top: -5rem;">
                    <!-- Logo Utama -->
                    <div class="mb-4">
                        <i class="bi bi-shield-lock-fill" style="font-size: 8rem; color: #3b82f6; display: inline-block;"></i>
                    </div>
                    
                    <!-- Judul -->
                    <h1 class="display-5 fw-bolder mb-4" style="letter-spacing: -1px;">
                        <span style="color: #0f172a;">Hash</span><span style="color: #3b82f6;">Guard</span>
                    </h1>
                    
                    <!-- Garis pemisah dengan shield kecil -->
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <div style="height: 1px; width: 40px; background-color: #cbd5e1;"></div>
                        <i class="bi bi-shield-check mx-3 text-primary" style="font-size: 1.2rem;"></i>
                        <div style="height: 1px; width: 40px; background-color: #cbd5e1;"></div>
                    </div>
                    
                    <!-- Subjudul -->
                    <h2 class="h6 fw-bold mb-3" style="letter-spacing: 0.2em; color: #475569;">
                        PLATFORM FORENSIK DIGITAL<br>TINGKAT LANJUT
                    </h2>
                    
                    <p class="text-secondary mx-auto mb-5" style="max-width: 380px; font-size: 0.95rem; line-height: 1.6;">
                        Mengamankan integritas data Anda<br>dengan teknologi verifikasi tanpa celah.
                    </p>
                    
                    <!-- 3 Feature Cards -->
                    <div class="d-flex justify-content-center gap-3 mt-4 pt-4">
                        <!-- Card 1 -->
                        <div class="feature-card" style="width: 140px;">
                            <div class="feature-icon-wrapper">
                                <i class="bi bi-fingerprint"></i>
                            </div>
                            <h3 class="fw-bold text-dark mb-1" style="font-size: 0.75rem;">Verifikasi Integritas</h3>
                            <p class="text-muted mb-0" style="font-size: 0.65rem;">Hash MD5 & SHA-256</p>
                        </div>
                        <!-- Card 2 -->
                        <div class="feature-card" style="width: 140px;">
                            <div class="feature-icon-wrapper">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <h3 class="fw-bold text-dark mb-1" style="font-size: 0.75rem;">Aman & Terpercaya</h3>
                            <p class="text-muted mb-0" style="font-size: 0.65rem;">Teknologi Forensik</p>
                        </div>
                        <!-- Card 3 -->
                        <div class="feature-card" style="width: 140px;">
                            <div class="feature-icon-wrapper">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                            <h3 class="fw-bold text-dark mb-1" style="font-size: 0.75rem;">Audit & Transparan</h3>
                            <p class="text-muted mb-0" style="font-size: 0.65rem;">Log Aktivitas Lengkap</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sisi Kanan: Form Login -->
            <div class="col-12 col-lg-6 d-flex flex-column align-items-center justify-content-center position-relative py-5 py-lg-0" style="background-color: #f1f5f9;">
                
                <!-- Background pattern khusus mobile -->
                <div class="d-lg-none position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(circle at top right, rgba(59, 130, 246, 0.08), transparent 40%), radial-gradient(circle at bottom left, rgba(147, 51, 234, 0.05), transparent 40%); pointer-events: none;"></div>

                <div class="w-100 px-3 px-sm-4" style="max-width: 480px; position: relative; z-index: 2;">
                    
                    <!-- Logo untuk tampilan mobile dengan animasi masuk -->
                    <div class="text-center mb-4 mb-sm-5 d-lg-none">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-shield-lock-fill" style="font-size: 2.5rem; color: #3b82f6;"></i>
                        </div>
                        <h2 class="fs-2 fw-bolder mb-1"><span style="color: #0f172a;">Hash</span><span style="color: #3b82f6;">Guard</span></h2>
                        <p class="text-secondary small">Digital Forensics Platform</p>
                    </div>

                    <!-- Card Login Putih -->
                    <div class="bg-white p-4 p-sm-5 rounded-4" style="box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.02); border: 1px solid rgba(0,0,0,0.03);">
                        
                        <div class="mb-4 mb-sm-5 text-center">
                            <h3 class="fw-bold mb-2 fs-4 fs-sm-3" style="color: #1e293b; letter-spacing: -0.5px;">Selamat Datang</h3>
                            <p class="text-secondary mb-0" style="font-size: 0.9rem;">Masukkan kredensial Anda untuk mengakses sistem</p>
                        </div>

                        <!-- Garis pemisah dengan shield -->
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <div style="height: 1px; width: 100%; background-color: #f1f5f9;"></div>
                            <i class="bi bi-shield-check mx-2 text-muted" style="opacity: 0.3;"></i>
                            <div style="height: 1px; width: 100%; background-color: #f1f5f9;"></div>
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4 text-success fw-bold" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-4">
                                <label for="email" class="form-label-custom">Alamat Email</label>
                                <div class="input-group input-group-lg custom-input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="admin@hashguard.com">
                                </div>
                                @error('email')
                                    <div class="text-danger small mt-2 fw-medium">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label for="password" class="form-label-custom mb-0">Kata Sandi</label>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-decoration-none text-primary" style="font-size: 0.85rem; font-weight: 500;">Lupa Sandi?</a>
                                    @endif
                                </div>
                                <div class="input-group input-group-lg custom-input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="••••••••">
                                    <button class="btn btn-outline-secondary border-0 bg-transparent" type="button" id="togglePassword" tabindex="-1" style="color: #94a3b8; border-left: none !important;">
                                        <i class="bi bi-eye-slash" id="toggleIcon"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="text-danger small mt-2 fw-medium">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="mb-5">
                                <div class="form-check d-flex align-items-center gap-2">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                                    <label class="form-check-label text-secondary" for="remember_me" style="font-size: 0.9rem; cursor: pointer; padding-top: 1px;">
                                        Ingat Saya
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-gradient btn-lg w-100 d-flex justify-content-center align-items-center gap-2">
                                <span>Akses Sistem</span>
                                <i class="bi bi-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                    
                    <div class="text-center mt-5 text-secondary d-flex justify-content-center align-items-center gap-2" style="opacity: 0.6; font-size: 0.8rem;">
                        <i class="bi bi-lock-fill"></i>
                        <span>Digital Evidence. Trusted Integrity.</span>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <script>
        // Script untuk toggle visibility password
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            const toggleIcon = document.querySelector('#toggleIcon');

            if(togglePassword && password) {
                togglePassword.addEventListener('click', function (e) {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    
                    if (type === 'text') {
                        toggleIcon.classList.remove('bi-eye-slash');
                        toggleIcon.classList.add('bi-eye');
                    } else {
                        toggleIcon.classList.remove('bi-eye');
                        toggleIcon.classList.add('bi-eye-slash');
                    }
                });
            }
        });
    </script>
</x-guest-layout>
