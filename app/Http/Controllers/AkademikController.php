<?php

namespace App\Http\Controllers;

use App\Models\Akademik;
use Illuminate\Http\Request;
use App\Models\Dinas;

class AkademikController extends Controller
{
    public function index (Request $request) {
        $category = $request->category ?? 'Beasiswa';

        $data = [
            'title' => 'Akademik',
            'nav'   => [
                "active" => 'Akademik',
                "profiles" => Dinas::getDinas(),
                "category" => $category,
            ],
            'posts' => Akademik::getPost($category),
        ];

        return view('web.akademik.index', $data);
    }
}
