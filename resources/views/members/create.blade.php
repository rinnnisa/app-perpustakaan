@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
    <h1>Tambah Anggota Baru</h1>

    <p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar</a></p>

    <form action="{{ route('members.store') }}" method="POST">
        @csrf

        <div>
            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" value="{{ old('nim') }}">
            @error('nim')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}">
            @error('nama')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="nomor_telepon">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon') }}">
            @error('nomor_telepon')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="alamat">Alamat (opsional)</label>
            <textarea name="alamat" id="alamat">{{ old('alamat') }}</textarea>
            @error('alamat')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <br>
        <button type="submit" class="btn">Simpan Anggota</button>
    </form>
@endsection