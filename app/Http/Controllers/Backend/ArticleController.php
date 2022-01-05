<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('admin.article.index', compact('articles'));
    }


    public function create(Request $request)
    {
        $articles = Article::all();

        return view('admin.article.create', compact('articles'));
    }
}
