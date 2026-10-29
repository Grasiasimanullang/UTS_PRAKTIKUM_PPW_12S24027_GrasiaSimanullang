# UTS_PRAKTIKUM_PPW_12S24027_GrasiaSimanullang Pengembangan Sistem Manajemen Aset dan Peminjaman Inventaris Laboratorium Terpadu (DEL Lab Equipment & Asset Tracking System - DEL-LEATS)

HTML + CSS + JavaScript murni, tanpa library eksternal.

## Cara menjalankan
Buka `index.html` di browser. Tidak perlu server/internet.

## Fitur
| Kebutuhan soal | Implementasi |
|---|---|
| Form booking: nama, ruang-laboratorium, jumlah mahasiswa, waktu pakai/waktu kembali | `#bookForm` |
| Validasi waktu-pakai > waktu-kembali | `app.js` (submit handler) + atribut `min` pada input date; juga validasi waktu pakai tidak di masa lalu & kapasitas Mahasiswa per ruangan |
| Data booking di localStorage | key `UTS_PRAKTIKUM_PPW_12S24027_GrasiaSimanullang Pengembangan Sistem Manajemen Aset dan Peminjaman Inventaris Laboratorium Terpadu (DEL Lab Equipment & Asset Tracking System - DEL-LEATS)` |
| Pilihan Rungan | Nama Peminjam (durasi waktu, batalkan booking) |

Tambahan: estimasi time (bukti foto).

## Struktur
```
UTS_PRAKTIKUM_PPW_12S24027GrasiaSimanullang/
├─ index.html
├─ css/style.css
└─ js/ common.js, app.js
```

## ERD sederhana
```
ROOM_TYPE (kode PK, nama, ruangan, maxMahasiswa) 1 ──── N PINJAM (id PK, nama, waktu pakai, waktu kembali, tipe FK, mahasiswa)
```
