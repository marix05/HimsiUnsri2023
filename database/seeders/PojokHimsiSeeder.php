<?php

namespace Database\Seeders;

use App\Models\PojokHimsi;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PojokHimsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        PojokHImsi::truncate();

        // fopen untuk membuka data file, "r" artinya read only
        $csvFile = fopen(base_path("database/data/pojok_himsi.csv"), "r");

        $firstline = true;

        // perulangan mengecek data csv 1/1 tiap barisnya (ada/tidak)
        while (($data = fgetcsv($csvFile, 1000, ";")) !== false) {
            if (!$firstline) {
                PojokHImsi::create([
                    "prokerID" => NULL,
                    "title" => $data['1'] != "NULL"?  $data['1'] : NULL,
                    "author" => $data['3'] != "NULL"? $data['3'] : NULL,
                    "thumbnail" => $data['6'] != "NULL"? $data['6'] : NULL,
                    "content" => $data['7'] != "NULL"? $data['7'] : NULL,
                    "trigger" => $data['8'] != "NULL"? $data['8'] : NULL,
                    "periode" => $data['9'] != "NULL"? $data['9'] : NULL,
                ]);
            }
            $firstline = false;
        }

        // fclose untuk menutup file yang sudah dibuka sebelumnya
        fclose($csvFile);

        Schema::enableForeignKeyConstraints();
    }
}
