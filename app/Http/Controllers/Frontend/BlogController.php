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
        $artikel = Article::orderBy('created_at','DESC')->where('is_active', 1 )->paginate(5);
        $kategori = Categorie::all();
        $postinganTerbaru = Article::orderBy('created_at','DESC')->where('is_Active', 1)->limit('5')->get();

        return view('user.blog.index', compact('artikel', 'kategori', 'postinganTerbaru'));
    }


    public function detail($slug)
    {
        $artikel = Article::where('slug', $slug)->first();;
        $kategori = Categorie::all();
        $postinganTerbaru = Article::orderBy('created_at','DESC')->limit('5')->get();

        return view('user.blog.detail', compact('artikel', 'kategori', 'postinganTerbaru'));
    }


    public function categorie($slug)
    {
        $categories = Categorie::where('slug', $slug)->first();
        $artikel = Article::where('kategori_id', $categories->id)->orderBy('created_at','DESC')->where('is_active', 1 )->paginate(6);

        return view('user.blog.categorie', compact('artikel', 'categories'));
    }


    public function author(User $author)
    {
        // $articles = Article::where($author)->first();
        // $artikel = Article::where('kategori_id', $categories->id)->orderBy('created_at','DESC')->where('is_active', 1 )->paginate(6);

        // return view('user.blog.author', compact('articles'));
        return view('user.blog.author',[
            'articles' => $author->articles,
        ]);
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


