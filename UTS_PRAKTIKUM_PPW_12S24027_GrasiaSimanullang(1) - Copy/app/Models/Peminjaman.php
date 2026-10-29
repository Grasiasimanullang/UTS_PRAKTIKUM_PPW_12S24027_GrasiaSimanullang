<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';

    protected $fillable = [
        'kode_pinjam', 'laboratorium_id', 'nim_peminjam', 'nama_peminjam',
        'tanggal_pinjam','status',
    ];

    public function laboratorium(): BelongsTo
    {
        return $this->belongsTo(laboratorium::class);
    }
}