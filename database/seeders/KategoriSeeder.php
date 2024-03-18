<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'kategori_kode' => 'ELK12',
                'kategori_nama' => 'Elektronik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 2,
                'kategori_kode' => 'KCK09',
                'kategori_nama' => 'Kecantikan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 3,
                'kategori_kode' => 'PRT34',
                'kategori_nama' => 'Peralatan Rumah Tangga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 4,
                'kategori_kode' => 'LPTP12',
                'kategori_nama' => 'Laptop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 5,
                'kategori_kode' => 'HP1231',
                'kategori_nama' => 'Handphone',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('m_kategori')->insert($data);
    }
}
