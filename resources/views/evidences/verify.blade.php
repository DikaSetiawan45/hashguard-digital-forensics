<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 text-secondary">
            {{ __('Verifikasi Integritas File') }}
        </h2>
    </x-slot>

    <div class="row mt-3">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white pb-0 pt-4 px-4 border-0">
                    <h5 class="fw-bold text-dark border-bottom pb-2">Target Bukti Digital</h5>
                </div>
                <div class="card-body px-4">
                    <p class="mb-1 text-primary fw-bold">{{ $evidence->file_name }}</p>
                    <p class="text-muted small mb-4">Hash MD5 Database: <span class="font-monospace bg-light border px-2 py-1 rounded">{{ $evidence->md5_hash ?: 'N/A' }}</span></p>

                    <div class="alert alert-info border-info bg-opacity-10 py-3 mb-4">
                        <i class="bi bi-info-circle-fill me-2"></i> Silakan unggah salinan/kopian file bukti yang ingin diverifikasi. Sistem akan menghitung ulang Hash-nya dan mencocokannya dengan nilai di Database.
                    </div>

                    <form action="{{ route('evidences.verify.submit', $evidence->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="verify_file" class="form-label fw-bold">Pilih File Pembanding</label>
                            <input type="file" name="verify_file" id="verify_file" class="form-control @error('verify_file') is-invalid @enderror" accept=".pdf,.docx,.jpg,.jpeg,.png,.mp3,.mp4,.zip" required>
                            @error('verify_file') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-5 pt-3 border-top">
                            <a href="{{ route('evidences.show', $evidence->id) }}" class="btn btn-light text-secondary fw-bold">Batal</a>
                            <button type="submit" class="btn btn-success fw-bold px-4">Verifikasi Sekarang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
