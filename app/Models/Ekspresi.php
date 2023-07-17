<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekspresi extends Model
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
        "link",
        "thumbnail",
        'category',
    ];

    public static function getPost($postID = null) {
        if ($postID != null) {
            return Ekspresi::where('postID', $postID)->first();
        }

        return Ekspresi::all();
    }
}
