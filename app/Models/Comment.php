<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        "user_id",
        "post_id",
        "parent_id",
        "title",
        "text",
        "status"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }
    protected static function boot()
    {
        parent::boot();
        Comment::created(function (Comment $comment) {
            if ($comment->parent_id) {
                $parentComment = $comment->parent;
                $parentComment->child = true;
                $parentComment->save();
            }
        });
        Comment::deleted(function (Comment $comment) {
            if ($comment->parent_id) {
                $parentComment = $comment->parent;
                if (count($parentComment->children) < 1) {
                    $parentComment->child = false;
                    $parentComment->save();
                }
            }
        });
    }
}
