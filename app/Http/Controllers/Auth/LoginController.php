<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
    * Where to redirect users after login.
    *
    * @var string
    */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }





    public function googleRedirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleHandlerCallback()
    {
        // try {
            $user = Socialite::driver('google')->user();
            dd($user);
        //     $finduser = User::where('google_id', $user->id)->first();

        //     if ($finduser) {
        //         Auth::login($finduser);
        //         return redirect('/');
        //     } else {
        //         $newUser = User::create([
        //             'name' => $user->name,
        //             'email' => $user->email,
        //             'google_id' => $user->id,
        //             'password' => Hash::make(Str::random($length = 10)),
        //         ]);
        //         Auth::login($newUser);
        //         return redirect('/');
        //     }
        // } catch (\Throwable $th) {

        // }
    }





    public function facebookRedirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }







    public function githubRedirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubHandlerCallback()
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
                    'email' => $user->email,
                    'github_id' => $user->id,
                    'password' => ''
                ]);
                Auth::login($newUser);
                return redirect('/');
            }
        } catch (\Throwable $th) {

        }
    }
}
