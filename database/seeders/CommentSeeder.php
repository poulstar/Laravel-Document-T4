<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $comments = [
            [
                'user_id' => 1,
                'post_id' => 100,
                'parent_id' => null,
                'child' => false,
                'title' => 'root comment',
                'text' => 'root text',
            ],
            [
                'user_id' => 1,
                'post_id' => 100,
                'parent_id' => null,
                'child' => false,
                'title' => 'root comment',
                'text' => 'root text',
            ],
            [
                'user_id' => 1,
                'post_id' => 100,
                'parent_id' => null,
                'child' => false,
                'title' => 'root comment',
                'text' => 'root text',
            ],
        ];
        Comment::insert($comments);
    }
}
