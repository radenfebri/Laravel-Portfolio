<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check())
        {
            $prod_check = Product::where('id', $product_id)->first();

            if($prod_check)
            {
                if(Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists())
                {
                    // return response()->json(['status' => $prod_check->name." Already Added to Cart"]);
                    toast('Data Berhasil Ditambahkan','success');


                    return redirect()->route('cart');


                } else {
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();
<<<<<<< HEAD
                    return response()->json(['status' => $prod_check->name." Added to Cart"]);
=======
                    // return response()->json(['status' => $prod_check->name." Added to Cart"]);
                    toast('Data Berhasil Ditambahkan','success');

                    return redirect()->route('cart');
>>>>>>> b6a85d9cf5db9a5854b13ae3f3e6805a5bb38b3e
                }
            }

        } else {
            // return response()->json(['status' => "Login to Continue"]);

            toast('Data Berhasil Ditambahkan','success');

            return redirect()->route('login');
        }
    }


    public function cartview()
    {
        $cartItem = Cart::where('user_id', Auth::id())->get();

        return view('user.cart.index', compact('cartItem'));
    }


    public function updatecart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');

        if(Auth::check())
        {
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $product_qty;
                $cart->update();
                return response()->json(['status' => "Quantity Update"]);
            }
        }
    }


    public function deleteproduct(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();

                return response()->json(['status' => "Product Deleted Success"]);
            }
        } else {
            return response()->json(['status' => "Login to Continue"]);
        }
    }
}
