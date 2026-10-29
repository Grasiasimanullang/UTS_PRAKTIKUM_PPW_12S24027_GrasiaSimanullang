<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class laboratorium extends Model
{
    public function peminjamans(): HasMany
{
    return $this->hasMany(Peminjaman::class);
}
    use HasFactory;

    protected $fillable = [
        'kategori_perangkat', 'kode_aset_inventaris', 'nama_perangkat ', 'spesifikasi_teknis ',
        'kondisi_fisik ', 'tarif_kompensasi_harian ', 'berkas_foto_fisik',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
}