@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h4>Halo, {{ $username }}! <i class="bi bi-heart-fill text-primary"></i></h4>
    <p class="text-muted mb-4">Ringkasan toko boneka kamu hari ini.</p>

    <div class="row g-3 mb-4">
        @foreach ($statistik as $s)
            <div class="col-12 col-sm-6 col-lg-3">
                <x-stat-card :label="$s['label']" :nilai="$s['nilai']" :ikon="$s['ikon']" :warna="$s['warna']" />
            </div>
        @endforeach
    </div>

    <div class="row g-3">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <i class="bi bi-stars me-2 text-primary"></i>Aktivitas Terbaru
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($aktivitas as $a)
                        <li class="list-group-item d-flex align-items-center">
                            <span class="text-{{ $a['warna'] }} me-3"><i class="bi {{ $a['ikon'] }}"></i></span>
                            <span class="flex-grow-1">{{ $a['aksi'] }}</span>
                            <span class="text-muted ms-3 text-nowrap">{{ $a['waktu'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <i class="bi bi-lightning-charge me-2 text-purple"></i>Pintasan
                </div>
                <div class="card-body d-grid gap-2">
                    <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="btn btn-primary">
                        <i class="bi bi-gift me-1"></i>Kelola Koleksi Boneka
                    </a>
                    <a href="{{ route('profile', ['username' => $username]) }}" class="btn btn-outline-primary">
                        <i class="bi bi-person-heart me-1"></i>Lihat Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection