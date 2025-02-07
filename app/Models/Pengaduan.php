<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table ='pengaduans';

    protected $fillable = [
        'masyarakat_id',
        'ketegori_id',
        'tanggal_pengaduan',
        'isi_pengaduan',
        'foto',
        'status',
    ];


    
}
