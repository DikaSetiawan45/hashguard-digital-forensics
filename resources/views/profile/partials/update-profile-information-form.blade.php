<section>
    <header class="mb-4">
        <h2 class="h5 fw-bold text-dark">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="text-secondary" style="font-size: 0.9rem;">
            {{ __("Perbarui nama dan alamat email akun Anda.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label fw-bold text-dark">{{ __('Nama Lengkap') }}</label>
            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="form-label fw-bold text-dark">{{ __('Alamat Email') }}</label>
            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-dark mb-1">
                        {{ __('Alamat email Anda belum diverifikasi.') }}
                        <button form="send-verification" class="btn btn-link p-0 m-0 align-baseline text-primary text-decoration-none">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-success small fw-medium mt-1">
                            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary fw-bold px-4 py-2" style="border-radius: 0.75rem;">{{ __('Simpan Perubahan') }}</button>

            @if (session('status') === 'profile-updated')
                <p class="text-success mb-0 fw-medium small" id="profileUpdatedMsg">
                    <i class="bi bi-check-circle-fill me-1"></i> {{ __('Tersimpan.') }}
                </p>
                <script>
                    setTimeout(() => {
                        const msg = document.getElementById('profileUpdatedMsg');
                        if(msg) msg.style.display = 'none';
                    }, 3000);
                </script>
            @endif
        </div>
    </form>
</section>
