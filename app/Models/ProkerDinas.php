<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProkerDinas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prokerID',
        'dinasID',
        'proker',
        'deskripsi',
    ];

    static function getProker($dinasID = null) {
        return ProkerDinas::where('dinasID', $dinasID)->get();
    }
}
