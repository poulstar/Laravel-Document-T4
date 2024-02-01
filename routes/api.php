<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Enum\Permissions;
use App\Http\Controllers\PostController;

Route::get('get-verify-code/{phone}', [UserController::class, 'getLoginCode']);
Route::post('register', [UserController::class, 'register']);

Route::Group([
    'middleware' => ['auth:api']
], function () {
    Route::get('user/profile', [UserController::class, 'profile'])->middleware(['can:' . Permissions::VIEW_MY_PROFILE]);
    Route::post('update-my-profile/{user}', [UserController::class, 'updateMyProfile'])->middleware(['can:' . Permissions::UPDATE_MY_ACCOUNT]);
    Route::get('all-users', [UserController::class, 'allUser'])->middleware(['can:' . Permissions::READ_ANY_ACCOUNT]);
    Route::post('create-user-by-admin', [UserController::class, 'createUserByAdmin'])->middleware(['can:' . Permissions::CREATE_ANY_ACCOUNT]);
    Route::post('update-user-by-admin/{user}', [UserController::class, 'updateUserByAdmin'])->middleware(['can:' . Permissions::UPDATE_ANY_ACCOUNT]);
    Route::delete('delete-user-by-admin/{user}', [UserController::class, 'deleteUserByAdmin'])->middleware(['can:' . Permissions::DELETE_ANY_ACCOUNT]);
    Route::get('all-posts-for-dashboard', [PostController::class, 'allPostsForDashboard'])->middleware(['can:' . Permissions::VIEW_ANY_POST]);
    Route::get('posts/{post}/like', [PostController::class, 'likePost'])->middleware(['can:' . Permissions::LIKE_ANY_POST]);
    Route::get('view-post/{post}', [PostController::class, 'postDetail'])->middleware(['can:' . Permissions::VIEW_ANY_POST]);
    Route::get('my-posts', [PostController::class, 'myPosts'])->middleware(['can:'.Permissions::READ_MY_POST]);
    Route::post('create-post', [PostController::class, 'createPost'])->middleware(['can:'.Permissions::CREATE_NEW_POST]);
});
