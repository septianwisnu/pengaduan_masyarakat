<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengaduans extends Model
{
    use HasFactory;
    protected $fillable =['masyarakat_id','kategori_id','tanggal_pengaduan','isi_pengaduan','foto','status'];
    protected $table = 'pengaduans';

    //nilai balik relasi ke tabel kategori 
    public function kateories()
    {
        return $this->belongsTo('kategories','kategori_id','id');
    }

    //relasi ke tanggapan
    public function tanggapans()
    {
        return $this->hasMany('tanggapans','pengaduan_id','id');
    }
    //relasi ke tabel user
    public function user()
    {
        return $this->belongsTo('users','masyarakat_id','id');
    }
    }