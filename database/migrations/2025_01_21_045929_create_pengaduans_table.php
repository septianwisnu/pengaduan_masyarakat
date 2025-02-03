<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('masyarakat_id');
            $table->date('tanggal_pengaduan');
            $table->unsignedBigInteger('kategori_id');
            $table->text('isi_pengaduan');
            $table->string('foto');
            $table->string('tgl_pengaduan');
            $table->enum('status',['new','proses','selesai','ditolak']);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
