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
    return Inertia::render('CardGamePage');
})->name('card-game');


Route::get('/test2', function () {
    return Inertia::render('Test2Page');
})->name('test2');


Route::get('/sample', function () {

    $contents = \App\Domain\Contents\Models\Content::all();

    return view('sample', [
        'contents' => $contents
    ]);
})->name('sample');


Route::post('/contents/create', function (\Illuminate\Http\Request $req) {

    $content = new \App\Domain\Contents\Models\Content(
        $req->validate([
            'title' => ['required', 'string'],
            'content' => ['required', 'string']
        ])
    );

    $content->author = 'none';
    $content->save();

    \App\Domain\Contents\Events\ContentCreatedEvent::dispatch($content);

    dd($content->toArray());

    return view("sample");
});


Route::get("/job", function () {
    \App\Domain\Contents\Jobs\ContentJob::dispatch();

    return "job";
});


Route::middleware(['login-by-guest'])->post("/chatroom/send-message", function (\Illuminate\Http\Request $req) {


    $chat = new \App\Domain\Contents\Models\Chat(
        array_merge(
            $req->validate([
                'message' => ['required', 'string', 'min:1']
            ]),
            ['user' => $req->user()]
        )
    );

//    event(new \App\Domain\Contents\Events\ChatEvent($chat));
    broadcast(new \App\Domain\Contents\Events\ChatEvent($chat))->toOthers();

    return 1234;
//    return Inertia::render('ChatRoomPage');
})->name('chatroom.send-message');

Route::middleware(['login-by-guest'])->get("/chatroom", function () {
    return Inertia::render('ChatRoomPage');
})->name('chatroom');
