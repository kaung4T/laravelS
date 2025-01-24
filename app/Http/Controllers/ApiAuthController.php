<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiAuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth:api', ['except' => ['login', 'refresh', 'logout']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['name', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Using Refresh Token
        $iat = now()->timestamp;
        $refresh_ttl = env('JWT_REFRESH_TTL', 20160);
        $exp = Carbon::createFromTimestamp($iat)->addMinutes($refresh_ttl)->timestamp;
        $refresh_token = JWTAuth::customClaims(['exp' => $exp])->fromUser(auth('api')->user());

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(AuthManager $authManager)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        }
        catch (Exception $e) {
            return response()->json(['message' => 'Successfully logged out']);
        }

        // $authManager->guard('api')->logout();
        auth('api')->logout();

        // $cookie = cookie()->forget('JWT', '/');
        // $refresh_cookie = cookie()->forget('JWT_REFRESH', '/');
        $token = JWTAuth::getToken();
        JWTAuth::invalidate($token);
        Log::info('555', ['first', $token]);
        return response()->json(['message' => 'Successfully logged out']);
        // ->withCookie($cookie)
        // ->withCookie($refresh_cookie);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh(Request $request)
    {
        /***
         * Handling token without error
         */
        // try {
        //     /**
        //      * using Access Token
        //      *  */         
        //     $token = JWTAuth::getToken();
        //     $access_token = JWTAuth::refresh($token);
        //     return $this->respondWithToken($access_token);
        // }
        // catch (Exception $error) {
        //     return response()->json(['message' => 'No Token life']);
        // }
        /*** */
        
        /**
         * using Access Token
         *  */         
        $token = JWTAuth::getToken();
        $access_token = JWTAuth::refresh($token);

        /**
         * using Refresh Token from client
         */
        // $refresh_token = $request->refresh_token;
        // $token = JWTAuth::setToken($refresh_token);
        /***
         * get user
         */
        // $payload = $token->getPayload();
        // $userId = $payload['sub'];
        // $user = User::findOrFail($userId);
        /*** */
        // $access_token = JWTAuth::refresh($token);
        
        /**
         * using Refresh Token from Server side in app.php
         */
        // $refresh_token = $request->cookie('JWT_REFRESH');
        // $token = JWTAuth::setToken($refresh_token);
        /***
         * get user
         */
        // $payload = $token->getPayload();
        // $userId = $payload['sub'];
        // $user = User::findOrFail($userId);
        /*** */
        // $access_token = JWTAuth::refresh($token);

        // $iat = now()->timestamp;
        // $time = 20050;
        // $exp = Carbon::createFromTimestamp($iat)->addMinutes($time)->timestamp;
        // $refresh_token = JWTAUTH::customClaims(['exp' => $exp])->fromUser($user);
        
        // return $this->respondWithToken($access_token, $refresh_token);

        return $this->respondWithToken($access_token);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $cookie = cookie(
            'JWT',
            $token,
            20060,
            '/',
            null,
            true,
            true,
            false,
            'None'
        );

        // $refresh_cookie = cookie(
        //     'JWT_REFRESH',
        //     $refresh_token,
        //     20060 * 60,
        //     '/',
        //     null,
        //     true,
        //     true,
        //     false,
        //     'None'
        // );

        return response()->json([
            'access_token' => $token,
            // 'refresh_token' => $refresh_token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }
}
