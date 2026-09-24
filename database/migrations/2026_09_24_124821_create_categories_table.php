@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <h1>Tambah Kategori Baru</h1>

    <p><a href="{{ route('categories.index') }}">&larr; Kembali ke daftar</a></p>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div>
            <label for="nama">Nama Kategori</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}">
            @error('nama')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="deskripsi">Deskripsi (opsional)</label>
            <textarea name="deskripsi" id="deskripsi">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>
        <button type="submit" class="btn">Simpan Kategori</button>
    </form>
@endsection