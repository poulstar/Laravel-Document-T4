<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enum\Permissions;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'can:' . Permissions::READ_ANY_COMMENT,
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postID = request()->input('post');
        $query = Comment::query()
            ->select([
                'id',
                'user_id',
                'post_id',
                'parent_id',
                'child',
                'title',
                'text',
            ])
            ->where('post_id', $postID)
            ->where('parent_id', null)
            ->orderBy('id', 'desc');
        $comments = $query->paginate(5);
        return $this->paginatedSuccessResponse($comments, 'comments');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
