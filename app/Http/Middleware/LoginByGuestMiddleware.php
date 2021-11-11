<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginByGuestMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $key = \App::isProduction() ? encrypt($request->ip()) : md5(encrypt(\Session::getId()));

        $name = "GUEST-" . Str::of($key)->substr(0, 5) .
            \Str::of($request->ip())->mask('*', 5)->start('(')->finish(')');

        \Auth::login(User::factory()->make([
            'id' => (int)str_replace('.', '', microtime(true)),
            'name' => $name,
        ]));

        return $next($request);
    }
}
