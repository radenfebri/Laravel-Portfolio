<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CategorieProduct;
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
        $categorieproduct = CategorieProduct::where('status', '0')->get();

        return view('user.store', compact('product', 'categorieproduct'));
    }


    public function viewcategorie($slug)
    {
        if(CategorieProduct::where('slug', $slug)->exists())
        {
            $categorieproduct = CategorieProduct::where('slug', $slug)->first();
            $product = Product::where('categorie_id', $categorieproduct->id)->where('status', '0')->get();
            return view('user.categorieproduct.index', compact('categorieproduct', 'product'));

        } else {

            return redirect('/')->with('status', "Slug Doesnot Exists");
        }
    }


    public function productview($cate_slug, $prod_slug)
    {
        if(CategorieProduct::where('slug', $cate_slug)->exists())
        {
            if(Product::where('slug', $prod_slug)->exists())
            {
                $categorieproduct = CategorieProduct::where('slug', $cate_slug)->first();
                $product = Product::where('slug', $prod_slug)->first();
                return view('user.products.index', compact('product', 'categorieproduct'));
            } else {
                return redirect('/')->with('status', "The link was broken");
            }
        } else {
            return redirect('/')->with('status', "No such categorie found");
        }
    }
}
