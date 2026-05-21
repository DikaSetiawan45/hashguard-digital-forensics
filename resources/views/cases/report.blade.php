<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Laporan Forensik Kasus - {{ $case->title }}</title>
    <!-- Gunakan Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #fff; padding: 30px; color: #333; }
        .report-header { border-bottom: 3px solid #1e293b; margin-bottom: 30px; padding-bottom: 15px; }
        .text-success { color: #16a34a !important; }
        .text-danger { color: #dc2626 !important; }
        .bg-success-subtle { background-color: #dcfce7 !important; }
        .bg-danger-subtle { background-color: #fee2e2 !important; }
        th { color: #475569; }
        @media print {
            .no-print { display: none !important; }
            body { padding: 0; }
        }
    </style>
</head>
<body>
    <div class="container-fluid px-0">
        <!-- HEADER CETAK -->
        <div class="d-flex justify-content-between align-items-center report-header">
            <div>
                <h2 class="mb-1 fw-bolder text-primary" style="color: #2563eb !important;">HashGuard Pro</h2>
                <h5 class="text-muted mb-0 fw-bold">Laporan Analisis Forensik Digital</h5>
            </div>
            <button class="btn btn-primary no-print px-4 fw-bold shadow-sm" onclick="window.print()">Cetak Laporan</button>
        </div>

        <!-- 1. INFORMASI KASUS -->
        <div class="mb-5">
            <h5 class="fw-bold mb-3 border-bottom pb-2">1. Informasi Kasus</h5>
            <table class="table table-sm table-borderless w-50" style="font-size: 1.05rem;">
                <tr><th width="35%">Judul Kasus</th><td class="fw-bold">: {{ $case->title }}</td></tr>
                <tr><th>Investigator</th><td>: {{ $case->user->name ?? 'Unknown' }}</td></tr>
                <tr><th>Tanggal Pembuatan</th><td>: {{ $case->created_at->format('d M Y, H:i') }}</td></tr>
                <tr><th>Waktu Cetak Laporan</th><td>: {{ now()->format('d M Y, H:i') }}</td></tr>
            </table>
        </div>

        <!-- 2. DAFTAR EVIDENCE -->
        <div class="mb-5">
            <h5 class="fw-bold mb-3 border-bottom pb-2">2. Daftar Barang Bukti (Evidence)</h5>
            @if($case->evidences->count() > 0)
                <table class="table table-bordered table-sm align-middle" style="font-size: 0.9rem;">
                    <thead class="table-light">
                        <tr>
                            <th width="5%" class="text-center py-2">No</th>
                            <th width="25%" class="py-2">Nama File</th>
                            <th width="30%" class="py-2">MD5 Hash</th>
                            <th width="30%" class="py-2">SHA256 Hash</th>
                            <th width="10%" class="text-center py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($case->evidences as $index => $ev)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="fw-medium">{{ $ev->file_name }}</td>
                                <td class="font-monospace text-muted" style="font-size: 0.85rem; word-break: break-all;">{{ $ev->md5_hash }}</td>
                                <td class="font-monospace text-muted" style="font-size: 0.85rem; word-break: break-all;">{{ $ev->sha256_hash }}</td>
                                <td class="text-center fw-bold">
                                    @if($ev->integrity_status == 'valid')
                                        <span class="text-success badge bg-success-subtle px-2 py-1">VALID</span>
                                    @elseif($ev->integrity_status == 'modified')
                                        <span class="text-danger badge bg-danger-subtle px-2 py-1">MODIFIED</span>
                                    @else
                                        <span class="text-secondary badge bg-light border px-2 py-1">UNKNOWN</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="p-3 bg-light border text-center text-muted fst-italic">
                    Tidak ada barang bukti digital yang terdaftar pada kasus ini.
                </div>
            @endif
        </div>

        <!-- LOGIKA RINGKASAN -->
        @php
            $total = $case->evidences->count();
            $valid = $case->evidences->where('integrity_status', 'valid')->count();
            $modified = $case->evidences->where('integrity_status', 'modified')->count();
            
            $statusKasus = 'BELUM ADA BUKTI';
            $statusColor = 'text-muted border bg-light';
            
            if ($total > 0) {
                if ($modified > 0) {
                    $statusKasus = 'BERMASALAH';
                    $statusColor = 'text-danger bg-danger-subtle border-danger';
                } elseif ($valid === $total) {
                    $statusKasus = 'AMAN';
                    $statusColor = 'text-success bg-success-subtle border-success';
                } else {
                    $statusKasus = 'UNVERIFIED';
                    $statusColor = 'text-warning bg-warning-subtle border-warning';
                }
            }
        @endphp

        <!-- 3. RINGKASAN -->
        <div class="mb-5">
            <h5 class="fw-bold mb-3 border-bottom pb-2">3. Ringkasan Integritas</h5>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-sm table-borderless" style="font-size: 1.05rem;">
                        <tr><th width="40%">Total Evidence</th><td>: {{ $total }} file</td></tr>
                        <tr><th>Jumlah Valid</th><td>: <span class="text-success fw-bold">{{ $valid }}</span> file</td></tr>
                        <tr><th>Jumlah Modified</th><td>: <span class="text-danger fw-bold">{{ $modified }}</span> file</td></tr>
                        <tr class="mt-2">
                            <th class="pt-3">Status Akhir Kasus</th>
                            <td class="pt-3 fw-bold">
                                : <span class="badge {{ $statusColor }} px-3 py-2 ms-1" style="font-size: 0.95rem;">{{ $statusKasus }}</span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- 4. KETERANGAN -->
        <div class="mt-5 p-4 border rounded" style="background-color: #f8fafc; font-size: 0.9rem;">
            <p class="mb-1 fw-bold text-dark">Keterangan Tambahan:</p>
            <p class="mb-0 text-muted">Laporan ini dihasilkan berdasarkan verifikasi integritas menggunakan algoritma kriptografi MD5 dan SHA-256. Dokumen bersifat mengikat secara sistem dan diterbitkan oleh engine pengelolaan HashGuard Pro tanpa memerlukan verifikasi tanda tangan manual.</p>
        </div>
    </div>
</body>
</html>
