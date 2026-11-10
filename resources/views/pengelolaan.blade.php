@extends('layouts.app')

@section('title', 'Pengelolaan')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
        <div>
            <h4 class="mb-0">Pengelolaan Koleksi Boneka</h4>
            <p class="text-muted mb-0">Halo {{ $username }}, berikut daftar boneka di toko kamu.</p>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="bi bi-plus-lg me-1"></i>Tambah Boneka
        </button>
    </div>

    {{-- Pencarian & filter (request parameter q dan kategori) --}}
    <div class="card shadow-sm border-0 mb-3">
        <div class="card-body">
            <form action="{{ route('pengelolaan') }}" method="GET" class="row g-2">
                <input type="hidden" name="username" value="{{ $username }}">

                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" name="q" value="{{ $q }}" class="form-control" placeholder="Cari nama boneka...">
                    </div>
                </div>

                <div class="col-md-4">
                    <select name="kategori" class="form-select">
                        <option value="">Semua Kategori</option>
                        @foreach ($kategoriList as $k)
                            <option value="{{ $k }}" {{ $kategori === $k ? 'selected' : '' }}>{{ $k }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 d-flex gap-2">
                    <button type="submit" class="btn btn-primary flex-fill">
                        <i class="bi bi-funnel me-1"></i>Cari
                    </button>
                    <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="btn btn-outline-secondary flex-fill">
                        <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    {{-- Tabel --}}
    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Boneka</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><i class="bi bi-heart-fill text-primary me-1"></i>{{ $item['nama'] }}</td>
                            <td><span class="badge rounded-pill bg-purple bg-opacity-10 text-purple">{{ $item['kategori'] }}</span></td>
                            <td>{{ $item['harga'] }}</td>
                            <td>{{ $item['stok'] }}</td>
                            <td>
                                @if ($item['status'] === 'Tersedia')
                                    <span class="badge text-bg-success">{{ $item['status'] }}</span>
                                @elseif ($item['status'] === 'Menipis')
                                    <span class="badge text-bg-warning">{{ $item['status'] }}</span>
                                @else
                                    <span class="badge text-bg-danger">{{ $item['status'] }}</span>
                                @endif
                            </td>
                            <td class="text-end text-nowrap">
                                <button class="btn btn-outline-primary" title="Edit"
                                        data-bs-toggle="modal" data-bs-target="#modalEdit{{ $loop->index }}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button class="btn btn-outline-danger" title="Hapus"
                                        data-bs-toggle="modal" data-bs-target="#modalHapus{{ $loop->index }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                <i class="bi bi-inbox me-1"></i>Boneka tidak ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer bg-white text-muted">
            Menampilkan {{ count($items) }} dari {{ $total }} boneka
        </div>
    </div>

    {{-- Modal Tambah (tampilan saja) --}}
    <x-modal id="modalTambah" judul="Tambah Boneka">
        <div class="mb-3">
            <label class="form-label">Nama Boneka</label>
            <input type="text" class="form-control" placeholder="Nama boneka">
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select class="form-select">
                @foreach ($kategoriList as $k)
                    <option>{{ $k }}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <div class="col-6 mb-3">
                <label class="form-label">Harga</label>
                <input type="text" class="form-control" placeholder="Rp 0">
            </div>
            <div class="col-6 mb-3">
                <label class="form-label">Stok</label>
                <input type="number" class="form-control" value="0">
            </div>
        </div>
        <x-slot:footer>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
        </x-slot:footer>
    </x-modal>

    {{-- Modal Edit & Hapus per baris (tampilan saja) --}}
    @foreach ($items as $item)
        <x-modal id="modalEdit{{ $loop->index }}" judul="Edit Boneka">
            <div class="mb-3">
                <label class="form-label">Nama Boneka</label>
                <input type="text" class="form-control" value="{{ $item['nama'] }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select class="form-select">
                    @foreach ($kategoriList as $k)
                        <option {{ $item['kategori'] === $k ? 'selected' : '' }}>{{ $k }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                    <label class="form-label">Harga</label>
                    <input type="text" class="form-control" value="{{ $item['harga'] }}">
                </div>
                <div class="col-6 mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" class="form-control" value="{{ $item['stok'] }}">
                </div>
            </div>
            <x-slot:footer>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Simpan Perubahan</button>
            </x-slot:footer>
        </x-modal>

        <x-modal id="modalHapus{{ $loop->index }}" judul="Hapus Boneka">
            <p class="mb-0">Yakin ingin menghapus <strong>{{ $item['nama'] }}</strong>?</p>
            <x-slot:footer>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Ya, Hapus</button>
            </x-slot:footer>
        </x-modal>
    @endforeach
@endsection