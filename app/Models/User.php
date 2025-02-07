<?php

namespace App\Models;

use App\Models\Pengaduans;
use App\Models\Tanggapan;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'username',
        'password',
        'no_telepon',
        'alamat',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relasi ke tabel tanggapan
    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class);
    }

    // Relasi ke tabel pengaduan
    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'masyarakat_id', 'id');
    }
     //relasi ke tabel tanggapan
     public function tanggapans()
     {
         return $this->belongsTo('tanggapan','users_id','id');
     }
}
