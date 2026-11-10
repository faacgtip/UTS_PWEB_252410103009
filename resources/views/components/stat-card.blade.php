@props(['label', 'nilai', 'ikon', 'warna' => 'primary'])

<div class="card shadow-sm border-0 h-100">
    <div class="card-body d-flex align-items-center">
        <div class="rounded-circle bg-{{ $warna }} bg-opacity-10 text-{{ $warna }} d-flex align-items-center justify-content-center me-3 flex-shrink-0"
             style="width:52px;height:52px;">
            <i class="bi {{ $ikon }}"></i>
        </div>
        <div>
            <p class="text-muted mb-0">{{ $label }}</p>
            <p class="fw-bold mb-0">{{ $nilai }}</p>
        </div>
    </div>
</div>