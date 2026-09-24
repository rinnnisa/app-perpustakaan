@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <h1>Tambah Buku Baru</h1>

    <p><a href="{{ route('books.index') }}">&larr; Kembali ke daftar</a></p>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div>
            <label for="category_id">Kategori Buku</label>
            <select name="category_id" id="category_id">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="judul">Judul Buku</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul') }}">
            @error('judul')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="penulis">Penulis</label>
            <input type="text" name="penulis" id="penulis" value="{{ old('penulis') }}">
            @error('penulis')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="penerbit">Penerbit</label>
            <input type="text" name="penerbit" id="penerbit" value="{{ old('penerbit') }}">
            @error('penerbit')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" id="tahun_terbit" value="{{ old('tahun_terbit') }}">
            @error('tahun_terbit')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" value="{{ old('stok', 0) }}">
            @error('stok')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>
        <button type="submit" class="btn">Simpan Buku</button>
    </form>
@endsection