@extends('app')

@section('content')
<div class="card shadow-sm border-0 rounded-4 p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="fw-bold mb-0">Daftar Narasumber / Speaker</h4>
            <small class="text-muted">Kelola data pembicara event dan workshop</small>
        </div>
        <a href="{{ url('/speakers/tambah') }}" class="btn btn-primary rounded-3 px-3 fw-semibold">
            + Tambah Pembicara
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive mt-3">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-light text-uppercase fs-7 fw-bold">
                <tr>
                    <th style="width: 50px;">NO</th>
                    <th>NAMA LENGKAP</th>
                    <th>INSTITUSI</th>
                    <th>KEAHLIAN</th>
                    <th>PORTOFOLIO</th>
                    <th style="width: 140px;">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($speakers as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="text-start ps-3 fw-semibold">{{ $item->nama }}</td>
                        <td>{{ $item->institusi }}</td>
                        <td>
                            @foreach (explode(', ', $item->keahlian) as $skill)
                                <span class="badge bg-light text-dark border me-1">{{ $skill }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ $item->portofolio }}" target="_blank" class="btn btn-sm btn-link text-decoration-none">
                                Buka ↗
                            </a>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-1">
                                <!-- Tombol Edit -->
                                <a href="{{ url('/speakers/' . $item->id . '/edit') }}" class="btn btn-sm btn-warning text-dark fw-semibold px-2 py-1">
                                    Edit
                                </a>

                                <!-- Tombol Hapus dengan Konfirmasi Alert -->
                                <form action="{{ url('/speakers/' . $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus narasumber ini?');" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger px-2 py-1">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">
                            Belum ada data narasumber.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection