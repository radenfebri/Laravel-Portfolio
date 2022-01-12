<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


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
            'gambar_artikel' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
        ]);


        if (empty($request->file('gambar_artikel'))) {
            Article::create([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'deskripsi' => $request->deskripsi,
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
                'tgl_publish' => $request->tgl_publish ?? (now()),
                'user_id' => Auth::id(),
                'gambar_artikel' => $request->gambar_artikel ?? '',
            ]);

            toast('Data Berhasil Ditambahkan','success');

            return redirect()->route('article.index');

        } else {

            Article::create([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'deskripsi' => $request->deskripsi,
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
                'tgl_publish' => $request->tgl_publish ?? (now()),
                'user_id' => Auth::id(),
                'gambar_artikel' => $request->file('gambar_artikel')->store('gambar-artikel'),
            ]);

            toast('Data Berhasil Ditambahkan','success');

            return redirect()->route('article.index');
        }
    }


        public function edit($id)
        {
            $articles = Article::findOrFail($id);
            $categories = Categorie::all();


            return view('admin.article.edit', compact('articles', 'categories'));
        }


        public function show($id)
        {
            return view('admin.article.show', [
                'articles' => Article::findOrFail($id)
            ]);
        }


        public function update(Request $request, $id)
        {
            request()->validate([
                'judul' => 'required|string|unique:articles,judul',
                'gambar_artikel' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'deskripsi' => 'required',
                'kategori_id' => 'required',
            ]);


            if (empty($request->file('gambar_artikel'))) {
                $articles = Article::find($id);
                $articles->update([
                    'judul' => $request->judul,
                    'slug' => Str::slug($request->judul),
                    'deskripsi' => $request->deskripsi,
                    'kategori_id' => $request->kategori_id,
                    'tgl_publish' => $request->tgl_publish ?? (now()),
                    'is_active' => $request->is_active,
                    'user_id' => Auth::id(),
                ]);

                toast('Data Berhasil Diupdate','success');

                return redirect()->route('article.index');

            } else {
                $articles = Article::find($id);
                Storage::delete($articles->gambar_artikel);
                $articles->update([
                    'judul' => $request->judul,
                    'slug' => Str::slug($request->judul),
                    'deskripsi' => $request->deskripsi,
                    'kategori_id' => $request->kategori_id,
                    'tgl_publish' => $request->tgl_publish ?? (now()),
                    'is_active' => $request->is_active,
                    'user_id' => Auth::id(),
                    'gambar_artikel' => $request->file('gambar_artikel')->store('gambar-artikel'),
                ]);

                toast('Data Berhasil Diupdate','success');

                return redirect()->route('article.index');
            }
        }
    }
