@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1>Daftar Buku</h1>
        <a href="{{ route('books.create') }}" class="btn" style="background: #2563eb; color: #fff; padding: 10px 16px; border-radius: 4px; text-decoration: none; font-weight: bold;">+ Tambah Buku</a>
    </div>

    @if (session('success'))
        <div style="background: #dcfce7; color: #15803d; padding: 12px; border-radius: 4px; margin-bottom: 16px;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
        <thead>
            <tr style="background: #f3f4f6; text-align: left; font-size: 14px; border-bottom: 2px solid #e5e7eb;">
                <th style="padding: 12px;">ID</th>
                <th style="padding: 12px;">Judul</th>
                <th style="padding: 12px;">Penulis</th>
                <th style="padding: 12px;">Penerbit</th>
                <th style="padding: 12px;">Tahun</th>
                <th style="padding: 12px;">Stok</th>
                <th style="padding: 12px;">Kategori</th>
                <th style="padding: 12px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr style="border-bottom: 1px solid #e5e7eb; font-size: 14px;">
                    <td style="padding: 12px;">{{ $book->id }}</td>
                    <td style="padding: 12px; font-weight: 600;">{{ $book->judul }}</td>
                    <td style="padding: 12px;">{{ $book->penulis }}</td>
                    <td style="padding: 12px;">{{ $book->penerbit }}</td>
                    <td style="padding: 12px;">{{ $book->tahun_terbit }}</td>
                    <td style="padding: 12px;">{{ $book->stok }}</td>
                    <td style="padding: 12px;">{{ $book->category->nama_kategori ?? '-' }}</td>
                    <td style="padding: 12px;">
                        <a href="{{ route('books.show', $book->id) }}">Detail</a> |
                        <a href="{{ route('books.edit', $book->id) }}">Edit</a> |
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #dc2626; cursor: pointer; padding: 0; font-size: 14px;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="padding: 20px; text-align: center; color: #6b7280;">Belum ada data buku.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 16px;">
        {{ $books->links() }}
    </div>
@endsection