<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';

    protected $fillable = [
        'masyarakat_id',
        'kategori_id',
        'tanggal_pengaduan',
        'isi_pengaduan',
        'foto',
        'status',
    ];

    // Relasi ke model Masyarakat

    // Relasi ke model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function masyarakat()
    {
        return $this->hasMany(User::class, 'masyarakat_id');
    }
    // Relasi ke model Tanggapan
    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class, 'pengaduan_id');
    }


    public function petugas()
    {
        return $this->belongsTo(User::class, 'masyarakat_id');
    }
}
