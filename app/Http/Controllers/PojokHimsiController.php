<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PojokHimsi;
use App\Models\Dinas;

class PojokHimsiController extends Controller
{
    public function index (Request $request) {
        $periode = $request->periode ?? date("Y");

        $data = [
            'title' => 'Pojok Himsi',
            'nav'   => [
                "active" => 'Pojok Himsi',
                "profiles" => Dinas::getDinas(),
                "periode" => $periode,
            ],
            'posts' => PojokHimsi::getPost($periode),
        ];

        return view('web.pojok-himsi.index', $data);
    }
}
