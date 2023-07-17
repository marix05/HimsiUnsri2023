<?php

namespace App\Http\Controllers;

use App\Models\ProkerDinas;
use App\Models\Dinas;
use App\Models\Divisi;
use App\Models\Staff;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($dinasID) {
        $dinas = Dinas::getDinas($dinasID);

        $data = [
            'title' => $dinas['dinas'],
            'nav'   => [
                "active" => 'Profile',
                "profiles" => Dinas::getDinas(),
            ],
            'dinas' => $dinas,
            'divisis' => Divisi::getDivisi($dinasID),
            'prokers' => ProkerDinas::getProker($dinasID),
            'staffs' => Staff::getStaff(date('Y'), $dinasID),
            'periode' => date('Y'),
        ];

        return view('web.profile.index', $data);
    }
}
