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
        // penukars
        $jsonPenukar = File::get("database/seeders/data/penukar.json");
        $dataPenukar = json_decode($jsonPenukar);

        foreach ($dataPenukar as $penukar) {
            DB::table('penukars')->insert([
                'bahan_makanan' => $penukar->bahan_makanan,
                'berat' => $penukar->berat,
                'urt' => $penukar->urt
            ]);
        }

        // makanans
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


        // makanan dianjurkans
        $jsonDianjurkan = File::get("database/seeders/data/makanan-dianjurkan.json");
        $dataDianjurkan = json_decode($jsonDianjurkan);

        foreach ($dataDianjurkan as $dianjurkan) {
            DB::table('dianjurkans')->insert([
                'sumber' => $dianjurkan->sumber,
                'bahan_makanan' => $dianjurkan->bahan_makanan,
                'fe' => $dianjurkan->fe,
            ]);
        }

        // makanan tidak dianjurkans
        $jsonTdkDianjurkan = File::get("database/seeders/data/makanan-tidak-dianjurkan.json");
        $dataTdkDianjurkan = json_decode($jsonTdkDianjurkan);

        foreach ($dataTdkDianjurkan as $TdkDianjurkan) {
            DB::table('tidak_dianjurkans')->insert([
                'sumber' => $TdkDianjurkan->sumber,
                'bahan_makanan' => $TdkDianjurkan->bahan_makanan,
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
        );

        DB::table('users')->insert(
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
