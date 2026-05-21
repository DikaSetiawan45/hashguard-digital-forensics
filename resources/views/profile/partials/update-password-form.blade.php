<section>
    <header class="mb-4">
        <h2 class="h5 fw-bold text-dark">
            {{ __('Perbarui Kata Sandi') }}
        </h2>

        <p class="text-secondary" style="font-size: 0.9rem;">
            {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label fw-bold text-dark">{{ __('Kata Sandi Saat Ini') }}</label>
            <input type="password" class="form-control form-control-lg @error('current_password', 'updatePassword') is-invalid @enderror" id="update_password_current_password" name="current_password" autocomplete="current-password">
            @error('current_password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label fw-bold text-dark">{{ __('Kata Sandi Baru') }}</label>
            <input type="password" class="form-control form-control-lg @error('password', 'updatePassword') is-invalid @enderror" id="update_password_password" name="password" autocomplete="new-password">
            @error('password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="update_password_password_confirmation" class="form-label fw-bold text-dark">{{ __('Konfirmasi Kata Sandi Baru') }}</label>
            <input type="password" class="form-control form-control-lg @error('password_confirmation', 'updatePassword') is-invalid @enderror" id="update_password_password_confirmation" name="password_confirmation" autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary fw-bold px-4 py-2" style="border-radius: 0.75rem;">{{ __('Simpan Sandi') }}</button>

            @if (session('status') === 'password-updated')
                <p class="text-success mb-0 fw-medium small" id="pwdUpdatedMsg">
                    <i class="bi bi-check-circle-fill me-1"></i> {{ __('Berhasil diperbarui.') }}
                </p>
                <script>
                    setTimeout(() => {
                        const msg = document.getElementById('pwdUpdatedMsg');
                        if(msg) msg.style.display = 'none';
                    }, 3000);
                </script>
            @endif
        </div>
    </form>
</section>
