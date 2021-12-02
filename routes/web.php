<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get("/", function () {
    return view("website.home");
})->name("website");

Route::get("/post", function () {
    return view("website.post");
});

Route::get("/category", function () {
    return view("website.category");
});

//admin panel routes

Route::get("/test", function () {
    return view("admin.dashboard.index");
});


Route::group(["prefix" => "admin", "middleware" => ["auth"]], function () {
    Route::get("/dashboard", function () {
        return view("admin.dashboard.index");
    });
    Route::resource("category", "App\Http\Controllers\CategoryController");
});
