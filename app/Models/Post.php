<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // php artisan tinker
    // $post = App\Models\Post::find(1);
    // $post->tags;
    // $post->tags()->attach(6);
    // $post->tags()->get();
}