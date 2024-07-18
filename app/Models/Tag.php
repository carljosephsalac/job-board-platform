<?php

namespace App\Models;

use App\Models\Job;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    public function jobs()
    {
        return $this->belongsToMany(Job::class, table: 'job_listing_tag', relatedPivotKey: 'job_listing_id');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}