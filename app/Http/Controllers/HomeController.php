<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\PojokHimsi;
use App\Models\Dinas;
use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $data = [
            'title' => 'Home',
            'nav'   => [
                "active" => 'Home',
                "profiles" => Dinas::getDinas(),
            ],
            'pojokHimsis' => PojokHimsi::getPost(date('Y')),
        ];

        return view('web.home.index', $data);
    }

    public function storeContact(Request $request) {
        $validator = Validator::make($request->all(), [
            "email" => ["required", "string", "email:dns", "max:100"],
            "subject" => ["required", "string", "max:100"],
            "msg" => ["required", "string"],
        ]);

        if ($validator->fails()) {
            return redirect()->intended('/#contact')->withInput([
                "email" => $request->email,
                "subject" => $request->subject,
                "msg" => $request->msg,
            ])->withErrors($validator);
        }

        $contact = new Contact([
            "email" => $request->email,
            "subject" => $request->subject,
            "msg" => $request->msg,
        ]);

        if ($contact->save()) {
            return redirect()->intended('/#contact')->with('success', 'Pesan berhasil dikirim!');
        } else {
            return redirect()->intended('/#contact')->with('error', 'Pesan gagal dikirim!');
        }
    }
}
