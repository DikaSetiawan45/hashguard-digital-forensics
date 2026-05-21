<section>
    <header class="mb-4">
        <h2 class="h5 fw-bold text-danger">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="text-secondary" style="font-size: 0.9rem;">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus akun, harap unduh data atau informasi apa pun yang ingin Anda simpan.') }}
        </p>
    </header>

    <button type="button" class="btn btn-danger fw-bold px-4 py-2" style="border-radius: 0.75rem;" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
        {{ __('Hapus Akun Saya') }}
    </button>

    <!-- Modal Konfirmasi Hapus Akun -->
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 1rem; border: none;">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')
                    
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold text-dark" id="confirmUserDeletionModalLabel">{{ __('Apakah Anda yakin ingin menghapus akun ini?') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body pt-3 pb-4">
                        <p class="text-secondary mb-4" style="font-size: 0.95rem;">
                            {{ __('Setelah akun dihapus, semua data Anda akan hilang permanen. Silakan masukkan kata sandi Anda untuk mengonfirmasi penghapusan akun.') }}
                        </p>

                        <div class="mb-2">
                            <label for="password" class="visually-hidden">{{ __('Kata Sandi') }}</label>
                            <input type="password" class="form-control form-control-lg @error('password', 'userDeletion') is-invalid @enderror" id="password" name="password" placeholder="{{ __('Masukkan Kata Sandi Anda') }}">
                            @error('password', 'userDeletion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-light fw-bold px-4 py-2" data-bs-dismiss="modal" style="border-radius: 0.75rem;">{{ __('Batal') }}</button>
                        <button type="submit" class="btn btn-danger fw-bold px-4 py-2" style="border-radius: 0.75rem;">{{ __('Ya, Hapus Akun') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    @if($errors->userDeletion->isNotEmpty())
        <!-- Jika ada error saat hapus (misal password salah), munculkan kembali modal secara otomatis -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var myModal = new bootstrap.Modal(document.getElementById('confirmUserDeletionModal'));
                myModal.show();
            });
        </script>
    @endif
</section>
