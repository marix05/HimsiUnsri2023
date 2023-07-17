<?php

namespace Database\Seeders;

use App\Models\Ekspresi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EkspresiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Ekspresi::truncate();

        // fopen untuk membuka data file, "r" artinya read only
        $csvFile = fopen(base_path("database/data/ekspresi.csv"), "r");

        $firstline = true;

        // perulangan mengecek data csv 1/1 tiap barisnya (ada/tidak)
        while (($data = fgetcsv($csvFile, 1000, ";")) !== false) {
            if (!$firstline) {
                Ekspresi::create([
                    "title" => $data['1']?? NULL,
                    "link" => $data['2'] ?? NULL,
                    "category" => $data['3'] ?? NULL,
                    "thumbnail" => $data['4'] ?? NULL,
                ]);
            }
            $firstline = false;
        }

        // fclose untuk menutup file yang sudah dibuka sebelumnya
        fclose($csvFile);

        Schema::enableForeignKeyConstraints();
    }
}
