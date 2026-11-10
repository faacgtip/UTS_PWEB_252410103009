@props(['username'])

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard', ['username' => $username]) }}">
            <i class="bi bi-balloon-heart-fill me-2"></i>Dollie Shop
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuUtama">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuUtama">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                       href="{{ route('dashboard', ['username' => $username]) }}">
                        <i class="bi bi-house-heart me-1"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pengelolaan') ? 'active' : '' }}"
                       href="{{ route('pengelolaan', ['username' => $username]) }}">
                        <i class="bi bi-gift me-1"></i>Pengelolaan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}"
                       href="{{ route('profile', ['username' => $username]) }}">
                        <i class="bi bi-person-heart me-1"></i>Profile
                    </a>
                </li>
            </ul>
            <a href="{{ route('login') }}" class="btn btn-light">
                <i class="bi bi-box-arrow-right me-1"></i>Logout ({{ $username }})
            </a>
        </div>
    </div>
</nav>