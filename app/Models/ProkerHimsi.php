<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProkerHimsi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prokerID',
        'proker',
        'pelaksanaan',
        'sasaran',
        'deskripsi',
        'icon',
    ];

    static function getProker($prokerID = null) {
        if ($prokerID == null) {
            return ProkerHimsi::all();
        }

        return ProkerHimsi::where('prokerID', $prokerID)->first();
    }
}
