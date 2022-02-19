<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $artikel = Article::latest()->where('is_active', 1 )->paginate(5);
        $kategori = Categorie::all();
        $postinganTerbaru = Article::latest()->where('is_Active', 1)->limit('5')->get();

        return view('user.blog.index', compact('artikel', 'kategori', 'postinganTerbaru'));
    }


    public function detail($slug)
    {
        $artikel = Article::where('slug', $slug)->first();;
        $kategori = Categorie::all();
        $postinganTerbaru = Article::latest()->limit('5')->get();

        return view('user.blog.detail', compact('artikel', 'kategori', 'postinganTerbaru',));
    }


    public function categorie($slug)
    {
        $categories = Categorie::where('slug', $slug)->first();
        $artikel = Article::where('kategori_id', $categories->id)->latest()->where('is_active', 1 )->paginate(6);

        return view('user.blog.categorie', compact('artikel', 'categories'));
    }


    public function author($username)
    {
        $users = User::where('username', $username)->first();
        $artikel = Article::where('user_id', $users->id)->orderBy('created_at','DESC')->where('is_active', 1 )->paginate(6);

        return view('user.blog.author', compact('users', 'artikel'));
    }


    public function search()
    {
        $artikel = Article::select('judul')->where('is_active', '1')->get();
        $data = [];

        foreach ($artikel as $item) {
            $data[] = $item['judul'];
        }

        return $data;
    }

    public function searchartikel(Request $request)
    {
        $search_artikel = $request->artikel_name;

        if($search_artikel != "")
        {
            $artikel = Article::where("judul", "LIKE", "%$search_artikel%")->first();
            if($artikel)
            {
                return redirect('blog/detail/'.$artikel->slug);
            } else {
                return back()->with('status', 'Artikel Tidak ditemukan');
            }
        } else {
            return back();
        }
    }
}


