<?php

namespace App\Http\Controllers;

use App\Models\Dinas;
use App\Models\ProkerHimsi;
use App\Models\PojokHimsi;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function logo() {
        $data = [
            'title' => 'Logo',
            'nav'   => [
                "active" => 'About Us',
                "profiles" => Dinas::getDinas(),
            ],
        ];

        return view('web.about.logo', $data);
    }

    public function visiMisi() {
        $data = [
            'title' => 'Visi Misi',
            'nav'   => [
                "active" => 'About Us',
                "profiles" => Dinas::getDinas(),
            ],
        ];

        return view('web.about.visi-misi', $data);
    }

    public function proker() {

        $data = [
            'title' => 'Progam Kerja',
            'nav'   => [
                "active" => 'About Us',
                "profiles" => Dinas::getDinas(),
            ],
            'prokers' => ProkerHimsi::getProker(),
            'pojokHimsis' => PojokHimsi::getPost(date('Y')),
        ];

        return view('web.about.proker', $data);
    }
}
