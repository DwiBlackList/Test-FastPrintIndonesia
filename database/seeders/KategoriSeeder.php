<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            ['nama_kategori' => 'L QUEENLY'],
            ['nama_kategori' => 'L MTH AKSESORIS (IM)'],
            ['nama_kategori' => 'L MTH TABUNG (LK)'],
            ['nama_kategori' => 'SP MTH SPAREPART (LK)'],
            ['nama_kategori' => 'L MTH AKSESORIS (LK)'],
            ['nama_kategori' => 'CI MTH TINTA LAIN (IM)'],
            ['nama_kategori' => 'S MTH STEMPEL (IM)'],
        ];

        \App\Models\Kategori::insert($kategori);
    }
}
