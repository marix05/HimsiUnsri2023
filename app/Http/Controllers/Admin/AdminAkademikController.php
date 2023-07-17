<?php

namespace App\Http\Controllers\Admin;

use App\Models\Akademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminAkademikController extends Controller
{
    public function akademik() {
        $data = [
            'title' => 'Akademik',
            'nav' => [
                'active' => 'Akademik'
            ],
            'posts' => Akademik::all()->sortBy('expDate'),
        ];

        return view('admin.dashboard.akademik', $data);
    }

    public function formInsertAkademik() {
        $data = [
            'title' => 'Dashboard',
            'nav' => [
                'active' => 'Akademik',
                'method' => 'Insert',
            ],
        ];

        return view('admin.dashboard.form-akademik', $data);
    }

    public function insertAkademik(Request $request) {
        $request->validate([
            'title' => ['required', 'string'],
            'author' => ['required', 'string'],
            'category' => ['required', 'string'],
            'expDate' => ['required', 'string'],
            'trigger' => ['required', 'string'],
            'content' => ['required', 'string'],
            'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if($request->file('thumbnail')) {
            $foto = $request->file('thumbnail');
            $fileFoto = date('mdYHis').'_'.uniqid().'_'.$foto->getClientOriginalName();

            $post = new Akademik(array_merge($request->all(), ['thumbnail' => $fileFoto]));

            if ($post->save()) {
                $foto->move(public_path('assets/img/uploads'), $fileFoto);
                $request->session()->regenerate();
                return redirect()->route('admin-akademik')->with("success", "Postingan berhasil ditambahkan");
            }
        }

        return back()->with("error", "Gagal menambahkan postingan");
    }

    public function formUpdateAkademik($postID) {
        $data = [
            'title' => 'Dashboard',
            'nav' => [
                'active' => 'Akademik',
                'method' => 'Update',
            ],
            'post' => Akademik::getPost(null, $postID),
        ];

        return view('admin.dashboard.form-akademik', $data);
    }

    public function updateAkademik(Request $request) {
        $request->validate([
            'postID' => ['required'],
            'title' => ['required', 'string'],
            'author' => ['required', 'string'],
            'category' => ['required', 'string'],
            'expDate' => ['required', 'string'],
            'trigger' => ['required', 'string'],
            'content' => ['required', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $post = Akademik::getPost(null, $request->postID);

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
            return redirect()->route('admin-akademik')->with("success", "Postingan berhasil diperbaharui");
        }

        return back()->with("error", "Gagal memperbaharui postingan");
    }

    public function deleteAkademik(Request $request) {
        $post = Akademik::getPost(null, $request->postID);

        if ($post) {
            $path = public_path('assets/img/uploads/').$post['thumbnail'];;

            if(File::exists($path)) {
                File::delete($path);
            }

            $post->delete();

            $request->session()->regenerate();
            return redirect()->route('admin-akademik')->with("success", "Postingan berhasil dihapus");
        }

        return back()->with("error", "Gagal menghapus postingan");
    }
}
