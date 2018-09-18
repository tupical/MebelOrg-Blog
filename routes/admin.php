<?php

Route::get('dashboard', 'ShowDashboard')->name('dashboard');
Route::resource('posts', 'PostController');
Route::resource('categories', 'CategoriesController');
Route::resource('users', 'UserController')->only(['index', 'edit', 'update']);
Route::resource('comments', 'CommentController')->only(['index', 'edit', 'update', 'destroy']);
Route::resource('media', 'MediaLibraryController')->only(['index', 'show', 'create', 'store', 'destroy']);
Route::resource('tags', 'TagController');


