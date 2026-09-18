<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = [
            [
                'id' => 1,
                'nama' => 'Andi',
                'nim' => '2025001',
                'email' => 'andi@example.com',
                'nomor_telepon' => '081234567890',
                'alamat' => 'Surabaya',
                'status' => 'aktif',
            ],
            [
                'id' => 2,
                'nama' => 'Siti',
                'nim' => '2025002',
                'email' => 'siti@example.com',
                'nomor_telepon' => '081234567891',
                'alamat' => 'Sidoarjo',
                'status' => 'aktif',
            ],
            [
                'id' => 3,
                'nama' => 'Budi',
                'nim' => '2025003',
                'email' => 'budi@example.com',
                'nomor_telepon' => '081234567892',
                'alamat' => 'Gresik',
                'status' => 'nonaktif',
            ],
        ];

        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();

        return redirect()
            ->route('members.index')
            ->with('success', 'Data anggota berhasil divalidasi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Menampilkan anggota dengan ID: {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Form edit anggota dengan ID: {$id}";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\Illuminate\Http\Request $request, string $id)
    {
        return "Mengubah data anggota dengan ID: {$id}";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Menghapus anggota dengan ID: {$id}";
    }
}