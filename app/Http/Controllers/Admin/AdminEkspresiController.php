<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ekspresi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminEkspresiController extends Controller
{
    public function ekspresi() {
        $data = [
            'title' => 'Ekspresi',
            'nav' => [
                'active' => 'Ekspresi'
            ],
            'posts' => Ekspresi::getPost()->sortBy('category'),
        ];

        return view('admin.dashboard.ekspresi', $data);
    }

    public function insertEkspresi(Request $request) {
        $request->validate([
            'title' => ['required', 'string'],
            'category' => ['required', ''],
            'link' => ['required', ''],
            'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if ($request->file('thumbnail')) {
            $foto = $request->file('thumbnail');
            $fileFoto = date('mdYHis').'_'.uniqid().'_'.$foto->getClientOriginalName();

            $post = new Ekspresi(array_merge($request->all(), ['thumbnail' => $fileFoto]));

            if ($post->save()) {
                $foto->move(public_path('assets/img/uploads'), $fileFoto);
                $request->session()->regenerate();
                return redirect()->route('admin-ekspresi')->with("success", "Postingan berhasil ditambahkan");
            }
        }

        return back()->with("error", "Gagal menambahkan postingan");
    }

    public function updateEkspresi(Request $request) {
        $request->validate([
            'postID' => ['required'],
            'title' => ['required', 'string'],
            'category' => ['required', 'string'],
            'link' => ['required', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $post = Ekspresi::getPost($request->postID);

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
            return redirect()->route('admin-ekspresi')->with("success", "Postingan berhasil diperbaharui");
        }

        return back()->with("error", "Gagal memperbaharui postingan");
    }

    public function deleteEkspresi(Request $request) {
        $post = Ekspresi::getPost($request->postID);

        if ($post) {
            $path = public_path('assets/img/uploads/').$post['thumbnail'];;

            if(File::exists($path)) {
                File::delete($path);
            }

            $post->delete();

            $request->session()->regenerate();
            return redirect()->route('admin-ekspresi')->with("success", "Postingan berhasil dihapus");
        }

        return back()->with("error", "Gagal menghapus postingan");
    }
}
