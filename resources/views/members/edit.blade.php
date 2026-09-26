@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')
    <h1>Edit Anggota</h1>
    <p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar anggota</a></p>

    <form action="{{ route('members.update', $member['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 14px;">
            <label for="nama" style="display: block; font-weight: bold; margin-bottom: 4px;">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $member['nama']) }}" style="width: 100%; padding: 8px; box-sizing: border-box;">
            @error('nama')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 14px;">
            <label for="nim" style="display: block; font-weight: bold; margin-bottom: 4px;">NIM</label>
            <input type="text" name="nim" id="nim" value="{{ old('nim', $member['nim']) }}" style="width: 100%; padding: 8px; box-sizing: border-box;">
            @error('nim')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 14px;">
            <label for="email" style="display: block; font-weight: bold; margin-bottom: 4px;">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $member['email']) }}" style="width: 100%; padding: 8px; box-sizing: border-box;">
            @error('email')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 14px;">
            <label for="nomor_telepon" style="display: block; font-weight: bold; margin-bottom: 4px;">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon', $member['nomor_telepon']) }}" style="width: 100%; padding: 8px; box-sizing: border-box;">
            @error('nomor_telepon')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 14px;">
            <label for="alamat" style="display: block; font-weight: bold; margin-bottom: 4px;">Alamat</label>
            <textarea name="alamat" id="alamat" rows="3" style="width: 100%; padding: 8px; box-sizing: border-box;">{{ old('alamat', $member['alamat']) }}</textarea>
            @error('alamat')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 18px;">
            <label for="status" style="display: block; font-weight: bold; margin-bottom: 4px;">Status</label>
            <select name="status" id="status" style="width: 100%; padding: 8px; box-sizing: border-box;">
                <option value="aktif" @selected(old('status', $member['status']) == 'aktif')>Aktif</option>
                <option value="nonaktif" @selected(old('status', $member['status']) == 'nonaktif')>Nonaktif</option>
            </select>
            @error('status')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn">Perbarui</button>
    </form>
@endsection