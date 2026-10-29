@extends('app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-sm border-0 rounded-4 p-4">
            <h4 class="fw-bold mb-4">Edit Data Narasumber</h4>

            <form method="POST" action="{{ url('/speakers/' . $speaker->id) }}">
                @csrf
                @method('PUT')

                @php
                    $skills = explode(', ', $speaker->keahlian);
                    $opsi = ["Web Dev", "Mobile App", "UI/UX Design", "Data"];
                @endphp

                <div class="mb-3">
                    <label for="nama" class="form-label fw-semibold">Nama Narasumber:</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', $speaker->nama) }}" required>
                </div>

                    

                <div class="mb-3">
                    <label class="form-label fw-semibold d-block">Profil Keahlian:</label>
                    <div class="d-flex flex-wrap gap-3">
                        @foreach ($opsi as $item)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="keahlian[]" value="{{ $item }}" id="edit_keahlian_{{ $loop->index }}" {{ in_array($item, old('keahlian', $skills)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="edit_keahlian_{{ $loop->index }}">
                                    {{ $item }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label for="institusi" class="form-label fw-semibold">Riwayat Institusi:</label>
                    <input type="text" id="institusi" name="institusi" class="form-control" value="{{ old('institusi', $speaker->institusi) }}" required>
                </div>

                <div class="mb-4">
                    <label for="portofolio" class="form-label fw-semibold">Tautan Portofolio:</label>
                    <input type="url" id="portofolio" name="portofolio" class="form-control" value="{{ old('portofolio', $speaker->portofolio) }}" required>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ url('/') }}" class="btn btn-secondary px-4">Batal</a>
                    <button type="submit" class="btn btn-primary px-4">Perbaiki Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection