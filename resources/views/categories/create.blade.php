@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <p><a href="{{ route('categories.index') }}">← Kembali ke daftar</a></p>

    <h1>Tambah Kategori Baru</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 12px;">
            <label for="nama_kategori">Nama Kategori:</label><br>
            <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}">
            @error('nama_kategori')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="deskripsi">Deskripsi:</label><br>
            <textarea id="deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn">Simpan Kategori</button>
    </form>
@endsection