@extends('app')

@section('title', 'Dashboard Mahasiswa')

@section('content')

    <div class="container py-5">
        <div class="text-center mb-5">
            <div class="d-inline-flex align-items-center justify-content-center rounded-circle shadow-lg"
                style="width: 150px; height: 150px;
                background: linear-gradient(135deg, #003366, #0055aa);
                color: white;">
                <i class="bi bi-person-circle" style="font-size: 6rem;"></i>
            </div>

            <h1 class="mt-4 fw-bold">
                {{ $salam }}, <span class="text-primary">{{ $mahasiswa->nama }}</span>!
            </h1>
            <p class="fs-5 text-muted">Welcome to your student dashboard</p>
        </div>

        <div class="row justify-content-center g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow rounded-4 p-4 text-center h-100" style="background: #f9fafc;">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <div class="bg-info bg-opacity-10 text-info rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 60px; height: 60px;">
                            <i class="bi bi-clock fs-3"></i>
                        </div>
                    </div>
                    <h6 class="text-muted mb-1">Access Time</h6>
                    <h5 class="fw-semibold">{{ $accessTime }} WIB</h5>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow rounded-4 p-4 text-center h-100 text-white"
                    style="background: linear-gradient(135deg, #004aad, #00aaff);">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <i class="bi bi-person-lines-fill fs-1"></i>
                    </div>
                    <h6 class="mb-3">Student Profile</h6>
                    <a href="{{ url('profil') }}" class="btn btn-light rounded-pill px-4 shadow-sm">
                        View Profile
                    </a>
                    <a href="{{ url('/speakers/tambah') }}" class="btn btn-light rounded-pill px-4 shadow-sm">
                         + Tambah Narasumber
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection