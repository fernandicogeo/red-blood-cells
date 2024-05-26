<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $jsonPenukar = File::get("database/seeders/data/penukar.json");
        $dataPenukar = json_decode($jsonPenukar);

        foreach ($dataPenukar as $penukar) {
            DB::table('penukars')->insert([
                'bahan_makanan' => $penukar->bahan_makanan,
                'berat' => $penukar->berat,
                'urt' => $penukar->urt
            ]);
        }

        $jsonMakanan = File::get("database/seeders/data/makanan.json");
        $dataMakanan = json_decode($jsonMakanan);

        foreach ($dataMakanan as $makanan) {
            DB::table('makanans')->insert([
                'bahan_makanan' => $makanan->bahan_makanan,
                'energi' => $makanan->energi,
                'protein' => $makanan->protein,
                'lemak' => $makanan->lemak,
                'kh' => $makanan->kh,
                'fe' => $makanan->fe,
            ]);
        }

        DB::table('users')->insert(
            [
                'nama' => 'Fernandico Geovardo',
                'email' => 'fernandico.geovardo01@gmail.com',
                'password' => bcrypt('123'),
                'jenis_kelamin' => 'Laki-laki',
                'umur' => 21,
                'berat_badan' => 64,
                'tinggi_badan' => 170,
                'imt' => 22.15,
                'kategori_imt' => 'Normal'
            ],
            [
                'nama' => 'Amira',
                'email' => 'amiratunrofilah.rfh@gmail.com',
                'password' => bcrypt('amiraamira0311'),
                'jenis_kelamin' => 'Perempuan',
                'umur' => 20,
                'berat_badan' => 44,
                'tinggi_badan' => 149,
                'imt' => 19.82,
                'kategori_imt' => 'Normal'
            ],
        );
    }
}
