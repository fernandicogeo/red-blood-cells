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
        $json = File::get("database/seeders/data/penukar.json");
        $data = json_decode($json);

        foreach ($data as $obj) {
            DB::table('penukars')->insert([
                'bahan_makanan' => $obj->bahan_makanan,
                'berat' => $obj->berat,
                'urt' => $obj->urt
            ]);
        }
    }
}
