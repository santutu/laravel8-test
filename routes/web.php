<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function (\App\Libs\MakeSum $makeSum) {

    $content = \App\Models\Content::firstOrFail();

    $results = $makeSum->sum(123123);

    return view('welcome');
});
Route::get('/contents/create', function () {
    $content = new \App\Models\Content();
    $content->content = "content1";
    $content->title = "title1";
    $content->author = "author1";
    $content->save();

    return $content->toJson();
});

Route::get('/contents', function () {
    $content = \App\Models\Content::firstOrFail();

    return $content->toJson();
});



