<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Psy\Command\WhereamiCommand;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.profile.index', compact('user'));
    }



    public function detail(User $username)
    {
        if ($username == true){
            $username = User::where('username')->get();
        } else {
            // 404;
            return view('admin.profile.detail');
        }

        dd($username);

        return view('admin.profile.detail', compact('user', 'username'));
    }



    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required','string','min:3','max:191'],
            'email' => ['email','string','max:191','min:3','required'],
            'username' => ['required','alpha_num','unique:users,username,' . auth()->id()],
        ]);


        if (empty($request->file('foto'))) {
            auth()->user()->update([
                'name' => $request->name,
                'username' => Str::slug($request->username),
                'email' => $request->email,
                'alamat' => $request->alamat,
                'about' => $request->about,
                'jobtitle' => $request->jobtitle,
                'at' => $request->at,
                'website' => $request->website,
                'github' => $request->github,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
            ]);

            toast('Data Berhasil Diupdate','success');

            return redirect()->route('profile.index');
        } else {
            Storage::delete(Auth::user()->foto);
            auth()->user()->update([
                'name' => $request->name,
                'username' => Str::slug($request->username),
                'email' => $request->email,
                'alamat' => $request->alamat,
                'about' => $request->about,
                'jobtitle' => $request->jobtitle,
                'at' => $request->at,
                'website' => $request->website,
                'github' => $request->github,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'foto' => $request->file('foto')->store('foto-profile'),
            ]);

            toast('Data Berhasil Diupdate','success');

            return redirect()->route('profile.index');
        }

    }
}
