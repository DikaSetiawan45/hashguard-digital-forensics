<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0 text-secondary">
                {{ __('Detail Kasus') }}
            </h2>
            <div>
                <a href="{{ route('cases.index') }}" class="btn btn-outline-secondary btn-sm fw-bold me-2">Kembali</a>
                <a href="{{ route('cases.report', $case->id) }}" target="_blank" class="btn btn-outline-primary btn-sm fw-bold me-2"><i class="bi bi-printer"></i> Cetak Laporan</a>
                <a href="{{ route('cases.edit', $case->id) }}" class="btn btn-primary btn-sm fw-bold">Edit Kasus</a>
            </div>
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

            @if($case->evidences->where('integrity_status', 'modified')->count() > 0)
                <div class="alert alert-danger alert-dismissible fade show fw-bold shadow-sm" role="alert">
                    ⚠️ Terdapat barang bukti yang mengalami perubahan pada kasus ini! Lakukan peninjauan segera.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white pb-0 border-0 pt-4 px-4">
                    <h5 class="fw-bold text-dark border-bottom pb-2">Informasi Kasus</h5>
                </div>
                <div class="card-body px-4">
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <p class="text-muted small fw-bold mb-1">Judul Kasus</p>
                            <p class="mb-0 fw-medium">{{ $case->title }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="text-muted small fw-bold mb-1">Status</p>
                            <span class="badge {{ $case->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($case->status) }}
                            </span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="text-muted small fw-bold mb-1">Pembuat</p>
                            <p class="mb-0 fw-medium">{{ $case->user->name ?? 'Unknown' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="text-muted small fw-bold mb-1">Tanggal Dibuat</p>
                            <p class="mb-0 fw-medium">{{ $case->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                    
                    <div>
                        <p class="text-muted small fw-bold mb-1">Deskripsi</p>
                        <p class="mb-0 text-dark" style="white-space: pre-line;">{{ $case->description ?: 'Tidak ada deskripsi.' }}</p>
                    </div>
                </div>
            </div>

            <!-- Evidence Section -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom pt-4 px-4 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold text-dark mb-0">Daftar Bukti Digital (Evidence)</h5>
                    <a href="{{ route('evidences.create', ['case_id' => $case->id]) }}" class="btn btn-success btn-sm fw-bold">
                        + Unggah Bukti
                    </a>
                </div>
                
                <div class="card-body p-0">
                    @if($case->evidences->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="px-4 py-3">File</th>
                                        <th class="px-4 py-3">Ukuran</th>
                                        <th class="px-4 py-3">Integritas</th>
                                        <th class="px-4 py-3 text-end">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($case->evidences as $ev)
                                        <tr>
                                            <td class="px-4 py-3 align-middle fw-medium">{{ $ev->file_name }}</td>
                                            <td class="px-4 py-3 align-middle text-muted">{{ number_format($ev->file_size / 1024, 2) }} KB</td>
                                            <td class="px-4 py-3 align-middle">
                                                @php
                                                    $color = 'bg-secondary';
                                                    if($ev->integrity_status == 'valid') $color = 'bg-success';
                                                    if($ev->integrity_status == 'modified') $color = 'bg-danger';
                                                @endphp
                                                <span class="badge {{ $color }}">
                                                    {{ strtoupper($ev->integrity_status) }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 align-middle text-end">
                                                <a href="{{ route('evidences.show', $ev->id) }}" class="btn btn-sm btn-outline-info">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="p-4 text-center">
                            <p class="text-muted fst-italic mb-0">Belum ada bukti digital yang diunggah untuk kasus ini.</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
