<?php

namespace Database\Seeders;

use App\Models\Dinas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Dinas::truncate();

        // fopen untuk membuka data file, "r" artinya read only
        $csvFile = fopen(base_path("database/data/dinas.csv"), "r");

        $firstline = true;

        // perulangan mengecek data csv 1/1 tiap barisnya (ada/tidak)
        while (($data = fgetcsv($csvFile, 1000, ",")) !== false) {
            if (!$firstline) {
                Dinas::create([
                    "dinasID" => $data['0'] ?? NULL,
                    "dinas" => $data['1']?? NULL,
                    "kepanjangan" => $data['2'] ?? NULL,
                    "deskripsi" => $data['3'] ?? NULL,
                    "logo" => $data['4'] ?? NULL,
                    "hasDivisi" => $data['5'] ?? NULL,
                ]);
            }
            $firstline = false;
        }

        // fclose untuk menutup file yang sudah dibuka sebelumnya
        fclose($csvFile);

        Schema::enableForeignKeyConstraints();
    }
}
