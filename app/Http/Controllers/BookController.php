<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    private array $books = [
        ['id' => 1, 'judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'penerbit' => 'Bentang Pustaka', 'tahun_terbit' => 2005, 'stok' => 5, 'kategori' => 'Fiksi'],
        ['id' => 2, 'judul' => 'Bumi Manusia', 'penulis' => 'Pramoedya Ananta Toer', 'penerbit' => 'Hasta Mitra', 'tahun_terbit' => 1980, 'stok' => 3, 'kategori' => 'Fiksi'],
        ['id' => 3, 'judul' => 'Clean Code', 'penulis' => 'Robert C. Martin', 'penerbit' => 'Prentice Hall', 'tahun_terbit' => 2008, 'stok' => 7, 'kategori' => 'Teknologi'],
    ];

    public function index()
    {
        $books = $this->books;

        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric',
            'stok' => 'required|numeric',
            'kategori' => 'required',
        ]);

        return redirect()->route('books.index')
            ->with('success', 'Buku "' . $request->judul . '" berhasil ditambahkan (data dummy, belum tersimpan ke database).');
    }

    public function show(string $id)
    {
        return "Detail Buku dengan ID: " . $id;
    }

    public function edit(string $id)
    {
        return "Form Edit Buku dengan ID: " . $id;
    }

    public function update(Request $request, string $id)
    {
        // Logika update (diimplementasikan di pertemuan berikutnya)
    }

    public function destroy(string $id)
    {
        return redirect()->route('books.index')
            ->with('success', 'Buku dengan ID ' . $id . ' berhasil dihapus (data dummy).');
    }
}