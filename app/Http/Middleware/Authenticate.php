<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class Authenticate extends Middleware
{
    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function handle($request, Closure $next, ...$guards)
    {
        // if ($token = $request->cookie('JWT')) {
        //     $request->headers->set('Authorization', 'Bearer ' . $token);
        // }

        // $route = [
        //     'api/auth/login',
        //     'api/auth/refresh',
        //     'api/auth/logout',
        // ];

        // if (in_array($request->path(), $route)) {
        //     return $next($request);
        // }

        // $jwt_refresh = $request->cookie('JWT_REFRESH');

        // try {
        //     JWTAuth::parseToken()->authenticate();
        // }
        // catch (Exception $e) {
        //     /***
        //      * use only access
        //      */
        //     $token = JWTAuth::getToken();
        //     $access_token = JWTAuth::refresh($token);

        //     $cookie = cookie(
        //         'JWT',
        //         $access_token,
        //         123123,
        //         '/',
        //         null,
        //         true,
        //         true,
        //         false,
        //         'None'
        //     );

        //     return response()->json(['message' => 'Token refreshed'])->withCookie($cookie);

        //     /***
        //      * use refresh
        //      */
        //     // if ($jwt_refresh) {
        //     //     $token = JWTAuth::setToken($jwt_refresh);
        //     //     /***
        //     //      * get user
        //     //      */
        //     //     $payload = $token->getPayload();
        //     //     $userId = $payload['sub'];
        //     //     $user = User::findOrFail($userId);
        //     //     /*** */
        //     //     $access_token = JWTAuth::refresh($token);

        //     //     $iat = now()->timestamp;
        //     //     $time = 213123123;
        //     //     $exp = Carbon::createFromTimestamp($iat)->addMinutes($time)->timestamp;
        //     //     $refresh_token = JWTAuth::customClaims(['exp' => $exp])->fromUser($user);

        //     //     $cookie = cookie(
        //     //         'JWT',
        //     //         $access_token,
        //     //         123123,
        //     //         '/',
        //     //         null,
        //     //         true,
        //     //         true,
        //     //         false,
        //     //         'None'
        //     //     );

        //     //     $refresh_cookie = cookie(
        //     //         'JWT_REFRESH',
        //     //         $refresh_token,
        //     //         123123,
        //     //         '/',
        //     //         null,
        //     //         true,
        //     //         true,
        //     //         false,
        //     //         'None'
        //     //     );

        //     //     return response()->json(['message' => 'Token refreshed'])->withCookie($cookie)->withCookie($refresh_cookie);
        //     // }
        // }

        return $next($request);
    }
}
