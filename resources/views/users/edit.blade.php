<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('users.index') }}" class="btn btn-light border" style="border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <h2 class="fs-4 fw-bold text-dark mb-0">Edit Pengguna</h2>
                <p class="text-secondary mb-0" style="font-size: 0.9rem;">Perbarui data atau ubah hak akses pengguna</p>
            </div>
        </div>
    </x-slot>

    <div class="row mt-4 justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm" style="border-radius: 1rem;">
                <div class="card-body p-5">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold text-dark">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold text-dark">Alamat Email</label>
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-4">
                            <div class="col-12 mb-2">
                                <label class="form-label fw-bold text-dark mb-0">Kata Sandi (Opsional)</label>
                                <div class="form-text mt-0 mb-2">Kosongkan jika Anda tidak ingin mengubah kata sandi saat ini.</div>
                            </div>
                            <div class="col-md-6">
                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" placeholder="Kata Sandi Baru">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-3 mt-md-0">
                                <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Kata Sandi Baru">
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="form-label fw-bold text-dark d-block">Hak Akses / Role</label>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-check form-check-custom" style="border: 1px solid #e5e7eb; border-radius: 0.75rem; padding: 1rem 1rem 1rem 2.5rem; cursor: pointer;">
                                        <input class="form-check-input" type="radio" name="role" id="roleInvestigator" value="investigator" {{ old('role', $user->role) === 'investigator' ? 'checked' : '' }} {{ auth()->id() === $user->id && $user->role === 'admin' ? 'disabled' : '' }}>
                                        <label class="form-check-label w-100 fw-bold" for="roleInvestigator" style="cursor: pointer;">
                                            Investigator
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-custom" style="border: 1px solid #e5e7eb; border-radius: 0.75rem; padding: 1rem 1rem 1rem 2.5rem; cursor: pointer;">
                                        <input class="form-check-input" type="radio" name="role" id="roleAdmin" value="admin" {{ old('role', $user->role) === 'admin' ? 'checked' : '' }}>
                                        <label class="form-check-label w-100 fw-bold text-danger" for="roleAdmin" style="cursor: pointer;">
                                            Administrator
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @if(auth()->id() === $user->id && $user->role === 'admin')
                                <div class="form-text text-warning mt-2"><i class="bi bi-info-circle"></i> Anda tidak dapat menurunkan jabatan akun Anda sendiri.</div>
                            @endif
                            @error('role')
                                <div class="text-danger mt-2" style="font-size: 0.875em;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('users.index') }}" class="btn btn-light fw-bold px-4 py-2" style="border-radius: 0.75rem;">Batal</a>
                            <button type="submit" class="btn btn-primary fw-bold px-4 py-2" style="border-radius: 0.75rem;">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
