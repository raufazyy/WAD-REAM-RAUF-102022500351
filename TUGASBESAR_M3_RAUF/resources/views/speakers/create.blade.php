@extends('app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0 rounded-4 p-4">
            <h3 class="fw-bold mb-1">Pendaftaran Narasumber</h3>
            <p class="text-muted mb-4">Lengkapi profil narasumber untuk event dan workshop.</p>

            <form method="POST" action="{{ url('/speakers/tambah') }}">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label fw-semibold">Nama Narasumber:</label>
                    <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Contoh: Dr. Budi Santoso" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold d-block">Profil Keahlian:</label>
                    @php
                        $opsi = ["Web Development", "Mobile App", "UI/UX Design", "Networking", "Database"];
                    @endphp
                    <div class="d-flex flex-wrap gap-3">
                        @foreach ($opsi as $item)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="keahlian[]" value="{{ $item }}" id="keahlian_{{ $loop->index }}" {{ is_array(old('keahlian')) && in_array($item, old('keahlian')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="keahlian_{{ $loop->index }}">
                                    {{ $item }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('keahlian')
                        <small class="text-danger d-block mt-1">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="institusi" class="form-label fw-semibold">Riwayat Institusi:</label>
                    <input type="text" id="institusi" name="institusi" class="form-control @error('institusi') is-invalid @enderror" placeholder="Contoh: Telkom University" value="{{ old('institusi') }}">
                    @error('institusi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="portofolio" class="form-label fw-semibold">Tautan Portofolio:</label>
                    <input type="url" id="portofolio" name="portofolio" class="form-control @error('portofolio') is-invalid @enderror" placeholder="https://github.com/username" value="{{ old('portofolio') }}">
                    @error('portofolio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ url('/') }}" class="btn btn-secondary px-4 rounded-pill">← Kembali ke Dashboard</a>
                    <button type="submit" class="btn btn-primary px-4 rounded-pill">Simpan Narasumber</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection