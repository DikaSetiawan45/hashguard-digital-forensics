<x-app-layout>
    <x-slot name="header">
        <h2 class="fs-3 fw-bold text-dark mb-1" style="letter-spacing: -0.5px;">
            Laporan Global
        </h2>
        <p class="text-secondary mb-0" style="font-size: 0.95rem;">Ringkasan sistem dan status integritas kasus secara keseluruhan</p>
    </x-slot>

    <!-- Menggunakan kembali style dari dashboard untuk konsistensi -->
    <style>
        .text-blue-custom { color: #2563eb !important; }
        .text-green-custom { color: #16a34a !important; }
        .text-red-custom { color: #dc2626 !important; }
        .text-purple-custom { color: #9333ea !important; }
        
        .bg-blue-light { background-color: #eff6ff !important; }
        .bg-green-light { background-color: #f0fdf4 !important; }
        .bg-red-light { background-color: #fef2f2 !important; }
        .bg-purple-light { background-color: #faf5ff !important; }
        
        .card-custom { 
            border: none;
            border-radius: 1rem; 
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            background-color: #ffffff;
            transition: transform 0.2s;
        }
        
        .icon-circle { 
            width: 56px; 
            height: 56px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            border-radius: 50%; 
            margin-bottom: 1rem;
        }
        .icon-circle i { font-size: 1.75rem; }
        
        .card-title-custom {
            font-weight: 700;
            font-size: 1.1rem;
            color: #111827;
            margin-bottom: 0.25rem;
        }
        .card-subtitle-custom {
            color: #6b7280;
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
        }
        
        .stat-value {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 0.5rem;
        }
        
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .status-valid { background-color: #dcfce7; color: #166534; }
        .status-modified { background-color: #fee2e2; color: #991b1b; }
        .status-unknown { background-color: #fef3c7; color: #92400e; }
    </style>

    <div class="row mt-2">
        <!-- Total Cases -->
        <div class="col-md-3 mb-4">
            <div class="card card-custom h-100 p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="icon-circle bg-purple-light">
                        <i class="bi bi-folder2-open text-purple-custom"></i>
                    </div>
                </div>
                <h6 class="card-title-custom">Total Kasus</h6>
                <p class="card-subtitle-custom">Jumlah kasus tercatat</p>
                <div class="stat-value text-purple-custom">{{ $stats['total_cases'] }}</div>
            </div>
        </div>

        <!-- Total Evidence -->
        <div class="col-md-3 mb-4">
            <div class="card card-custom h-100 p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="icon-circle bg-blue-light">
                        <i class="bi bi-files text-blue-custom"></i>
                    </div>
                </div>
                <h6 class="card-title-custom">Total Bukti</h6>
                <p class="card-subtitle-custom">Bukti digital masuk</p>
                <div class="stat-value text-blue-custom">{{ $stats['total_evidences'] }}</div>
            </div>
        </div>

        <!-- Valid Evidence -->
        <div class="col-md-3 mb-4">
            <div class="card card-custom h-100 p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="icon-circle bg-green-light">
                        <i class="bi bi-shield-check text-green-custom"></i>
                    </div>
                </div>
                <h6 class="card-title-custom">Bukti Valid</h6>
                <p class="card-subtitle-custom">Integritas terjaga</p>
                <div class="stat-value text-green-custom">{{ $stats['valid_evidences'] }}</div>
            </div>
        </div>

        <!-- Modified Evidence -->
        <div class="col-md-3 mb-4">
            <div class="card card-custom h-100 p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="icon-circle bg-red-light">
                        <i class="bi bi-shield-exclamation text-red-custom"></i>
                    </div>
                </div>
                <h6 class="card-title-custom">Bukti Berubah</h6>
                <p class="card-subtitle-custom">Integritas bermasalah</p>
                <div class="stat-value text-red-custom">{{ $stats['modified_evidences'] }}</div>
            </div>
        </div>
    </div>

    <div class="row mt-2 mb-4">
        <div class="col-12">
            <div class="card card-custom p-4">
                <h5 class="fw-bold text-dark mb-4" style="font-size: 1.1rem;">Rekapitulasi Laporan per Kasus</h5>
                
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xs fw-bolder opacity-7 ps-2">Nama Kasus</th>
                                <th class="text-uppercase text-secondary text-xs fw-bolder opacity-7 text-center">Jml Bukti</th>
                                <th class="text-uppercase text-secondary text-xs fw-bolder opacity-7 text-center">Status Integritas</th>
                                <th class="text-uppercase text-secondary text-xs fw-bolder opacity-7 text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cases as $case)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm fw-bold">{{ $case->title }}</h6>
                                                <p class="text-xs text-secondary mb-0">Investigator: {{ $case->user->name ?? '-' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs fw-bold">{{ $case->evidences->count() }} item</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        @php
                                            $integrityLabel = 'BELUM ADA';
                                            $badgeClass = 'status-unknown';
                                            
                                            if ($case->evidences->count() > 0) {
                                                $hasModified = $case->evidences->where('integrity_status', 'modified')->count() > 0;
                                                $allValid = $case->evidences->where('integrity_status', 'valid')->count() === $case->evidences->count();
                                                
                                                if ($hasModified) {
                                                    $integrityLabel = 'BERMASALAH';
                                                    $badgeClass = 'status-modified';
                                                } elseif ($allValid) {
                                                    $integrityLabel = 'AMAN';
                                                    $badgeClass = 'status-valid';
                                                } else {
                                                    $integrityLabel = 'UNVERIFIED';
                                                    $badgeClass = 'status-unknown';
                                                }
                                            }
                                        @endphp
                                        <span class="status-badge {{ $badgeClass }}">
                                            {{ $integrityLabel }}
                                        </span>
                                    </td>
                                    <td class="align-middle text-end">
                                        <a href="{{ route('cases.report', $case->id) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                            <i class="bi bi-printer"></i> Cetak Laporan
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-secondary">
                                        Belum ada kasus tercatat.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($cases->hasPages())
                    <div class="mt-4">
                        {{ $cases->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
