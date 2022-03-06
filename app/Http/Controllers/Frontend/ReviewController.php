<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CategorieProduct;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //

    public function add($product_slug)
    {
        $product = Product::where('slug', $product_slug)->where('status', '0')->first();

        if($product)
        {
            $product_id = $product->id;
            $review = Review::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
            if($review)
            {
                return view('user.review.edit', compact('review'));
            } else {
                $verified_purchase = Order::where('orders.user_id', Auth::id())
                ->join('order_items', 'orders.id', 'order_items.order_id')
                ->where('order_items.prod_id', $product_id)->get();
                return view('user.review.index', compact('product_id', 'product','verified_purchase'));
            }


        } else {
            toast('Link Tidak dapat Ditemukan','error');
            return back();
        }
    }



    public function create(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = Product::where('id', $product_id)->where('status', '0')->first();

        if($product)
        {
            $user_review = $request->input('user_review');
            $new_review = Review::create([
                'user_id' => Auth::id(),
                'prod_id' => $product_id,
                'user_review' => $user_review
            ]);

            $category_slug = $product->categorieproduct->slug;
            $prod_slug = $product->slug;
            if($new_review)
            {
                toast('Trimakasih Sudah memberikan Review','success');
                return redirect('categorie-product/'.$category_slug.'/'.$prod_slug);
            }

        } else {

            toast('Link Tidak dapat Ditemukan','error');
            return back();
        }
    }



    public function edit($product_slug)
    {
        $product = Product::where('slug', $product_slug)->where('status', '0')->first();
        if($product)
        {
            $product_id = $product->id;
            $review = Review::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
            if($review)
            {
                return view('user.review.edit', compact('review'));
            } else {
                toast('Link Tidak dapat Ditemukan','error');
                return back();
            }
        } else {
            toast('Link Tidak dapat Ditemukan','error');
            return back();
        }
    }



    public function update(Request $request)
    {
        $user_review = $request->input('user_review');
        if($user_review != '')
        {
            $review_id = $request->input('review_id');
            $review = Review::where('id', $review_id)->where('user_id', Auth::id())->first();
            $category_slug = $review->product->categorieproduct->slug;
            $prod_slug = $review->product->slug;
            if($review)
            {
                $review->user_review = $request->input('user_review');
                $review->update();
                return redirect('categorie-product/'.$category_slug.'/'.$prod_slug)->toast('Review Telah berhasil Diupdate','success');;
            } else {
                toast('Link Tidak dapat Ditemukan','error');
                return back();
            }
        } else {
            toast('Review Tidak boleh Kosong','error');
            return back();
        }
    }
}
