<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'user_id',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];

    // Relasi ke Member (Anggota)
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    // Relasi ke User (Petugas)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi Many-to-Many ke Book lewat tabel pivot loan_items
    public function books()
    {
        return $this->belongsToMany(Book::class, 'loan_items')
                    ->withPivot('jumlah')
                    ->withTimestamps();
    }
}