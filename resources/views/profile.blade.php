@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="text-center text-white py-4"
                     style="background: linear-gradient(135deg, #ec4899, #a855f7);">
                    <div class="rounded-circle bg-white bg-opacity-25 d-inline-flex align-items-center justify-content-center mb-2"
                         style="width:72px;height:72px;">
                        <i class="bi bi-person-heart"></i>
                    </div>
                    <h5 class="mb-0">{{ $username }}</h5>
                    <span>Pemilik Dollie Shop</span>
                </div>

                <ul class="list-group list-group-flush">
                    @foreach ($biodata as $label => $nilai)
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="text-muted">{{ $label }}</span>
                            <strong>{{ $nilai }}</strong>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection