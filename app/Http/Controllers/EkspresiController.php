<?php

namespace App\Http\Controllers;

use App\Models\Dinas;
use App\Models\Ekspresi;
use Illuminate\Http\Request;

class EkspresiController extends Controller
{
    public function index () {
        $data = [
            'title' => 'Ekspresi',
            'nav'   => [
                "active" => 'Ekspresi',
                "profiles" => Dinas::getDinas(),
            ],
            'posts' => Ekspresi::getPost(),
            'categories' => Ekspresi::select('category')->groupBy('category')->get(),
        ];

        return view('web.ekspresi.index', $data);
    }
}
