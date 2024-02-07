<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enum\Permissions;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

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
    public function store(CommentRequest $request, Post $post)
    {
        $data = $request->safe(['parent_id', 'title', 'text']);
        $comment = new Comment([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
            'parent_id' => $data['parent_id'],
            'title' => $data['title'],
            'text' => $data['text'],
        ]);
        if ($comment->save()) {
            return $this->successResponse([
                'message' => 'Your create Accepted',
            ], 200);
        } else {
            return $this->failResponse([
                'message' => 'Your Data have problem'
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        $comments = Comment::where('parent_id', $comment->id)
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'users.name', 'users.email')
            ->get();
        return $this->successResponse([
            'comments' => $comments,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $data = $request->safe(['title', 'text']);
        if ($request->input('title'))
            $comment->title = $data['title'];
        if ($request->input('text'))
            $comment->text = $data['text'];
        if ($comment->update()) {
            return $this->successResponse([
                'message' => 'Your Update Accepted',
            ], 200);
        } else {
            return $this->failResponse([
                'message' => 'Your Data have problem'
            ], 409);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if (Auth::user()->hasPermissionTo(Permissions::DELETE_ANY_COMMENT)) {
            $comment->delete();
            return $this->successResponse([
                'message' => 'Comment Deleted',
            ], 200);
        } else {
            return $this->failResponse([], 403);
        }
    }
}
