<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();

        // dd($wishlist);

        return view('user.wishlist.index', compact('wishlist'));
    }


    public function add(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('product_id');
            if(Product::find($prod_id))
            {
                $wish = new Wishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();

                return response()->json(['status' => "Product Added to Wishlist"]);

            } else {
                return response()->json(['status' => "Product Doesnot Exists"]);
            }

        } else {
            return response()->json(['status' => "Login to Continue"]);
        }
    }


    public function deletewishlist(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
            if(Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $wish = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $wish->delete();

                return response()->json(['status' => "Item Removed from Wishlist"]);
            }
        } else {
            return response()->json(['status' => "Login to Continue"]);
        }
    }


    public function wishlistcount()
    {
        $wishlistcount = Wishlist::where('user_id', Auth::id())->count();

        return response()->json(['count' => $wishlistcount]);
    }
}
