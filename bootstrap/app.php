<?php

use App\Events\MailEvent;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RefreshMiddleware;
use App\Listeners\MailListen;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\Throw_;
use Tymon\JWTAuth\Facades\JWTAuth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->api(
        prepend: [
            RefreshMiddleware::class,
        ],
        append: [
            Authenticate::class,
        ]);
        $middleware->alias([
            'refresh.token' => RefreshMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
        /***
         * Handling Token without Error
         */
        // $exceptions->render(function (Throwable $e, Request $request) {

        //     if ($e instanceof AuthenticationException) {
        //         return response()->json(['message' => 'Token refreshed']);
        //     }
        //     return null;
        // });
        /*** */

        // $exceptions->render(function (Throwable $e, Request $request) {
        //     if ($e instanceof AuthenticationException) {
                
        //         $refresh_token = $request->cookie('JWT_REFRESH');

        //         if ($refresh_token) {
        //             $newToken = JWTAuth::setToken($refresh_token)->refresh();
        //             // $newToken = JWTAuth::refresh($refresh_token);
        
        //             $cookie = cookie(
        //                 'JWT',
        //                 $newToken,
        //                 JWTAuth::factory()->getTTL(),
        //                 '/',
        //                 null,
        //                 true,
        //                 true,
        //                 false,
        //                 'None'
        //             );
        //             return response()->json(['message' => 'Token refreshed'])->withCookie($cookie);
        //         }
        //     }
        //     return null;
        // });
    })->create();
