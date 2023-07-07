<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public static function index()
    {
        return Post::where('draft', false)
            ->orderBy('id', 'desc')
            ->paginate(5);
    }

    public static function getBySlug($slug)
    {
        return Post::where([
            'slug' => $slug,
            'draft' => false,
        ])->first();
    }
}
