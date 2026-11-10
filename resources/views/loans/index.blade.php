@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1>Daftar Transaksi Peminjaman</h1>
        <a href="{{ route('loans.create') }}" class="btn" style="background: #2563eb; color: #fff; padding: 10px 16px; border-radius: 4px; text-decoration: none; font-weight: bold;">+ Tambah Peminjaman</a>
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
                <th style="padding: 12px;">Anggota</th>
                <th style="padding: 12px;">Petugas (Diisi Otomatis)</th>
                <th style="padding: 12px;">Tgl Pinjam</th>
                <th style="padding: 12px;">Tgl Kembali</th>
                <th style="padding: 12px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($loans as $loan)
                <tr style="border-bottom: 1px solid #e5e7eb; font-size: 14px;">
                    <td style="padding: 12px;">#{{ $loan->id }}</td>
                    <td style="padding: 12px; font-weight: 600;">{{ $loan->member->nama ?? '-' }}</td>
                    <td style="padding: 12px;">{{ $loan->user->name ?? '-' }}</td>
                    <td style="padding: 12px;">{{ $loan->tanggal_pinjam }}</td>
                    <td style="padding: 12px;">{{ $loan->tanggal_kembali }}</td>
                    <td style="padding: 12px;">
                        <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus data peminjaman ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #dc2626; cursor: pointer; padding: 0; font-size: 14px; text-decoration: underline;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="padding: 20px; text-align: center; color: #6b7280;">Belum ada data peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 16px;">
        {{ $loans->links('pagination::simple-default') }}
    </div>
@endsection