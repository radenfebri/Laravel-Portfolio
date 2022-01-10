<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('user.index');
    }


    public function store()
    {
        $product = Product::where('trending', '1')->take(15)->get();

        return view('user.store', compact('product'));
    }
}
