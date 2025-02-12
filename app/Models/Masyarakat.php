<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    use HasFactory;

    protected $table = 'users';

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

    }
    

