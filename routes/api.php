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
        Route::post('favorite/{post}', 'PostController@favoritePost');
        Route::post('unfavorite/{post}', 'PostController@unFavoritePost');
        Route::delete('/posts/{post}/image', 'PostController@destroyImage');
        Route::delete('/posts/{post}/image_preview', 'PostController@destroyImagePreview');
        // Users
        Route::apiResource('users', 'UserController')->only('update');
        Route::delete('users/{user}/image', 'UserController@destroyImage');
        // Media
        Route::apiResource('media', 'MediaController')->only(['index', 'store', 'destroy']);
        //Route::post('media/{post}', 'PostController@createImage');
        //category
        Route::delete('/categories/{category}/image', 'CategoryController@destroyImage');
        
        //admin
        Route::prefix('admin')->namespace('Admin')->group(function() {
            Route::apiResource('categories', 'CategoryController');
        });
        
            // Route::apiResource('posts', 'PostController');
            // Route::apiResource('categories', 'CategoriesController');
            // Route::apiResource('users', 'UserController')->only(['index', 'edit', 'update']);
            // Route::apiResource('comments', 'CommentController')->only(['index', 'edit', 'update', 'destroy']);
            // Route::apiResource('media', 'MediaLibraryController')->only(['index', 'show', 'create', 'store', 'destroy']);
            // Route::apiResource('tags', 'TagController');

        
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
    Route::get('posts_popular', 'PostController@postsPopular');
    Route::get('posts_new', 'PostController@postsNew');
    Route::get('posts_with_category/{category}', 'PostController@postWithCategory');
    // Users
    Route::apiResource('users', 'UserController')->only(['index', 'show']);


    //test
    Route::apiResource('categories', 'CategoryController')->only('index', 'show');

    //tags
    Route::apiResource('tags', 'TagController')->only('show');
    
    //Categories
    Route::get('categories_list', 'CategoryController@categoriesName');
    Route::get('categories_another/{category}', 'CategoryController@anotherCategories');

    Route::get('posts_auth/{post}', 'PostController@showAuth');

    Route::prefix('t1')->namespace('Tests')->group(function () {
        Route::get('/', 'TestController@func');
    });
});
