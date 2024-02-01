<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpVote extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected static function boot()
    {
        parent::boot();
        UpVote::created(function (UpVote $upVote) {
            $post = $upVote->post;
            $post->increment('up_vote_count', 1);
            $post->save();
        });
        UpVote::deleted(function (UpVote $upVote) {
            $post = $upVote->post;
            $post->decrement('up_vote_count', 1);
            $post->save();
        });
    }
}
