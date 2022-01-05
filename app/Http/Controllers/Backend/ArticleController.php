<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at','desc')->get();

        return view('admin.article.index', compact('articles'));
    }


    public function create()
    {
        $articles = Article::all();
        $categories = Categorie::all();

        return view('admin.article.create', compact('articles', 'categories'));
    }


    public function store(Request $request)
    {
        request()->validate([
            'judul' => 'required|string|unique:articles,judul',
            'gambar_artikel' => 'required|file',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_kategori);
        $data['user_id'] = Auth::id();
        $data['gambar_artikel'] = $request->file('gambar_artikel')->store('gambar-artikel');

        Article::create($data);

        toast('Data Berhasil Ditambahkan','success');

        return redirect()->route('article.index');
    }
}
