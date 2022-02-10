<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $artikel = Article::orderBy('created_at','DESC')->where('is_active', 1 )->paginate(5);
        $kategori = Categorie::all();
        $postinganTerbaru = Article::orderBy('created_at','DESC')->limit('5')->get();

        return view('user.blog.index', compact('artikel', 'kategori', 'postinganTerbaru'));
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
                // return redirect('categorie-product/'.$artikel->categorieproduct->slug.'/'.$artikel->slug);
            } else {
                return back()->with('status', 'Artikel Tidak ditemukan');
            }
        } else {
            return back();
        }
    }
}


