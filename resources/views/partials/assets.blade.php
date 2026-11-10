<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>
    :root {
        --bs-body-font-family: 'Roboto', sans-serif;

        /* Ubah warna "primary" Bootstrap menjadi pink */
        --bs-primary: #ec4899;
        --bs-primary-rgb: 236, 72, 153;
        --bs-link-color: #db2777;
        --bs-link-hover-color: #be185d;
    }

    body { background-color: #fff0f6; }

    /* Navbar gradasi pink -> ungu */
    .navbar.bg-primary {
        background-image: linear-gradient(90deg, #ec4899, #a855f7) !important;
    }

    /* Tombol pink */
    .btn-primary {
        --bs-btn-bg: #ec4899;
        --bs-btn-border-color: #ec4899;
        --bs-btn-hover-bg: #db2777;
        --bs-btn-hover-border-color: #db2777;
        --bs-btn-active-bg: #be185d;
        --bs-btn-active-border-color: #be185d;
        --bs-btn-disabled-bg: #ec4899;
        --bs-btn-disabled-border-color: #ec4899;
    }
    .btn-outline-primary {
        --bs-btn-color: #ec4899;
        --bs-btn-border-color: #ec4899;
        --bs-btn-hover-bg: #ec4899;
        --bs-btn-hover-border-color: #ec4899;
        --bs-btn-active-bg: #db2777;
        --bs-btn-active-border-color: #db2777;
    }

    /* Fokus input pink */
    .form-control:focus, .form-select:focus {
        border-color: #f472b6;
        box-shadow: 0 0 0 .25rem rgba(236, 72, 153, .2);
    }

    /* Warna tambahan: ungu */
    .bg-purple   { background-color: rgba(168, 85, 247, var(--bs-bg-opacity, 1)) !important; }
    .text-purple { color: #a855f7 !important; }

    /* Kartu lebih lembut */
    .card { border-radius: 1rem; }
</style>