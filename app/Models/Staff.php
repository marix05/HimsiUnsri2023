<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $primaryKey = 'staffID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'staffID',
        'nama',
        'NIM',
        'password',
        'dinasID',
        'divisiID',
        'tempat_lahir',
        'tanggal_lahir',
        'gender',
        'angkatan',
        'jabatan',
        'periode',
        'email',
        'instagram',
        'kesan_pesan',
        'foto',
    ];

    static function getStaff($periode = null, $dinasID = null) {
        if ($dinasID == null) {
            return Staff::where('periode', $periode)->get();
        }

        return Staff::where([
            ['dinasID', $dinasID],
            ['periode', $periode]
        ])->get();
    }

    static function getStaffByID($staffID) {
        return Staff::where('staffID', $staffID)->first();
    }
}
