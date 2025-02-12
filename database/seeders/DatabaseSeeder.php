<?php

namespace Database\Seeders;

use App\Models\Kategories;
use Illuminate\Database\Seeder;
use App\Models\Kategori; // Nama model yang benar (bukan Kategories)

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tambahkan data kategori
        Kategories::create([
            'nama_kategori' => 'Umum',
        ]);

        Kategories::create([
            'nama_kategori' => 'Pelanggaran',
        ]);
    }
}
