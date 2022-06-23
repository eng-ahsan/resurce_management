<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('tet', "TetController");
Route::apiResource('/resources', "ResourceController");
Route::get('/file-download', "FileDownloadController@filedownload");
Route::apiResource('/html-snippet', "HtmlSnippetController");
Route::apiResource('/url-provide', "LinkController");