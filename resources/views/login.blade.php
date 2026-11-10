@extends('layouts.app')

@section('title', 'Login')
@section('guest', true)

@section('content')
<div class="row justify-content-center my-md-5">
    <div class="col-lg-9">
        <div class="card shadow border-0 overflow-hidden">
            <div class="row g-0">

                {{-- Panel kiri: hanya tampil di layar md ke atas --}}
                <div class="col-md-6 d-none d-md-flex flex-column justify-content-center align-items-center text-center text-white p-5"
                     style="background: linear-gradient(135deg, #ec4899, #a855f7);">
                    <div class="rounded-circle bg-white bg-opacity-25 d-flex align-items-center justify-content-center mb-3"
                         style="width:72px;height:72px;">
                        <i class="bi bi-balloon-heart-fill"></i>
                    </div>
                    <h4>Dollie Shop</h4>
                    <p class="mb-0">Toko boneka lucu dan lembut untuk semua usia.</p>
                </div>

                {{-- Panel kanan: form --}}
                <div class="col-md-6">
                    <div class="card-body p-4 p-lg-5">
                        <h4 class="mb-1">Selamat Datang <i class="bi bi-heart-fill text-primary"></i></h4>
                        <p class="text-muted mb-4">Masuk untuk mengelola koleksi boneka.</p>

                        <form action="{{ route('login.process') }}" method="POST" novalidate>
                            @csrf

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text"><i class="bi bi-person-heart"></i></span>
                                    <input type="text" id="username" name="username"
                                           class="form-control @error('username') is-invalid @enderror"
                                           value="{{ old('username') }}" placeholder="contoh: Ulfatun">
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" id="password" name="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           placeholder="Password apa saja (simulasi)">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-box-arrow-in-right me-1"></i>Masuk
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection