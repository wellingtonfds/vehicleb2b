<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginSocialRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Bridge\AccessToken;
use Laravel\Passport\PersonalAccessTokenFactory;
use Laravel\Passport\PersonalAccessTokenResult;
use Laravel\Passport\Bridge\Client;
use Laravel\Passport\Passport;
use League\OAuth2\Server\CryptKey;

class AuthController extends Controller
{

    const SOCIAL_PROVIDE = [
        'GOOGLE' => 'token_google',
        'FACEBOOK' => 'token_facebook'
    ];
    /**
     * Attention you need convert authorization_code to Access Tokens
     * 
     */
    public function authSocial(LoginSocialRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->id_token),
                $createUser[self::SOCIAL_PROVIDE[$request->provider]] = $request->id_token
            ]);
        }

        if ($user[self::SOCIAL_PROVIDE[$request->provider]] !== $request->id_token) {
            $user[self::SOCIAL_PROVIDE[$request->provider]] = $request->id_token;
            $user->save();
        }

        $token = $user->createToken('', ['']);
        return response()->json([
            'access_token' => $token->accessToken,
            'token_type' => 'bearer',
            'expires_in' => Passport::personalAccessTokensExpireIn(Carbon::now()->addMonths(1)),
            'refresh_token' => $token->token->expires_at->timestamp
        ]);
    }
}
