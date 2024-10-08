<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $fillable = ['tag'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posttags', 'tag_id', 'post_id');
    }
}
