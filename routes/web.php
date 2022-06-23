<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('home');
});


Route::get('/admin', function () {
    return view('admin');
});
Route::get('/welcome', function () {
    return view('pdf_upload');
});
Route::get('/html_snippet', function () {
    return view('html_snippet');
});
Route::get('/url_provider', function () {
    return view('urlprovider');
});


Route::get('/user', function () {
    return view('user');
});
Route::get('/user_view', function () {
    return view('pdf_download');
});
Route::get('/html_snippet_user', function () {
    return view('html_snippet_user');
});

Route::get('/url_provider_view', function () {
    return view('url_provider_view');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
