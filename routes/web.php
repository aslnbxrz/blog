<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

Auth::routes();


//admin panel routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\FrontEndController::class, 'home'])->name('website');
Route::get('/category', [App\Http\Controllers\FrontEndController::class, 'category'])->name('website.category');
Route::get('/post/{slug}', [App\Http\Controllers\FrontEndController::class, 'post'])->name('website.post');

//admin panel routes
Route::get("/test", function () {
    return view("admin.dashboard.index");
});

Route::group(["prefix" => "admin", "middleware" => ["auth"]], function () {
    Route::get("/dashboard", function () {
        return view("admin.dashboard.index");
    });
    Route::resource("category", "App\Http\Controllers\CategoryController");
    Route::resource("tag", "App\Http\Controllers\TagController");
    Route::resource("post", "App\Http\Controllers\PostController");
    
    Route::resource("user", "App\Http\Controllers\UserController");
});

Route::get("/test",function(){
    $posts = Post::all();
    return $posts;
});