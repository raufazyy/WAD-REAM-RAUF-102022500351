@extends('app')

@section('title', 'Profil Mahasiswa')

@section('content')

    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-12">
                <a href="{{ url()->previous() }}" class="btn btn-light border rounded-pill px-4 shadow-sm">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden"
                    style="background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px);">

                    <div class="card-header text-center p-5" style="background: linear-gradient(135deg, #003366, #0055aa);">
                        <div class="mb-3">
                            <div class="rounded-circle bg-white text-primary mx-auto d-flex align-items-center justify-content-center shadow-sm"
                                style="width: 120px; height: 120px; font-size: 3.5rem; font-weight: bold;">
                                {{ substr($mahasiswa->nama, 0, 1) }}
                            </div>
                        </div>
                        <h3 class="text-white fw-bold mb-1">{{ $mahasiswa->nama }}</h3>
                        <p class="text-white-50 mb-0">{{ $mahasiswa->nim }}</p>
                    </div>

                    <div class="card-body p-4">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex align-items-center border-0 px-0 mb-3">
                                <div class="bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center rounded-circle"
                                    style="width: 55px; height: 55px;">
                                    <i class="bi bi-mortarboard-fill fs-4"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-muted mb-0">Program Studi</p>
                                    <h6 class="fw-semibold mb-0">{{ $mahasiswa->prodi }}</h6>
                                </div>
                            </div>

                            <div class="list-group-item d-flex align-items-center border-0 px-0">
                                <div class="bg-success bg-opacity-10 text-success d-flex align-items-center justify-content-center rounded-circle"
                                    style="width: 55px; height: 55px;">
                                    <i class="bi bi-envelope-fill fs-4"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-muted mb-0">Email</p>
                                    <h6 class="fw-semibold mb-0">{{ $mahasiswa->email }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center bg-light py-3">
                        <small class="text-muted">Profil Mahasiswa</small>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection