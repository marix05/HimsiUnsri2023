<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PojokHimsi extends Model
{
    use HasFactory;

    protected $primaryKey = 'postID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "postID",
        "title",
        "author",
        "thumbnail",
        "content",
        "trigger",
        "periode"
    ];

    public static function getPost($periode = null, $postID = null) {
        if ($postID == null) {
            return PojokHimsi::where('periode', $periode)->orderBy('postID','DESC')->get();
        }

        return PojokHimsi::where('postID', $postID)->first();
    }
}
