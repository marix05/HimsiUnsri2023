<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function index() {
        $data = [
            'title' => 'Login',
            'nav' => [
                'active' => 'Admin'
            ],
        ];

        return view('admin.auth.login', $data);
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('admin')->attempt([
            "username" => $request->username,
            "password" => $request->password,
        ])){
            $request->session()->regenerate();

            return redirect()->route('admin-staff')->with("success", "Login berhasil");
        };

        return redirect()->back()->with("error", "Gagal melakukan login");
    }

    public function logout(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("admin-login");
    }
}
