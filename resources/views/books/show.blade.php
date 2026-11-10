@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <h1>Detail Buku</h1>

    <p><a href="{{ route('books.index') }}">&larr; Kembali ke daftar buku</a></p>

    <table style="width: 100%; max-width: 600px; border-collapse: collapse; background: #fff; margin-top: 20px; border-radius: 8px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
        <tr style="border-bottom: 1px solid #e5e7eb;">
            <th style="text-align: left; padding: 12px; background: #f9fafb; width: 150px;">Judul</th>
            <td style="padding: 12px;">{{ $book->judul }}</td>
        </tr>
        <tr style="border-bottom: 1px solid #e5e7eb;">
            <th style="text-align: left; padding: 12px; background: #f9fafb;">Penulis</th>
            <td style="padding: 12px;">{{ $book->penulis }}</td>
        </tr>
        <tr style="border-bottom: 1px solid #e5e7eb;">
            <th style="text-align: left; padding: 12px; background: #f9fafb;">Penerbit</th>
            <td style="padding: 12px;">{{ $book->penerbit }}</td>
        </tr>
        <tr style="border-bottom: 1px solid #e5e7eb;">
            <th style="text-align: left; padding: 12px; background: #f9fafb;">Tahun Terbit</th>
            <td style="padding: 12px;">{{ $book->tahun_terbit }}</td>
        </tr>
        <tr style="border-bottom: 1px solid #e5e7eb;">
            <th style="text-align: left; padding: 12px; background: #f9fafb;">ISBN</th>
            <td style="padding: 12px;">{{ $book->isbn ?? '-' }}</td>
        </tr>
        <tr style="border-bottom: 1px solid #e5e7eb;">
            <th style="text-align: left; padding: 12px; background: #f9fafb;">Stok</th>
            <td style="padding: 12px;">{{ $book->stok }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 12px; background: #f9fafb;">Kategori</th>
            <td style="padding: 12px;">{{ $book->category->nama_kategori ?? '-' }}</td>
        </tr>
    </table>
@endsection