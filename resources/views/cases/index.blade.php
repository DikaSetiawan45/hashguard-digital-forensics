<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0 text-secondary">
                {{ __('Daftar Kasus') }}
            </h2>
            <a href="{{ route('cases.create') }}" class="btn btn-primary btn-sm fw-bold">
                + Tambah Kasus
            </a>
        </div>
    </x-slot>

    <div class="row mt-3">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm border-0">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="px-4 py-3">Judul</th>
                                    <th class="px-4 py-3">Investigator</th>
                                    <th class="px-4 py-3 text-center">Jml Evidence</th>
                                    <th class="px-4 py-3 text-center">Integritas</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($cases as $case)
                                    <tr>
                                        <td class="px-4 py-3 align-middle fw-medium">{{ $case->title }}</td>
                                        <td class="px-4 py-3 align-middle">{{ $case->user->name ?? '-' }}</td>
                                        <td class="px-4 py-3 align-middle text-center fw-bold">{{ $case->evidences->count() }}</td>
                                        <td class="px-4 py-3 align-middle text-center">
                                            @php
                                                $integrityLabel = 'BELUM ADA';
                                                $color = 'bg-light text-dark border';
                                                
                                                if ($case->evidences->count() > 0) {
                                                    $hasModified = $case->evidences->where('integrity_status', 'modified')->count() > 0;
                                                    $allValid = $case->evidences->where('integrity_status', 'valid')->count() === $case->evidences->count();
                                                    
                                                    if ($hasModified) {
                                                        $integrityLabel = 'BERMASALAH';
                                                        $color = 'bg-danger';
                                                    } elseif ($allValid) {
                                                        $integrityLabel = 'AMAN';
                                                        $color = 'bg-success';
                                                    } else {
                                                        $integrityLabel = 'UNVERIFIED';
                                                        $color = 'bg-warning text-dark';
                                                    }
                                                }
                                            @endphp
                                            <span class="badge {{ $color }} px-2 py-1">
                                                {{ $integrityLabel }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 align-middle">
                                            <span class="badge {{ $case->status == 'active' ? 'bg-primary' : 'bg-secondary' }}">
                                                {{ ucfirst($case->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 align-middle text-end">
                                            <a href="{{ route('cases.show', $case->id) }}" class="btn btn-sm btn-outline-info me-1">Detail</a>
                                            <a href="{{ route('cases.edit', $case->id) }}" class="btn btn-sm btn-outline-primary me-1">Edit</a>
                                            <form action="{{ route('cases.destroy', $case->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kasus ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-4 text-center text-muted">Belum ada data kasus.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
