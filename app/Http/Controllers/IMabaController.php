<?php

namespace App\Http\Controllers;

use App\Models\Dinas;
use Illuminate\Http\Request;

class IMabaController extends Controller
{
    public function index() {
        $data = [
            'title' => 'IMaba',
            'nav'   => [
                "active" => 'IMaba',
                "profiles" => Dinas::getDinas(),
            ],
        ];

        return view('web.iMaba.index', $data);
    }
}
