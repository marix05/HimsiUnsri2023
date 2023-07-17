<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::truncate();

        Admin::create([
            'username' => 'admin',
            'password' => bcrypt('ptiaja'),
            'akses' => 'Admin',
        ]);

        Admin::create([
            'username' => 'humasian',
            'password' => bcrypt('medinfo'),
            'akses' => 'Humas',
        ]);

        Admin::create([
            'username' => 'ristekverse',
            'password' => bcrypt('subarashii'),
            'akses' => 'Ristek',
        ]);
        }
}
