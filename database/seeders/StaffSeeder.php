<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Staff::truncate();

        // fopen untuk membuka data file, "r" artinya read only
        $csvFile = fopen(base_path("database/data/staffs.csv"), "r");

        $firstline = true;

        // perulangan mengecek data csv 1/1 tiap barisnya (ada/tidak)
        while (($data = fgetcsv($csvFile, 1000, ";")) !== false) {
            if (!$firstline) {
                Staff::create([
                    'staffID' => $data['0'] != "NULL" ? $data['0'] : NULL,
                    'nama' => $data['1'] != "NULL" ? $data['1'] : NULL,
                    'NIM' => $data['2'] != "NULL" ? $data['2'] : NULL,
                    'password' => $data['3'] != "NULL" ? bcrypt($data['3']) : NULL,
                    'dinasID' => $data['4'] != "NULL" ? $data['4'] : NULL,
                    'divisiID' => $data['5'] != "NULL" ? $data['5'] : NULL,
                    'tempat_lahir' => $data['6'] != "NULL" ? $data['6'] : NULL,
                    'tanggal_lahir' => $data['7'] != "NULL" ? $data['7'] : NULL,
                    'gender' => $data['8'] != "NULL" ? $data['8'] : NULL,
                    'angkatan' => $data['9'] != "NULL" ? $data['9'] : NULL,
                    'jabatan' => $data['10'] != "NULL" ? $data['10'] : NULL,
                    'periode' => $data['11'] != "NULL" ? $data['11'] : NULL,
                    'email' => $data['12'] != "NULL" ? $data['12'] : NULL,
                    'instagram' => $data['13'] != "NULL" ? $data['13'] : NULL,
                    'kesan_pesan' => $data['14'] != "NULL" ? $data['14'] : NULL,
                    'foto' => $data['15'] != "NULL" ? $data['15'] : NULL,
                ]);
            }
            $firstline = false;
        }

        // fclose untuk menutup file yang sudah dibuka sebelumnya
        fclose($csvFile);

        Schema::enableForeignKeyConstraints();
    }
}
