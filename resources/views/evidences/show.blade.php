<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 text-secondary">
            {{ __('Detail Bukti Digital') }}
        </h2>
    </x-slot>

    <div class="row mt-3">
        <div class="col-md-10 mx-auto">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error_msg'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error_msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white pb-0 pt-4 px-4 border-0">
                    <h5 class="fw-bold text-dark border-bottom pb-2">Informasi Berkas</h5>
                    <p class="text-muted small">Tergabung dalam kasus: <a href="{{ route('cases.show', $evidence->case_id) }}" class="text-primary text-decoration-none fw-bold">{{ $evidence->caseFile->title }}</a></p>
                </div>
                
                <div class="card-body px-4">
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <p class="text-muted small fw-bold mb-1">Nama File</p>
                            <p class="mb-0 fw-medium">{{ $evidence->file_name }}</p>
                        </div>
                        <div class="col-md-3 mb-3">
                            <p class="text-muted small fw-bold mb-1">Ukuran File</p>
                            <p class="mb-0 fw-medium">{{ number_format($evidence->file_size / 1024, 2) }} KB</p>
                        </div>
                        <div class="col-md-3 mb-3">
                            <p class="text-muted small fw-bold mb-1">Tipe File</p>
                            <p class="mb-0 fw-medium text-uppercase">{{ $evidence->file_type }}</p>
                        </div>
                        <div class="col-md-12 mb-3 mt-2">
                            <p class="text-muted small fw-bold mb-1">Status Integritas</p>
                            @php
                                $colorClass = 'bg-secondary';
                                if ($evidence->integrity_status === 'valid') $colorClass = 'bg-success';
                                elseif ($evidence->integrity_status === 'modified') $colorClass = 'bg-danger';
                            @endphp
                            <div class="d-flex align-items-center mt-1">
                                <span class="badge {{ $colorClass }} px-3 py-2 text-uppercase shadow-sm">
                                    {{ $evidence->integrity_status }}
                                </span>
                                @if($evidence->integrity_status === 'modified')
                                    <span class="text-danger fw-bold small ms-3">
                                        ⚠️ File telah dimodifikasi
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <h5 class="fw-bold text-dark border-bottom pb-2 mt-4 mb-3">Informasi Cryptographic Hash</h5>
                    
                    <div class="card bg-light border-0 mb-3">
                        <div class="card-body p-3">
                            <p class="text-muted small fw-bold mb-2">MD5 HASH</p>
                            <div class="bg-white p-3 border rounded shadow-sm text-break font-monospace small">
                                {{ $evidence->md5_hash ?: 'Tidak tersedia' }}
                            </div>
                        </div>
                    </div>

                    <div class="card bg-light border-0 mb-4">
                        <div class="card-body p-3">
                            <p class="text-muted small fw-bold mb-2">SHA-256 HASH</p>
                            <div class="bg-white p-3 border rounded shadow-sm text-break font-monospace small">
                                {{ $evidence->sha256_hash ?: 'Tidak tersedia' }}
                            </div>
                        </div>
                    </div>

                    <h5 class="fw-bold text-dark border-bottom pb-2 mt-5 mb-3">Riwayat Verifikasi File</h5>
                    <div class="card bg-white shadow-sm border mb-4">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="px-4 py-3">Tanggal Verifikasi</th>
                                            <th class="px-4 py-3">Oleh</th>
                                            <th class="px-4 py-3 text-center">Hasil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($logs as $log)
                                            <tr>
                                                <td class="px-4 py-3 align-middle fw-medium">{{ $log->created_at->format('d M Y, H:i') }}</td>
                                                <td class="px-4 py-3 align-middle">{{ $log->user->name ?? 'Sistem' }}</td>
                                                <td class="px-4 py-3 align-middle text-center">
                                                    @if($log->result === 'valid')
                                                        <span class="badge bg-success px-3 py-2">VALID</span>
                                                    @else
                                                        <span class="badge bg-danger px-3 py-2">MODIFIED</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="px-4 py-4 text-center text-muted">Belum ada riwayat verifikasi untuk file ini.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-5 pt-3 border-top">
                        <a href="{{ route('cases.show', $evidence->case_id) }}" class="btn btn-light text-secondary fw-bold">Kembali</a>
                        <a href="{{ route('evidences.verify', $evidence->id) }}" class="btn btn-warning fw-bold text-dark">
                            <i class="bi bi-shield-check"></i> Verifikasi Integritas
                        </a>
                        <a href="{{ Storage::url($evidence->file_path) }}" target="_blank" class="btn btn-primary fw-bold">
                            Unduh File
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
