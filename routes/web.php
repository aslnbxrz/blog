<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get("/", function () {
    return view("website.home");
});

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
