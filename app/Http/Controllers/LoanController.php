<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Member;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['member', 'user'])->latest()->paginate(10);
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $members = Member::all();
        $books = Book::where('stok', '>', 0)->get();
        return view('loans.create', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'book_ids' => 'required|array|min:1',
            'book_ids.*' => 'exists:books,id',
        ]);

        // Simpan transaksi peminjaman (user_id otomatis diambil dari akun login)
        $loan = Loan::create([
            'member_id' => $validated['member_id'],
            'user_id' => Auth::id(),
            'tanggal_pinjam' => $validated['tanggal_pinjam'],
            'tanggal_kembali' => $validated['tanggal_kembali'],
        ]);

        // Simpan ke tabel pivot loan_items
        $loan->books()->attach($validated['book_ids']);

        return redirect()->route('loans.index')
            ->with('success', 'Transaksi peminjaman berhasil dicatat.');
    }

    public function destroy(Loan $loan)
    {
        // Hapus relasi buku di tabel pivot loan_items terlebih dahulu
        $loan->books()->detach();
        
        // Hapus data transaksi peminjaman
        $loan->delete();

        return redirect()->route('loans.index')
            ->with('success', 'Data peminjaman berhasil dihapus.');
    }
}