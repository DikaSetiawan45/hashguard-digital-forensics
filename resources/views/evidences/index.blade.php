<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0 text-secondary">
                {{ __('Daftar Bukti Digital') }}
            </h2>
            <div class="d-flex align-items-center gap-3">
                <div class="btn-group shadow-sm" role="group">
                    <a href="{{ route('evidences.index') }}" class="btn btn-sm fw-bold {{ !request('status') ? 'btn-primary' : 'btn-outline-primary' }}">Semua</a>
                    <a href="{{ route('evidences.index', ['status' => 'valid']) }}" class="btn btn-sm fw-bold {{ request('status') == 'valid' ? 'btn-success' : 'btn-outline-success' }}">Valid</a>
                    <a href="{{ route('evidences.index', ['status' => 'modified']) }}" class="btn btn-sm fw-bold {{ request('status') == 'modified' ? 'btn-danger' : 'btn-outline-danger' }}">Modified</a>
                </div>
                <a href="{{ route('evidences.create') }}" class="btn btn-primary btn-sm fw-bold shadow-sm">
                    + Tambah Bukti
                </a>
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

            <div class="card shadow-sm border-0">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="px-4 py-3">File</th>
                                    <th class="px-4 py-3">Kasus Terkait</th>
                                    <th class="px-4 py-3">Ukuran</th>
                                    <th class="px-4 py-3">Integritas</th>
                                    <th class="px-4 py-3 text-end">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($evidences as $ev)
                                    <tr>
                                        <td class="px-4 py-3 align-middle fw-medium">{{ $ev->file_name }}</td>
                                        <td class="px-4 py-3 align-middle">
                                            @if($ev->caseFile)
                                                <a href="{{ route('cases.show', $ev->case_id) }}" class="text-decoration-none fw-bold">{{ $ev->caseFile->title }}</a>
                                            @else
                                                <span class="text-muted fst-italic">Tanpa Kasus</span>
                                            @endif
                                        </td>
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
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-4 text-center text-muted">Belum ada bukti digital yang diunggah.</td>
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
