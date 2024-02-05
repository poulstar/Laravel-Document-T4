<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\UpVote;
use App\Http\Requests\UserCreatePostRequest;
use App\Http\Requests\UserUpdatePostRequest;
use App\Http\Requests\AdminUpdatePostRequest;

class PostController extends Controller
{
    public function allPostsForDashboard()
    {
        $query = Post::query()
            ->select([
                'id',
                'user_id',
                'title',
                'description',
                'up_vote_count',
                DB::raw('ST_X(location::geometry) AS latitude'),
                DB::raw('ST_Y(location::geometry) AS longitude')
            ])
            ->with('media')
            ->with('user')
            ->orderBy('up_vote_count', 'desc');
        $posts = $query->paginate(4);
        $topPosts = $query->take(3)->get();
        return $this->successResponse([
            'posts' => $this->paginatedSuccessResponse($posts, 'posts'),
            'topPosts' => $topPosts,
        ], 200);
    }
    public function likePost(Post $post)
    {
        $upVote = UpVote::where('user_id', Auth::id())
            ->where('post_id', $post->id)
            ->first();
        if ($upVote) {
            $upVote->delete();
            return $this->successResponse(['message' => 'Post like removed', 'vote' => -1]);
        } else {
            $upVote = new UpVote();
            $upVote->user()->associate(Auth::id());
            $upVote->post()->associate($post->id);
            $upVote->save();
            return $this->successResponse(['message' => 'Post like added', 'vote' => 1]);
        }
    }
    public function postDetail(Post $post)
    {
        $query = Post::query()
            ->select([
                'id',
                'user_id',
                'title',
                'description',
                'created_at',
                'updated_at',
                'up_vote_count',
                DB::raw('ST_X(location::geometry) AS latitude'),
                DB::raw('ST_Y(location::geometry) AS longitude')
            ])
            ->with('media')
            ->with('user')
            ->with('user.media')
            ->where('id', $post->id)
            ->first();
        return $this->successResponse([
            'post' => $query
        ], 200);
    }
    public function myPosts()
    {
        $query = Post::query()
            ->select([
                'id',
                'title',
                'description',
                'up_vote_count',
                DB::raw('ST_X(location::geometry) AS latitude'),
                DB::raw('ST_Y(location::geometry) AS longitude')
            ])
            ->with('media')
            ->orderBy('id', 'desc')
            ->where('user_id', '=', Auth::id());
        $posts = $query->paginate(5);
        return $this->paginatedSuccessResponse($posts, 'posts');
    }
    public function createPost(UserCreatePostRequest $request)
    {
        $data = $request->safe(['title', 'description', 'latitude', 'longitude']);
        $post = new Post([
            'title' => $data['title'],
            'description' => $data['description'],
            'location' => DB::raw("ST_GeomFromText('Point(" . $data['latitude'] . " " . $data['longitude'] . ")', 4326)")
        ]);
        $post->user()->associate(Auth::id());
        $post->save();
        $this->storePostMedia($request->file('image'), $post->id, Auth::id());
        if ($post) {
            return $this->successResponse([
                'message' => 'Post Created',
            ]);
        }
        return $this->failResponse();
    }
    public function updateMyPost(UserUpdatePostRequest $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return $this->failResponse([], 403);
        }
        $data = $request->safe(['title', 'description', 'latitude', 'longitude']);
        if ($request->input('title'))
            $post->title = $data['title'];
        if ($request->input('description'))
            $post->description = $data['description'];
        if ($request->input('latitude') && $request->input('longitude'))
            $post->location = DB::raw("ST_GeomFromText('Point(" . $data['latitude'] . " " . $data['longitude'] . ")', 4326)");
        $post->update();
        if ($request->file('image')) {
            $this->storePostMedia($request->file('image'), $post->id, Auth::id());
        }
        return $this->successResponse([
            'message' => 'Post Updated',
        ]);
    }
    public function deleteMyPost(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return $this->failResponse([], 403);
        }
        if ($post->media)
            $this->deleteMedia($post->media);
        if ($post->delete()) {
            return $this->successResponse([
                'message' => 'Post Deleted',
            ]);
        }
        return $this->failResponse();
    }
    public function allPostsForAdmin()
    {
        $query = Post::query()
            ->select([
                'id',
                'user_id',
                'title',
                'description',
                DB::raw('ST_X(location::geometry) AS latitude'),
                DB::raw('ST_Y(location::geometry) AS longitude')
            ])
            ->with('media')
            ->with('user')
            ->orderBy('id', 'desc');
        $posts = $query->paginate(5);
        return $this->paginatedSuccessResponse($posts, 'posts');
    }
    public function updatePostByAdmin(AdminUpdatePostRequest $request, Post $post)
    {
        $data = $request->safe(['title', 'description', 'latitude', 'longitude']);
        if ($request->input('title'))
            $post->title = $data['title'];
        if ($request->input('description'))
            $post->description = $data['description'];
        if ($request->input('latitude') && $request->input('longitude'))
            $post->location = DB::raw("ST_GeomFromText('Point(" . $data['latitude'] . " " . $data['longitude'] . ")', 4326)");
        $post->update();
        if ($request->file('image')) {
            $this->storePostMedia($request->file('image'), $post->id, $post->user_id);
        }
        return $this->successResponse([
            'message' => 'Post Updated',
        ]);
    }
    public function deletePostByAdmin(Post $post)
    {
        if ($post->media)
            $this->deleteMedia($post->media);
        if ($post->delete()) {
            return $this->successResponse([
                'message' => 'Post Deleted',
            ]);
        }
        return $this->failResponse();
    }
    public function searchPost()
    {
        $latitude = request()->input('latitude');
        $longitude = request()->input('longitude');
        $distanceField = "ST_Distance(location::geometry, "
            . "ST_GeomFromText('Point(" . $latitude . " " . $longitude . ")', 4326)) AS distance";
        $query = Post::query()
            ->select([
                'id',
                'user_id',
                'title',
                'description',
                'up_vote_count',
                DB::raw('ST_X(location::geometry) AS latitude'),
                DB::raw('ST_Y(location::geometry) AS longitude'),
                DB::raw($distanceField),
            ])
            ->with('media')
            ->with('user')
            ->orderBy('distance');
        $posts = $query->paginate(5);
        return $this->paginatedSuccessResponse($posts, 'posts');
    }
}
