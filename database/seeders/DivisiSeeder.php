<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Divisi::truncate();

        // fopen untuk membuka data file, "r" artinya read only
        $csvFile = fopen(base_path("database/data/divisi.csv"), "r");

        $firstline = true;

        // perulangan mengecek data csv 1/1 tiap barisnya (ada/tidak)
        while (($data = fgetcsv($csvFile, 1000, ",")) !== false) {
            if (!$firstline) {
                Divisi::create([
                    "divisiID" => $data['0'] ?? NULL,
                    "dinasID" => $data['1']?? NULL,
                    "divisi" => $data['2'] ?? NULL,
                    "deskripsi" => $data['3'] ?? NULL,
                    "icon" => $data['4'] ?? NULL,
                ]);
            }
            $firstline = false;
        }

        // fclose untuk menutup file yang sudah dibuka sebelumnya
        fclose($csvFile);

        Schema::enableForeignKeyConstraints();
    }
}
