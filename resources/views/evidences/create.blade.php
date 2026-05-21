<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 text-secondary">
            {{ __('Unggah Bukti Digital') }}
        </h2>
    </x-slot>

    <div class="row mt-3">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <form action="{{ route('evidences.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="case_id" class="form-label fw-bold">Pilih Kasus</label>
                            <select name="case_id" id="case_id" class="form-select @error('case_id') is-invalid @enderror" required>
                                <option value="" disabled selected>-- Pilih Kasus --</option>
                                @foreach($cases as $case)
                                    <option value="{{ $case->id }}" {{ (isset($case_id) && $case_id == $case->id) || old('case_id') == $case->id ? 'selected' : '' }}>
                                        {{ $case->title }} ({{ ucfirst($case->status) }})
                                    </option>
                                @endforeach
                            </select>
                            @error('case_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="file" class="form-label fw-bold">Pilih File Bukti (Maks. 10MB)</label>
                            <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" accept=".pdf,.docx,.jpg,.jpeg,.png,.mp3,.mp4,.zip" required>
                            @error('file') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                            <a href="{{ isset($case_id) ? route('cases.show', $case_id) : route('cases.index') }}" class="btn btn-light text-secondary fw-bold">Batal</a>
                            <button type="submit" class="btn btn-success fw-bold px-4">Unggah Bukti</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
