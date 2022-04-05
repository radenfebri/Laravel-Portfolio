<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CategorieProduct;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        return view('user.index');
    }


    public function store()
    {
        $featured_product = Product::where('trending', '1')->take(15)->get();
        $trending_categorie = CategorieProduct::where('popular', '1')->take(15)->get();
        $allproduct = Product::all();
        $categorieproduct = CategorieProduct::all();

        return view('user.store', compact('featured_product', 'trending_categorie','categorieproduct', 'allproduct'));
    }


    public function search()
    {
        $products = Product::select('name')->where('status', '1')->get();
        $data = [];

        foreach ($products as $item) {
            $data[] = $item['name'];
        }

        return $data;
    }



    public function searchproduct(Request $request)
    {
        $search_product = $request->product_name;

        if($search_product != "")
        {
            $product = Product::where("name", "LIKE", "%$search_product%")->first();
            if($product)
            {
                return redirect('categorie-product/'.$product->categorieproduct->slug.'/'.$product->slug);
            } else {
                toast('Produk Tidak dapat Ditemukan','error');
                return back();
            }
        } else {
            return back();
        }
    }


    public function viewcategorie($slug)
    {
        if(CategorieProduct::where('slug', $slug)->exists())
        {
            $categorieproduct = CategorieProduct::where('slug', $slug)->first();
            $product = Product::where('categorie_id', $categorieproduct->id)->get();
            return view('user.categorieproduct.index', compact('categorieproduct', 'product'));

        } else {
            toast('Link Tidak dapat Ditemukan','error');
            return back();
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
                $rating = Rating::where('prod_id', $product->id)->get();
                $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
                $user_rating = Rating::where('prod_id', $product->id)->where('user_id', Auth::id())->first();
                $reviews = Review::where('prod_id', $product->id)->get();

                if($rating->count() > 0)
                {
                    $rating_value = $rating_sum/$rating->count();
                } else {
                    $rating_value = 0;
                }
                return view('user.products.index', compact('product', 'rating', 'rating_value','reviews' ,'categorieproduct', 'user_rating'));
            } else {
                toast('Link Tidak dapat Ditemukan','error');
                return back();
            }
        } else {
            toast('Link Tidak dapat Ditemukan','error');
            return back();
        }
    }
}
