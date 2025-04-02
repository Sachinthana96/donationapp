<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            if (!($token = JWTAuth::attempt($credentials))) {
                return redirect()
                    ->back()
                    ->withErrors(['email' => 'Invalid credentials']);
            }

            $user = Auth::user();
            $token = JWTAuth::claims(['role' => $user->role])->fromUser($user);
            $ttl = config('jwt.ttl');
            $cookie = cookie('jwt_token', $token, $ttl, '/', null, false, true);

            return redirect()->intended('/dashboard')->withCookie($cookie);
        } catch (JWTException $e) {
            return redirect()
                ->back()
                ->withErrors(['email' => 'Something went wrong']);
        }
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:rfc,dns|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = JWTAuth::fromUser($user);
        $ttl = config('jwt.ttl');
        $cookie = cookie('jwt_token', $token, $ttl, '/', null, false, true);

        return redirect()->intended('/dashboard')->withCookie($cookie);
    }

    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return redirect()
                ->route('welcome')
                ->withCookie(cookie()->forget('jwt_token'));
        } catch (JWTException $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Something went wrong']);
        }
    }
    public function getUser(Request $request)
    {
        try {
            $token = $request->cookie('jwt_token');
            $user = JWTAuth::setToken($token)->authenticate();
            return response()->json($user);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
