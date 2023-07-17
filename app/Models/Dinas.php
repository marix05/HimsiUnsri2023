<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'dinasID',
        'dinas',
        'kepanjangan',
        'deskripsi',
        'logo',
        'hasDivisi'
    ];

    static function getDinas($dinasID = null) {
        if ($dinasID == null) {
            return Dinas::all();
        }

        return Dinas::where('dinasID', $dinasID)->first();
    }

}
