@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')
    <h1>Tambah Transaksi Peminjaman</h1>

    <p><em>Petugas pencatat: {{ auth()->user()->name }} (otomatis dari akun yang login).</em></p>

    <form action="{{ route('loans.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 16px;">
            <label for="member_id" style="display: block; font-weight: bold;">Anggota</label>
            <select name="member_id" id="member_id" style="width: 100%; padding: 8px;" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                        {{ $member->nama }} ({{ $member->nim }})
                    </option>
                @endforeach
            </select>
            @error('member_id')
                <div style="color: #b91c1c; font-size: 14px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 16px;">
            <label for="tanggal_pinjam" style="display: block; font-weight: bold;">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" value="{{ old('tanggal_pinjam', date('Y-m-d')) }}" style="width: 100%; padding: 8px;" required>
            @error('tanggal_pinjam')
                <div style="color: #b91c1c; font-size: 14px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 16px;">
            <label for="tanggal_kembali" style="display: block; font-weight: bold;">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" value="{{ old('tanggal_kembali') }}" style="width: 100%; padding: 8px;" required>
            @error('tanggal_kembali')
                <div style="color: #b91c1c; font-size: 14px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 16px;">
            <label style="display: block; font-weight: bold; margin-bottom: 8px;">Pilih Buku yang Dipinjam</label>
            @foreach ($books as $book)
                <div style="margin-bottom: 6px;">
                    <label style="font-weight: normal;">
                        <input type="checkbox" name="book_ids[]" value="{{ $book->id }}" {{ is_array(old('book_ids')) && in_array($book->id, old('book_ids')) ? 'checked' : '' }}>
                        {{ $book->judul }} (Stok: {{ $book->stok }})
                    </label>
                </div>
            @endforeach
            @error('book_ids')
                <div style="color: #b91c1c; font-size: 14px;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn">Simpan Peminjaman</button>
        <a href="{{ route('loans.index') }}" style="margin-left: 10px; color: #4b5563;">Batal</a>
    </form>
@endsection