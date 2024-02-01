<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'up_vote_count',
        'location'
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function votes()
    {
        return $this->hasMany(UpVote::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function media()
    {
        return $this->morphToMany(Media::class, 'model', 'model_has_media');
    }
}
