<?php

namespace App\Http\Controllers\Admin;

use App\Models\PojokHimsi;
use App\Models\ProkerHimsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminPojokHimsiController extends Controller
{
    public function pojokHimsi() {
        $data = [
            'title' => 'Pojok Himsi',
            'nav' => [
                'active' => 'Pojok Himsi'
            ],
            'posts' => PojokHimsi::all()->sortByDesc('created_at'),
        ];

        return view('admin.dashboard.pojok-himsi', $data);
    }

    public function formInsertPojokHimsi() {
        $data = [
            'title' => 'Dashboard',
            'nav' => [
                'active' => 'Pojok Himsi',
                'method' => 'Insert',
            ],
            'prokers' => ProkerHimsi::getProker(),
        ];

        return view('admin.dashboard.form-pojok-himsi', $data);
    }

    public function insertPojokHimsi(Request $request) {
        $request->validate([
            'title' => ['required', 'string'],
            'author' => ['required', 'string'],
            'periode' => ['required', 'string'],
            'trigger' => ['required', 'string'],
            'content' => ['required', 'string'],
            'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if($request->file('thumbnail')) {
            $foto = $request->file('thumbnail');
            $fileFoto = date('mdYHis').'_'.uniqid().'_'.$foto->getClientOriginalName();

            $post = new PojokHimsi(array_merge($request->all(), ['thumbnail' => $fileFoto]));

            if ($post->save()) {
                $foto->move(public_path('assets/img/uploads'), $fileFoto);
                $request->session()->regenerate();
                return redirect()->route('admin-pojokHimsi')->with("success", "Postingan berhasil ditambahkan");
            }
        }

        return back()->with("error", "Gagal menambahkan postingan");
    }

    public function formUpdatePojokHimsi($postID) {
        $data = [
            'title' => 'Dashboard',
            'nav' => [
                'active' => 'Pojok Himsi',
                'method' => 'Update',
            ],
            'post' => PojokHimsi::getPost(null, $postID),
        ];

        return view('admin.dashboard.form-pojok-himsi', $data);
    }

    public function updatePojokHimsi(Request $request) {
        $request->validate([
            'postID' => ['required'],
            'title' => ['required', 'string'],
            'author' => ['required', 'string'],
            'periode' => ['required', 'string'],
            'trigger' => ['required', 'string'],
            'content' => ['required', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $post = PojokHimsi::getPost(null, $request->postID);

        if ($post) {
            if ($request->file('thumbnail')) {
                $foto = $request->file('thumbnail');
                $fileFoto = date('mdYHis').'_'.uniqid().'_'.$foto->getClientOriginalName();

                $oldPath = public_path('assets/img/uploads/').$post['thumbnail'];

                if(File::exists($oldPath)) {
                    File::delete($oldPath);

                    $foto->move(public_path('assets/img/uploads'), $fileFoto);
                    $post->update(array_merge($request->all(), ['thumbnail' => $fileFoto]));
                }
            } else {
                $post->update($request->all());
            }

            $request->session()->regenerate();
            return redirect()->route('admin-pojokHimsi')->with("success", "Postingan berhasil diperbaharui");
        }

        return back()->with("error", "Gagal memperbaharui postingan");
    }

    public function deletePojokHimsi(Request $request) {
        $post = PojokHimsi::getPost(null, $request->postID);

        if ($post) {
            $path = public_path('assets/img/uploads/').$post['thumbnail'];;

            if(File::exists($path)) {
                File::delete($path);
            }

            $post->delete();

            $request->session()->regenerate();
            return redirect()->route('admin-pojokHimsi')->with("success", "Postingan berhasil dihapus");
        }

        return back()->with("error", "Gagal menghapus postingan");
    }
}
