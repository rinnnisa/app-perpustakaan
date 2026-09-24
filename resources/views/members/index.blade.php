@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')
    <h1>Daftar Anggota</h1>

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
        <!-- Tombol Tambah Anggota -->
        <a href="{{ route('members.create') }}" class="btn">+ Tambah Anggota</a>

        <!-- Form Pencarian (Search) -->
        <form action="{{ route('members.index') }}" method="GET" style="margin: 0;">
            <input type="text" name="search" placeholder="Cari nama, email, no HP..." value="{{ request('search') }}" style="padding: 6px; width: 250px;">
            <button type="submit" class="btn">Cari</button>
            @if(request('search'))
                <a href="{{ route('members.index') }}" class="btn" style="background: #6b7280;">Reset</a>
            @endif
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->nomor_telepon }}</td>
                    <td>{{ $member->alamat ?? '-' }}</td>
                    <td>
                        <a href="{{ route('members.show', $member->id) }}">Detail</a> |
                        <a href="{{ route('members.edit', $member->id) }}">Edit</a> |
                        <form class="inline" action="{{ route('members.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Yakin hapus anggota ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data anggota.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>
    {{ $members->appends(request()->query())->links() }}
@endsection