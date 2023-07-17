<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akademik extends Model
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
        "category",
        "expDate"
    ];

    public static function getPost($category = null, $postID = null) {
        if ($postID == null) {
            return Akademik::where([
            ['category', $category],
            ['expDate', '>', date("Y-m-d")]
        ])->orderBy('expDate')->get();
        }

        return Akademik::where('postID', $postID)->first();
    }
}
