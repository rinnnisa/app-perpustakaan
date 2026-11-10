@extends('layouts.app')

@section('title', 'Login - Perpustakaan Digital')

@section('content')
<div style="max-width: 400px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);">
    <h2 style="text-align: center; margin-top: 0; margin-bottom: 24px; font-size: 20px;">📚 Login Perpustakaan</h2>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div style="margin-bottom: 16px;">
            <label for="email" style="display: block; margin-bottom: 6px; font-weight: 600;">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" style="width: 100%; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 4px; font-size: 14px;" required placeholder="Masukkan email...">
            @error('email')
                <div style="color: #dc2626; font-size: 13px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 16px;">
            <label for="password" style="display: block; margin-bottom: 6px; font-weight: 600;">Password</label>
            <input type="password" name="password" id="password" style="width: 100%; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 4px; font-size: 14px;" required placeholder="Masukkan password...">
            @error('password')
                <div style="color: #dc2626; font-size: 13px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 20px;">
            <input type="checkbox" name="remember" id="remember" style="margin: 0; cursor: pointer;">
            <label for="remember" style="font-size: 14px; color: #4b5563; cursor: pointer; user-select: none;">Ingat saya</label>
        </div>

        <button type="submit" class="btn" style="width: 100%; padding: 10px; background: #2563eb; color: #fff; font-weight: bold; border-radius: 4px; border: none; cursor: pointer;">Login</button>
    </form>
</div>
@endsection