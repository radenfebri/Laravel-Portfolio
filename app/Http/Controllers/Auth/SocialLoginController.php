<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    // Login with Google
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
            dd($user);

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect('/');

            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'username' => preg_replace("/[^a-zA-Z0-9]/", "", $user->name),
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => bcrypt('12345678'),
                ]);
                $newUser->assignRole('User');

                Auth::login($newUser);
                return redirect('/');
            }


        } catch (\Throwable $th) {
            // dd($th);

        }
    }


    // Login with Facebook
    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            // dd($user);
            $finduser = User::where('facebook_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect('/');

            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'username' => preg_replace("/[^a-zA-Z0-9]/", "", $user->name),
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                    'password' => bcrypt('12345678'),
                ]);
                $newUser->assignRole('User');

                Auth::login($newUser);
                return redirect('/');
            }
        } catch (\Throwable $th) {

        }
    }



    // Login with Github
    public function redirectGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callbackGithub()
    {
        try {
            $user = Socialite::driver('github')->user();
            // dd($user);
            $finduser = User::where('github_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect('/');

            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'username' => preg_replace("/[^a-zA-Z0-9]/", "", $user->name),
                    'email' => $user->email,
                    'github_id' => $user->id,
                    'password' => bcrypt('12345678'),
                ]);
                $newUser->assignRole('User');

                Auth::login($newUser);
                return redirect('/');
            }
        } catch (\Throwable $th) {

        }
    }

}
