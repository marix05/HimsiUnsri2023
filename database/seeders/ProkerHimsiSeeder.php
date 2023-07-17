<?php

namespace Database\Seeders;

use App\Models\ProkerHimsi;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProkerHimsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ProkerHimsi::truncate();

        // fopen untuk membuka data file, "r" artinya read only
        $csvFile = fopen(base_path("database/data/proker_himsi.csv"), "r");

        $firstline = true;

        // perulangan mengecek data csv 1/1 tiap barisnya (ada/tidak)
        while (($data = fgetcsv($csvFile, 1000, ";")) !== false) {
            if (!$firstline) {
                ProkerHimsi::create([
                    "prokerID" => $data['0'] != "NULL"? $data['0'] : NULL,
                    "proker" => $data['1'] != "NULL"?  $data['1'] : NULL,
                    "pelaksanaan" => $data['2'] != "NULL"? $data['2'] : NULL,
                    "sasaran" => $data['3'] != "NULL"? $data['3'] : NULL,
                    "deskripsi" => $data['4'] != "NULL"? $data['4'] : NULL,
                    "icon" => $data['5'] != "NULL"? $data['5'] : NULL,
                    "poster" => $data['6'] != "NULL"? $data['6'] : NULL,
                ]);
            }
            $firstline = false;
        }

        // fclose untuk menutup file yang sudah dibuka sebelumnya
        fclose($csvFile);

        Schema::enableForeignKeyConstraints();
    }
}
