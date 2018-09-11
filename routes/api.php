<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->namespace('Api\V1')->group(function () {
    Route::middleware('auth:api')->group(function () {
        // Comments
        Route::apiResource('comments', 'CommentController')->only('destroy');
        Route::apiResource('posts.comments', 'PostCommentController')->only('store');

        // Posts
        Route::apiResource('posts', 'PostController')->only(['update', 'store', 'destroy']);
        Route::post('/posts/{post}/likes', 'PostLikeController@store')->name('posts.likes.store');
        Route::delete('/posts/{post}/likes', 'PostLikeController@destroy')->name('posts.likes.destroy');
        //Route::post('/posts/{post}/favorites' , 'PostFavoriteController@update')->name('posts.favorite.update');
        Route::post('favorite/{post}', 'PostsController@favoritePost');
        Route::post('unfavorite/{post}', 'PostsController@unFavoritePost');
        
        // Users
        Route::apiResource('users', 'UserController')->only('update');
        Route::delete('users/{user}/image', 'UserController@destroyImage');
        // Media
        Route::apiResource('media', 'MediaController')->only(['index', 'store', 'destroy']);

        //category
        Route::delete('/categories/{category}/image', 'CategoryController@destroyImage');
        Route::delete('/posts/{post}/image', 'PostController@destroyImage');
    });

    Route::post('/authenticate', 'Auth\AuthenticateController@authenticate')->name('authenticate');
    // Comments
    Route::apiResource('posts.comments', 'PostCommentController')->only('index');
    Route::apiResource('users.comments', 'UserCommentController')->only('index');
    Route::apiResource('comments', 'CommentController')->only(['index', 'show']);

    // Posts
    Route::apiResource('posts', 'PostController')->only(['index', 'show']);
    Route::apiResource('users.posts', 'UserPostController')->only('index');
    Route::post('/posts/{post}/rating', 'PostController@updateRating');

    // Users
    Route::apiResource('users', 'UserController')->only(['index', 'show']);
});
