<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::when(request('search'), fn ($query, $search) => $query->where('nama', 'like', "%{$search}%"))
            ->paginate(10);

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();

        Member::create($validated);

        return redirect()->route('members.index')
            ->with('success', "Anggota \"{$validated['nama']}\" berhasil ditambahkan.");
    }

    public function show(string $id)
    {
        $member = Member::findOrFail($id);

        return view('members.show', compact('member'));
    }

    public function edit(string $id)
    {
        $member = Member::findOrFail($id);

        return view('members.edit', compact('member'));
    }

public function update(Request $request, Member $member)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'nim' => 'required|string|max:20|unique:members,nim,' . $member->id,
        'email' => 'required|email|unique:members,email,' . $member->id,
        'nomor_telepon' => 'nullable|string|max:20',
        'alamat' => 'nullable|string',
        'status' => 'required|string',
    ]);

    // Konversi status ke format huruf kecil agar lolos batasan CHECK SQLite ('aktif' / 'nonaktif')
    $validated['status'] = strtolower($request->status);

    $member->update($validated);

    return redirect()->route('members.index')
        ->with('success', "Data anggota \"{$member->nama}\" berhasil diperbarui.");
}
}