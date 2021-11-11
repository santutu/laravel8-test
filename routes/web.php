<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/', function () {
    return Inertia::render('TestPage');
})->name('test');


Route::get('/test2', function () {
    return Inertia::render('Test2Page');
})->name('test2');


Route::get('/sample', function () {
    return view('sample');
});

Route::post('/contents/create', function (\Illuminate\Http\Request $req) {

    $content = new \App\Models\Content(
        $req->validate([
            'title' => ['required', 'string'],
            'content' => ['required', 'string']
        ])
    );

//    dd($content->toArray());

    print("Fire event");

    return view("sample");
    return Inertia::render('SamplePage');

    return Redirect::route('test');
});
