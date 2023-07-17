<?php

namespace Database\Seeders;

use App\Models\ProkerDinas;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProkerDinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ProkerDinas::truncate();

        // fopen untuk membuka data file, "r" artinya read only
        $csvFile = fopen(base_path("database/data/proker_dinas.csv"), "r");

        $firstline = true;

        // perulangan mengecek data csv 1/1 tiap barisnya (ada/tidak)
        while (($data = fgetcsv($csvFile, 1000, ";")) !== false) {
            if (!$firstline) {
                ProkerDinas::create([
                    "prokerID" => $data['0'] ?? NULL,
                    "dinasID" => $data['1']?? NULL,
                    "proker" => $data['2'] ?? NULL,
                    "deskripsi" => $data['3'] ?? NULL,
                ]);
            }
            $firstline = false;
        }

        // fclose untuk menutup file yang sudah dibuka sebelumnya
        fclose($csvFile);

        Schema::enableForeignKeyConstraints();
    }
}
