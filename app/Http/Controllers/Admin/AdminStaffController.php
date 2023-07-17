<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dinas;
use App\Models\Staff;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminStaffController extends Controller
{
    public $periode;

    public function __construct() {
        $this->periode = date('Y');
    }

    public function staff() {
        if (Auth::user()->akses != 'Admin') {
            return redirect()->route('admin-pojokHimsi');
        }

        $data = [
            'title' => 'Staff',
            'nav' => [
                'active' => 'Staff'
            ],
            'staffs' => DB::table('staff')
            ->leftjoin('divisis', 'staff.divisiID', '=', 'divisis.divisiID')
            ->join('dinas', 'staff.dinasID', '=', 'dinas.dinasID')
            ->where('staff.periode', '=', $this->periode)
            ->get(),
            'dinass' => Dinas::getDinas(),
            'divisis' => Divisi::getDivisi(),
        ];

        return view('admin.dashboard.staff', $data);
    }

    public function insertStaff(Request $request) {
        $request->validate([
            'nama' => ['required', 'string'],
            'NIM' => ['nullable', 'numeric'],
            'dinasID' => ['required', 'string'],
            'divisiID' => ['nullable', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'angkatan' => ['required', 'numeric'],
            'jabatan' => ['required', 'string'],
            'periode' => ['required', 'numeric'],
            'email' => ['required', 'string', 'max:100'],
            'instagram' => ['required', 'string'],
            'kesan_pesan' => ['nullable', 'string'],
            'foto' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ]);

        if($request->file('foto')) {
            $periode = $request->periode;
            $dinas = Dinas::getDinas($request->dinasID)['dinas'];

            $foto = $request->file('foto');
            $fileFoto = $foto->getClientOriginalName();

            if ($request->NIM) {
                $request->merge(['password' => Hash::make($request->NIM)]);
            } else {
                $request->merge(['password' => NULL]);
            }

            $staff = new Staff(array_merge($request->all(), ['foto' => $fileFoto]));

            if ($staff->save()) {
                $foto->move(public_path('assets/img/staffs/'.$periode.'/'.$dinas), $fileFoto);
                $request->session()->regenerate();
                return redirect()->route('admin-staff')->with("success", "Data staff berhasil ditambahkan");
            }
        }

        return back()->with("error", "Gagal menambahkan data staff");
    }

    public function updateStaff(Request $request) {
        $request->validate([
            'staffID' => ['required'],
            'nama' => ['required', 'string'],
            'NIM' => ['nullable', 'numeric'],
            'dinasID' => ['required', 'string'],
            'divisiID' => ['nullable', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'angkatan' => ['required', 'numeric'],
            'jabatan' => ['required', 'string'],
            'periode' => ['required', 'numeric'],
            'email' => ['required', 'string', 'max:100'],
            'instagram' => ['required', 'string'],
            'kesan_pesan' => ['nullable', 'string'],
        ]);

        $staff = Staff::getStaffByID($request->staffID);

        if ($staff) {
            if ($request->NIM) {
                $request->merge(['password' => Hash::make($request->NIM)]);
                $staff->update($request->all());
            } else {
                $request->merge(['password' => NULL]);
                $staff->update($request->all());
            }

            $request->session()->regenerate();
            return redirect()->route('admin-staff')->with("success", "Data staff berhasil diperbaharui");
        }

        return back()->with("error", "Gagal memperbaharui data staff");
    }

    public function deleteStaff(Request $request) {
        $staff = Staff::getStaffByID($request->staffID);

        if ($staff) {
            $periode = $staff['periode'];
            $dinas = Dinas::getDinas($staff['dinasID'])['dinas'];

            $path = public_path('assets/img/staffs/'.$periode.'/'.$dinas.'/').$staff['foto'];

            if(File::exists($path)) {
                File::delete($path);
            }

            $staff->delete();

            $request->session()->regenerate();
            return redirect()->route('admin-staff')->with("success", "Data staff berhasil dihapus");
        }

        return back()->with("error", "Gagal menghapus data staff");
    }
}
