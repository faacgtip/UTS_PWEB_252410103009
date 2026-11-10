<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:3|max:30',
            'password' => 'required|string|min:3',
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.min'      => 'Username minimal 3 karakter.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 3 karakter.',
        ]);

        return redirect()->route('dashboard', [
            'username' => $request->input('username'),
        ]);
    }

    public function dashboard(Request $request)
    {
        $username = $this->getUsername($request);
        if (!$username) {
            return redirect()->route('login');
        }

        $statistik = [
            ['label' => 'Total Boneka',      'nilai' => 128, 'ikon' => 'bi-balloon-heart', 'warna' => 'primary'],
            ['label' => 'Pesanan Baru',      'nilai' => 14,  'ikon' => 'bi-bag-heart',     'warna' => 'purple'],
            ['label' => 'Pelanggan Setia',   'nilai' => 52,  'ikon' => 'bi-emoji-smile',   'warna' => 'warning'],
            ['label' => 'Pendapatan (Juta)', 'nilai' => 37,  'ikon' => 'bi-cash-coin',     'warna' => 'success'],
        ];

        $aktivitas = [
            ['aksi' => 'Menambahkan boneka Teddy Bear Jumbo',   'waktu' => '5 menit lalu',  'ikon' => 'bi-plus-circle',    'warna' => 'success'],
            ['aksi' => 'Memperbarui stok Kelinci Pastel Lop',   'waktu' => '32 menit lalu', 'ikon' => 'bi-pencil-square',  'warna' => 'primary'],
            ['aksi' => 'Pesanan #1042 (Unicorn Rainbow) dikirim', 'waktu' => '1 jam lalu',  'ikon' => 'bi-truck',          'warna' => 'purple'],
            ['aksi' => 'Ulasan bintang 5 untuk Panda Bantal Peluk', 'waktu' => '3 jam lalu', 'ikon' => 'bi-star-fill',     'warna' => 'warning'],
        ];

        return view('dashboard', compact('username', 'statistik', 'aktivitas'));
    }

    public function pengelolaan(Request $request)
    {
        $username = $this->getUsername($request);
        if (!$username) {
            return redirect()->route('login');
        }

        $semua = [
            ['nama' => 'Teddy Bear Jumbo',      'kategori' => 'Beruang',    'harga' => 'Rp 185.000', 'stok' => 40, 'status' => 'Tersedia'],
            ['nama' => 'Kelinci Pastel Lop',    'kategori' => 'Hewan Lucu', 'harga' => 'Rp 95.000',  'stok' => 5,  'status' => 'Menipis'],
            ['nama' => 'Unicorn Rainbow',       'kategori' => 'Fantasi',    'harga' => 'Rp 120.000', 'stok' => 0,  'status' => 'Habis'],
            ['nama' => 'Boneka Putri Gaun Pink','kategori' => 'Karakter',   'harga' => 'Rp 150.000', 'stok' => 22, 'status' => 'Tersedia'],
            ['nama' => 'Panda Bantal Peluk',    'kategori' => 'Hewan Lucu', 'harga' => 'Rp 110.000', 'stok' => 18, 'status' => 'Tersedia'],
            ['nama' => 'Beruang Madu Mini',     'kategori' => 'Beruang',    'harga' => 'Rp 65.000',  'stok' => 3,  'status' => 'Menipis'],
        ];

        $q        = trim((string) $request->query('q', ''));
        $kategori = (string) $request->query('kategori', '');

        $kategoriList = array_values(array_unique(array_column($semua, 'kategori')));

        // Tanpa q/kategori -> semua data tampil
        $items = array_values(array_filter($semua, function ($item) use ($q, $kategori) {
            $cocokNama     = $q === '' || stripos($item['nama'], $q) !== false;
            $cocokKategori = $kategori === '' || $item['kategori'] === $kategori;
            return $cocokNama && $cocokKategori;
        }));

        $total = count($semua);

        return view('pengelolaan', compact('username', 'items', 'total', 'kategoriList', 'q', 'kategori'));
    }

    public function profile(Request $request)
    {
        $username = $this->getUsername($request);
        if (!$username) {
            return redirect()->route('login');
        }

        $biodata = [
            'Username'  => $username,
            'Peran'     => 'Pemilik Toko',
            'Toko'      => 'Dollie Shop',
            'Email'     => strtolower($username) . '@dollieshop.test',
            'Bergabung' => '10 November 2026',
        ];

        return view('profile', compact('username', 'biodata'));
    }

    private function getUsername(Request $request): ?string
    {
        $username = trim((string) $request->query('username', ''));
        return $username !== '' ? $username : null;
    }
}