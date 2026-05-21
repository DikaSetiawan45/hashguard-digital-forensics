<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fs-3 fw-bold text-dark mb-1" style="letter-spacing: -0.5px;">
                    Manajemen Pengguna
                </h2>
                <p class="text-secondary mb-0" style="font-size: 0.95rem;">Kelola akun investigator dan administrator</p>
            </div>
            <a href="{{ route('users.create') }}" class="btn btn-primary fw-bold px-4 py-2" style="border-radius: 0.75rem;">
                <i class="bi bi-person-plus-fill me-2"></i> Tambah Pengguna
            </a>
        </div>
    </x-slot>

    <div class="row mt-4">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card border-0 shadow-sm" style="border-radius: 1rem;">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="px-4 py-3 text-secondary text-uppercase" style="font-size: 0.8rem; font-weight: 600;">Nama Lengkap</th>
                                    <th class="px-4 py-3 text-secondary text-uppercase" style="font-size: 0.8rem; font-weight: 600;">Email Address</th>
                                    <th class="px-4 py-3 text-secondary text-uppercase text-center" style="font-size: 0.8rem; font-weight: 600;">Jabatan / Role</th>
                                    <th class="px-4 py-3 text-secondary text-uppercase text-end" style="font-size: 0.8rem; font-weight: 600;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td class="px-4 py-3">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 40px; height: 40px; font-size: 1.1rem;">
                                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 fw-bold text-dark">{{ $user->name }}</h6>
                                                    <span class="text-muted" style="font-size: 0.85rem;">Terdaftar: {{ $user->created_at->format('d M Y') }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-muted">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            @if($user->role === 'admin')
                                                <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-3 py-2 rounded-pill">
                                                    <i class="bi bi-shield-lock-fill me-1"></i> Administrator
                                                </span>
                                            @else
                                                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 rounded-pill">
                                                    <i class="bi bi-person-badge-fill me-1"></i> Investigator
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-end">
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-light border me-1 text-primary hover-shadow" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun pengguna ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-light border text-danger hover-shadow" title="Hapus" {{ auth()->id() === $user->id ? 'disabled' : '' }}>
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-muted">
                                            <i class="bi bi-people fs-1 d-block mb-3"></i>
                                            Belum ada pengguna yang terdaftar di dalam sistem.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    @if($users->hasPages())
                        <div class="mt-4">
                            {{ $users->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
